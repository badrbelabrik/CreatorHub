<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;

class FeedController extends Controller
{
    public function index()
    {
        $projects = PortfolioProject::with('user.profile')
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Feed récupéré avec succès',
            'projects' => $projects,
        ], 200);
    }
}
