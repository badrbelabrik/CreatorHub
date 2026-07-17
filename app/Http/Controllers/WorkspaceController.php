<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function index()
    {
        return response()->json(Workspace::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

     $workspace = Workspace::create([
    'title' => $request->title,
    'description' => $request->description,
    'owner_id' => 1,
]);

$workspace->members()->attach($workspace->owner_id);

return response()->json([
    'message' => 'Workspace created successfully.',
    'workspace' => $workspace
], 201);
    }

    public function show(Workspace $workspace)
    {
        return response()->json($workspace);
    }

    public function update(Request $request, Workspace $workspace)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $workspace->update($request->only('title', 'description'));

        return response()->json([
            'message' => 'Workspace updated successfully.',
            'workspace' => $workspace
        ]);
    }

    public function destroy(Workspace $workspace)
    {
        $workspace->delete();

        return response()->json([
            'message' => 'Workspace deleted successfully.'
        ]);
    }
    public function invite(Request $request, Workspace $workspace)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
    ]);

    if ($workspace->members()->where('user_id', $request->user_id)->exists()) {
        return response()->json([
            'message' => 'User is already a member of this workspace.'
        ], 409);
    }

    $workspace->members()->attach($request->user_id);

    return response()->json([
        'message' => 'User invited successfully.'
    ], 200);
}
}