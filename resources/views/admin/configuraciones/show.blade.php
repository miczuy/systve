@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-indigo-50 to-purple-50 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-[2rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
            <!-- Encabezado con efecto de cristal mejorado -->
            <div class="relative bg-gradient-to-r from-indigo-700 via-purple-600 to-indigo-800 px-10 pt-10 pb-14">
                <div class="absolute inset-0 bg-grid-white/[0.05] bg-[length:20px_20px]"></div>
                <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute -top-[40%] -left-[20%] w-[80%] h-[80%] bg-gradient-to-br from-indigo-400/20 to-transparent rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-[40%] -right-[20%] w-[80%] h-[80%] bg-gradient-to-br from-purple-400/20 to-transparent rounded-full blur-3xl"></div>
                </div>

                <div class="relative flex items-center justify-between">
                    <span class="text-white/50 text-sm font-medium tracking-wider uppercase">Panel de Control</span>
                    <div class="bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full flex items-center">
                        <span class="inline-block w-2 h-2 bg-emerald-400 rounded-full animate-pulse mr-2"></span>
                        <span class="text-white/90 text-xs font-medium">Sistema Activo</span>
                    </div>
                </div>

                <div class="relative mt-6 flex flex-col md:flex-row items-center gap-8">
                    <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-md p-5 rounded-2xl flex items-center justify-center border border-white/10 shadow-inner">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>

                    <div class="text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">Configuración del Sistema</h1>
                        <p class="mt-2 text-indigo-100/80 font-light max-w-xl">Detalles de la configuración e identidad institucional.</p>
                    </div>
                </div>

                <!-- Decoration dots -->
                <div class="absolute bottom-4 right-6 flex space-x-1.5">
                    <div class="w-2 h-2 rounded-full bg-white/20"></div>
                    <div class="w-2 h-2 rounded-full bg-white/30"></div>
                    <div class="w-2 h-2 rounded-full bg-white/40"></div>
                    <div class="w-2 h-2 rounded-full bg-white/60"></div>
                </div>
            </div>

            <div class="px-10 py-8 space-y-10">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Columna Izquierda: Logo e Identidad -->
                    <div class="lg:col-span-1 space-y-8">
                        <!-- Sección: Logo -->
                        <fieldset class="space-y-4">
                            <legend class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Logo Institucional
                            </legend>

                            <div class="relative group">
                                <div class="mb-3 flex justify-center">
                                    <div class="w-32 h-32 bg-gray-100 rounded-2xl overflow-hidden flex items-center justify-center border border-gray-200 shadow-inner">
                                        @if(isset($configuracion->logo) && $configuracion->logo)
                                            <img src="{{url('storage/'.$configuracion->logo) }}" alt="Logo institucional" class="w-full h-full object-contain">
                                        @else
                                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        @endif
                                    </div>
                                </div>

                                <div class="bg-indigo-50/60 rounded-lg p-3 border border-indigo-100">
                                    <p class="text-xs text-indigo-700/80 font-medium">El logo aparece en el encabezado, reportes y documentos generados por el sistema.</p>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <!-- Columna Derecha: Detalles de Configuración -->
                    <div class="lg:col-span-2 space-y-8">
                        <!-- Sección: Información Institucional -->
                        <fieldset class="space-y-6 bg-white rounded-xl p-6 border border-gray-100 shadow-sm">
                            <legend class="text-lg font-semibold text-gray-800 flex items-center gap-2 px-2">
                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                Información Institucional
                            </legend>

                            <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
                                <!-- Nombre de la institución -->
                                <div class="space-y-1 md:col-span-6">
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-700/90 ml-1">Nombre de la Institución:</span>
                                    </div>
                                    <div class="pl-3.5 py-3 mt-1 bg-gray-50/70 rounded-xl text-gray-700 font-medium border border-gray-200/80">
                                        <div class="flex items-start">
                                            <svg class="h-5 w-5 text-indigo-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            <span>{{ $configuracion->nombre ?? 'No disponible' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Teléfono -->
                                <div class="space-y-1 md:col-span-3">
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-700/90 ml-1">Teléfono de Contacto:</span>
                                    </div>
                                    <div class="pl-3.5 py-3 mt-1 bg-gray-50/70 rounded-xl text-gray-700 font-medium border border-gray-200/80">
                                        <div class="flex items-start">
                                            <svg class="h-5 w-5 text-indigo-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                            <span>{{ $configuracion->telefono ?? 'No disponible' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Correo Electrónico -->
                                <div class="space-y-1 md:col-span-3">
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-700/90 ml-1">Correo Electrónico:</span>
                                    </div>
                                    <div class="pl-3.5 py-3 mt-1 bg-gray-50/70 rounded-xl text-gray-700 font-medium border border-gray-200/80">
                                        <div class="flex items-start">
                                            <svg class="h-5 w-5 text-indigo-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            <span>{{ $configuracion->correo ?? 'No disponible' }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Dirección -->
                                <div class="space-y-1 md:col-span-6">
                                    <div class="flex items-center">
                                        <span class="text-sm font-medium text-gray-700/90 ml-1">Dirección Completa:</span>
                                    </div>
                                    <div class="pl-3.5 py-3 mt-1 bg-gray-50/70 rounded-xl text-gray-700 font-medium border border-gray-200/80">
                                        <div class="flex items-start">
                                            <svg class="h-5 w-5 text-indigo-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span>{{ $configuracion->direccion ?? 'No disponible' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-center mt-12 pt-6 border-t border-gray-100">
                    <a href="{{ url('admin/configuraciones') }}" class="px-6 py-3.5 bg-gradient-to-br from-indigo-600 to-purple-600 text-white rounded-xl shadow-md hover:shadow-lg hover:shadow-indigo-500/20 transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        <span>Volver al listado</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Estilos adicionales para mejorar la apariencia */
        .bg-noise {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        .bg-grid-white {
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .animate-shake {
            animation: shake 0.6s cubic-bezier(.36,.07,.19,.97) both;
        }

        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
@endsection
