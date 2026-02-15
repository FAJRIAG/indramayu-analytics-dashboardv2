<?php

namespace App\Http\Controllers;

use App\Services\IndramayuApiService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected IndramayuApiService $apiService;

    public function __construct(IndramayuApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $data = $this->apiService->getDashboardSummary();
        return view('dashboard.index', compact('data'));
    }
}
