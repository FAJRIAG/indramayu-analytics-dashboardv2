@extends('layouts.app')

@section('title', 'Organizations - Indramayu Open Data')
@section('description', 'Browse data publishers and organizations contributing to Indramayu Open Data.')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-700 via-indigo-700 to-slate-800 px-4 sm:px-6 lg:px-8 py-12 mb-8 text-center text-white shadow-lg">
        <h1 class="text-3xl md:text-4xl font-extrabold mb-4 tracking-tight">Data Publishers</h1>
        <p class="text-blue-100 text-lg mb-0 max-w-2xl mx-auto">Explore datasets by government agencies and organizations in Indramayu.</p>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($organizations as $org)
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center h-full group">
                    <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center border border-slate-100 text-slate-400 mb-4 group-hover:bg-blue-50 group-hover:text-blue-500 transition-colors overflow-hidden">
                         @if(!empty($org['image']))
                            <img src="{{ $org['image'] }}" alt="Logo" class="w-full h-full object-cover">
                        @else
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        @endif
                    </div>
                    
                    <h3 class="text-lg font-bold text-slate-900 mb-2 leading-snug group-hover:text-blue-600 transition-colors">
                        {{ $org['name'] ?? 'Unknown Organization' }}
                    </h3>
                    
                    <div class="mt-auto pt-4 w-full">
                        <span class="inline-flex items-center justify-center px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 group-hover:bg-blue-100 group-hover:text-blue-700 transition-colors">
                            {{ $org['count_dataset_all'] ?? 0 }} Datasets
                        </span>
                    </div>
                    
                    <!-- Future: Link to datasets filtered by Org -->
                    <a href="{{ route('datasets.index', ['q' => $org['name'] ?? '']) }}" class="absolute inset-0 text-[0px]">View Datasets</a>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-slate-500 bg-white rounded-xl border border-dashed border-slate-300">
                    No organizations found.
                </div>
            @endforelse
        </div>
    </div>
@endsection
