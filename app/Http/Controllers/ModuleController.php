<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModuleController extends Controller
{
    /**
     * Code du module EAE
     */
    private string $moduleCode = 'eae';

    /**
     * Affiche les informations du module EAE
     */
    public function show(){
        try {
            $module = Module::where('code', $this->moduleCode)
                ->with([
                    'statistiques',
                    'domaines',
                    'projets',
                    'entreprises',
                    'partenaires'
                ])
                ->firstOrFail();

            $stats = [
                'domaines'     => $module->domaines->count(),
                'projets'      => $module->projets->count(),
                'entreprises'  => $module->entreprises->count(),
                'partenaires'  => $module->partenaires->count(),
                'statistiques' => $module->statistiques->count(),
            ];

            return view('module.show', compact('module', 'stats'));

        } catch (ModelNotFoundException $e) {
            Log::warning("Module introuvable (code={$this->moduleCode})");
            return redirect()->back()->with('error', 'Module introuvable.');

        } catch (\Exception $e) {
            Log::error("Erreur Module Show: ".$e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger les informations du module.');
        }
    }

    /**
     * Page d’édition du module
     */
    public function edit(){
        try {
            $module = Module::where('code', $this->moduleCode)->firstOrFail();
            return view('module.edit', compact('module'));

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Module introuvable.');

        } catch (\Exception $e) {
            Log::error("Erreur Module Edit: ".$e->getMessage());
            return redirect()->back()->with('error', 'Impossible d’ouvrir la page d’édition.');
        }
    }

    /**
     * Mise à jour du module
     */
    public function update(Request $request){
        try {
            $validated = $request->validate([
                'nom'                => 'required|string|max:255',
                'courte_description' => 'nullable|string|max:500',
                'longue_description' => 'required|string|max:5000',
            ]);
            
            // Récupérer le module
            $module = Module::where('code', $this->moduleCode)->firstOrFail();
            
            // Générer automatiquement la courte description si la longue description est fournie
            if (!empty($validated['longue_description'])) {
                // Prendre les 100 premiers caractères de la longue description
                $shortDesc = substr($validated['longue_description'], 0, 100);
                
                // Si la description dépasse 100 caractères, couper au dernier mot complet
                if (strlen($validated['longue_description']) > 100) {
                    $lastSpace = strrpos($shortDesc, ' ');
                    if ($lastSpace > 80) { // On garde au moins 80 caractères
                        $shortDesc = substr($shortDesc, 0, $lastSpace);
                    }
                    $shortDesc .= '...';
                }
                
                // Mettre à jour la courte description
                $validated['courte_description'] = $shortDesc;
            }
            
            // Mettre à jour le module
            $module->update($validated);
            
            // Message de succès avec les données mises à jour
            return redirect()
                ->route('module.show')
                ->with('success', 'Module mis à jour avec succès !')
                ->with('updated_module', $module->fresh());

        } catch (ValidationException $e) {
            return back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('error', 'Veuillez corriger les erreurs dans le formulaire.');

        } catch (ModelNotFoundException $e) {
            Log::error("Module introuvable: " . $e->getMessage());
            return redirect()
                ->route('module.show')
                ->with('error', 'Module introuvable. Veuillez réessayer.');

        } catch (\Exception $e) {
            Log::error("Erreur lors de la mise à jour du module: " . $e->getMessage() . "\n" . $e->getTraceAsString());
            return back()
                ->with('error', 'Une erreur est survenue lors de la mise à jour. Veuillez réessayer.')
                ->withInput();
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

            return redirect()
                ->route('dashboard')
                ->with('success', 'Module supprimé avec succès.');

        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Module introuvable.');

        } catch (\Exception $e) {
            Log::error("Erreur Module Delete: ".$e->getMessage());
            return redirect()->back()->with('error', 'Impossible de supprimer ce module.');
        }
    }
}
