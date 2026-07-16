<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WorkspaceController extends Controller
{
    public function index(){
        $workspace = Workspace::where('owner_id',Auth::id())->get();
        return view('workspace.index',compact('workspace'));
    }

    public function create(){
        return view ('workspace.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable'
        ]);

        Workspace::create([
            'title' => $request->title,
            'description' => $request->description,
            'owner_id' => Auth::id(),
        ]);

        return redirect()->route('workspaces.index')
                         ->with('success', 'Workspace created successfully.');
    }
}

