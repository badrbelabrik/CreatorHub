<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = JobOffer::with('user')
            ->latest()
            ->get();

        return response()->json($jobs);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'budget' => 'required|numeric|min:0',
        ]);

        $jobOffer = JobOffer::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'budget' => $request->budget,
        ]);

        return response()->json([
            'message' => 'Job offer created successfully',
            'data' => $jobOffer
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(JobOffer $job)
    {
        return response()->json(
            $job->load('user')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobOffer $job)
    {
        $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|min:10',
            'budget' => 'sometimes|required|numeric|min:0',
        ]);

        $job->update($request->only([
            'title',
            'description',
            'budget'
        ]));

        return response()->json([
            'message' => 'Job updated successfully.',
            'data' => $job
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobOffer $job)
    {
        $job->delete();

        return response()->json([
            'message' => 'Job deleted successfully.'
        ]);
    }
}
