<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Récupérer tous les albums.
     */
    public function index()
    {
        $albums = Album::all();
        return response()->json($albums, 200); // Retourner en JSON
    }

    /**
     * Créer un nouvel album.
     */
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string',
        ]);

        $album = Album::create($validated);
        return response()->json($album, 201); // Code 201 pour la création
    }

    /**
     * Afficher un album spécifique.
     */
    public function show($id){
        $album = Album::find($id);

        if (!$album) {
            return response()->json(['error' => 'Album non trouvé'], 404);
        }

        return response()->json($album, 200);
    }

    /**
     * Mettre à jour un album existant.
     */
    public function update(Request $request, $id){
        $album = Album::find($id);

        if (!$album) {
            return response()->json(['error' => 'Album non trouvé'], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255', // 'sometimes' permet de ne valider que si la clé existe
            'description' => 'sometimes|string',
            'image' => 'sometimes|string',
        ]);

        $album->update($validated);

        return response()->json($album, 200);
    }

    /**
     * Supprimer un album.
     */
    public function destroy($id){
        $album = Album::find($id);

        if (!$album) {
            return response()->json(['error' => 'Album non trouvé'], 404);
        }

        $album->delete();

        return response()->json(['message' => 'Album supprimé avec succès'], 200);
    }
    
}
