<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class EntrepriseController extends Controller
{
    public function index(){
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Pour la pagination
            $entreprises = Category::where('module_id', $moduleEae->id)
                ->where('type', 'entreprise')
                ->with('parent1')
                ->latest()
                ->paginate(10);
                
            // Pour les statistiques
            $allEntreprises = Category::where('module_id', $moduleEae->id)
                ->where('type', 'entreprise')
                ->get();

            return view('entreprises.index', compact('entreprises', 'allEntreprises'));

        } catch (\Exception $e) {
            Log::error("Erreur Index Entreprises : " . $e->getMessage());
            return back()->with('error', 'Impossible de charger les entreprises.');
        }
    }

    public function create(){
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Récupérer les domaines pour le formulaire
            $domaines = Category::where('module_id', $moduleEae->id)
                ->where('type', 'domaine')
                ->get();

            return view('entreprises.create', compact('moduleEae', 'domaines'));

        } catch (\Exception $e) {
            Log::error("Erreur Create Entreprise : " . $e->getMessage());
            return back()->with('error', 'Impossible d’accéder à la page de création.');
        }
    }

    public function store(Request $request){
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|in:entreprise_incube,entreprise_alumni,entreprise_partenaire',
                'description' => 'nullable|string|max:1000',
                'mission' => 'nullable|string|max:500',
                'vision' => 'nullable|string|max:500',
                'fondateurs' => 'nullable|string|max:500',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'fichier_url' => 'required|url|max:500',
                'website' => 'nullable|url|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'domaine_id' => 'required|exists:categories,id',
                'is_active' => 'boolean',
            ]);

            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Traitement du logo
            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('entreprises/logos', 'public');
            }

            // Créer la nouvelle entreprise avec les métadonnées
            $entreprise = new Category([
                'module_id' => $moduleEae->id,
                'type' => 'entreprise',
                'name' => $validated['name'],
                'description' => $validated['description'],
                'parent1_id' => $validated['domaine_id'],
                'meta_data' => [
                    'type' => $validated['type'],
                    'mission' => $validated['mission'] ?? null,
                    'vision' => $validated['vision'] ?? null,
                    'fondateurs' => $validated['fondateurs'] ?? null,
                    'fichier_url' => $validated['fichier_url'],
                    'website' => $validated['website'] ?? null,
                    'email' => $validated['email'] ?? null,
                    'phone' => $validated['phone'] ?? null,
                    'address' => $validated['address'] ?? null,
                    'logo' => $logoPath,
                ],
                'is_active' => $request->has('is_active'),
            ]);

            $entreprise->save();

            return redirect()->route('entreprises.index')
                ->with('success', 'Entreprise ajoutée avec succès.');

        } catch (\Exception $e) {
            Log::error("Erreur Store Entreprise : " . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue. Réessayez.')->withInput();
        }
    }

    /**
     * Page d'édition d'une entreprise.
     */
    public function edit($id){
        try {
            // Récupérer l'entreprise
            $entreprise = Category::findOrFail($id);

            // Vérifier que c'est bien une entreprise
            if ($entreprise->type !== 'entreprise') {
                abort(404, 'Ce n\'est pas une entreprise.');
            }

            // Récupérer les domaines pour le formulaire
            $domaines = Category::where('module_id', $entreprise->module_id)
                ->where('type', 'domaine')
                ->get();

            return view('entreprises.edit', compact('entreprise', 'domaines'));

        } catch (\Exception $e) {
            Log::error("Erreur Edit Entreprise : " . $e->getMessage());
            return back()->with('error', 'Impossible d\'ouvrir la page d\'édition.');
        }
    }

    /**
     * Mise à jour d'une entreprise.
     */
    public function update(Request $request, $id){
        try {
            // Récupérer l'entreprise
            $entreprise = Category::findOrFail($id);

            if ($entreprise->type !== 'entreprise') {
                abort(404);
            }

            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|in:entreprise_incube,entreprise_alumni,entreprise_partenaire',
                'description' => 'nullable|string|max:1000',
                'mission' => 'nullable|string|max:500',
                'vision' => 'nullable|string|max:500',
                'fondateurs' => 'nullable|string|max:500',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'fichier_url' => 'required|url|max:500',
                'website' => 'nullable|url|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'domaine_id' => 'required|exists:categories,id',
                'is_active' => 'boolean',
                'remove_logo' => 'boolean',
            ]);

            // Récupérer les métadonnées actuelles
            $metaData = $entreprise->meta_data ?? [];

            // Gestion du logo
            if ($request->hasFile('logo')) {
                // Supprimer l'ancien logo si existant
                if (isset($metaData['logo'])) {
                    Storage::disk('public')->delete($metaData['logo']);
                }
                // Stocker le nouveau logo
                $metaData['logo'] = $request->file('logo')->store('entreprises/logos', 'public');
            } elseif ($request->has('remove_logo') && $request->remove_logo == '1') {
                // Supprimer le logo si demandé
                if (isset($metaData['logo'])) {
                    Storage::disk('public')->delete($metaData['logo']);
                    unset($metaData['logo']);
                }
            }

            // Mettre à jour les métadonnées
            $metaData['type'] = $validated['type'];
            $metaData['mission'] = $validated['mission'] ?? null;
            $metaData['vision'] = $validated['vision'] ?? null;
            $metaData['fondateurs'] = $validated['fondateurs'] ?? null;
            $metaData['fichier_url'] = $validated['fichier_url'];
            $metaData['website'] = $validated['website'] ?? null;
            $metaData['email'] = $validated['email'] ?? null;
            $metaData['phone'] = $validated['phone'] ?? null;
            $metaData['address'] = $validated['address'] ?? null;

            // Mettre à jour l'entreprise
            $entreprise->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'parent1_id' => $validated['domaine_id'],
                'meta_data' => $metaData,
                'is_active' => $request->has('is_active'),
            ]);

            return redirect()->route('entreprises.index')
                ->with('success', 'Entreprise modifiée avec succès.');

        } catch (\Exception $e) {
            Log::error("Erreur Update Entreprise : " . $e->getMessage());
            return back()->with('error', 'Erreur lors de la mise à jour.')->withInput();
        }
    }

    /**
     * Suppression d'une entreprise.
     */
    public function destroy($id){
        try {
            // Récupérer l'entreprise
            $entreprise = Category::findOrFail($id);

            // Vérifier que c'est bien une entreprise
            if ($entreprise->type !== 'entreprise') {
                abort(404);
            }

            // Supprimer le logo si existant
            if (isset($entreprise->meta_data['logo'])) {
                Storage::disk('public')->delete($entreprise->meta_data['logo']);
            }

            // Supprimer l'entreprise
            $entreprise->delete();

            // Message de succès
            return redirect()->route('entreprises.index')
                ->with('success', 'Entreprise supprimée avec succès.');

        } catch (\Exception $e) {
            Log::error("Erreur Delete Entreprise : " . $e->getMessage());
            return back()->with('error', 'Impossible de supprimer cette entreprise.');
        }
    }

    /**
     * Afficher les détails d'une entreprise (pour le public)
     */
    public function show($id){
        try {
            $entreprise = Category::with('parent1')->findOrFail($id);
            
            if ($entreprise->type !== 'entreprise') {
                abort(404);
            }

            return view('entreprises.show', compact('entreprise'));

        } catch (\Exception $e) {
            Log::error("Erreur Show Entreprise : " . $e->getMessage());
            return back()->with('error', 'Impossible d\'afficher les détails de l\'entreprise.');
        }
    }

    /**
     * Liste publique des entreprises
     */
    public function publicIndex()
    {
        try {
            $moduleEae = Module::where('code', 'eae')->firstOrFail();
            
            $entreprises = Category::where('module_id', $moduleEae->id)
                ->where('type', 'entreprise')
                ->where('is_active', true)
                ->with('parent1')
                ->latest()
                ->paginate(12);

            return view('entreprises.public_index', compact('entreprises'));

        } catch (\Exception $e) {
            Log::error("Erreur Public Index Entreprises : " . $e->getMessage());
            return back()->with('error', 'Impossible de charger les entreprises.');
        }
    }
}