<?php

use App\Services\IndramayuApiService;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$service = new IndramayuApiService();
$data = $service->getDatasets(['limit' => 1]);

if (!empty($data)) {
    echo "Keys:\n";
    print_r(array_keys($data[0]));

    echo "\nSample Values:\n";
    echo "Name: " . ($data[0]['name'] ?? 'N/A') . "\n";
    echo "Org Name: " . ($data[0]['organisasi_name'] ?? 'N/A') . "\n";
    echo "Topik Name: " . ($data[0]['topik_name'] ?? 'N/A') . "\n";
    echo "Nama SKPD: " . ($data[0]['nama_skpd'] ?? 'N/A') . "\n";
}
