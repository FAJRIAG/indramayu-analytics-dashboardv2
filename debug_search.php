<?php

use App\Services\IndramayuApiService;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$service = new IndramayuApiService();

// 1. Fetch ALL
echo "Fetching ALL...\n";
$allData = $service->getDatasets(['limit' => 10]);
$countAll = count($allData);
echo "Count All (limit 10): $countAll\n";

// 2. Fetch with Q
$query = 'pendidikan'; // Common term
echo "Fetching with q='$query'...\n";
$searchData = $service->getDatasets(['limit' => 10, 'q' => $query]);
$countSearch = count($searchData);
echo "Count Search: $countSearch\n";

if ($countAll == $countSearch && $countAll > 0) {
    // Check if the content is actually different or same
    $firstAll = $allData[0]['id'] ?? 'A';
    $firstSearch = $searchData[0]['id'] ?? 'B';

    if ($firstAll == $firstSearch) {
        echo "RESULT: API likely IGNORES 'q' parameter.\n";
    } else {
        echo "RESULT: API content differs. Search might work.\n";
    }
} else {
    echo "RESULT: API supports 'q' parameter (counts differ).\n";
}
