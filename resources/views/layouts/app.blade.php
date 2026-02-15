<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Indramayu Open Data Dashboard')</title>
    <meta name="description"
        content="@yield('description', 'Visualize and explore open data from the Government of Indramayu Regency.')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 font-sans antialiased text-slate-800">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-gradient-to-r from-blue-700 to-indigo-800 shadow-md sticky top-0 z-50">
            <div
                class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 md:py-0 md:h-16 flex flex-col md:flex-row items-center justify-between gap-4 md:gap-0">
                <div class="flex items-center gap-3">
                    <div
                        class="w-8 h-8 rounded bg-white/20 backdrop-blur-sm flex items-center justify-center text-white font-bold border border-white/30">
                        I
                    </div>
                    <h1 class="text-xl font-bold text-white tracking-tight">Indramayu <span class="text-blue-200">Open
                            Data</span></h1>
                </div>
                <nav
                    class="flex gap-4 md:gap-6 w-full md:w-auto justify-center md:justify-end overflow-x-auto pb-1 md:pb-0">
                    <a href="{{ route('dashboard') }}"
                        class="text-sm font-medium whitespace-nowrap {{ request()->routeIs('dashboard') ? 'text-white' : 'text-blue-200 hover:text-white' }} transition">Dashboard</a>
                    <a href="{{ route('datasets.index') }}"
                        class="text-sm font-medium whitespace-nowrap {{ request()->routeIs('datasets.*') ? 'text-white' : 'text-blue-200 hover:text-white' }} transition">Datasets</a>
                    <a href="{{ route('organizations.index') }}"
                        class="text-sm font-medium whitespace-nowrap {{ request()->routeIs('organizations.*') ? 'text-white' : 'text-blue-200 hover:text-white' }} transition">Organizations</a>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-slate-200 py-6 mt-auto">
            <div class="max-w-7xl mx-auto px-4 text-center text-slate-500 text-sm">
                &copy; {{ date('Y') }} Pemerintah Kabupaten Indramayu. All rights reserved.
            </div>
        </footer>
    </div>

    <!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>