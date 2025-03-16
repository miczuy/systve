@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-5">
    <div class="mb-6">
        <a href="{{ route('admin.mascotas.index') }}" class="text-blue-600 hover:text-blue-900 inline-flex items-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Volver al listado
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">
        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-20 w-20">
                        @if($mascota->foto)
                        <img class="h-20 w-20 rounded-full object-cover border-4 border-white" src="{{ Storage::url($mascota->foto) }}" alt="{{ $mascota->nombre }}">
                        @else
                        <div class="h-20 w-20 rounded-full bg-white/20 flex items-center justify-center backdrop-blur-sm">
                            <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </div>
                        @endif
                    </div>
                    <div class="ml-4 text-white">
                        <h1 class="text-2xl font-bold">{{ $mascota->nombre }}</h1>
                        <p class="text-blue-100">{{ $mascota->especie }} {{ $mascota->raza ? '- ' . $mascota->raza : '' }}</p>
                    </div>
                </div>
                <div class="mt-4 md:mt-0 flex space-x-2">
                    <a href="{{ route('admin.mascotas.edit', $mascota) }}" class="bg-white text-blue-700 hover:bg-blue-50 font-medium py-2 px-4 rounded-lg inline-flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Editar
                    </a>
                </div>
            </div>
        </div>

        <!-- Información principal -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Información básica -->
                <div class="md:col-span-2">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Información básica</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Propietario</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->paciente->nombres }} {{ $mascota->paciente->apellidos }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Cédula propietario</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->paciente->cedula }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Especie</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->especie }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Raza</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->raza ?? 'No especificada' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Sexo</h3>
                            <p class="mt-1 text-sm text-gray-900">
                                @if($mascota->sexo == 'Macho')
                                <span class="text-blue-600">♂ Macho</span>
                                @elseif($mascota->sexo == 'Hembra')
                                <span class="text-pink-600">♀ Hembra</span>
                                @else
                                <span class="text-gray-500">No especificado</span>
                                @endif
                            </p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Color</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->color ?? 'No especificado' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Fecha de nacimiento</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->fecha_nacimiento ? $mascota->fecha_nacimiento->format('d/m/Y') : 'No registrada' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Edad</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->edad ?? 'No registrada' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Esterilizado</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->esterilizado ? 'Sí' : 'No' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Microchip</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->microchip ?? 'No registrado' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Peso</h3>
                            <p class="mt-1 text-sm text-gray-900">{{ $mascota->peso ? $mascota->peso . ' kg' : 'No registrado' }}</p>
                        </div>

                        <div>
                            <h3 class="text-sm font-medium text-gray-500">Estado</h3>
                            <p class="mt-1">
                                @if($mascota->estado == 'Activo')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Activo
                                </span>
                                @elseif($mascota->estado == 'Inactivo')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Inactivo
                                </span>
                                @elseif($mascota->estado == 'Fallecido')
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Fallecido
                                </span>
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h3 class="text-sm font-medium text-gray-500">Características especiales</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $mascota->caracteristicas_especiales ?? 'Ninguna característica registrada' }}</p>
                    </div>
                </div>

                <!-- Información médica -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Información médica</h2>

                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500">Alergias</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $mascota->alergias ?? 'No registradas' }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-sm font-medium text-gray-500">Condiciones médicas</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $mascota->condiciones_medicas ?? 'No registradas' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Medicación actual</h3>
                        <p class="mt-1 text-sm text-gray-900">{{ $mascota->medicacion_actual ?? 'No registrada' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs para la información adicional -->
        <div class="px-6 pb-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <button class="tab-link border-indigo-500 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="vacunas">
                        Vacunas
                    </button>
                    <button class="tab-link border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="desparasitaciones">
                        Desparasitaciones
                    </button>
                    <button class="tab-link border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="historial">
                        Historial médico
                    </button>
                </nav>
            </div>

            <!-- Tab content -->
            <div class="mt-6">
                <!-- Vacunas -->
                <div id="vacunas" class="tab-content block">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Registro de vacunas</h3>
                        <button type="button" class="add-button bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg inline-flex items-center" data-target="form-vacuna">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Agregar vacuna
                        </button>
                    </div>

                    <!-- Formulario para agregar vacuna (oculto inicialmente) -->
                    <div id="form-vacuna" class="hidden mb-6 bg-gray-50 p-4 rounded-lg">
                        <form action="{{ route('admin.vacunas.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="nombre_vacuna" class="block text-sm font-medium text-gray-700">Nombre de la vacuna *</label>
                                    <input type="text" name="nombre_vacuna" id="nombre_vacuna" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="fecha_aplicacion" class="block text-sm font-medium text-gray-700">Fecha de aplicación *</label>
                                    <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="fecha_proxima" class="block text-sm font-medium text-gray-700">Fecha próxima dosis</label>
                                    <input type="date" name="fecha_proxima" id="fecha_proxima" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="lote" class="block text-sm font-medium text-gray-700">Lote</label>
                                    <input type="text" name="lote" id="lote" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="veterinario" class="block text-sm font-medium text-gray-700">Veterinario</label>
                                    <input type="text" name="veterinario" id="veterinario" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="notas" class="block text-sm font-medium text-gray-700">Notas</label>
                                <textarea name="notas" id="notas" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>

                            <div class="mt-4 flex justify-end space-x-3">
                                <button type="button" class="cancel-button bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-lg">
                                    Cancelar
                                </button>
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Lista de vacunas -->
                    @if($mascota->vacunas->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Vacuna
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha aplicación
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Próxima dosis
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Lote
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Veterinario
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($mascota->vacunas as $vacuna)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $vacuna->nombre_vacuna }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $vacuna->fecha_aplicacion->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $vacuna->fecha_proxima ? $vacuna->fecha_proxima->format('d/m/Y') : 'No programada' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $vacuna->lote ?? 'No registrado' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $vacuna->veterinario ?? 'No registrado' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('admin.vacunas.destroy', $vacuna) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta vacuna?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4 text-gray-500">
                        No hay vacunas registradas para esta mascota.
                    </div>
                    @endif
                </div>

                <!-- Desparasitaciones -->
                <div id="desparasitaciones" class="tab-content hidden">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Registro de desparasitaciones</h3>
                        <button type="button" class="add-button bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg inline-flex items-center" data-target="form-desparasitacion">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Agregar desparasitación
                        </button>
                    </div>

                    <!-- Formulario para agregar desparasitación (oculto inicialmente) -->
                    <div id="form-desparasitacion" class="hidden mb-6 bg-gray-50 p-4 rounded-lg">
                        <form action="{{ route('admin.desparasitaciones.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="medicamento" class="block text-sm font-medium text-gray-700">Medicamento *</label>
                                    <input type="text" name="medicamento" id="medicamento" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="fecha_aplicacion_despa" class="block text-sm font-medium text-gray-700">Fecha de aplicación *</label>
                                    <input type="date" name="fecha_aplicacion" id="fecha_aplicacion_despa" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="fecha_proxima_despa" class="block text-sm font-medium text-gray-700">Fecha próxima</label>
                                    <input type="date" name="fecha_proxima" id="fecha_proxima_despa" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="peso_aplicacion" class="block text-sm font-medium text-gray-700">Peso en aplicación (kg)</label>
                                    <input type="number" step="0.01" name="peso_aplicacion" id="peso_aplicacion" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="notas_despa" class="block text-sm font-medium text-gray-700">Notas</label>
                                <textarea name="notas" id="notas_despa" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                            </div>

                            <div class="mt-4 flex justify-end space-x-3">
                                <button type="button" class="cancel-button bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-lg">
                                    Cancelar
                                </button>
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Lista de desparasitaciones -->
                    @if($mascota->desparasitaciones->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Medicamento
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha aplicación
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Próxima aplicación
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Peso en aplicación
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($mascota->desparasitaciones as $desparasitacion)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $desparasitacion->medicamento }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $desparasitacion->fecha_aplicacion->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $desparasitacion->fecha_proxima ? $desparasitacion->fecha_proxima->format('d/m/Y') : 'No programada' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $desparasitacion->peso_aplicacion ? $desparasitacion->peso_aplicacion . ' kg' : 'No registrado' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('admin.desparasitaciones.destroy', $desparasitacion) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta desparasitación?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4 text-gray-500">
                        No hay desparasitaciones registradas para esta mascota.
                    </div>
                    @endif
                </div>

                <!-- Historial médico -->
                <div id="historial" class="tab-content hidden">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Historial médico</h3>
                        <button type="button" class="add-button bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg inline-flex items-center" data-target="form-visita">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Registrar visita
                        </button>
                    </div>

                    <!-- Formulario para agregar visita (oculto inicialmente) -->
                    <div id="form-visita" class="hidden mb-6 bg-gray-50 p-4 rounded-lg">
                        <form action="{{ route('admin.visitas.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label for="fecha_visita" class="block text-sm font-medium text-gray-700">Fecha *</label>
                                    <input type="date" name="fecha_visita" id="fecha_visita" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="hora_visita" class="block text-sm font-medium text-gray-700">Hora *</label>
                                    <input type="time" name="hora_visita" id="hora_visita" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="motivo_consulta" class="block text-sm font-medium text-gray-700">Motivo de consulta *</label>
                                    <input type="text" name="motivo_consulta" id="motivo_consulta" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="doctor_id" class="block text-sm font-medium text-gray-700">Veterinario *</label>
                                    <select name="doctor_id" id="doctor_id" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Seleccione un veterinario</option>
                                        @foreach(\App\Models\Doctor::all() as $doctor)
                                            <option value="{{ $doctor->id }}">Dr. {{ $doctor->nombres }} {{ $doctor->apellidos }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="specialty_id" class="block text-sm font-medium text-gray-700">Especialidad</label>
                                    <select name="specialty_id" id="specialty_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="">Seleccione especialidad</option>
                                        @foreach(\App\Models\Specialty::all() as $specialty)
                                            <option value="{{ $specialty->id }}">{{ $specialty->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="estado_visita" class="block text-sm font-medium text-gray-700">Estado *</label>
                                    <select name="estado" id="estado_visita" required class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        <option value="Programada">Programada</option>
                                        <option value="Completada">Completada</option>
                                        <option value="Cancelada">Cancelada</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="peso_visita" class="block text-sm font-medium text-gray-700">Peso (kg)</label>
                                    <input type="number" step="0.01" name="peso" id="peso_visita" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div>
                                    <label for="temperatura" class="block text-sm font-medium text-gray-700">Temperatura (°C)</label>
                                    <input type="number" step="0.1" name="temperatura" id="temperatura" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="sintomas" class="block text-sm font-medium text-gray-700">Síntomas</label>
                                    <textarea name="sintomas" id="sintomas" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>

                                <div>
                                    <label for="diagnostico" class="block text-sm font-medium text-gray-700">Diagnóstico</label>
                                    <textarea name="diagnostico" id="diagnostico" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>

                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="tratamiento" class="block text-sm font-medium text-gray-700">Tratamiento</label>
                                    <textarea name="tratamiento" id="tratamiento" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>

                                <div>
                                    <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                                    <textarea name="observaciones" id="observaciones" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label for="fecha_seguimiento" class="block text-sm font-medium text-gray-700">Fecha de seguimiento</label>
                                <input type="date" name="fecha_seguimiento" id="fecha_seguimiento" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:w-64 shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="mt-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="crear_historial" name="crear_historial" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="crear_historial" class="font-medium text-gray-700">Crear historial clínico</label>
                                        <p class="text-gray-500">Si marca esta opción, se creará automáticamente un registro en el historial clínico al completar la visita.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 flex justify-end space-x-3">
                                <button type="button" class="cancel-button bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-lg">
                                    Cancelar
                                </button>
                                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg">
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Lista de visitas -->
                    @if($mascota->visitas->count() > 0)
                    <div class="space-y-4">
                        @foreach($mascota->visitas as $visita)
                        <div class="bg-white shadow overflow-hidden rounded-md">
                            <div class="px-6 py-4 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-lg font-medium text-gray-900">{{ $visita->fecha_visita->format('d/m/Y') }} a las {{ \Carbon\Carbon::parse($visita->hora_visita)->format('H:i') }}</h4>
                                        <p class="text-sm text-gray-600">Motivo: {{ $visita->motivo_consulta }}</p>
                                    </div>
                                    <div>
                                        @if($visita->estado == 'Programada')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-yellow-100 text-yellow-800">
                                            Programada
                                        </span>
                                        @elseif($visita->estado == 'Completada')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800">
                                            Completada
                                        </span>
                                        @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800">
                                            Cancelada
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-4">
                                <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-2">
                                    @if($visita->doctor)
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Veterinario</dt>
                                        <dd class="mt-1 text-sm text-gray-900">Dr. {{ $visita->doctor->nombres }} {{ $visita->doctor->apellidos }}</dd>
                                    </div>
                                    @endif

                                    @if($visita->specialty)
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Especialidad</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $visita->specialty->nombre }}</dd>
                                    </div>
                                    @endif

                                    @if($visita->peso)
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Peso</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $visita->peso }} kg</dd>
                                    </div>
                                    @endif

                                    @if($visita->temperatura)
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Temperatura</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $visita->temperatura }} °C</dd>
                                    </div>
                                    @endif

                                    @if($visita->fecha_seguimiento)
                                    <div class="sm:col-span-1">
                                        <dt class="text-sm font-medium text-gray-500">Fecha de seguimiento</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $visita->fecha_seguimiento->format('d/m/Y') }}</dd>
                                    </div>
                                    @endif

                                    @if($visita->sintomas)
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Síntomas</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $visita->sintomas }}</dd>
                                    </div>
                                    @endif

                                    @if($visita->diagnostico)
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Diagnóstico</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $visita->diagnostico }}</dd>
                                    </div>
                                    @endif

                                    @if($visita->tratamiento)
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Tratamiento</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $visita->tratamiento }}</dd>
                                    </div>
                                    @endif

                                    @if($visita->observaciones)
                                    <div class="sm:col-span-2">
                                        <dt class="text-sm font-medium text-gray-500">Observaciones</dt>
                                        <dd class="mt-1 text-sm text-gray-900">{{ $visita->observaciones }}</dd>
                                    </div>
                                    @endif
                                </dl>
                            </div>
                            <div class="px-6 py-3 bg-gray-50 text-right">
                                <a href="{{ route('admin.visitas.show', $visita) }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">Ver detalles</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4 text-gray-500">
                        No hay visitas registradas para esta mascota.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tabs functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabLinks = document.querySelectorAll('.tab-link');
        const tabContents = document.querySelectorAll('.tab-content');

        tabLinks.forEach(link => {
            link.addEventListener('click', () => {
                const tabId = link.getAttribute('data-tab');

                // Hide all tab contents
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });

                // Show selected tab content
                document.getElementById(tabId).classList.remove('hidden');

                // Update active tab style
                tabLinks.forEach(tabLink => {
                    tabLink.classList.remove('border-indigo-500', 'text-indigo-600');
                    tabLink.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                });

                link.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                link.classList.add('border-indigo-500', 'text-indigo-600');
            });
        });

        // Form toggle functionality
        const addButtons = document.querySelectorAll('.add-button');
        const cancelButtons = document.querySelectorAll('.cancel-button');

        addButtons.forEach(button => {
            button.addEventListener('click', () => {
                const formId = button.getAttribute('data-target');
                document.getElementById(formId).classList.remove('hidden');
            });
        });

        cancelButtons.forEach(button => {
            button.addEventListener('click', () => {
                const form = button.closest('form');
                form.reset();
                const formContainer = button.closest('[id^="form-"]');
                formContainer.classList.add('hidden');
            });
        });
    });
</script>
@endsection
