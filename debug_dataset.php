<?php

use App\Services\IndramayuApiService;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$service = new IndramayuApiService();
$data = $service->getDatasets(['limit' => 1]);

if (!empty($data)) {
    echo "First Dataset Item Keys:\n";
    print_r(array_keys($data[0]));
    echo "\nSample Data:\n";
    print_r($data[0]);
} else {
    echo "No datasets found.\n";
}
