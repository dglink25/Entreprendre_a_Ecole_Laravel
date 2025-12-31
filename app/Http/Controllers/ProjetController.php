<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProjetController extends Controller{

    public function index(){
        try {
            $projets = Projet::with('domaine')->orderBy('id', 'desc')->get();

            return view('projets.index', compact('projets'));

        } 
        catch (\Exception $e) {
            Log::error("Erreur INDEX Projet: " . $e->getMessage());

            return back()->with('error', 'Impossible d’afficher les projets.');
        }
    }

    public function create() {
        try {
            $domaines = Domaine::orderBy('nom')->get();

            return view('projets.create', compact('domaines'));

        } catch (\Exception $e) {
            Log::error("Erreur CREATE Projet: " . $e->getMessage());
            return back()->with('error', 'Impossible d’accéder à la page de création.');
        }
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'nom'        => ['required', 'string', 'max:255'],
            'description'=> ['nullable', 'string'],
            'domaine_id' => ['required', 'exists:domaines,id'],
        ]);

        try {
            Projet::create($validated);

            return redirect()->route('projets.index')
                ->with('success', 'Projet ajouté avec succès.');

        } catch (\Exception $e) {
            Log::error("Erreur STORE Projet: " . $e->getMessage());

            return back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de l’ajout du projet.');
        }
    }

    public function edit($id){
        try {
            $projet = Projet::findOrFail($id);
            $domaines = Domaine::orderBy('nom')->get();

            return view('projets.edit', compact('projet', 'domaines'));

        } catch (ModelNotFoundException $e) {
            return redirect()->route('projets.index')->with('error', 'Projet introuvable.');
        } catch (\Exception $e) {
            Log::error("Erreur EDIT Projet: " . $e->getMessage());
            return redirect()->route('projets.index')->with('error', 'Erreur inattendue.');
        }
    }

    public function update(Request $request, $id){
        $validated = $request->validate([
            'nom'        => ['required', 'string', 'max:255'],
            'description'=> ['nullable', 'string'],
            'domaine_id' => ['required', 'exists:domaines,id'],
        ]);

        try {
            $projet = Projet::findOrFail($id);
            $projet->update($validated);

            return redirect()->route('projets.index')
                ->with('success', 'Projet modifié avec succès.');

        } catch (ModelNotFoundException $e) {
            return redirect()->route('projets.index')->with('error', 'Projet introuvable.');
        } catch (\Exception $e) {
            Log::error("Erreur UPDATE Projet: " . $e->getMessage());
            return back()->with('error', 'Mise à jour impossible.')->withInput();
        }
    }

    public function destroy($id){
        try {
            $projet = Projet::findOrFail($id);
            $projet->delete();

            return redirect()->back()->with('success', 'Projet supprimé.');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Projet introuvable.');
        } catch (\Exception $e) {
            Log::error("Erreur DELETE Projet: " . $e->getMessage());
            return redirect()->back()->with('error', 'Suppression impossible.');
        }
    }
}