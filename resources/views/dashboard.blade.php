<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('ESTADO DEL NÚCLEO // PANEL DE CONTROL') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    <div class="flex items-center mb-4">
                        <span class="inline-block w-3 h-3 bg-green-500 rounded-full animate-pulse me-3"></span>
                        <h3 class="text-lg font-bold font-mono text-cyan-400">SISTEMA OPERATIVO</h3>
                    </div>
                    
                   

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <div class="p-4 border border-white/5 rounded bg-white/5 text-center">
                            <h4 class="text-xs text-gray-500 uppercase tracking-widest">Equipos Activos</h4>
                            <span class="text-3xl font-bold text-white">--</span>
                        </div>
                        <div class="p-4 border border-white/5 rounded bg-white/5 text-center">
                            <h4 class="text-xs text-gray-500 uppercase tracking-widest">Alertas Críticas</h4>
                            <span class="text-3xl font-bold text-red-500">0</span>
                        </div>
                        <div class="p-4 border border-white/5 rounded bg-white/5 text-center">
                            <h4 class="text-xs text-gray-500 uppercase tracking-widest">Órdenes Pendientes</h4>
                            <span class="text-3xl font-bold text-cyan-400">--</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>