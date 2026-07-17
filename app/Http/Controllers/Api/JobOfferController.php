<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class JobOfferController extends Controller
{
    /**
     * Display all job offers.
     */
    public function index()
    {
        $jobs = JobOffer::with('user')
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Job offers retrieved successfully.',
            'data' => $jobs
        ], 200);
    }

    /**
     * Store a newly created job offer.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'budget' => 'required|numeric|min:0',
        ]);

        $validated['user_id'] = auth()->id();

        $jobOffer = JobOffer::create($validated);

        return response()->json([
            'message' => 'Job offer created successfully.',
            'data' => $jobOffer
        ], 201);
    }

    /**
     * Display the specified job offer.
     */
    public function show(JobOffer $job)
    {
        return response()->json([
            'message' => 'Job offer retrieved successfully.',
            'data' => $job->load('user', 'applications')
        ], 200);
    }

    /**
     * Update the specified job offer.
     */
    public function update(Request $request, JobOffer $job)
    {
        if ($job->user_id !== auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized.'
            ], 403);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|min:10',
            'budget' => 'sometimes|required|numeric|min:0',
        ]);

        $job->update($validated);

        return response()->json([
            'message' => 'Job offer updated successfully.',
            'data' => $job
        ], 200);
    }

    /**
     * Remove the specified job offer.
     */
    public function destroy(JobOffer $job)
    {
        if ($job->user_id !== auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized.'
            ], 403);
        }

        $job->delete();

        return response()->json([
            'message' => 'Job offer deleted successfully.'
        ], 200);
    }
}
