<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    // Afficher tous les workspaces
    public function index()
    {
        $workspaces = Workspace::all();

        return view('workspaces.index', compact('workspaces'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('workspaces.create');
    }

    // Enregistrer un workspace
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Workspace::create([
            'title' => $request->title,
            'description' => $request->description,
            'owner_id' => 1, 
        ]);

        return redirect()->route('workspaces.index')
                         ->with('success', 'Workspace created successfully.');
    }
    public function show(Workspace $workspace){
               return view('workspaces.show' , compact('workspace'));
    }
}