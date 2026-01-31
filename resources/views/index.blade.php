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
            <div class="p-4 text-xl font-bold text-orange-400">CheatSheets</div>
            <nav class="px-2 space-y-2" x-data="{ open: null }" x-init="console.log('Hellooo!')">
                @foreach($sections as $section)
                    <div>
                        <button x-on:click="open === {{ $section->id }} ? open = null : open = {{ $section->id }}"
                            class="flex justify-between w-full px-3 py-2 rounded hover:bg-slate-800">
                            <span>{{ $section->title }}</span>
                            <span x-text="open === {{ $section->id }} ? '−' : '+'"></span>
                        </button>
                        <div x-show="open === {{ $section->id }}" class="ml-4 mt-1 space-y-1">
                            @foreach($section->articles as $article)
                                <a href="#" class="block px-2 py-1 rounded hover:bg-slate-800">{{ $article->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 overflow-y-auto">
            <div class="max-w-4xl mx-auto px-8 py-10">
                <h1 class="text-4xl font-bold mb-6 text-orange-400">{{ $article->title }}</h1>
                @foreach($article->blocks as $block)
                    <section class="mb-10">
                        <h2 class="text-2xl font-semibold mb-3">{{ $block->title }}</h2>

                        @if($block->type === 'text')
                            <p class="text-slate-300 leading-relaxed">
                                {{ $block->content }}
                            </p>
                        @elseif($block->type === 'code')
                            <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                                {!! nl2br(e($block->content)) !!}
                                {{-- <span class="text-green-400">$block->content</span> --}}
                            </div>
                        @endif
                    </section>
                @endforeach
            </div>
        </main>



        <!-- Main content -->
        {{-- <main class="flex-1 overflow-y-auto">
            <div class="max-w-4xl mx-auto px-8 py-10">

                <h1 class="text-4xl font-bold mb-6 text-orange-400">Apache Cheats</h1>

                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Introduction</h2>
                    <p class="text-slate-300 leading-relaxed">
                        The Apache HTTP Server is a free and open-source cross-platform web server, released under the
                        terms of Apache License 2.0. It is developed and maintained by a community of developers under
                        the auspices of the Apache Software Foundation.
                    </p>
                </section>

                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Install</h2>
                    <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                        <span class="text-green-400">sudo</span> apt install apache2
                    </div>
                </section>

                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Check Status</h2>
                    <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                        <span class="text-green-400">sudo</span> systemctl status apache2
                    </div>
                </section>

                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Start</h2>
                    <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                        <span class="text-green-400">sudo</span> systemctl start apache2
                    </div>
                </section>

                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Stop</h2>
                    <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                        <span class="text-green-400">sudo</span> systemctl stop apache2
                    </div>
                </section>

                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Reload - reload config (without dropping connections)</h2>
                    <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                        <span class="text-green-400">sudo</span> systemctl reload apache2
                    </div>
                </section>

                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Restart</h2>
                    <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                        <span class="text-green-400">sudo</span> systemctl restart apache2
                    </div>
                </section>



                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Enable on Boot</h2>
                    <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                        <span class="text-green-400">sudo</span> systemctl enable apache2
                    </div>
                </section>

                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Disable on Boot</h2>
                    <div class="bg-slate-900 border border-slate-800 rounded-lg p-4 font-mono text-sm">
                        <span class="text-green-400">sudo</span> systemctl disable apache2
                    </div>
                </section>



                <section class="mb-10">
                    <h2 class="text-2xl font-semibold mb-3">Configuration Files</h2>
                    <ul class="list-disc list-inside text-slate-300">
                        <li>/etc/apache2/apache2.conf - Main configuration file</li>
                        <li>/etc/apache2/ports.conf - Port configuration</li>
                        <li>/etc/apache2/sites-available/ - Directory for available site configurations</li>
                        <li>/etc/apache2/sites-enabled/ - Directory for enabled site configurations</li>
                        <li>/var/www/html/ - Default web root directory</li>
                    </ul>
                </section>
        </main> --}}
    </div>

    {{-- @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif --}}
</body>

</html>