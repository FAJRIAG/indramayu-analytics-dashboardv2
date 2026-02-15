<?php

namespace App\Http\Controllers;

use App\Services\IndramayuApiService;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected IndramayuApiService $apiService;

    public function __construct(IndramayuApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        // We can reuse the dashboard summary which contains organizations data
        // Ideally, we'd have a specific endpoint, but for now this works efficiently
        $dashboardData = $this->apiService->getDashboardSummary();
        $organizations = $dashboardData['organizations'] ?? [];

        return view('organizations.index', compact('organizations'));
    }
}
