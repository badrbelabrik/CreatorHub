<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobOffer;

class ApplicationController extends Controller
{
    /**
     * Display all applications for a job offer.
     */
    public function index(JobOffer $job)
    {
        if ($job->user_id !== auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized.'
            ], 403);
        }

        $applications = $job->applications()
            ->with('user')
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Applications retrieved successfully.',
            'data' => $applications
        ], 200);
    }

    /**
     * Apply to a job offer.
     */
    public function store(JobOffer $job)
    {
        if ($job->user_id === auth()->id()) {
            return response()->json([
                'message' => 'You cannot apply to your own job offer.'
            ], 403);
        }

        $exists = Application::where('user_id', auth()->id())
            ->where('job_offer_id', $job->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'You have already applied to this job.'
            ], 409);
        }

        $application = Application::create([
            'user_id' => auth()->id(),
            'job_offer_id' => $job->id,
            'status' => 'Pending',
        ]);

        return response()->json([
            'message' => 'Application submitted successfully.',
            'data' => $application
        ], 201);
    }
}
