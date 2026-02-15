<?php

namespace App\Http\Controllers;

use App\Services\IndramayuApiService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DatasetController extends Controller
{
    protected IndramayuApiService $apiService;
    protected \App\Services\BiAnalysisService $biService;

    public function __construct(IndramayuApiService $apiService, \App\Services\BiAnalysisService $biService)
    {
        $this->apiService = $apiService;
        $this->biService = $biService;
    }

    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $perPage = 1000; // Show all datasets as requested

        // Pass query params to API
        $params = [
            'page' => $page,
            'limit' => 1000, // Fetch all from API
            'q' => $request->query('q'),
        ];

        $response = $this->apiService->getDatasets($params);

        // Service now returns the data array directly
        $datasets = $response;

        // Implement Search Filter (since API seems to ignore 'q')
        if ($request->has('q') && !empty($request->query('q'))) {
            $query = strtolower($request->query('q'));
            $datasets = array_filter($datasets, function ($item) use ($query) {
                // Check name
                if (str_contains(strtolower($item['name'] ?? ''), $query))
                    return true;
                if (str_contains(strtolower($item['nama_data'] ?? ''), $query))
                    return true;

                // Check organization
                if (str_contains(strtolower($item['organisasi_name'] ?? ''), $query))
                    return true;
                if (str_contains(strtolower($item['nama_skpd'] ?? ''), $query))
                    return true;

                // Check topic
                if (str_contains(strtolower($item['topik_name'] ?? ''), $query))
                    return true;
                if (str_contains(strtolower($item['nama_topik'] ?? ''), $query))
                    return true;

                return false;
            });
        }

        $total = count($datasets);

        // Manual pagination logic
        $offset = ($page - 1) * $perPage;
        $items = array_slice($datasets, $offset, $perPage);

        $paginator = new LengthAwarePaginator(
            $items,
            $total,
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );

        return view('datasets.index', compact('paginator'));
    }

    public function show(string $id)
    {
        $dataset = $this->apiService->getDataset($id);

        if (!$dataset) {
            abort(404, 'Dataset not found');
        }

        // Generate Smart Analysis (Tugas Diskusi 2)
        $analysis = $this->biService->generateAnalysis($dataset);

        return view('datasets.show', compact('dataset', 'analysis'));
    }
}
