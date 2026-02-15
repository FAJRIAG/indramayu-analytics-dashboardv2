<?php

use App\Services\IndramayuApiService;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$service = new IndramayuApiService();
$data = $service->getDashboardSummary();
$orgs = $data['organizations'] ?? [];

if (!empty($orgs)) {
    echo "First Organization Data:\n";
    print_r($orgs[0]);
} else {
    echo "No organization data found.\n";
}
