<?php

require __DIR__ . '/vendor/autoload.php';

use Illuminate\Support\Facades\Http;

$baseUrl = 'https://opendata.indramayukab.go.id/api';

function fetchData($endpoint, $params = [])
{
    global $baseUrl;
    try {
        $response = Http::withUserAgent('Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36')
            ->timeout(10)
            ->withoutVerifying()
            ->get($baseUrl . $endpoint, $params);

        if ($response->successful()) {
            return $response->json();
        }
    } catch (\Exception $e) {
    }
    return null;
}

// Bootstrap
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$data = fetchData('/datasets');
if (isset($data['data'][0])) {
    print_r(array_keys($data['data'][0]));

    // Also print values for potential name fields
    $item = $data['data'][0];
    echo "\nValues for potential name fields:\n";
    echo "nama_data: " . ($item['nama_data'] ?? 'NULL') . "\n";
    echo "title: " . ($item['title'] ?? 'NULL') . "\n";
    echo "name: " . ($item['name'] ?? 'NULL') . "\n";

    // And view counts
    echo "count_view: " . ($item['count_view'] ?? 'NULL') . "\n";
    echo "views: " . ($item['views'] ?? 'NULL') . "\n";
}
