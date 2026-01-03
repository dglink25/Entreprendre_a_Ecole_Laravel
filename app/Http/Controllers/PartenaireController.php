<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class PartenaireController extends Controller{
    public function index(){
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Récupérer tous les partenaires du module EAE
            $partenaires = Category::where('module_id', $moduleEae->id)->where('type', 'partenaire')->get();

            // Retourner la vue avec les partenaires
            return view('partenaires.index', compact('partenaires'));

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Index Partenaires : " . $e->getMessage());
            return back()->with('error', 'Impossible de charger les partenaires.');
        }
    }

    public function create(){
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Récupérer les entreprises et les projets pour le formulaire
            $entreprises = Category::where('module_id', $moduleEae->id)->where('type', 'entreprise')->get();
            $projets = Category::where('module_id', $moduleEae->id)->where('type', 'projet')->get();

            // Retourner la vue avec le module EAE, les entreprises et les projets
            return view('partenaires.create', compact('moduleEae', 'entreprises', 'projets'));

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Create Partenaire : " . $e->getMessage());
            return back()->with('error', 'Impossible d’accéder à la page de création.');
        }
    }

    public function store(Request $request){
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'parent1_id' => 'required|exists:categories,id', // Parent1 peut être une entreprise ou un projet
            ]);

            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Créer le nouveau partenaire
            $partenaire = new Category([
                'module_id' => $moduleEae->id,
                'type' => 'partenaire',
                'name' => $validated['name'],
                'description' => $validated['description'],
                'parent1_id' => $validated['parent1_id'], // Le parent1 est une entreprise ou un projet
            ]);
            $partenaire->save();

            // Message de succès
            return redirect()->route('partenaires.index')
                ->with('success', 'Partenaire ajouté avec succès.');

        } catch (ValidationException $e) {
            // Retourner les erreurs de validation
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Store Partenaire : " . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue. Réessayez.');
        }
    }

    public function edit($id){
        try {
            // Récupérer le partenaire
            $partenaire = Category::findOrFail($id);

            // Vérifier que le partenaire appartient au module EAE
            if ($partenaire->module->code !== 'eae' || $partenaire->type !== 'partenaire') {
                abort(403, 'Accès refusé.');
            }

            // Récupérer les entreprises et les projets pour le formulaire
            $entreprises = Category::where('module_id', $partenaire->module_id)->where('type', 'entreprise')->get();
            $projets = Category::where('module_id', $partenaire->module_id)->where('type', 'projet')->get();

            // Retourner la vue avec le partenaire, les entreprises et les projets
            return view('partenaires.edit', compact('partenaire', 'entreprises', 'projets'));

        } catch (\Exception $e) {
            // Loguer l'erreur et retourner un message d'erreur
            Log::error("Erreur Edit Partenaire : " . $e->getMessage());
            return back()->with('error', 'Impossible d’ouvrir la page d’édition.');
        }
    }

    public function update(Request $request, $id){
        try {
            // Valider les données du formulaire
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'parent1_id' => 'required|exists:categories,id', // Parent1 peut être une entreprise ou un projet
            ]);

            $partenaire = Category::findOrFail($id);

            if ($partenaire->module->code !== 'eae' || $partenaire->type !== 'partenaire') {
                abort(403, 'Accès refusé.');
            }

            $partenaire->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'parent1_id' => $validated['parent1_id'], 
            ]);
            return redirect()->route('partenaires.index')
                ->with('success', 'Partenaire modifié avec succès.');

        } 
        catch (ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput();

        } 
        catch (\Exception $e) {
            Log::error("Erreur Update Partenaire : " . $e->getMessage());
            return back()->with('error', 'Erreur lors de la mise à jour.');
        }
    }

    public function destroy($id){
        try {
            $partenaire = Category::findOrFail($id);
            if ($partenaire->module->code !== 'eae' || $partenaire->type !== 'partenaire') {
                abort(403, 'Accès refusé.');
            }

            $partenaire->delete();
            return redirect()->route('partenaires.index')
                ->with('success', 'Partenaire supprimé avec succès.');

        } 
        catch (\Exception $e) {
            Log::error("Erreur Delete Partenaire : " . $e->getMessage());
            return back()->with('error', 'Impossible de supprimer ce partenaire.');
        }
    }
}