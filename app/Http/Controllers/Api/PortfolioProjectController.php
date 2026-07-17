<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;

class PortfolioProjectController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validation
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'media_type' => 'required|in:image,video',
            'media_url' => 'required|url',
            'tags' => 'required|array|min:1',
            'tags.*' => 'required|integer|exists:tags,id',
        ]);



        // 2. Création du projet
        $project = PortfolioProject::create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'media_type' => $validated['media_type'],
            'media_url' => $validated['media_url'],
        ]);


//         // 3. Ajout des tags dans la table pivot
//         $project->tags()->sync($validated['tags']);



//         // 4. Charger les relations
//         $project->load([
//             'user.profile',
//             'tags',
//         ]);


//         return response()->json([
//             'success' => true,
//             'message' => 'Projet publié avec succès',
//             'project' => $project,
//         ], 201);
 }
}
