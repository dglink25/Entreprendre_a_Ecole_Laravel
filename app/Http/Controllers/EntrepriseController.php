<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class EntrepriseController extends Controller{
    /**
     * Affiche la liste des entreprises.
     */
    public function index(){
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Récupérer toutes les entreprises du module EAE
            $entreprises = Category::where('module_id', $moduleEae->id)->where('type', 'entreprise')->get();

            // Retourner la vue avec les entreprises
            return view('entreprises.index', compact('entreprises'));

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Index Entreprises : " . $e->getMessage());
            return back()->with('error', 'Impossible de charger les entreprises.');
        }
    }

    /**
     * Page de création d'une nouvelle entreprise.
     */
    public function create(){
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Récupérer les domaines pour le formulaire
            $domaines = Category::where('module_id', $moduleEae->id)->where('type', 'domaine')->get();

            // Retourner la vue avec le module EAE et les domaines
            return view('entreprises.create', compact('moduleEae', 'domaines'));

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Create Entreprise : " . $e->getMessage());
            return back()->with('error', 'Impossible d’accéder à la page de création.');
        }
    }

    /**
     * Enregistre une nouvelle entreprise.
     */
    public function store(Request $request){
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'domaine_id' => 'required|exists:categories,id',
            ]);

            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Créer la nouvelle entreprise
            $entreprise = new Category([
                'module_id' => $moduleEae->id,
                'type' => 'entreprise',
                'name' => $validated['name'],
                'description' => $validated['description'],
                'parent1_id' => $validated['domaine_id'], // Le domaine est le parent1
            ]);
            $entreprise->save();

            // Message de succès
            return redirect()->route('entreprises.index')
                ->with('success', 'Entreprise ajoutée avec succès.');

        } 
        catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Store Entreprise : " . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue. Réessayez.');
        }
    }

    /**
     * Page d’édition d’une entreprise.
     */
    public function edit($id){
        try {
            // Récupérer l'entreprise
            $entreprise = Category::findOrFail($id);

            // Vérifier que l'entreprise appartient au module EAE
            if ($entreprise->module->code !== 'eae' || $entreprise->type !== 'entreprise') {
                abort(403, 'Accès refusé.');
            }

            // Récupérer les domaines pour le formulaire
            $domaines = Category::where('module_id', $entreprise->module_id)->where('type', 'domaine')->get();

            // Retourner la vue avec l'entreprise et les domaines
            return view('entreprises.edit', compact('entreprise', 'domaines'));

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Edit Entreprise : " . $e->getMessage());
            return back()->with('error', 'Impossible d’ouvrir la page d’édition.');
        }
    }

    /**
     * Mise à jour d’une entreprise.
     */
    public function update(Request $request, $id){
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'domaine_id' => 'required|exists:categories,id',
            ]);

            // Récupérer l'entreprise
            $entreprise = Category::findOrFail($id);

            // Vérifier que l'entreprise appartient au module EAE
            if ($entreprise->module->code !== 'eae' || $entreprise->type !== 'entreprise') {
                abort(403, 'Accès refusé.');
            }

            // Mettre à jour l'entreprise
            $entreprise->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'parent1_id' => $validated['domaine_id'], // Le domaine est le parent1
            ]);

            // Message de succès
            return redirect()->route('entreprises.index')
                ->with('success', 'Entreprise modifiée avec succès.');

        } 
        catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Update Entreprise : " . $e->getMessage());
            return back()->with('error', 'Erreur lors de la mise à jour.');
        }
    }

    /**
     * Suppression d’une entreprise.
     */
    public function destroy($id){
        try {
            // Récupérer l'entreprise
            $entreprise = Category::findOrFail($id);

            // Vérifier que l'entreprise appartient au module EAE
            if ($entreprise->module->code !== 'eae' || $entreprise->type !== 'entreprise') {
                abort(403, 'Accès refusé.');
            }

            // Supprimer l'entreprise
            $entreprise->delete();

            // Message de succès
            return redirect()->route('entreprises.index')
                ->with('success', 'Entreprise supprimée avec succès.');

        } 
        catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Delete Entreprise : " . $e->getMessage());
            return back()->with('error', 'Impossible de supprimer cette entreprise.');
        }
    }
}