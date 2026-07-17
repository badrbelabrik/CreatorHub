<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        return response()->json(Delivery::all());
    }
public function store(Request $request)
{
    $request->validate([
        'task_id' => 'required|exists:tasks,id',
        'link' => 'required|url',
    ]);

    $task = Task::findOrFail($request->task_id);

    if ($task->status !== 'En révision') {
        return response()->json([
            'message' => 'Task must be in "En révision" before adding a delivery.'
        ], 400);
    }

    $delivery = Delivery::create([
        'task_id' => $request->task_id,
        'link' => $request->link,
    ]);

    return response()->json([
        'message' => 'Delivery created successfully.',
        'delivery' => $delivery
    ], 201);
}

    public function show(Delivery $delivery)
    {
        return response()->json($delivery);
    }

    public function update(Request $request, Delivery $delivery)
    {
        $request->validate([
            'link' => 'required|url',
        ]);

        $delivery->update([
            'link' => $request->link,
        ]);

        return response()->json([
            'message' => 'Delivery updated successfully.',
            'delivery' => $delivery
        ]);
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();

        return response()->json([
            'message' => 'Delivery deleted successfully.'
        ]);
    }
}
