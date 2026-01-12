<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PartenaireController extends Controller{
    public function index(){
        try {
            $moduleEae = Module::where('code', 'eae')->firstOrFail();
            
            // Pour la pagination
            $partenaires = Category::where('module_id', $moduleEae->id)
                ->where('type', 'partenaire')
                ->with('parent1')
                ->latest()
                ->paginate(10);
                
            // Pour les statistiques (tous les partenaires)
            $allPartenaires = Category::where('module_id', $moduleEae->id)
                ->where('type', 'partenaire')
                ->get();

            return view('partenaires.index', compact('partenaires', 'allPartenaires'));

        } catch (\Exception $e) {
            Log::error("Erreur Index Partenaires : " . $e->getMessage());
            return back()->with('error', 'Impossible de charger les partenaires.');
        }
    }

    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        try {
            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();
            
            // Récupérer les entreprises pour les types
            $entreprises = Category::where('module_id', $moduleEae->id)
                ->where('type', 'entreprise')
                ->where('is_active', true)
                ->get();

            // Récupérer les projets
            $projets = Category::where('module_id', $moduleEae->id)
                ->where('type', 'projet')
                ->where('is_active', true)
                ->get();

            return view('partenaires.create', compact('entreprises', 'projets'));

        } catch (\Exception $e) {
            Log::error("Erreur Create Partenaire : " . $e->getMessage());
            return back()->with('error', 'Impossible d’accéder à la page de création.');
        }
    }

    public function store(Request $request) {
        try {
            // Validation
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|in:partenaire_strategique,partenaire_financier',
                'description' => 'nullable|string|max:1000',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'website' => 'nullable|url|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'parent1_id' => 'nullable|exists:categories,id',
                'is_active' => 'boolean',
            ]);

            // Récupérer le module EAE
            $moduleEae = Module::where('code', 'eae')->firstOrFail();

            // Traitement du logo
            $logoPath = null;
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('partenaires/logos', 'public');
            }

            // Créer le partenaire
            $partenaire = new Category([
                'module_id' => $moduleEae->id,
                'type' => 'partenaire',
                'name' => $validated['name'],
                'description' => $validated['description'],
                'parent1_id' => $validated['parent1_id'],
                'meta_data' => [
                    'type' => $validated['type'],
                    'website' => $validated['website'] ?? null,
                    'email' => $validated['email'] ?? null,
                    'phone' => $validated['phone'] ?? null,
                    'address' => $validated['address'] ?? null,
                    'logo' => $logoPath,
                ],
                'is_active' => $request->has('is_active'),
            ]);

            $partenaire->save();

            return redirect()->route('partenaires.index')
                ->with('success', 'Partenaire créé avec succès.');

        } catch (\Exception $e) {
            Log::error("Erreur Store Partenaire : " . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue. Réessayez.');
        }
    }

    public function edit($id) {
        try {
            $partenaire = Category::findOrFail($id);
            
            if ($partenaire->type !== 'partenaire') {
                abort(404);
            }

            $moduleEae = Module::where('code', 'eae')->firstOrFail();
            $entreprises = Category::where('module_id', $moduleEae->id)
                ->where('type', 'entreprise')
                ->get();
            $projets = Category::where('module_id', $moduleEae->id)
                ->where('type', 'projet')
                ->get();

            return view('partenaires.edit', compact('partenaire', 'entreprises', 'projets'));

        } catch (\Exception $e) {
            Log::error("Erreur Edit Partenaire : " . $e->getMessage());
            return back()->with('error', 'Impossible d’ouvrir la page d’édition.');
        }
    }

    public function show($id){
        try {
            $partenaire = Category::with('parent1')->findOrFail($id);
            
            if ($partenaire->type !== 'partenaire') {
                abort(404);
            }

            return view('partenaires.show', compact('partenaire'));

        } catch (\Exception $e) {
            Log::error("Erreur Show Partenaire : " . $e->getMessage());
            return back()->with('error', 'Impossible d\'afficher les détails du partenaire.');
        }
    }

    public function destroy($id) {
        try {
            $partenaire = Category::findOrFail($id);

            if ($partenaire->type !== 'partenaire') {
                abort(404);
            }

            // Supprimer le logo si existant
            if (isset($partenaire->meta_data['logo'])) {
                Storage::disk('public')->delete($partenaire->meta_data['logo']);
            }

            $partenaire->delete();

            return redirect()->route('partenaires.index')
                ->with('success', 'Partenaire supprimé avec succès.');

        } catch (\Exception $e) {
            Log::error("Erreur Delete Partenaire : " . $e->getMessage());
            return back()->with('error', 'Impossible de supprimer ce partenaire.');
        }
    }

    public function update(Request $request, $id) {
        try {
            $partenaire = Category::findOrFail($id);

            if ($partenaire->type !== 'partenaire') {
                abort(404);
            }

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'type' => 'required|string|in:entreprise_incube,entreprise_alumni,partenaire_strategique,partenaire_financier',
                'description' => 'nullable|string|max:1000',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'website' => 'nullable|url|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string|max:500',
                'parent1_id' => 'nullable|exists:categories,id',
                'is_active' => 'boolean',
                'remove_logo' => 'boolean',
            ]);

            // Récupérer les métadonnées actuelles
            $metaData = $partenaire->meta_data ?? [];

            // Gestion du logo
            if ($request->hasFile('logo')) {
                // Supprimer l'ancien logo si existant
                if (isset($metaData['logo'])) {
                    Storage::disk('public')->delete($metaData['logo']);
                }
                // Stocker le nouveau logo
                $metaData['logo'] = $request->file('logo')->store('partenaires/logos', 'public');
            } elseif ($request->has('remove_logo') && $request->remove_logo == '1') {
                // Supprimer le logo si demandé
                if (isset($metaData['logo'])) {
                    Storage::disk('public')->delete($metaData['logo']);
                    unset($metaData['logo']); // Retirer la référence du logo
                }
            }

            // Mettre à jour les autres métadonnées
            $metaData['type'] = $validated['type'];
            $metaData['website'] = $validated['website'] ?? null;
            $metaData['email'] = $validated['email'] ?? null;
            $metaData['phone'] = $validated['phone'] ?? null;
            $metaData['address'] = $validated['address'] ?? null;

            // Mettre à jour le partenaire
            $partenaire->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'parent1_id' => $validated['parent1_id'],
                'meta_data' => $metaData,
                'is_active' => $request->has('is_active'),
            ]);

            return redirect()->route('partenaires.index')
                ->with('success', 'Partenaire mis à jour avec succès.');

        } catch (\Exception $e) {
            Log::error("Erreur Update Partenaire : " . $e->getMessage());
            return back()->with('error', 'Erreur lors de la mise à jour.')->withInput();
        }
    }
}