<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class IndramayuApiService
{
    protected string $baseUrl = 'https://opendata.indramayukab.go.id/api';

    /**
     * Get dashboard summary data.
     * Caches the result for 10 minutes to reduce API load.
     */
    public function getDashboardSummary(): array
    {
        return Cache::remember('dashboard_summary_v6', 600, function () {
            // Total Datasets
            $totalData = $this->fetchData('/dashboard/datasets/total');
            $totalDatasets = data_get($totalData, 'data.count_total', 0);

            // Categories (Using Topics as Categories because they have data)
            $topicData = data_get($this->fetchData('/dashboard/datasets/topik'), 'data', []);
            $categories = array_map(fn($item) => [
                'nama_topik' => $item['name'] ?? 'Unknown',
                'jumlah' => $item['count_dataset_public'] ?? 0
            ], $topicData);

            // Sort categories by count desc
            usort($categories, fn($a, $b) => $b['jumlah'] <=> $a['jumlah']);

            // Trends
            $trendsData = data_get($this->fetchData('/dashboard/datasets/tren_total/bulanan'), 'data', []);
            $trends = array_map(function ($item) {
                // Parse date "2025-11-01T..."
                $timestamp = strtotime($item['date'] ?? 'now');
                return [
                    'tahun' => date('Y', $timestamp),
                    'bulan' => date('M', $timestamp), // Return Month name directly for chart
                    'jumlah' => $item['count'] ?? 0
                ];
            }, $trendsData);

            // Organizations
            $orgData = data_get($this->fetchData('/dashboard/datasets/organisasi'), 'data', []);
            usort($orgData, fn($a, $b) => ($b['count_dataset_all'] ?? 0) <=> ($a['count_dataset_all'] ?? 0));

            // Top Datasets (Popular) - Fetch regular datasets sorted by view
            $rawTopData = data_get($this->fetchData('/datasets', ['sort' => 'count_view_opendata', 'direction' => 'desc', 'limit' => 5]), 'data', []);
            $topData = array_map(fn($item) => [
                'id' => $item['id'] ?? 0,
                'nama_data' => $item['name'] ?? 'Unknown Title',
                'count_view' => $item['count_view_opendata'] ?? 0,
            ], $rawTopData);

            return [
                'total_datasets' => $totalDatasets,
                'top_datasets' => $topData,
                'categories' => $categories,
                'organizations' => $orgData,
                'trends' => $trends,
                'visitor_stats' => $this->fetchVisitorStats(),
            ];
        });
    }

    protected function fetchVisitorStats()
    {
        $data = data_get($this->fetchData('/public-statistic/visitor'), 'data', []);
        $total = 0;
        foreach ($data as $year) {
            $total += $year['total_visitor'] ?? 0;
        }
        return ['total_visitor' => $total];
    }

    /**
     * Get list of datasets.
     */
    public function getDatasets(array $params = []): array
    {
        // Cache based on params serialization
        $cacheKey = 'datasets_' . md5(json_encode($params));

        return Cache::remember($cacheKey, 300, function () use ($params) {
            $response = $this->fetchData('/datasets', $params);
            return data_get($response, 'data', []);
        });
    }

    /**
     * Get a specific dataset by ID/Slug.
     */
    public function getDataset(string $id): ?array
    {
        return Cache::remember("dataset_{$id}", 600, function () use ($id) {
            $response = $this->fetchData("/datasets/{$id}");
            return data_get($response, 'data');
        });
    }

    /**
     * Fetch data from a specific endpoint.
     */
    protected function fetchData(string $endpoint, array $params = [])
    {
        try {
            $response = Http::withUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36')
                ->timeout(10)
                ->withoutVerifying()
                ->get($this->baseUrl . $endpoint, $params);

            if ($response->successful()) {
                return $response->json();
            }

            return null; // Or handle error appropriately
        } catch (\Exception $e) {
            // Log error
            return null;
        }
    }
}
