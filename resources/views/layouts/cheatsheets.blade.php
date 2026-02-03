<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.5/dist/cdn.min.js"></script>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-slate-950 text-slate-200">
    <header class="">

    </header>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-72 bg-slate-900 border-r border-slate-800 overflow-y-auto">
            <div class="p-4 text-xl font-bold text-orange-400">
                <a href="{{ route('cheatsheets.index') }}">CheatSheets</a>
            </div>
            <nav class="px-2 space-y-2" x-data="{ open: {{ $article->section_id ?? 'null' }} }">
                @foreach($sections as $section)
                    <div>
                        <button x-on:click="open === {{ $section->id }} ? open = null : open = {{ $section->id }}"
                            class="flex justify-between w-full px-3 py-2 rounded hover:bg-slate-800">
                            <span>{{ $section->title }}</span>
                            <span x-text="open === {{ $section->id }} ? '−' : '+'"></span>
                        </button>
                        <div x-show="open === {{ $section->id }}" class="ml-4 mt-1 space-y-1">
                            @foreach($section->articles as $navArticle)
                                <a href="{{ route('cheatsheets.show', [$section->slug, $navArticle->slug]) }}"
                                class="block px-2 py-1 rounded
                                {{ isset($article) && $article->id === $navArticle->id
                                        ? 'bg-slate-800 text-orange-400'
                                        : 'hover:bg-slate-800' }}">
                                    {{ $navArticle->title }}
                                </a>
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>
</body>

</html>