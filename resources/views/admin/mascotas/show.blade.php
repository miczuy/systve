<!-- resources/views/admin/mascotas/show.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Información de la Mascota: {{ $mascota->nombre }}</h1>
            <div>
                <a href="{{ route('admin.mascotas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Volver al listado
                </a>
                @can('admin.mascotas.edit')
                    <a href="{{ route('admin.mascotas.edit', $mascota) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded ml-2">
                        Editar mascota
                    </a>
                @endcan
            </div>
        </div>

        @if(session('mensaje'))
            <div class="bg-{{ session('icono') === 'success' ? 'green' : 'red' }}-100 border border-{{ session('icono') === 'success' ? 'green' : 'red' }}-400 text-{{ session('icono') === 'success' ? 'green' : 'red' }}-700 px-4 py-3 rounded mb-4" role="alert">
                <p>{{ session('mensaje') }}</p>
            </div>
        @endif

        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Columna 1: Información básica y foto -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Información básica</h2>

                    @if($mascota->foto)
                        <div class="mb-4">
                            <img src="{{ Storage::url($mascota->foto) }}" alt="Foto de {{ $mascota->nombre }}" class="w-full h-auto rounded">
                        </div>
                    @endif

                    <div class="mb-4">
                        <p class="font-semibold">Dueño:</p>
                        <p>{{ $mascota->paciente->apellidos }}, {{ $mascota->paciente->nombres }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Nombre:</p>
                        <p>{{ $mascota->nombre }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Especie:</p>
                        <p>{{ $mascota->especie }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Raza:</p>
                        <p>{{ $mascota->raza ?? 'No especificada' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Color:</p>
                        <p>{{ $mascota->color ?? 'No especificado' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Sexo:</p>
                        <p>{{ $mascota->sexo ?? 'No especificado' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Fecha de nacimiento:</p>
                        <p>{{ $mascota->fecha_nacimiento ? $mascota->fecha_nacimiento->format('d/m/Y') : 'No especificada' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Edad:</p>
                        <p>{{ $mascota->edad ?? 'No se puede calcular' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Peso:</p>
                        <p>{{ $mascota->peso ? $mascota->peso . ' kg' : 'No registrado' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Esterilizado:</p>
                        <p>{{ $mascota->esterilizado ? 'Sí' : 'No' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Estado:</p>
                        <p class="px-2 py-1 rounded text-white
                        {{ $mascota->estado == 'Activo' ? 'bg-green-500' :
                          ($mascota->estado == 'Inactivo' ? 'bg-yellow-500' : 'bg-gray-500') }}">
                            {{ $mascota->estado }}
                        </p>
                    </div>
                </div>

                <!-- Columna 2: Información médica -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Información médica</h2>

                    <div class="mb-4">
                        <p class="font-semibold">Características especiales:</p>
                        <p>{{ $mascota->caracteristicas_especiales ?? 'No registradas' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Alergias:</p>
                        <p>{{ $mascota->alergias ?? 'No registradas' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Condiciones médicas:</p>
                        <p>{{ $mascota->condiciones_medicas ?? 'No registradas' }}</p>
                    </div>

                    <div class="mb-4">
                        <p class="font-semibold">Medicación actual:</p>
                        <p>{{ $mascota->medicacion_actual ?? 'No registrada' }}</p>
                    </div>
                </div>

                <!-- Columna 3: Alertas y próximas fechas -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Próximas fechas</h2>

                    @if($mascota->proximaVacuna)
                        <div class="mb-4 p-4 bg-blue-100 rounded">
                            <p class="font-semibold">Próxima vacuna:</p>
                            <p>{{ $mascota->proximaVacuna->nombre_vacuna }}</p>
                            <p>Fecha: {{ $mascota->proximaVacuna->fecha_proxima->format('d/m/Y') }}</p>
                        </div>
                    @endif

                    @if($mascota->proximaDesparasitacion)
                        <div class="mb-4 p-4 bg-green-100 rounded">
                            <p class="font-semibold">Próxima desparasitación:</p>
                            <p>{{ $mascota->proximaDesparasitacion->medicamento }}</p>
                            <p>Fecha: {{ $mascota->proximaDesparasitacion->fecha_proxima->format('d/m/Y') }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Historial médico (solo visualización) -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            <h2 class="text-xl font-semibold mb-4">Historial Médico</h2>

            <!-- Pestaña Vacunas (solo visualización) -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Vacunas registradas</h3>
                @if(count($mascota->vacunas) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Vacuna</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Aplicada</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Próxima</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Lote</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Veterinario</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mascota->vacunas as $vacuna)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $vacuna->nombre_vacuna }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $vacuna->fecha_aplicacion->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $vacuna->fecha_proxima ? $vacuna->fecha_proxima->format('d/m/Y') : 'No programada' }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $vacuna->lote ?? 'No registrado' }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $vacuna->veterinario ?? 'No registrado' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="py-4">No hay vacunas registradas para esta mascota.</p>
                @endif
            </div>

            <!-- Pestaña Desparasitaciones (solo visualización) -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Desparasitaciones registradas</h3>
                @if(count($mascota->desparasitaciones) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Medicamento</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Aplicada</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Próxima</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Peso aplicación</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Notas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mascota->desparasitaciones as $desparasitacion)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $desparasitacion->medicamento }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $desparasitacion->fecha_aplicacion->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $desparasitacion->fecha_proxima ? $desparasitacion->fecha_proxima->format('d/m/Y') : 'No programada' }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">{{ $desparasitacion->peso_aplicacion ? $desparasitacion->peso_aplicacion . ' kg' : 'No registrado' }}</td>
                                    <td class="px-6 py-4 border-b border-gray-200">{{ $desparasitacion->notas ?? 'No hay notas' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="py-4">No hay desparasitaciones registradas para esta mascota.</p>
                @endif
            </div>

            <!-- Pestaña Visitas/Citas (solo visualización) -->
            <div>
                <h3 class="text-lg font-semibold mb-2">Historial de citas</h3>
                @if(count($mascota->visitas) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Médico</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Motivo</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Detalles</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mascota->visitas as $visita)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $visita->fecha_visita->format('d/m/Y') }} {{ $visita->hora_visita->format('H:i') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ $visita->doctor ? $visita->doctor->nombre : 'No asignado' }}
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-200">{{ $visita->motivo_consulta }}</td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <span class="px-2 py-1 rounded text-white
                                    {{ $visita->estado == 'Completada' ? 'bg-green-500' :
                                      ($visita->estado == 'Programada' ? 'bg-blue-500' : 'bg-red-500') }}">
                                    {{ $visita->estado }}
                                </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        <a href="{{ route('admin.visitas.show', $visita) }}" class="text-blue-600 hover:text-blue-900">Ver detalles</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="py-4">No hay citas registradas para esta mascota.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
