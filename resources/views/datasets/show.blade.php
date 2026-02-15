@extends('layouts.app')

@section('title', ($dataset['name'] ?? $dataset['nama_data'] ?? 'Dataset') . ' - Indramayu Open Data')

@section('content')
    <div class="bg-slate-50 min-h-screen pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-4">
                    <li>
                        <div>
                            <a href="{{ route('datasets.index') }}" class="text-slate-400 hover:text-slate-500">
                                <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <span class="sr-only">Home</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-slate-300" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                            </svg>
                            <a href="{{ route('datasets.index') }}"
                                class="ml-4 text-sm font-medium text-slate-500 hover:text-slate-700">Datasets</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-slate-300" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                            </svg>
                            <span
                                class="ml-4 text-sm font-medium text-slate-500 truncate max-w-xs">{{ $dataset['name'] ?? $dataset['nama_data'] ?? 'Detail' }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
            <!-- Header Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden relative">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
                <div class="p-8 md:p-10">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-3 mb-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-blue-50 text-blue-700 uppercase tracking-wide">
                                    {{ $dataset['topik_name'] ?? $dataset['nama_topik'] ?? 'Topik Umum' }}
                                </span>
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100 uppercase tracking-wide">
                                    {{ $dataset['status_dataset'] ?? 'Active' }}
                                </span>
                            </div>

                            <h1
                                class="text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight mb-6">
                                {{ $dataset['name'] ?? $dataset['nama_data'] ?? 'Untitled Dataset' }}
                            </h1>

                            <div class="flex items-center gap-4 text-slate-600">
                                <div
                                    class="flex items-center gap-2 bg-slate-50 px-3 py-2 rounded-lg border border-slate-100">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                    <span
                                        class="font-semibold text-sm">{{ $dataset['organisasi_name'] ?? $dataset['nama_skpd'] ?? 'Pemerintah Kab. Indramayu' }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-slate-500 text-sm">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Updated {{ \Carbon\Carbon::now()->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <div class="flex-shrink-0">
                            <a href="https://opendata.indramayukab.go.id/api/datasets/{{ $dataset['id'] }}" target="_blank"
                                class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Download JSON
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Smart BI Analysis Section -->
            <div class="bg-white rounded-2xl shadow-lg border border-indigo-100 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-600 to-purple-700 px-8 py-6 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="p-2 bg-white/30 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white tracking-tight">Smart BI Analysis</h2>
                            <p class="text-indigo-50 text-sm font-medium">Generated Insights for Smart City Strategic
                                Planning</p>
                        </div>
                    </div>
                    <span
                        class="hidden md:inline-flex items-center px-3 py-1 rounded-full bg-white/10 text-white text-xs font-medium border border-white/20">
                        Pertemuan 3 - Diskusi 2
                    </span>
                </div>

                <div class="p-8 relative">
                    <!-- Decoratigve BG -->


                    <div class="mb-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-slate-800 text-lg font-bold flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                    </path>
                                </svg>
                                Metodologi Pengerjaan (CRISP-DM Cycle)
                            </h3>
                            <div class="hidden md:flex items-center gap-2 text-slate-600 text-xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Siklus Data Science Standar</span>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-6 gap-3">
                            @foreach($analysis['methodology'] as $index => $step)
                                <div
                                    class="relative bg-indigo-800/90 border-2 border-indigo-600 rounded-xl p-5 hover:bg-indigo-700 hover:border-indigo-500 transition-all duration-300 cursor-default group min-h-[90px] flex items-center justify-center shadow-lg">
                                    <!-- Step Number Badge -->
                                    <div
                                        class="absolute -top-2 -left-2 w-7 h-7 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-full flex items-center justify-center shadow-lg">
                                        <span class="text-white text-xs font-extrabold">{{ $index + 1 }}</span>
                                    </div>

                                    <!-- Step Title -->
                                    <div class="text-white text-sm font-bold leading-tight text-center w-full">
                                        {{ substr($step['step'], strpos($step['step'], '.') + 2) }}
                                    </div>

                                    <!-- Progress Arrow (except last item) -->
                                    @if($index < 5)
                                        <div
                                            class="hidden md:block absolute -right-4 top-1/2 transform -translate-y-1/2 text-white/40 z-10">
                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Tooltip on Hover -->
                                    <div
                                        class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-3 w-64 bg-slate-900 text-white text-xs p-3 rounded-lg shadow-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-200 pointer-events-none z-30 border border-slate-700">
                                        <div class="font-semibold text-indigo-300 mb-1">{{ $step['step'] }}</div>
                                        <div class="text-slate-300 leading-relaxed">{{ $step['desc'] }}</div>
                                        <!-- Tooltip Arrow -->
                                        <div class="absolute top-full left-1/2 transform -translate-x-1/2 -mt-px">
                                            <div class="border-8 border-transparent border-t-slate-900"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Legend -->
                        <div class="mt-4 flex items-center justify-center gap-6 text-xs text-indigo-200">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-white/20 border-2 border-white/40 rounded"></div>
                                <span>Hover untuk detail metodologi</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-8 relative z-10">
                        <!-- 1. Machine Learning -->
                        <div
                            class="flex flex-col h-full bg-slate-50 rounded-xl border border-indigo-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                            <div class="bg-white p-5 border-b border-indigo-50 flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-slate-800 text-lg">Potensi Machine Learning</h3>
                            </div>
                            <div class="p-6 flex-1 flex flex-col gap-4">
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Model
                                        Rekomendasi</p>
                                    <div class="text-blue-700 font-bold text-lg leading-tight">
                                        {{ $analysis['machine_learning']['model'] }}
                                    </div>
                                </div>
                                <div class="bg-blue-50/50 p-4 rounded-lg border border-blue-100 flex-1">
                                    <p class="text-slate-700 text-sm leading-relaxed italic">
                                        "{{ $analysis['machine_learning']['explanation'] }}"
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Contoh
                                        Penerapan</p>
                                    <p class="text-slate-600 text-sm font-medium">
                                        {{ $analysis['machine_learning']['example'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Dashboard Design -->
                        <div
                            class="flex flex-col h-full bg-slate-50 rounded-xl border border-purple-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                            <div class="bg-white p-5 border-b border-purple-50 flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-slate-800 text-lg">Rancangan Dashboard</h3>
                            </div>
                            <div class="p-6 flex-1 flex flex-col gap-4">
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Key
                                        Performance Indicator</p>
                                    <p class="text-purple-700 font-bold text-md border-l-4 border-purple-400 pl-3">
                                        {{ $analysis['dashboard_design']['kpi'] }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">Visualisasi
                                        Efektif</p>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach($analysis['dashboard_design']['visualizations'] as $chart)
                                            <span
                                                class="flex items-center gap-1.5 px-2.5 py-1.5 bg-white text-purple-700 text-xs font-bold rounded shadow-sm border border-purple-100">
                                                @if(str_contains($chart, 'Scorecard') || str_contains($chart, 'Angka'))
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z">
                                                        </path>
                                                    </svg>
                                                @elseif(str_contains($chart, 'Bar') || str_contains($chart, 'Perbandingan'))
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                                        </path>
                                                    </svg>
                                                @elseif(str_contains($chart, 'Tabel') || str_contains($chart, 'Drill'))
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
                                                        </path>
                                                    </svg>
                                                @elseif(str_contains($chart, 'Line') || str_contains($chart, 'Trend'))
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z">
                                                        </path>
                                                    </svg>
                                                @elseif(str_contains($chart, 'Pie') || str_contains($chart, 'Donut'))
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z">
                                                        </path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z">
                                                        </path>
                                                    </svg>
                                                @else
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                                        </path>
                                                    </svg>
                                                @endif
                                                {{ $chart }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mt-auto pt-4 border-t border-purple-100">
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Target
                                        Audience</p>
                                    <p class="text-slate-700 text-xs font-medium">
                                        {{ $analysis['dashboard_design']['audience'] }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 3. Decision Making -->
                        <div
                            class="flex flex-col h-full bg-slate-50 rounded-xl border border-emerald-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                            <div class="bg-white p-5 border-b border-emerald-50 flex items-center gap-3">
                                <div
                                    class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h3 class="font-bold text-slate-800 text-lg">Keputusan Data-Driven</h3>
                            </div>
                            <div class="p-6 flex-1 flex flex-col gap-4">
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Rekomendasi
                                        Kebijakan</p>
                                    <p class="text-slate-800 text-sm font-medium leading-relaxed mb-3">
                                        {{ $analysis['decision_making']['policy'] }}
                                    </p>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Alternatif
                                        Strategi</p>
                                    <div
                                        class="bg-white p-3 rounded-lg border border-slate-200 shadow-sm text-xs text-slate-600">
                                        {{ $analysis['decision_making']['alternative'] }}
                                    </div>
                                </div>
                                <div class="mt-auto bg-emerald-50 text-emerald-800 p-3 rounded-lg text-xs leading-relaxed">
                                    <strong>Dasar Keputusan:</strong> {{ $analysis['decision_making']['basis'] }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Data Visualization Preview -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
                <div class="bg-gradient-to-r from-purple-600 to-pink-600 px-8 py-6">
                    <div class="flex items-center gap-4">
                        <div class="p-2 bg-white/30 rounded-lg">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white tracking-tight">Data Visualization Preview</h2>
                            <p class="text-purple-50 text-sm font-medium">Implementasi rekomendasi dashboard dengan data
                                aktual</p>
                        </div>
                    </div>
                </div>

                <div class="p-8 space-y-8" id="visualizationContainer">
                    <!-- Loading State -->
                    <div id="loadingState" class="flex items-center justify-center py-12">
                        <div class="text-center">
                            <svg class="animate-spin h-12 w-12 text-purple-600 mx-auto mb-4"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                                </circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <p class="text-slate-600">Loading dataset...</p>
                        </div>
                    </div>

                    <!-- KPI Scorecard -->
                    <div id="scorecardSection" class="hidden">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Key Performance Indicators</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" id="scorecardGrid"></div>
                    </div>

                    <!-- Bar Chart -->
                    <div id="barChartSection" class="hidden">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Data Comparison</h3>
                        <div class="bg-slate-50 p-6 rounded-xl border border-slate-200">
                            <canvas id="dataBarChart" height="80"></canvas>
                        </div>
                    </div>

                    <!-- Data Table -->
                    <div id="dataTableSection" class="hidden">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Dataset Preview</h3>
                        <div class="overflow-x-auto rounded-xl border border-slate-200">
                            <table class="min-w-full divide-y divide-slate-200" id="dataTable">
                                <thead class="bg-slate-50">
                                    <!-- Dynamic headers -->
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100">
                                    <!-- Dynamic rows -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metadata Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 bg-slate-50">
                    <h4 class="text-lg font-bold text-slate-900">Metadata</h4>
                </div>
                <div class="p-6 space-y-4">
                    <div class="flex justify-between items-center py-2 border-b border-slate-50 last:border-0">
                        <span class="text-sm text-slate-500">Created</span>
                        <span
                            class="text-sm font-medium text-slate-900">{{ isset($dataset['cdate']) ? \Carbon\Carbon::parse($dataset['cdate'])->format('M d, Y') : 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-slate-50 last:border-0">
                        <span class="text-sm text-slate-500">Last Updated</span>
                        <span
                            class="text-sm font-medium text-slate-900">{{ isset($dataset['mdate']) ? \Carbon\Carbon::parse($dataset['mdate'])->format('M d, Y') : 'N/A' }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-slate-50 last:border-0">
                        <span class="text-sm text-slate-500">Views</span>
                        <span
                            class="text-sm font-medium text-slate-900">{{ number_format($dataset['count_view_opendata'] ?? $dataset['count_view'] ?? 0) }}</span>
                    </div>

                    @if(isset($dataset['metadata']) && is_array($dataset['metadata']))
                        @foreach(array_slice($dataset['metadata'], 0, 5) as $meta)
                            <div class="flex justify-between items-center py-2 border-b border-slate-50 last:border-0">
                                <span class="text-sm text-slate-500 truncate w-1/3"
                                    title="{{ $meta['key'] ?? '' }}">{{ $meta['key'] ?? 'Key' }}</span>
                                <span class="text-sm font-medium text-slate-900 truncate w-2/3 text-right"
                                    title="{{ $meta['value'] ?? '' }}">{{ $meta['value'] ?? '-' }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- Share Button -->
                <div class="px-6 py-4 bg-slate-50 border-t border-slate-100">
                    <button
                        class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-sm text-sm font-medium transition-colors flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z">
                            </path>
                        </svg>
                        Share Dataset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Visualization JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', async function () {
            const datasetId = {{ $dataset['id'] }};
            const metadataUrl = `https://opendata.indramayukab.go.id/api/datasets/${datasetId}`;

            try {
                // Step 1: Fetch dataset metadata to get table name
                const metadataResponse = await fetch(metadataUrl);
                const metadata = await metadataResponse.json();

                // Extract table name from metadata
                const tableName = metadata.data?.table;
                const organizationCode = metadata.data?.organisasi_slug;

                if (!tableName || !organizationCode) {
                    throw new Error('Table name or organization code not found');
                }

                // Step 2: Construct bigdata API URL
                const dataUrl = `https://opendata.indramayukab.go.id/api/bigdata/${organizationCode}/${tableName}`;
                console.log('Fetching data from:', dataUrl);

                // Step 3: Fetch actual data
                const dataResponse = await fetch(dataUrl);
                const dataResult = await dataResponse.json();

                // Hide loading
                document.getElementById('loadingState').classList.add('hidden');

                const records = dataResult.data || [];

                if (records.length === 0) {
                    document.getElementById('visualizationContainer').innerHTML = '<p class="text-center text-slate-500">No data available</p>';
                    return;
                }

                // Render visualizations
                renderScorecard(records);
                renderBarChart(records);
                renderDataTable(records);

            } catch (error) {
                console.error('Error fetching dataset:', error);
                document.getElementById('loadingState').classList.add('hidden');
                document.getElementById('visualizationContainer').innerHTML = '<div class="text-center text-red-600"><p class="font-bold mb-2">Failed to load data</p><p class="text-sm">' + error.message + '</p></div>';
            }
        });

        function renderScorecard(records) {
            const scorecardGrid = document.getElementById('scorecardGrid');
            const scorecardSection = document.getElementById('scorecardSection');

            // Calculate metrics
            const totalRecords = records.length;

            // Try to find numeric columns and calculate total
            const firstRecord = records[0];
            const numericColumns = Object.keys(firstRecord).filter(key => !isNaN(firstRecord[key]));

            let totalValue = 0;
            let avgValue = 0;

            if (numericColumns.length > 0) {
                const firstNumericCol = numericColumns[0];
                totalValue = records.reduce((sum, record) => sum + parseFloat(record[firstNumericCol] || 0), 0);
                avgValue = totalValue / totalRecords;
            }

            // KPI Cards
            const kpis = [
                { label: 'Total Records', value: totalRecords.toLocaleString(), icon: 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', color: 'blue' },
                { label: 'Total Sum', value: totalValue.toLocaleString('id-ID', { maximumFractionDigits: 0 }), icon: 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z', color: 'purple' },
                { label: 'Average Value', value: avgValue.toLocaleString('id-ID', { maximumFractionDigits: 2 }), icon: 'M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z', color: 'emerald' }
            ];

            scorecardGrid.innerHTML = kpis.map(kpi => `
                                <div class="bg-${kpi.color}-50 border border-${kpi.color}-100 rounded-xl p-6">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-${kpi.color}-600 text-sm font-bold uppercase tracking-wider">${kpi.label}</span>
                                        <svg class="w-6 h-6 text-${kpi.color}-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${kpi.icon}"></path>
                                        </svg>
                                    </div>
                                    <div class="text-3xl font-extrabold text-${kpi.color}-700">${kpi.value}</div>
                                </div>
                            `).join('');

            scorecardSection.classList.remove('hidden');
        }

        function renderBarChart(records) {
            const barChartSection = document.getElementById('barChartSection');
            const ctx = document.getElementById('dataBarChart').getContext('2d');

            // Get first 10 records for chart
            const chartRecords = records.slice(0, 10);
            const firstRecord = records[0];
            const keys = Object.keys(firstRecord);

            // Find a suitable label column (first string column)
            const labelCol = keys.find(key => isNaN(firstRecord[key])) || keys[0];
            // Find a suitable data column (first numeric column)
            const dataCol = keys.find(key => !isNaN(firstRecord[key])) || keys[1];

            const labels = chartRecords.map(r => String(r[labelCol]).substring(0, 20));
            const values = chartRecords.map(r => parseFloat(r[dataCol]) || 0);

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: dataCol || 'Value',
                        data: values,
                        backgroundColor: 'rgba(147, 51, 234, 0.6)',
                        borderColor: 'rgba(147, 51, 234, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            barChartSection.classList.remove('hidden');
        }

        function renderDataTable(records) {
            const dataTableSection = document.getElementById('dataTableSection');
            const table = document.getElementById('dataTable');

            // Get first 5 records
            const tableRecords = records.slice(0, 5);
            const firstRecord = records[0];
            const columns = Object.keys(firstRecord);

            // Table headers
            const thead = table.querySelector('thead');
            thead.innerHTML = `
                                <tr>
                                    ${columns.map(col => `<th scope="col" class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">${col}</th>`).join('')}
                                </tr>
                            `;

            // Table rows
            const tbody = table.querySelector('tbody');
            tbody.innerHTML = tableRecords.map(record => `
                                <tr class="hover:bg-slate-50">
                                    ${columns.map(col => `<td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">${record[col] || '-'}</td>`).join('')}
                                </tr>
                            `).join('');

            dataTableSection.classList.remove('hidden');
        }
    </script>
@endsection