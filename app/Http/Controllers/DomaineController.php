<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class DomaineController extends Controller{
    protected $moduleId = 1; // Module EAE

    public function index(){
        try {
            $domaines = Domaine::where('module_id', $this->moduleId)->paginate(9);

            return view('domaines.index', compact('domaines'));

        } catch (\Exception $e) {
            Log::error("Erreur Index Domaines : " . $e->getMessage());
            return back()->with('error', 'Impossible de charger les domaines.');
        }
    }

    public function create(){
        return view('domaines.create');
    }

    public function store(Request $request) {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
            ]);

            // On ajoute automatiquement le module EAE
            $validated['module_id'] = $this->moduleId;

            Domaine::create($validated);

            return redirect()->route('domaines.index')
                ->with('success', 'Domaine ajouté avec succès.');

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error("Erreur Store Domaine : " . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue. Réessayez.');
        }
    }


    public function edit(Domaine $domaine) {
        try {
            if ($domaine->module_id !== $this->moduleId) {
                abort(403, 'Accès refusé.');
            }

            return view('domaines.edit', compact('domaine'));

        } catch (\Exception $e) {
            Log::error("Erreur Edit Domaine : " . $e->getMessage());
            return back()->with('error', 'Impossible d’ouvrir la page d’édition.');
        }
    }

    public function update(Request $request, Domaine $domaine) {
        try {
            if ($domaine->module_id !== $this->moduleId) {
                abort(403, 'Accès refusé.');
            }

            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'description' => 'required|string|max:1000',
            ]);

            $domaine->update($validated);

            return redirect()->route('domaines.index')
                ->with('success', 'Domaine modifié avec succès.');

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            Log::error("Erreur Update Domaine : " . $e->getMessage());
            return back()->with('error', 'Erreur lors de la mise à jour.');
        }
    }

    public function destroy(Domaine $domaine){
        try {
            if ($domaine->module_id !== $this->moduleId) {
                abort(403, 'Accès refusé.');
            }

            $domaine->delete();

            return redirect()->route('domaines.index')
                ->with('success', 'Domaine supprimé avec succès.');

        } catch (\Exception $e) {
            Log::error("Erreur Delete Domaine : " . $e->getMessage());
            return back()->with('error', 'Impossible de supprimer ce domaine.');
        }
    }
}
