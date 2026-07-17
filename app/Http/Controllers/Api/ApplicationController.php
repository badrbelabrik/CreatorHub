<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\JobOffer;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JobOffer $job)
    {
        $applications = $job->applications()
            ->with('user')
            ->get();

        return response()->json($applications);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobOffer $job)
    {
        $exists = Application::where('user_id', auth()->id())
            ->where('job_offer_id', $job->id)
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'You have already applied.'
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
