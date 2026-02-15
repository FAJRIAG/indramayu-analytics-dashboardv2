<?php

$data = [
    ['name' => 'A', 'count_dataset_all' => 0],
    ['name' => 'B', 'count_dataset_all' => 5],
    ['name' => 'C', 'count_dataset_all' => 2],
    ['name' => 'D', 'count_dataset_all' => 10],
];

usort($data, fn($a, $b) => ($b['count_dataset_all'] ?? 0) <=> ($a['count_dataset_all'] ?? 0));

print_r($data);
