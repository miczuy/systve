@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <div class="w-full max-w-2xl mx-auto">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
                <div class="p-6 md:p-8">
                    <!-- Header -->
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                        <div class="flex items-center gap-4">
                            <div class="bg-gradient-to-br from-blue-600 to-purple-600 p-3 rounded-xl shadow-lg">
                                <img src="https://cdn-icons-png.flaticon.com/512/4807/4807695.png"
                                     alt="Editar Horario"
                                     class="w-8 h-8 text-white">
                            </div>
                            <div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 font-montserrat">Editar Horario</h2>
                                <p class="text-sm text-gray-500 mt-1">Modifica los datos del horario médico</p>
                            </div>
                        </div>
                    </div>

                    <!-- Formulario -->
                    <form action="{{ route('admin.horarios.edit', $horario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <!-- Columna Izquierda -->
                            <div class="space-y-4">
                                <!-- Doctor -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-2">Doctor</label>
                                    <select name="doctor_id" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                        <option value="">Seleccionar Doctor</option>
                                        @foreach($doctores as $doctor)
                                            <option value="{{ $doctor->id }}" {{ $horario->doctor_id == $doctor->id ? 'selected' : '' }}>
                                                {{ $doctor->nombres }} {{ $doctor->apellidos }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('doctor_id')
                                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Consultorio -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-2">Consultorio</label>
                                    <select name="consultorio_id" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                        <option value="">Seleccionar Consultorio</option>
                                        @foreach($consultorios as $consultorio)
                                            <option value="{{ $consultorio->id }}" {{ $horario->consultorio_id == $consultorio->id ? 'selected' : '' }}>
                                                {{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('consultorio_id')
                                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Columna Derecha -->
                            <div class="space-y-4">
                                <!-- Día -->
                                <div>
                                    <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-2">Día</label>
                                    <select name="dia" class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                        <option value="LUNES" {{ $horario->dia == 'LUNES' ? 'selected' : '' }}>Lunes</option>
                                        <option value="MARTES" {{ $horario->dia == 'MARTES' ? 'selected' : '' }}>Martes</option>
                                        <option value="MIERCOLES" {{ $horario->dia == 'MIERCOLES' ? 'selected' : '' }}>Miércoles</option>
                                        <option value="JUEVES" {{ $horario->dia == 'JUEVES' ? 'selected' : '' }}>Jueves</option>
                                        <option value="VIERNES" {{ $horario->dia == 'VIERNES' ? 'selected' : '' }}>Viernes</option>
                                        <option value="SABADO" {{ $horario->dia == 'SABADO' ? 'selected' : '' }}>Sábado</option>
                                        <option value="DOMINGO" {{ $horario->dia == 'DOMINGO' ? 'selected' : '' }}>Domingo</option>
                                    </select>
                                    @error('dia')
                                    <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Horas -->
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-2">Hora Inicio</label>
                                        <input type="time" name="hora_inicio" value="{{ old('hora_inicio', $horario->hora_inicio) }}"
                                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                        @error('hora_inicio')
                                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label class="block text-xs font-medium text-gray-400 uppercase tracking-wider mb-2">Hora Fin</label>
                                        <input type="time" name="hora_fin" value="{{ old('hora_fin', $horario->hora_fin) }}"
                                               class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                                        @error('hora_fin')
                                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Acciones -->
                        <div class="flex flex-col-reverse md:flex-row justify-end gap-4 border-t border-gray-100 pt-6">
                            <a href="{{ url('admin/horarios') }}"
                               class="flex items-center justify-center gap-2 px-6 py-3 bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02] border border-gray-200 hover:border-blue-200">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                <span class="text-gray-700 font-medium text-sm md:text-base">Cancelar</span>
                            </a>

                            <button type="submit"
                                    class="flex items-center gap-2 px-6 py-3 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 hover:scale-[1.02] text-white">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="font-semibold text-sm md:text-base">Guardar Cambios</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
