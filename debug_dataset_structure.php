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
        return "Failed: " . $response->status();
    } catch (\Exception $e) {
        return "Exception: " . $e->getMessage();
    }
}

// Bootstrap
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Fetching one dataset from /datasets...\n";
$data = fetchData('/datasets');

if (isset($data['data']) && count($data['data']) > 0) {
    print_r($data['data'][0]);
} else {
    echo "No data found or unexpected structure.\n";
    print_r($data);
}
