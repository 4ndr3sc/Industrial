<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 x-show="tab === 'dashboard'" class="font-semibold text-xl leading-tight text-cyan-400 font-orbitron" x-transition>
                {{ __('ESTADO DEL NÚCLEO // PANEL DE CONTROL') }}
            </h2>
            <h2 x-show="tab === 'equipos'" class="font-semibold text-xl leading-tight text-cyan-400 font-orbitron" style="display: none;" x-transition>
                {{ __('GESTIÓN DE EQUIPOS // INVENTARIO') }}
            </h2>
            <h2 x-show="tab === 'estado'" class="font-semibold text-xl leading-tight text-cyan-400 font-orbitron" style="display: none;" x-transition>
                {{ __('MONITOREO DE RED // ESTADO EN TIEMPO REAL') }}
            </h2>
            <h2 x-show="tab === 'historial'" class="font-semibold text-xl leading-tight text-cyan-400 font-orbitron" style="display: none;" x-transition>
                {{ __('REGISTRO DE SISTEMA // HISTORIAL DE EVENTOS') }}
            </h2>
            <h2 x-show="tab === 'tecnicos'" class="font-semibold text-xl leading-tight text-cyan-400 font-orbitron" style="display: none;" x-transition>
                {{ __('RECURSOS HUMANOS // PERSONAL TÉCNICO') }}
            </h2>
            <h2 x-show="tab === 'alertas'" class="font-semibold text-xl leading-tight text-red-500 font-orbitron animate-pulse" style="display: none;" x-transition>
                {{ __('SISTEMA DE ALERTA // NOTIFICACIONES CRÍTICAS') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6 h-full pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 h-full">

            <!-- TAB: DASHBOARD (Original but adapted) -->
            <div x-show="tab === 'dashboard'" 
                 x-transition:enter="transition ease-out duration-300 transform" 
                 x-transition:enter-start="opacity-0 translate-y-4" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 class="bg-gray-900 border border-cyan-900/50 shadow-xl shadow-cyan-900/10 sm:rounded-lg overflow-hidden relative">
                <div class="absolute inset-0 bg-gradient-to-b from-cyan-900/10 to-transparent pointer-events-none"></div>
                <div class="p-8 relative z-10">
                    <div class="flex items-center mb-6 border-b border-cyan-900/50 pb-4">
                        <div class="relative flex h-3 w-3 mr-4">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                        </div>
                        <h3 class="text-lg font-bold font-mono text-cyan-400 tracking-wider">SISTEMA OPERATIVO ACTIVO</h3>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
                        <div class="p-6 border border-cyan-800/30 rounded bg-cyan-900/10 text-center hover:bg-cyan-900/20 transition duration-300 shadow-inner shadow-cyan-900/20 backdrop-blur-sm">
                            <h4 class="text-xs text-cyan-300 uppercase tracking-widest mb-3 font-mono">Equipos Activos</h4>
                            <span class="text-5xl font-bold text-white font-orbitron drop-shadow-[0_0_10px_rgba(8,145,178,0.8)]">{{ $activeEquipments }}</span>
                        </div>
                        <div class="p-6 border border-red-800/30 rounded bg-red-900/10 text-center hover:bg-red-900/20 transition duration-300 shadow-inner shadow-red-900/20 backdrop-blur-sm">
                            <h4 class="text-xs text-red-300 uppercase tracking-widest mb-3 font-mono">Alertas Críticas</h4>
                            <span class="text-5xl font-bold text-red-500 font-orbitron animate-pulse drop-shadow-[0_0_10px_rgba(239,68,68,0.8)]">{{ $criticalAlerts }}</span>
                        </div>
                        <div class="p-6 border border-yellow-800/30 rounded bg-yellow-900/10 text-center hover:bg-yellow-900/20 transition duration-300 shadow-inner shadow-yellow-900/20 backdrop-blur-sm">
                            <h4 class="text-xs text-yellow-300 uppercase tracking-widest mb-3 font-mono">Órdenes Pendientes</h4>
                            <span class="text-5xl font-bold text-yellow-400 font-orbitron drop-shadow-[0_0_10px_rgba(234,179,8,0.8)]">{{ $pendingOrders }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB: EQUIPOS -->
            <div x-show="tab === 'equipos'" style="display: none;" 
                 x-transition:enter="transition ease-out duration-300 transform delay-75" 
                 x-transition:enter-start="opacity-0 translate-y-4" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 class="bg-gray-900 overflow-hidden shadow-xl shadow-cyan-900/10 sm:rounded-lg border border-cyan-900/50">
                <div class="p-8">
                    <div class="flex justify-between items-center mb-8 border-b border-cyan-900/50 pb-4">
                        <h3 class="text-lg font-bold font-mono text-cyan-400 flex items-center tracking-wider"><span class="mr-3 opacity-80">🔧</span> BASE DE DATOS DE MAQUINARIA</h3>
                        <button @click="$dispatch('open-modal', 'eqModal')" class="bg-gradient-to-r from-cyan-600 to-cyan-500 hover:from-cyan-500 hover:to-cyan-400 text-white font-mono text-xs py-2 px-5 rounded-sm transition shadow-[0_0_15px_rgba(8,145,178,0.5)] uppercase tracking-widest font-bold">
                            Ingresar Equipo
                        </button>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach($equipments as $equipment)
                        <div class="flex p-5 border border-white/5 rounded bg-white/5 hover:bg-white/10 hover:border-cyan-500/50 transition-all duration-300 cursor-pointer group shadow-lg">
                            <div class="w-16 h-16 bg-gradient-to-br from-cyan-950 to-gray-900 rounded flex items-center justify-center mr-5 border border-cyan-800/50 transition-colors
                                {{ $equipment->status == 'Operativo' ? 'group-hover:border-green-500/80' : ($equipment->status == 'En reparación' ? 'group-hover:border-yellow-500/50' : 'group-hover:border-red-500/50') }}">
                                <span class="text-2xl drop-shadow">
                                    @if($equipment->type == 'Generador') 🚜
                                    @elseif($equipment->type == 'Bomba') 🏭
                                    @elseif($equipment->type == 'Turbina') ⚙️
                                    @else 🛠️ @endif
                                </span>
                            </div>
                            <div class="flex-1 flex flex-col justify-center">
                                <div class="flex justify-between">
                                    <h4 class="text-white font-bold font-orbitron group-hover:text-cyan-400 transition-colors text-lg">{{ $equipment->name }}</h4>
                                    <!-- Delete Button -->
                                    <form action="{{ route('equipments.destroy', $equipment->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar equipo?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 text-xs font-mono ml-2">X</button>
                                    </form>
                                </div>
                                <div class="flex justify-between items-end mb-2 mt-1">
                                    <p class="text-[10px] text-gray-400 font-mono">ID: {{ $equipment->control_number }}</p>
                                    <span class="text-[9px] font-mono tracking-widest
                                        {{ $equipment->status == 'Operativo' ? 'text-green-400' : ($equipment->status == 'En reparación' ? 'text-yellow-500' : 'text-red-500') }}">
                                        ESTADO: {{ strtoupper($equipment->status) }}
                                    </span>
                                </div>
                                <div class="w-full bg-gray-800 rounded-full h-1.5">
                                    <div class="h-1.5 rounded-full
                                        {{ $equipment->health > 70 ? 'bg-gradient-to-r from-green-600 to-green-400 shadow-[0_0_8px_rgba(34,197,94,0.6)]' : ($equipment->health > 30 ? 'bg-gradient-to-r from-yellow-600 to-yellow-400 shadow-[0_0_8px_rgba(234,179,8,0.6)]' : 'bg-gradient-to-r from-red-600 to-red-400 shadow-[0_0_8px_rgba(239,68,68,0.6)]') }}" 
                                        style="width: {{ $equipment->health }}%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- TAB: ESTADO DEL EQUIPO -->
            <div x-show="tab === 'estado'" style="display: none;" 
                 x-transition:enter="transition ease-out duration-300 transform delay-75" 
                 x-transition:enter-start="opacity-0 translate-y-4" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 class="space-y-6">
                <div class="bg-gray-900 p-8 shadow-xl sm:rounded-lg border border-cyan-900/50 relative overflow-hidden">
                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    <div class="absolute -left-20 -bottom-20 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl pointer-events-none"></div>
                    
                    <h3 class="text-lg font-bold font-mono text-cyan-400 mb-8 border-b border-cyan-900/50 pb-4 relative z-10 tracking-wider">📊 TELEMETRÍA EN VIVO DE RED</h3>
                    
                    <div class="flex flex-col md:flex-row gap-12 relative z-10 items-center">
                        <!-- Circulo de rendimiento general -->
                        <div class="flex flex-col items-center justify-center bg-black/40 p-6 rounded-full border-[6px] border-cyan-900 w-56 h-56 shadow-[0_0_40px_rgba(8,145,178,0.15)] mx-auto md:mx-0 relative">
                            <svg class="absolute inset-0 w-full h-full -rotate-90 pointer-events-none">
                                <circle cx="106" cy="106" r="100" fill="none" stroke="currentColor" stroke-width="6" class="text-gray-800" />
                                <circle cx="106" cy="106" r="100" fill="none" stroke="currentColor" stroke-width="6" stroke-dasharray="628" stroke-dashoffset="50" class="text-cyan-400 shadow-[0_0_10px_cyan]" />
                            </svg>
                            <span class="text-6xl font-orbitron text-white tracking-tighter drop-shadow-[0_0_8px_rgba(255,255,255,0.8)]">92<span class="text-2xl text-cyan-400">%</span></span>
                            <span class="text-[10px] text-cyan-400/80 font-mono mt-2 tracking-widest">EFICIENCIA GLOBAL</span>
                        </div>
                        
                        <!-- Barras -->
                        <div class="flex-1 flex flex-col justify-center space-y-8 w-full max-w-xl">
                            <div class="group">
                                <div class="flex justify-between mb-2 font-mono text-xs uppercase tracking-widest">
                                    <span class="text-gray-400 group-hover:text-gray-200 transition">Consumo de Energía</span>
                                    <span class="text-cyan-400 font-bold drop-shadow-[0_0_5px_rgba(34,211,238,0.5)]">78%</span>
                                </div>
                                <div class="w-full bg-gray-800/80 rounded-full h-2.5 overflow-hidden border border-gray-700/50">
                                    <div class="bg-gradient-to-r from-cyan-800 to-cyan-400 h-2.5 rounded-full shadow-[0_0_10px_rgba(34,211,238,0.8)] relative">
                                        <div class="absolute inset-0 bg-white/20 animate-pulse"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="group">
                                <div class="flex justify-between mb-2 font-mono text-xs uppercase tracking-widest">
                                    <span class="text-gray-400 group-hover:text-gray-200 transition">Presión Interna</span>
                                    <span class="text-yellow-500 font-bold drop-shadow-[0_0_5px_rgba(234,179,8,0.5)]">45%</span>
                                </div>
                                <div class="w-full bg-gray-800/80 rounded-full h-2.5 overflow-hidden border border-gray-700/50">
                                    <div class="bg-gradient-to-r from-yellow-800 to-yellow-400 h-2.5 rounded-full shadow-[0_0_10px_rgba(234,179,8,0.8)] relative"></div>
                                </div>
                            </div>
                            <div class="group">
                                <div class="flex justify-between mb-2 font-mono text-xs uppercase tracking-widest">
                                    <span class="text-gray-400 group-hover:text-gray-200 transition">Temperatura del Núcleo</span>
                                    <span class="text-green-500 font-bold drop-shadow-[0_0_5px_rgba(34,197,94,0.5)]">30°C</span>
                                </div>
                                <div class="w-full bg-gray-800/80 rounded-full h-2.5 overflow-hidden border border-gray-700/50">
                                    <div class="bg-gradient-to-r from-green-800 to-green-400 h-2.5 rounded-full shadow-[0_0_10px_rgba(34,197,94,0.8)] relative"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB: HISTORIAL -->
            <div x-show="tab === 'historial'" style="display: none;" 
                 x-transition:enter="transition ease-out duration-300 transform delay-75" 
                 x-transition:enter-start="opacity-0 translate-y-4" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg border border-cyan-900/50">
                <div class="p-8">
                    <div class="flex justify-between items-center mb-8 border-b border-cyan-900/50 pb-4">
                        <h3 class="text-lg font-bold font-mono text-cyan-400 tracking-wider">📋 BITÁCORA DEL SISTEMA</h3>
                        <div class="flex space-x-2 items-center">
                            <button @click="$dispatch('open-modal', 'maintModal')" class="bg-gradient-to-r from-cyan-600 to-cyan-500 hover:from-cyan-500 hover:to-cyan-400 text-white font-mono text-xs py-1.5 px-4 rounded-sm transition shadow-[0_0_15px_rgba(8,145,178,0.5)] uppercase tracking-widest font-bold mr-4">
                                Añadir Registro
                            </button>
                            <span class="px-2 py-1 bg-cyan-900/30 text-cyan-400 font-mono text-[9px] rounded uppercase border border-cyan-800/50">Diario</span>
                            <span class="px-2 py-1 bg-black text-gray-500 font-mono text-[9px] rounded uppercase cursor-pointer hover:text-gray-300">Mensual</span>
                        </div>
                    </div>
                    
                    <div class="relative border-l-2 border-cyan-900/50 ml-4 space-y-8 mt-4">
                        @foreach($maintenances as $maintenance)
                        <div class="pl-8 relative group">
                            <div class="w-4 h-4 bg-gray-900 border-2 rounded-full absolute -left-[9px] top-1 transition-colors 
                                {{ $maintenance->type == 'Crítico' ? 'border-red-500 group-hover:bg-red-500 shadow-[0_0_10px_rgba(239,68,68,0.5)]' : ($maintenance->type == 'Preventivo' ? 'border-green-500 group-hover:bg-green-500 shadow-[0_0_10px_rgba(34,197,94,0.5)]' : 'border-cyan-500 group-hover:bg-cyan-500 shadow-[0_0_10px_rgba(34,211,238,0.5)]') }}"></div>
                            <div class="bg-white/5 border border-white/5 rounded-lg p-5 group-hover:border-white/10 transition-colors shadow-lg">
                                <p class="text-[10px] font-mono text-cyan-500/70 mb-2 tracking-widest">{{ strtoupper($maintenance->created_at->diffForHumans()) }}</p>
                                <div class="flex justify-between">
                                    <h4 class="text-white font-bold font-orbitron text-lg drop-shadow">{{ $maintenance->equipment->name ?? 'Sistema General' }} - {{ $maintenance->type }}</h4>
                                    <!-- Delete Button -->
                                    <form action="{{ route('maintenances.destroy', $maintenance->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar registro?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 text-xs font-mono ml-2">X</button>
                                    </form>
                                </div>
                                <p class="text-sm text-gray-400 mt-2 leading-relaxed">{{ $maintenance->description }}</p>
                                @if($maintenance->technician)
                                <p class="text-xs text-cyan-400 mt-2 font-mono">Técnico: {{ $maintenance->technician->name }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- TAB: TECNICOS -->
            <div x-show="tab === 'tecnicos'" style="display: none;" 
                 x-transition:enter="transition ease-out duration-300 transform delay-75" 
                 x-transition:enter-start="opacity-0 translate-y-4" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg border border-cyan-900/50">
                <div class="p-8">
                    <div class="flex justify-between items-center mb-8 border-b border-cyan-900/50 pb-4">
                        <h3 class="text-lg font-bold font-mono text-cyan-400 tracking-wider">👨‍🔧 INGENIEROS RESPONSABLES Y PERSONAL</h3>
                        <button @click="$dispatch('open-modal', 'techModal')" class="bg-gradient-to-r from-cyan-600 to-cyan-500 hover:from-cyan-500 hover:to-cyan-400 text-white font-mono text-xs py-2 px-5 rounded-sm transition shadow-[0_0_15px_rgba(8,145,178,0.5)] uppercase tracking-widest font-bold">
                            Ingresar Técnico
                        </button>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                        @foreach($technicians as $technician)
                        <div class="border border-white/5 p-6 rounded-xl bg-gradient-to-b from-white/5 to-transparent hover:from-white/10 hover:border-cyan-500/30 transition-all text-center group relative overflow-hidden backdrop-blur shadow-lg">
                            <div class="absolute top-0 w-full h-1 {{ $technician->status == 'EN TURNO' ? 'bg-green-500 shadow-[0_0_10px_rgba(34,197,94,1)]' : ($technician->status == 'FUERA DE TURNO' ? 'bg-gray-500 shadow-[0_0_10px_rgba(107,114,128,1)]' : 'bg-yellow-500 shadow-[0_0_10px_rgba(234,179,8,1)]') }}"></div>
                            <div class="w-24 h-24 bg-gray-800 border-2 border-gray-600 rounded-full mx-auto mb-3 flex items-center justify-center overflow-hidden shadow-xl
                                {{ $technician->status == 'FUERA DE TURNO' ? 'opacity-60' : '' }}">
                                <span class="text-4xl text-white">🚹</span>
                            </div>
                            <h4 class="{{ $technician->status == 'FUERA DE TURNO' ? 'text-gray-300' : 'text-white' }} font-bold font-orbitron text-lg">{{ $technician->name }}</h4>
                            <p class="text-xs {{ $technician->status == 'EN TURNO' ? 'text-cyan-400 opacity-80' : ($technician->status == 'FUERA DE TURNO' ? 'text-gray-500' : 'text-yellow-400 opacity-80') }} font-mono mt-1 mb-4">{{ $technician->level }} - {{ $technician->specialty }}</p>
                            <span class="
                                {{ $technician->status == 'EN TURNO' ? 'bg-green-900/20 text-green-400 border border-green-800/50' : '' }}
                                {{ $technician->status == 'FUERA DE TURNO' ? 'bg-gray-800/50 text-gray-500 border border-gray-700' : '' }}
                                {{ $technician->status == 'ASIGNACIÓN EXT.' ? 'bg-yellow-900/20 text-yellow-500 border border-yellow-800/50' : '' }}
                                text-[10px] font-mono px-3 py-1.5 rounded-full tracking-widest font-bold">
                                {{ $technician->status }}
                            </span>
                            <form action="{{ route('technicians.destroy', $technician->id) }}" method="POST" class="absolute bottom-2 right-2" onsubmit="return confirm('¿Eliminar técnico?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400 text-xs font-mono">X</button>
                            </form>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- TAB: ALERTAS -->
            <div x-show="tab === 'alertas'" style="display: none;" 
                 x-transition:enter="transition ease-out duration-300 transform delay-75" 
                 x-transition:enter-start="opacity-0 translate-y-4" 
                 x-transition:enter-end="opacity-100 translate-y-0" 
                 class="bg-gray-900 border-2 border-red-900/80 overflow-hidden shadow-[0_0_30px_rgba(239,68,68,0.15)] sm:rounded-lg relative">
                 
                <!-- Bg glow -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-red-600 via-red-500 to-red-600"></div>
                <div class="absolute top-0 left-1/4 right-1/4 h-24 bg-red-600/10 blur-3xl rounded-full pointer-events-none"></div>

                <div class="p-8 relative z-10">
                    <div class="flex justify-between items-center mb-8 border-b border-red-900/30 pb-4">
                        <h3 class="text-xl font-bold font-mono text-red-500 flex items-center tracking-widest"><span class="mr-3 text-2xl animate-pulse">⚠️</span> SISTEMA DE NOTIFICACIONES CRÍTICAS</h3>
                        <button class="bg-red-950/50 border border-red-500/30 text-red-400 hover:bg-red-900 hover:text-white px-4 py-2 text-xs font-mono rounded transition duration-300">LIMPIAR REGISTRO VIGENTE</button>
                    </div>
                    
                    <div class="space-y-5">
                        @foreach($maintenances->where('type', 'Crítico') as $alert)
                        <div class="bg-red-950/40 border border-red-800/50 p-5 rounded-lg flex items-start hover:bg-red-900/40 transition-colors">
                            <div class="bg-red-500/20 text-red-500 p-3 rounded-full mr-5 border border-red-500/30 shadow-inner">🔥</div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-white font-bold font-orbitron text-base drop-shadow">{{ $alert->equipment->name ?? 'ALERTA GENERAL' }}</h4>
                                    <span class="text-xs text-red-400/80 font-mono bg-red-950 px-2 py-1 rounded border border-red-900">{{ strtoupper($alert->created_at->diffForHumans()) }}</span>
                                </div>
                                <p class="text-red-300/70 text-sm leading-relaxed mb-4">{{ $alert->description }}</p>
                                <div class="flex space-x-3">
                                    <!-- Delete Button -->
                                    <form action="{{ route('maintenances.destroy', $alert->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Marcar alerta como resuelta y eliminar?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="bg-gradient-to-r from-red-700 to-red-600 hover:from-red-600 hover:to-red-500 text-white text-xs px-5 py-2.5 rounded font-mono shadow-[0_0_15px_rgba(239,68,68,0.5)] font-bold tracking-widest transition">
                                            RESOLVER ALERTA
                                        </button>
                                    </form>
                                    <button class="bg-transparent border border-gray-600 text-gray-400 hover:bg-gray-800 px-5 py-2.5 rounded text-xs font-mono transition">Ignorar</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    
    <!-- MODALS -->
    <div x-data="{ eqModal: false, techModal: false, maintModal: false }"
         @open-modal.window="if ($event.detail === 'eqModal') eqModal = true; 
                             if ($event.detail === 'techModal') techModal = true; 
                             if ($event.detail === 'maintModal') maintModal = true;">
        
        <!-- Eq Modal -->
        <div x-show="eqModal" class="fixed inset-0 z-50 overflow-y-auto bg-black/80 flex items-center justify-center backdrop-blur-sm" style="display: none; background-color: rgba(0,0,0,0.85);">
            <div @click.away="eqModal = false" class="bg-gray-900 border border-cyan-500/50 rounded-lg p-8 w-full mx-4 shadow-[0_0_30px_rgba(8,145,178,0.3)]" style="max-width: 450px; background-color: #0f172a;">
                <h3 class="text-xl font-orbitron text-cyan-400 mb-6 border-b border-cyan-900/50 pb-2">INGRESAR EQUIPO</h3>
                <form action="{{ route('equipments.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-mono text-gray-400 mb-1">Nombre</label>
                        <input type="text" name="name" required class="w-full bg-black/50 border border-cyan-900 focus:border-cyan-500 rounded text-white font-mono text-sm px-3 py-2 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-mono text-gray-400 mb-1">ID / Control</label>
                        <input type="text" name="control_number" required class="w-full bg-black/50 border border-cyan-900 focus:border-cyan-500 rounded text-white font-mono text-sm px-3 py-2 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-mono text-gray-400 mb-1">Tipo</label>
                        <select name="type" required class="w-full bg-black border border-cyan-900 focus:border-cyan-500 rounded text-cyan-300 font-mono text-sm px-3 py-2 outline-none">
                            <option value="Generador">Generador</option>
                            <option value="Bomba">Bomba</option>
                            <option value="Turbina">Turbina</option>
                            <option value="Otros">Otros</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-1">Estado</label>
                            <select name="status" class="w-full bg-black border border-cyan-900 focus:border-cyan-500 rounded text-cyan-300 font-mono text-sm px-3 py-2 outline-none">
                                <option value="Operativo">Operativo</option>
                                <option value="En reparación">En reparación</option>
                                <option value="Fuera de servicio">Fuera de servicio</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-1">Salud %</label>
                            <input type="number" name="health" min="0" max="100" value="100" required class="w-full bg-black/50 border border-cyan-900 focus:border-cyan-500 rounded text-white font-mono text-sm px-3 py-2 outline-none">
                        </div>
                    </div>
                    <div class="flex justify-end pt-4 space-x-3">
                        <button type="button" @click="eqModal = false" class="px-4 py-2 text-xs font-mono text-gray-400 hover:text-white transition">CANCELAR</button>
                        <button type="submit" class="bg-cyan-600 hover:bg-cyan-500 text-white text-xs font-mono px-6 py-2 rounded shadow-[0_0_10px_rgba(8,145,178,0.5)] transition">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tech Modal -->
        <div x-show="techModal" class="fixed inset-0 z-50 overflow-y-auto bg-black/80 flex items-center justify-center backdrop-blur-sm" style="display: none; background-color: rgba(0,0,0,0.85);">
            <div @click.away="techModal = false" class="bg-gray-900 border border-cyan-500/50 rounded-lg p-8 w-full shadow-[0_0_30px_rgba(8,145,178,0.3)] mx-4" style="max-width: 450px; background-color: #0f172a;">
                <h3 class="text-xl font-orbitron text-cyan-400 mb-6 border-b border-cyan-900/50 pb-2">INGRESAR TÉCNICO</h3>
                <form action="{{ route('technicians.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-mono text-gray-400 mb-1">Nombre Completo</label>
                        <input type="text" name="name" required class="w-full bg-black/50 border border-cyan-900 focus:border-cyan-500 rounded text-white font-mono text-sm px-3 py-2 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-mono text-gray-400 mb-1">Especialidad</label>
                        <input type="text" name="specialty" required class="w-full bg-black/50 border border-cyan-900 focus:border-cyan-500 rounded text-white font-mono text-sm px-3 py-2 outline-none">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-1">Nivel</label>
                            <input type="text" name="level" placeholder="Técnico Nivel 3" required class="w-full bg-black/50 border border-cyan-900 focus:border-cyan-500 rounded text-white font-mono text-sm px-3 py-2 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-1">Estado</label>
                            <select name="status" class="w-full bg-black border border-cyan-900 focus:border-cyan-500 rounded text-cyan-300 font-mono text-sm px-3 py-2 outline-none">
                                <option value="EN TURNO">EN TURNO</option>
                                <option value="FUERA DE TURNO">FUERA DE TURNO</option>
                                <option value="ASIGNACIÓN EXT.">ASIGNACIÓN EXT.</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-end pt-4 space-x-3">
                        <button type="button" @click="techModal = false" class="px-4 py-2 text-xs font-mono text-gray-400 hover:text-white transition">CANCELAR</button>
                        <button type="submit" class="bg-cyan-600 hover:bg-cyan-500 text-white text-xs font-mono px-6 py-2 rounded shadow-[0_0_10px_rgba(8,145,178,0.5)] transition">GUARDAR</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Maint Modal -->
        <div x-show="maintModal" class="fixed inset-0 z-50 overflow-y-auto bg-black/80 flex items-center justify-center backdrop-blur-sm" style="display: none; background-color: rgba(0,0,0,0.85);">
            <div @click.away="maintModal = false" class="bg-gray-900 border border-cyan-500/50 rounded-lg p-8 w-full shadow-[0_0_30px_rgba(8,145,178,0.3)] mx-4" style="max-width: 450px; background-color: #0f172a;">
                <h3 class="text-xl font-orbitron text-cyan-400 mb-6 border-b border-cyan-900/50 pb-2">AGREGAR REGISTRO</h3>
                <form action="{{ route('maintenances.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-mono text-gray-400 mb-1">Equipo (Opcional)</label>
                        <select name="equipment_id" class="w-full bg-black border border-cyan-900 focus:border-cyan-500 rounded text-cyan-300 font-mono text-sm px-3 py-2 outline-none">
                            <option value="">-- Seleccionar Equipo --</option>
                            @foreach($equipments as $eq)
                                <option value="{{ $eq->id }}">{{ $eq->name }} ({{ $eq->control_number }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-mono text-gray-400 mb-1">Técnico A Cargo</label>
                        <select name="technician_id" class="w-full bg-black border border-cyan-900 focus:border-cyan-500 rounded text-cyan-300 font-mono text-sm px-3 py-2 outline-none">
                            <option value="">-- Seleccionar Técnico --</option>
                            @foreach($technicians as $tech)
                                <option value="{{ $tech->id }}">{{ $tech->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-1">Tipo Incidencia</label>
                            <select name="type" required class="w-full bg-black border border-cyan-900 focus:border-cyan-500 rounded text-cyan-300 font-mono text-sm px-3 py-2 outline-none">
                                <option value="Preventivo">Preventivo</option>
                                <option value="Correctivo">Correctivo</option>
                                <option value="Crítico">Crítico</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-mono text-gray-400 mb-1">Estado</label>
                            <select name="status" class="w-full bg-black border border-cyan-900 focus:border-cyan-500 rounded text-cyan-300 font-mono text-sm px-3 py-2 outline-none">
                                <option value="Pendiente">Pendiente</option>
                                <option value="Completado">Completado</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-mono text-gray-400 mb-1">Descripción</label>
                        <textarea name="description" rows="3" required class="w-full bg-black/50 border border-cyan-900 focus:border-cyan-500 rounded text-white font-mono text-sm px-3 py-2 outline-none"></textarea>
                    </div>
                    <div class="flex justify-end pt-4 space-x-3">
                        <button type="button" @click="maintModal = false" class="px-4 py-2 text-xs font-mono text-gray-400 hover:text-white transition">CANCELAR</button>
                        <button type="submit" class="bg-cyan-600 hover:bg-cyan-500 text-white text-xs font-mono px-6 py-2 rounded shadow-[0_0_10px_rgba(8,145,178,0.5)] transition">REGISTRAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>