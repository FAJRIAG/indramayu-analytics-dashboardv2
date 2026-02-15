@extends('layouts.app')

@section('title', 'Datasets - Indramayu Open Data')
@section('description', 'Browse all available datasets from Indramayu Open Data portal.')

@section('content')
    <!-- Hero Section -->
    <div
        class="bg-gradient-to-r from-blue-700 via-indigo-700 to-slate-800 px-4 sm:px-6 lg:px-8 py-12 mb-8 text-center text-white shadow-lg">
        <h1 class="text-3xl md:text-4xl font-extrabold mb-4 tracking-tight">Explore Indramayu Data</h1>
        <p class="text-blue-100 text-lg mb-8 max-w-2xl mx-auto">Discover datasets, visualizations, and insights from the
            Indramayu Open Data portal. Transparency for everyone.</p>

        <!-- Search Form -->
        <form action="{{ route('datasets.index') }}" method="GET" class="max-w-xl mx-auto relative group z-50">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none z-20">
                <svg class="h-6 w-6 text-slate-400 group-focus-within:text-blue-500 transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="text" name="q" placeholder="Search for stats, datasets, topics..." value="{{ request('q') }}"
                required
                class="w-full pl-12 pr-32 py-4 rounded-full text-slate-900 bg-white shadow-xl border-0 ring-4 ring-white/20 focus:ring-blue-400 focus:outline-none transition-all placeholder:text-slate-400 font-medium relative z-10">
            <button type="submit"
                class="absolute right-2 top-2 bottom-2 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-full transition-colors shadow-md z-20">
                Search
            </button>
        </form>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Stats & Filters (Optional Placeholder) -->
        <div class="flex items-center justify-between mb-6 px-1">
            <div class="text-slate-600 font-medium">
                Showing <span class="text-slate-900 font-bold">{{ $paginator->count() }}</span> datasets
            </div>
            <!-- Future: Add Sort Dropdown Here -->
        </div>

        <!-- Datasets Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-12">
            @forelse($paginator as $dataset)
                @if(!is_array($dataset) || empty($dataset['id'])) @continue @endif

                <div
                    class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col h-full group">
                    <!-- Card Header: Org & Status -->
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-400">
                                <!-- Org Icon Placeholder -->
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider truncate max-w-[150px]"
                                title="{{ $dataset['organisasi_name'] ?? $dataset['nama_skpd'] ?? 'Unknown Org' }}">
                                {{ $dataset['organisasi_name'] ?? $dataset['nama_skpd'] ?? 'Organization' }}
                            </span>
                        </div>
                        <span
                            class="px-2 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold uppercase tracking-wide rounded-md border border-emerald-100">
                            {{ $dataset['status_dataset'] ?? 'Active' }}
                        </span>
                    </div>

                    <!-- Card Body: Title & Desc -->
                    <div class="flex-grow">
                        <h2
                            class="text-lg font-bold text-slate-900 mb-2 leading-snug group-hover:text-blue-600 transition-colors">
                            <a href="{{ route('datasets.show', $dataset['id'] ?? $dataset['dataset_column'] ?? '') }}"
                                class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                {{ $dataset['name'] ?? $dataset['nama_data'] ?? 'Untitled Dataset' }}
                            </a>
                        </h2>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                {{ $dataset['topik_name'] ?? $dataset['nama_topik'] ?? 'General' }}
                            </span>
                        </div>
                    </div>

                    <!-- Card Footer: Metadata -->
                    <div class="pt-4 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500 mt-4">
                        <div class="flex items-center gap-3">
                            <span class="flex items-center gap-1" title="Views">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                                {{ number_format($dataset['count_view_opendata'] ?? $dataset['count_view'] ?? 0) }}
                            </span>
                            <span class="flex items-center gap-1" title="Last Updated">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ isset($dataset['mdate']) ? \Carbon\Carbon::parse($dataset['mdate'])->format('M d, Y') : 'N/A' }}
                            </span>
                        </div>

                        <span
                            class="text-blue-600 font-medium group-hover:translate-x-1 transition-transform inline-flex items-center">
                            Details <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-xl border-2 border-dashed border-slate-200">
                    <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-slate-900">No datasets found</h3>
                    <p class="mt-1 text-sm text-slate-500">Try adjusting your search terms.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination (Hidden if showing all, but kept for compatibility) -->
        <div class="mt-8">
            {{ $paginator->links() }}
        </div>
    </div>
@endsection