@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-indigo-50 to-purple-50 flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-[2rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
            <!-- Encabezado -->
            <div class="relative bg-gradient-to-r from-indigo-700 via-purple-600 to-indigo-800 px-10 pt-10 pb-14">
                <div class="absolute inset-0 bg-grid-white/[0.05] bg-[length:20px_20px]"></div>
                <div class="absolute inset-0 overflow-hidden">
                    <div class="absolute -top-[40%] -left-[20%] w-[80%] h-[80%] bg-gradient-to-br from-indigo-400/20 to-transparent rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-[40%] -right-[20%] w-[80%] h-[80%] bg-gradient-to-br from-purple-400/20 to-transparent rounded-full blur-3xl"></div>
                </div>

                <div class="relative flex items-center justify-between">
                    <span class="text-white/50 text-sm font-medium tracking-wider uppercase">Historial Médico</span>
                    <div class="bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full flex items-center">
                        <span class="inline-block w-2 h-2 bg-emerald-400 rounded-full animate-pulse mr-2"></span>
                        <span class="text-white/90 text-xs font-medium">Nuevo Registro</span>
                    </div>
                </div>

                <div class="relative mt-6 flex flex-col md:flex-row items-center gap-8">
                    <div class="bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-md p-5 rounded-2xl flex items-center justify-center border border-white/10 shadow-inner">
                        <svg class="w-12 h-12 text-white/90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>

                    <div class="text-center md:text-left">
                        <h1 class="text-3xl md:text-4xl font-extrabold text-white tracking-tight">Nuevo Registro Médico</h1>
                        <p class="mt-2 text-indigo-100/80 font-light max-w-xl">Ingrese los detalles de la consulta médica del paciente.</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.historial.store') }}" method="POST" class="px-10 py-8 space-y-8">
                @csrf

                @if (session('success'))
                    <div class="bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-xl flex items-center space-x-3">
                        <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <p class="text-emerald-700">{{ session('success') }}</p>
                    </div>
                @endif

                <!-- Formulario Principal -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Columna Izquierda -->
                    <div class="space-y-6">
                        <!-- Selección de Paciente -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Paciente <span class="text-red-500">*</span></label>
                            <select name="paciente_id" class="w-full px-4 py-3 rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="">Seleccione un paciente</option>
                                @foreach($pacientes as $paciente)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombres }} {{ $paciente->apellidos }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Selección de Doctor -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Doctor <span class="text-red-500">*</span></label>
                            <select name="doctor_id" class="w-full px-4 py-3 rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                                <option value="">Seleccione un doctor</option>
                                @foreach($doctores as $doctor)
                                    <option value="{{ $doctor->id }}">Dr. {{ $doctor->nombre }} {{ $doctor->apellido }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fecha de Visita -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Fecha de Visita <span class="text-red-500">*</span></label>
                            <input type="date" name="fecha_visita" class="w-full px-4 py-3 rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        </div>
                    </div>

                    <!-- Columna Derecha -->
                    <div class="space-y-6">
                        <!-- Detalles de la Consulta -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Detalles de la Consulta <span class="text-red-500">*</span></label>
                            <textarea name="detalle" rows="8" class="w-full px-4 py-3 rounded-xl border-gray-300 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Ingrese los detalles de la consulta médica..." required></textarea>
                        </div>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="flex flex-col md:flex-row md:justify-between gap-3 mt-12 pt-6 border-t border-gray-100">
                    <div class="order-2 md:order-1">
                        <a href="{{ route('admin.historial.index') }}" class="inline-flex items-center text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Volver al listado
                        </a>
                    </div>

                    <div class="flex gap-3 order-1 md:order-2">
                        <button type="reset" class="px-6 py-3.5 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50">
                            Limpiar Formulario
                        </button>

                        <button type="submit" class="px-8 py-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200">
                            Guardar Registro
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <style>
        .bg-grid-white {
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        }
    </style>
@endsection
