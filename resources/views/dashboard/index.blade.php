@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Datasets -->
            <div
                class="bg-white rounded-xl shadow-md border-0 border-b-4 border-blue-500 p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider">Total Datasets</h3>
                    <span class="p-2 bg-blue-50 text-blue-600 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                            </path>
                        </svg>
                    </span>
                </div>
                <p class="text-3xl font-extrabold text-slate-800">{{ number_format($data['total_datasets'] ?? 0) }}</p>
            </div>

            <!-- Total Visitors -->
            <div
                class="bg-white rounded-xl shadow-md border-0 border-b-4 border-emerald-500 p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider">Total Visitors</h3>
                    <span class="p-2 bg-emerald-50 text-emerald-600 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </span>
                </div>
                <p class="text-3xl font-extrabold text-slate-800">
                    {{ number_format($data['visitor_stats']['total_visitor'] ?? 0) }}
                </p>
            </div>

            <!-- Top Category -->
            <div
                class="bg-white rounded-xl shadow-md border-0 border-b-4 border-purple-500 p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider">Top Category</h3>
                    <span class="p-2 bg-purple-50 text-purple-600 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                            </path>
                        </svg>
                    </span>
                </div>
                <p class="text-xl font-bold text-slate-800 truncate"
                    title="{{ $data['categories'][0]['nama_topik'] ?? 'N/A' }}">
                    {{ $data['categories'][0]['nama_topik'] ?? 'N/A' }}
                </p>
                <p class="text-sm text-slate-500 mt-1">{{ $data['categories'][0]['jumlah'] ?? 0 }} datasets</p>
            </div>

            <!-- Organizations -->
            <!-- Organizations -->
            <div
                class="bg-white rounded-xl shadow-md border-0 border-b-4 border-amber-500 p-6 hover:-translate-y-1 hover:shadow-lg transition duration-300">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-sm font-bold text-slate-500 uppercase tracking-wider">Organizations</h3>
                    <span class="p-2 bg-amber-50 text-amber-600 rounded-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </span>
                </div>
                <p class="text-3xl font-extrabold text-slate-800">{{ count($data['organizations'] ?? []) }}</p>
            </div>
        </div>

        <!-- Charts Section -->
        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Popular Datasets -->
            <div
                class="lg:col-span-2 bg-white rounded-xl shadow-md border-0 border-l-4 border-l-blue-500 overflow-hidden flex flex-col min-h-[300px]">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-slate-800">Popular Datasets</h3>
                    <a href="{{ route('datasets.index') }}"
                        class="text-sm text-blue-600 hover:text-blue-800 font-medium transition">View All &rarr;</a>
                </div>
                <div
                    class="overflow-x-auto flex-grow max-h-[500px] overflow-y-auto scrollbar-thin scrollbar-thumb-slate-200 scrollbar-track-slate-50">
                    <table class="w-full text-sm text-left relative">
                        <thead
                            class="text-xs text-slate-500 uppercase bg-slate-50 font-bold border-b border-slate-100 sticky top-0 z-10 shadow-sm">
                            <tr>
                                <th class="px-6 py-3 rounded-tl-lg bg-slate-50">Dataset Name</th>
                                <th class="px-6 py-3 text-right rounded-tr-lg bg-slate-50">Views</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            @foreach($data['top_datasets'] ?? [] as $dataset)
                                <tr class="hover:bg-blue-50/50 transition-colors group cursor-default">
                                    <td
                                        class="px-6 py-4 font-medium text-slate-700 group-hover:text-blue-700 transition-colors">
                                        {{ $dataset['nama_data'] ?? 'Unknown' }}
                                    </td>
                                    <td class="px-6 py-4 text-right font-semibold text-slate-600">
                                        <span
                                            class="bg-slate-100 text-slate-600 py-1 px-3 rounded-full text-xs group-hover:bg-blue-100 group-hover:text-blue-700 transition-colors">
                                            {{ number_format($dataset['count_view'] ?? 0) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Categories Chart -->
            <div
                class="bg-white rounded-xl shadow-md border-0 border-t-4 border-t-purple-500 p-6 flex flex-col min-h-[300px]">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Categories</h3>
                <div class="flex-grow relative">
                    <canvas id="categoriesChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Trends and Orgs Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Trends Chart -->
            <div
                class="bg-white rounded-xl shadow-md border-0 border-t-4 border-t-emerald-500 p-6 flex flex-col min-h-[350px]">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Dataset Growth (Monthly)</h3>
                <div class="flex-grow relative">
                    <canvas id="trendsChart"></canvas>
                </div>
            </div>

            <!-- Organizations Chart -->
            <div
                class="bg-white rounded-xl shadow-md border-0 border-t-4 border-t-amber-500 p-6 flex flex-col min-h-[350px]">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Top Organizations</h3>
                <div class="flex-grow relative">
                    <canvas id="orgsChart"></canvas>
                </div>
            </div>
        </div>

        <script type="module">
            document.addEventListener('DOMContentLoaded', function () {
                // Common Options
                const commonOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            labels: {
                                font: { family: "'Inter', sans-serif", size: 12 },
                                color: '#64748b'
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(15, 23, 42, 0.9)',
                            titleFont: { family: "'Inter', sans-serif", size: 13 },
                            bodyFont: { family: "'Inter', sans-serif", size: 12 },
                            padding: 10,
                            cornerRadius: 8,
                            displayColors: false
                        }
                    },
                    scales: {
                        x: {
                            grid: { display: false },
                            ticks: { font: { family: "'Inter', sans-serif" }, color: '#94a3b8' }
                        },
                        y: {
                            grid: { color: '#f1f5f9', borderDash: [2, 4] },
                            ticks: { font: { family: "'Inter', sans-serif" }, color: '#94a3b8', beginAtZero: true },
                            border: { display: false }
                        }
                    }
                };

                // Categories Chart
                const ctxCat = document.getElementById('categoriesChart').getContext('2d');
                const categories = @json(array_slice($data['categories'] ?? [], 0, 5));
                console.log('Categories Data:', categories);

                if (categories.length === 0) {
                    const parent = ctxCat.canvas.parentNode;
                    parent.innerHTML = '<div class="flex items-center justify-center h-full text-slate-400 font-medium">No category data available</div>';
                } else if (typeof window.Chart !== 'undefined') {
                    new window.Chart(ctxCat, {
                        type: 'doughnut',
                        data: {
                            labels: categories.map(item => item.nama_topik),
                            datasets: [{
                                data: categories.map(item => item.jumlah),
                                backgroundColor: ['#3b82f6', '#8b5cf6', '#ec4899', '#f59e0b', '#10b981'],
                                borderWidth: 0,
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            ...commonOptions,
                            cutout: '70%',
                            plugins: {
                                ...commonOptions.plugins,
                                legend: { position: 'right', labels: { usePointStyle: true, boxWidth: 8 } }
                            },
                            scales: { x: { display: false }, y: { display: false } }
                        }
                    });
                }

                // Trends Chart
                const ctxTrend = document.getElementById('trendsChart').getContext('2d');
                const trends = @json($data['trends'] ?? []);

                if (!trends || trends.length === 0) {
                    const parent = ctxTrend.canvas.parentNode;
                    parent.innerHTML = '<div class="flex items-center justify-center h-full text-slate-400 font-medium">No trend data available</div>';
                } else if (typeof window.Chart !== 'undefined') {
                    const trendLabels = trends.map(t => `${t.bulan}` || 'N/A');
                    const trendData = trends.map(t => t.jumlah || t.count || 0);

                    new window.Chart(ctxTrend, {
                        type: 'line',
                        data: {
                            labels: trendLabels,
                            datasets: [{
                                label: 'New Datasets',
                                data: trendData,
                                borderColor: '#10b981', // Emerald 500
                                backgroundColor: (context) => {
                                    const ctx = context.chart.ctx;
                                    const gradient = ctx.createLinearGradient(0, 0, 0, 300);
                                    gradient.addColorStop(0, 'rgba(16, 185, 129, 0.2)');
                                    gradient.addColorStop(1, 'rgba(16, 185, 129, 0)');
                                    return gradient;
                                },
                                fill: true,
                                tension: 0.4,
                                pointBackgroundColor: '#fff',
                                pointBorderColor: '#10b981',
                                pointBorderWidth: 2,
                                pointRadius: 4,
                                pointHoverRadius: 6
                            }]
                        },
                        options: commonOptions
                    });
                }

                // Organizations Chart
                const ctxOrg = document.getElementById('orgsChart').getContext('2d');
                const orgs = @json(array_slice($data['organizations'] ?? [], 0, 10)); // Top 10

                if (orgs.length === 0) {
                    const parent = ctxOrg.canvas.parentNode;
                    parent.innerHTML = '<div class="flex items-center justify-center h-full text-slate-400 font-medium">No organization data available</div>';
                } else if (typeof window.Chart !== 'undefined') {
                    orgs.sort((a, b) => (b.count_dataset_public || 0) - (a.count_dataset_public || 0));

                    new window.Chart(ctxOrg, {
                        type: 'bar',
                        data: {
                            labels: orgs.map(o => o.name || o.nama_skpd || 'Org'),
                            datasets: [{
                                label: 'Datasets',
                                data: orgs.map(o => o.count_dataset_public || 0),
                                backgroundColor: '#f59e0b', // Amber 500
                                borderRadius: 4,
                                barThickness: 20
                            }]
                        },
                        options: {
                            ...commonOptions,
                            indexAxis: 'y',
                            scales: {
                                x: { ...commonOptions.scales.y }, // Swap X/Y configs for horizontal bar
                                y: { ...commonOptions.scales.x, grid: { display: false } }
                            }
                        }
                    });
                }
            });
        </script>
    </div>
@endsection