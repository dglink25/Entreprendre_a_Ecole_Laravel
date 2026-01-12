<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;



class ProjetController extends Controller{
    /**
     * Affiche la liste des projets.
     */
    
    public function index(){
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Récupérer tous les projets du module EAE
            $projets = Category::where('module_id', $moduleEae->id)->where('type', 'projet')->get();

            // Retourner la vue avec les projets
            return view('projets.index', compact('projets'));

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Index Projets : " . $e->getMessage());
            return back()->with('error', 'Impossible de charger les projets.');
        }
    }

    /**
     * Page de création d'un nouveau projet.
     */
    public function create(){
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Récupérer les domaines pour le formulaire
            $domaines = Category::where('module_id', $moduleEae->id)->where('type', 'domaine')->get();

            // Retourner la vue avec le module EAE et les domaines
            return view('projets.create', compact('moduleEae', 'domaines'));

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Create Projet : " . $e->getMessage());
            return back()->with('error', 'Impossible d’accéder à la page de création.');
        }
    }

    /**
     * Page d’édition d’un projet.
     */
    public function edit($id){
        try {
            // Récupérer le projet
            $projet = Category::findOrFail($id);

            // Vérifier que le projet appartient au module EAE
            if ($projet->module->code !== 'eae' || $projet->type !== 'projet') {
                abort(403, 'Accès refusé.');
            }

            // Récupérer les domaines pour le formulaire
            $domaines = Category::where('module_id', $projet->module_id)->where('type', 'domaine')->get();

            // Retourner la vue avec le projet et les domaines
            return view('projets.edit', compact('projet', 'domaines'));

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Edit Projet : " . $e->getMessage());
            return back()->with('error', 'Impossible d’ouvrir la page d’édition.');
        }
    }

    /**
     * Enregistre un nouveau projet.
     */
    public function store(Request $request)
    {
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'date_debut' => 'required|date',
                'date_fin' => 'required|date|after_or_equal:date_debut',
                'domaine_id' => 'required|exists:categories,id',
                'fichier_url' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Traitement du fichier URL
            $fileUrl = $validated['fichier_url'];
            
            // Si c'est un upload de fichier (input type="file")
            if ($request->hasFile('fichier_url')) {
                $file = $request->file('fichier_url');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('projets/fichiers', $fileName, 'public');
                $fileUrl = Storage::url($filePath);
            }
            
            // Si c'est une URL Google Drive ou autre, nettoyer l'URL
            else {
                // Nettoyer l'URL si c'est un lien Google Drive ou autre
                $fileUrl = $this->cleanFileUrl($fileUrl);
            }

            // Traitement de l'image
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('projets/images', 'public');
            }

            // Créer le nouveau projet avec métadonnées
            $projet = new Category([
                'module_id' => $moduleEae->id,
                'type' => 'projet',
                'name' => $validated['name'],
                'description' => $validated['description'],
                'date_debut' => $validated['date_debut'],
                'date_fin' => $validated['date_fin'],
                'parent1_id' => $validated['domaine_id'],
                'meta_data' => [
                    'fichier_url' => $fileUrl,
                    'file_type' => $request->hasFile('fichier_url') ? 'uploaded' : 'external',
                    'image' => $imagePath,
                ],
            ]);
            
            $projet->save();

            // Message de succès
            return redirect()->route('projets.index')
                ->with('success', 'Projet ajouté avec succès.');

        } 
        catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Store Projet : " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            return back()->with('error', 'Une erreur est survenue. Réessayez.')->withInput();
        }
    }

    /**
     * Mise à jour d'un projet.
     */
    public function update(Request $request, $id)
    {
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'date_debut' => 'required|date',
                'date_fin' => 'required|date|after_or_equal:date_debut',
                'domaine_id' => 'required|exists:categories,id',
                'fichier_url' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'remove_image' => 'nullable|boolean',
            ]);

            // Récupérer le projet
            $projet = Category::findOrFail($id);

            // Vérifier que le projet appartient au module EAE
            if ($projet->module->code !== 'eae' || $projet->type !== 'projet') {
                abort(403, 'Accès refusé.');
            }

            // Récupérer les métadonnées actuelles
            $metaData = $projet->meta_data ?? [];

            // Traitement du fichier URL
            $fileUrl = $validated['fichier_url'];
            
            // Si c'est un upload de fichier (input type="file")
            if ($request->hasFile('fichier_url')) {
                // Supprimer l'ancien fichier si c'était un upload
                if (isset($metaData['file_type']) && $metaData['file_type'] === 'uploaded' && isset($metaData['fichier_url'])) {
                    $this->deleteUploadedFile($metaData['fichier_url']);
                }
                
                $file = $request->file('fichier_url');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('projets/fichiers', $fileName, 'public');
                $fileUrl = Storage::url($filePath);
                $fileType = 'uploaded';
            }
            
            // Si c'est une URL externe
            else {
                // Si l'ancien était un upload, le supprimer
                if (isset($metaData['file_type']) && $metaData['file_type'] === 'uploaded' && isset($metaData['fichier_url'])) {
                    $this->deleteUploadedFile($metaData['fichier_url']);
                }
                
                $fileUrl = $this->cleanFileUrl($fileUrl);
                $fileType = 'external';
            }

            // Traitement de l'image
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si existante
                if (isset($metaData['image'])) {
                    Storage::disk('public')->delete($metaData['image']);
                }
                // Stocker la nouvelle image
                $metaData['image'] = $request->file('image')->store('projets/images', 'public');
            } 
            // Si on demande de supprimer l'image
            elseif ($request->has('remove_image') && $request->remove_image == '1') {
                if (isset($metaData['image'])) {
                    Storage::disk('public')->delete($metaData['image']);
                    unset($metaData['image']);
                }
            }

            // Mettre à jour les métadonnées
            $metaData['fichier_url'] = $fileUrl;
            $metaData['file_type'] = $fileType;

            // Mettre à jour le projet
            $projet->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'date_debut' => $validated['date_debut'],
                'date_fin' => $validated['date_fin'],
                'parent1_id' => $validated['domaine_id'],
                'meta_data' => $metaData,
            ]);

            // Message de succès
            return redirect()->route('projets.index')
                ->with('success', 'Projet modifié avec succès.');

        } 
        catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Update Projet : " . $e->getMessage());
            Log::error("Stack trace: " . $e->getTraceAsString());
            return back()->with('error', 'Erreur lors de la mise à jour.')->withInput();
        }
    }

    /**
     * Nettoyer l'URL du fichier.
     */
    private function cleanFileUrl($url)
    {
        // Si c'est une URL Google Drive, nettoyer pour avoir le lien de prévisualisation
        if (str_contains($url, 'drive.google.com')) {
            // Convertir les liens Google Drive en liens de prévisualisation
            if (str_contains($url, '/file/d/')) {
                preg_match('/\/file\/d\/([a-zA-Z0-9_-]+)/', $url, $matches);
                if (isset($matches[1])) {
                    return 'https://drive.google.com/file/d/' . $matches[1] . '/preview';
                }
            }
        }
        
        // Si c'est une URL Dropbox, convertir en lien direct
        if (str_contains($url, 'dropbox.com')) {
            $url = str_replace('?dl=0', '?dl=1', $url);
        }
        
        return trim($url);
    }

    /**
     * Supprimer un fichier uploadé.
     */
    private function deleteUploadedFile($fileUrl)
    {
        try {
            // Extraire le chemin du fichier depuis l'URL
            if (str_contains($fileUrl, '/storage/')) {
                $path = str_replace('/storage/', '', $fileUrl);
                Storage::disk('public')->delete($path);
            }
        } catch (\Exception $e) {
            Log::warning("Impossible de supprimer le fichier : " . $e->getMessage());
        }
    }

    /**
     * Suppression d'un projet.
     */
    public function destroy($id)
    {
        try {
            // Récupérer le projet
            $projet = Category::findOrFail($id);

            // Vérifier que le projet appartient au module EAE
            if ($projet->module->code !== 'eae' || $projet->type !== 'projet') {
                abort(403, 'Accès refusé.');
            }

            // Supprimer les fichiers associés
            $metaData = $projet->meta_data ?? [];
            
            // Supprimer le fichier uploadé si existant
            if (isset($metaData['file_type']) && $metaData['file_type'] === 'uploaded' && isset($metaData['fichier_url'])) {
                $this->deleteUploadedFile($metaData['fichier_url']);
            }
            
            // Supprimer l'image si existante
            if (isset($metaData['image'])) {
                Storage::disk('public')->delete($metaData['image']);
            }

            // Supprimer le projet
            $projet->delete();

            // Message de succès
            return redirect()->route('projets.index')
                ->with('success', 'Projet supprimé avec succès.');

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Delete Projet : " . $e->getMessage());
            return back()->with('error', 'Impossible de supprimer ce projet.');
        }
    }
}