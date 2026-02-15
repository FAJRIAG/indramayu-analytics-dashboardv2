<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Support\Facades\Http;

$baseUrl = 'https://opendata.indramayukab.go.id/api';

function fetchData($endpoint)
{
    global $baseUrl;
    try {
        $response = Http::withUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36')
            ->timeout(10)
            ->withoutVerifying()
            ->get($baseUrl . $endpoint);

        if ($response->successful()) {
            return $response->json();
        }
        return "Failed: " . $response->status();
    } catch (\Exception $e) {
        return "Exception: " . $e->getMessage();
    }
}

// Bootstrap
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$endpoints = [
    '/dashboard/datasets/top',
    '/dashboard/datasets/organisasi'
];

foreach ($endpoints as $endpoint) {
    echo "Endpoint: $endpoint\n";
    $data = fetchData($endpoint);
    print_r($data);
    echo "\n-------------------\n";
}
