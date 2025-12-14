<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModuleController extends Controller
{
    private string $moduleCode = 'eae';

    /**
     * Affiche les informations du module EAE
     */
    public function show(){
        try {
            $module = Module::where('module_id', $this->moduleCode)
                ->with([ 'statistiques'])
                ->firstOrFail();

            // Statistiques dynamiques
            $stats = [
                'domaines' => $module->domaines->count(),
                'projets' => $module->projets->count(),
                'entreprises' => $module->entreprises->count(),
                'partenaires' => $module->partenaires->count(),
                'statistiques' => $module->statistiques->count(),
            ];

            return view('module.show', compact('module', 'stats'));

        } 
        catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Module introuvable.');
        } catch (\Exception $e) {
            Log::error("Erreur Module Show: " . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger les informations du module.' . $e->getMessage());
        }
    }

    /**
     * Page d’édition du module
     */
    public function edit()
    {
        try {
            $module = Module::where('code', $this->moduleCode)->firstOrFail();
            return view('module.edit', compact('module'));

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Module introuvable.');
        } catch (\Exception $e) {
            Log::error("Erreur Module Edit: " . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible d’ouvrir la page d’édition.');
        }
    }

    /**
     * Mise à jour du module
     */
    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'courte_description' => 'nullable|string|max:500',
                'longue_description' => 'nullable|string|max:5000',
            ]);

            $module = Module::where('code', $this->moduleCode)->firstOrFail();
            $module->update($validated);

            return redirect()->route('module.show')
                ->with('success', 'Module mis à jour avec succès.');

        } catch (ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Module introuvable.');
        } catch (\Exception $e) {
            Log::error("Erreur Module Update: " . $e->getMessage());
            return back()->with('error', 'Erreur lors de la mise à jour du module.');
        }
    }

    /**
     * Suppression du module
     */
    public function destroy()
    {
        try {
            $module = Module::where('code', $this->moduleCode)->firstOrFail();
            $module->delete();

            return redirect()->route('dashboard')
                ->with('success', 'Module supprimé avec succès.');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Module introuvable.');
        } catch (\Exception $e) {
            Log::error("Erreur Module Delete: " . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de supprimer ce module.');
        }
    }
}
