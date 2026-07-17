<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return response()->json(Task::all());
    }

    public function store(Request $request){
                 $request->validate([

                  'workspace_id'=> 'required|exists:workspaces,id',
                  'assigned_to'=> 'required|exists:users,id',
                  'title' => 'required|max:255',
                  'description' => 'nullable',
                  'status' => 'required|string',

                 ]);
                 $task = Task::create([
                   'workspace_id' => $request->workspace_id,
                  'assigned_to' => $request->assigned_to,
                  'title' => $request->title,
                  'description' => $request->description,
                  'status' => $request->status, 
                 ]);
                     return response()->json([
            'message' => 'Task created successfully.',
            'task' => $task
        ], 201);
    }
     public function show(Task $task)
    {
        return response()->json($task);
    }

    public function update(Request $request, Task $task)
{
    $request->validate([
        'workspace_id' => 'required|exists:workspaces,id',
        'assigned_to' => 'required|exists:users,id',
        'title' => 'required|max:255',
        'description' => 'nullable',
        'status' => 'required|string',
    ]);

    $task->update([
        'workspace_id' => $request->workspace_id,
        'assigned_to' => $request->assigned_to,
        'title' => $request->title,
        'description' => $request->description,
        'status' => $request->status,
    ]);

    return response()->json([
        'message' => 'Task updated successfully.',
        'task' => $task
    ]);
}

   
   public function destroy(Task $task)
{
    $task->delete();
  
    return response()->json([
        'message' => 'Task deleted successfully.'
    ]);
}
}
