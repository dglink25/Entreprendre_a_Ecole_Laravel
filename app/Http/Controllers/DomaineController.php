<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class DomaineController extends Controller{
    /**
     * Affiche la liste des domaines.
     */
    public function index(){
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Récupérer tous les domaines du module EAE
            $domaines = Category::where('module_id', $moduleEae->id)->where('type', 'domaine')->get();

            // Retourner la vue avec les domaines
            return view('domaines.index', compact('domaines'));

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Index Domaines : " . $e->getMessage());
            return back()->with('error', 'Impossible de charger les domaines.');
        }
    }

    /**
     * Page de création d'un nouveau domaine.
     */
    public function create()
    {
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Retourner la vue avec le module EAE
            return view('domaines.create', compact('moduleEae'));

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Create Domaine : " . $e->getMessage());
            return back()->with('error', 'Impossible d’accéder à la page de création.');
        }
    }

    /**
     * Enregistre un nouveau domaine.
     */
    public function store(Request $request)
    {
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
            ]);

            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Créer le nouveau domaine
            $domaine = new Category([
                'module_id' => $moduleEae->id,
                'type' => 'domaine',
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]);
            $domaine->save();

            // Message de succès
            return redirect()->route('domaines.index')
                ->with('success', 'Domaine ajouté avec succès.');

        } catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Store Domaine : " . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue. Réessayez.');
        }
    }

    /**
     * Page d’édition d’un domaine.
     */
    public function edit($id)
    {
        try {
            // Récupérer le domaine
            $domaine = Category::findOrFail($id);

            // Vérifier que le domaine appartient au module EAE
            if ($domaine->module->code !== 'eae') {
                abort(403, 'Accès refusé.');
            }

            // Retourner la vue avec le domaine
            return view('domaines.edit', compact('domaine'));

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Edit Domaine : " . $e->getMessage());
            return back()->with('error', 'Impossible d’ouvrir la page d’édition.');
        }
    }

    /**
     * Mise à jour d’un domaine.
     */
    public function update(Request $request, $id)
    {
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
            ]);

            // Récupérer le domaine
            $domaine = Category::findOrFail($id);

            // Vérifier que le domaine appartient au module EAE
            if ($domaine->module->code !== 'eae') {
                abort(403, 'Accès refusé.');
            }

            // Mettre à jour le domaine
            $domaine->update($validated);

            // Message de succès
            return redirect()->route('domaines.index')
                ->with('success', 'Domaine modifié avec succès.');

        } catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Update Domaine : " . $e->getMessage());
            return back()->with('error', 'Erreur lors de la mise à jour.');
        }
    }

    /**
     * Suppression d’un domaine.
     */
    public function destroy($id)
    {
        try {
            // Récupérer le domaine
            $domaine = Category::findOrFail($id);

            // Vérifier que le domaine appartient au module EAE
            if ($domaine->module->code !== 'eae') {
                abort(403, 'Accès refusé.');
            }

            // Supprimer le domaine
            $domaine->delete();

            // Message de succès
            return redirect()->route('domaines.index')
                ->with('success', 'Domaine supprimé avec succès.');

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Delete Domaine : " . $e->getMessage());
            return back()->with('error', 'Impossible de supprimer ce domaine.');
        }
    }
}