<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Control Panel | Industrial Core</title>
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Roboto+Mono:wght@400;600&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body class="font-sans antialiased bg-dark-core text-silver overflow-x-hidden">
        <div class="flex min-h-screen">
            <aside class="w-64 bg-panel-core border-r border-cyan-dark flex flex-col sticky top-0 h-screen">
                <div class="p-6 border-b border-cyan-dark">
                    <h1 class="font-orbitron text-cyan-400 text-xl tracking-tighter">CORE // SYS</h1>
                </div>

                <nav class="flex-1 px-4 py-6 space-y-2">
    <p class="text-xs text-gray-500 font-mono mb-4 uppercase tracking-widest px-2">Navegación Táctica</p>
    
    <a href="{{ route('dashboard') }}" class="sidebar-link active">
        <span class="icon">📊</span> DASHBOARD
    </a>

    <a href="#" class="sidebar-link">
        <span class="icon">🏗️</span> EQUIPOS
    </a>

    <a href="#" class="sidebar-link">
        <span class="icon">📡</span> ESTADO DEL EQUIPO
    </a>

    <a href="#" class="sidebar-link">
        <span class="icon">📜</span> HISTORIAL
    </a>

    <a href="#" class="sidebar-link">
        <span class="icon">👷</span> TECNICOS
    </a>

    <a href="#" class="sidebar-link text-red-500 hover:bg-red-500/10">
        <span class="icon">🚨</span> ALERTAS
    </a>
</nav>

                <div class="p-4 border-t border-cyan-dark">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left font-mono text-xs text-gray-400 hover:text-white transition">
                            CERRAR SESIÓN
                        </button>
                    </form>
                </div>
            </aside>

            <div class="flex-1 flex flex-col">
                @include('layouts.navigation') <main class="p-8">
                    @if (isset($header))
                        <header class="mb-8">
                            {{ $header }}
                        </header>
                    @endif
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>