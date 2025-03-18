@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Editar Mascota: {{ $mascota->nombre }}</h1>
            <div>
                <a href="{{ route('admin.mascotas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Volver al listado
                </a>
                <a href="{{ route('admin.mascotas.show', $mascota) }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded ml-2">
                    Ver mascota
                </a>
            </div>
        </div>

        @if(session('mensaje'))
            <div class="bg-{{ session('icono') === 'success' ? 'green' : 'red' }}-100 border border-{{ session('icono') === 'success' ? 'green' : 'red' }}-400 text-{{ session('icono') === 'success' ? 'green' : 'red' }}-700 px-4 py-3 rounded mb-4" role="alert">
                <p>{{ session('mensaje') }}</p>
            </div>
        @endif

        <!-- Formulario de edición de mascota -->
        <form action="{{ route('admin.mascotas.update', $mascota) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Información básica</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Paciente (dueño) -->
                    <div>
                        <label for="paciente_id" class="block mb-2">Dueño*</label>
                        <select name="paciente_id" id="paciente_id" class="w-full rounded border-gray-300 @error('paciente_id') border-red-500 @enderror" required>
                            <option value="">Seleccione un dueño</option>
                            @foreach($pacientes as $paciente)
                                <option value="{{ $paciente->id }}" {{ old('paciente_id', $mascota->paciente_id) == $paciente->id ? 'selected' : '' }}>
                                    {{ $paciente->apellidos }}, {{ $paciente->nombres }}
                                </option>
                            @endforeach
                        </select>
                        @error('paciente_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nombre -->
                    <div>
                        <label for="nombre" class="block mb-2">Nombre*</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $mascota->nombre) }}" class="w-full rounded border-gray-300 @error('nombre') border-red-500 @enderror" required>
                        @error('nombre')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Especie -->
                    <div>
                        <label for="especie" class="block mb-2">Especie*</label>
                        <select name="especie" id="especie" class="w-full rounded border-gray-300 @error('especie') border-red-500 @enderror" required>
                            <option value="">Seleccione la especie</option>
                            <option value="Perro" {{ old('especie', $mascota->especie) == 'Perro' ? 'selected' : '' }}>Perro</option>
                            <option value="Gato" {{ old('especie', $mascota->especie) == 'Gato' ? 'selected' : '' }}>Gato</option>
                            <option value="Ave" {{ old('especie', $mascota->especie) == 'Ave' ? 'selected' : '' }}>Ave</option>
                            <option value="Roedor" {{ old('especie', $mascota->especie) == 'Roedor' ? 'selected' : '' }}>Roedor</option>
                            <option value="Reptil" {{ old('especie', $mascota->especie) == 'Reptil' ? 'selected' : '' }}>Reptil</option>
                            <option value="Otro" {{ old('especie', $mascota->especie) == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('especie')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Raza -->
                    <div>
                        <label for="raza" class="block mb-2">Raza</label>
                        <input type="text" name="raza" id="raza" value="{{ old('raza', $mascota->raza) }}" class="w-full rounded border-gray-300 @error('raza') border-red-500 @enderror">
                        @error('raza')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Color -->
                    <div>
                        <label for="color" class="block mb-2">Color</label>
                        <input type="text" name="color" id="color" value="{{ old('color', $mascota->color) }}" class="w-full rounded border-gray-300 @error('color') border-red-500 @enderror">
                        @error('color')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sexo -->
                    <div>
                        <label for="sexo" class="block mb-2">Sexo</label>
                        <select name="sexo" id="sexo" class="w-full rounded border-gray-300 @error('sexo') border-red-500 @enderror">
                            <option value="">Seleccione el sexo</option>
                            <option value="Macho" {{ old('sexo', $mascota->sexo) == 'Macho' ? 'selected' : '' }}>Macho</option>
                            <option value="Hembra" {{ old('sexo', $mascota->sexo) == 'Hembra' ? 'selected' : '' }}>Hembra</option>
                        </select>
                        @error('sexo')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha de nacimiento -->
                    <div>
                        <label for="fecha_nacimiento" class="block mb-2">Fecha de nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento ? $mascota->fecha_nacimiento->format('Y-m-d') : '') }}" class="w-full rounded border-gray-300 @error('fecha_nacimiento') border-red-500 @enderror">
                        @error('fecha_nacimiento')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Peso -->
                    <div>
                        <label for="peso" class="block mb-2">Peso (kg)</label>
                        <input type="number" name="peso" id="peso" value="{{ old('peso', $mascota->peso) }}" step="0.01" min="0.1" max="999.99" class="w-full rounded border-gray-300 @error('peso') border-red-500 @enderror">
                        @error('peso')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Esterilizado -->
                    <div>
                        <label class="flex items-center mt-4">
                            <input type="checkbox" name="esterilizado" value="1" {{ old('esterilizado', $mascota->esterilizado) ? 'checked' : '' }} class="rounded border-gray-300">
                            <span class="ml-2">Esterilizado/a</span>
                        </label>
                    </div>

                    <!-- Estado -->
                    <div>
                        <label for="estado" class="block mb-2">Estado*</label>
                        <select name="estado" id="estado" class="w-full rounded border-gray-300 @error('estado') border-red-500 @enderror" required>
                            <option value="Activo" {{ old('estado', $mascota->estado) == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ old('estado', $mascota->estado) == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                            <option value="Fallecido" {{ old('estado', $mascota->estado) == 'Fallecido' ? 'selected' : '' }}>Fallecido</option>
                        </select>
                        @error('estado')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Información médica -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Información médica</h2>

                <div class="grid grid-cols-1 gap-4">
                    <!-- Características especiales -->
                    <div>
                        <label for="caracteristicas_especiales" class="block mb-2">Características especiales</label>
                        <textarea name="caracteristicas_especiales" id="caracteristicas_especiales" rows="2" class="w-full rounded border-gray-300 @error('caracteristicas_especiales') border-red-500 @enderror">{{ old('caracteristicas_especiales', $mascota->caracteristicas_especiales) }}</textarea>
                        @error('caracteristicas_especiales')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Alergias -->
                    <div>
                        <label for="alergias" class="block mb-2">Alergias</label>
                        <textarea name="alergias" id="alergias" rows="2" class="w-full rounded border-gray-300 @error('alergias') border-red-500 @enderror">{{ old('alergias', $mascota->alergias) }}</textarea>
                        @error('alergias')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Condiciones médicas -->
                    <div>
                        <label for="condiciones_medicas" class="block mb-2">Condiciones médicas</label>
                        <textarea name="condiciones_medicas" id="condiciones_medicas" rows="2" class="w-full rounded border-gray-300 @error('condiciones_medicas') border-red-500 @enderror">{{ old('condiciones_medicas', $mascota->condiciones_medicas) }}</textarea>
                        @error('condiciones_medicas')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Medicación actual -->
                    <div>
                        <label for="medicacion_actual" class="block mb-2">Medicación actual</label>
                        <textarea name="medicacion_actual" id="medicacion_actual" rows="2" class="w-full rounded border-gray-300 @error('medicacion_actual') border-red-500 @enderror">{{ old('medicacion_actual', $mascota->medicacion_actual) }}</textarea>
                        @error('medicacion_actual')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Foto -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Foto</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if($mascota->foto)
                        <div>
                            <p class="mb-2">Foto actual:</p>
                            <img src="{{ Storage::url($mascota->foto) }}" alt="Foto de {{ $mascota->nombre }}" class="w-48 h-auto rounded">
                        </div>
                    @endif

                    <div>
                        <label for="foto" class="block mb-2">Cambiar foto</label>
                        <input type="file" name="foto" id="foto" class="w-full rounded border-gray-300 @error('foto') border-red-500 @enderror" accept="image/jpeg,image/png,image/jpg">
                        @error('foto')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-500 text-xs mt-1">Formatos permitidos: JPG, JPEG, PNG. Tamaño máximo: 2MB.</p>
                    </div>
                </div>
            </div>

            <!-- Botones para guardar -->
            <div class="flex justify-end">
                <a href="{{ route('admin.mascotas.show', $mascota) }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded mr-2">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Guardar cambios
                </button>
            </div>
        </form>

        <!-- Pestañas para manejo de vacunas, desparasitaciones y citas -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            <div class="border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px" id="tabs" role="tablist">
                    <li class="mr-2">
                        <a href="#vacunas" id="vacunas-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:border-blue-300" role="tab" aria-controls="vacunas" aria-selected="false">Vacunas</a>
                    </li>
                    <li class="mr-2">
                        <a href="#desparasitaciones" id="desparasitaciones-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:border-blue-300" role="tab" aria-controls="desparasitaciones" aria-selected="false">Desparasitaciones</a>
                    </li>
                    <li class="mr-2">
                        <a href="#citas" id="citas-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:border-blue-300" role="tab" aria-controls="citas" aria-selected="false">Atenciones</a>
                    </li>
                </ul>
            </div>

            <!-- Contenido de las pestañas -->
            <div id="tabContent">
                <!-- Pestaña Vacunas -->
                <div id="vacunas" class="hidden p-4" role="tabpanel" aria-labelledby="vacunas-tab">
                    <!-- Formulario para agregar vacuna -->
                    @can('admin.vacunas.store')
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Registrar nueva vacuna</h3>
                            <form action="{{ route('admin.vacunas.store') }}" method="POST" class="bg-gray-50 p-4 rounded">
                                @csrf
                                <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                    <div>
                                        <label for="nombre_vacuna" class="block mb-2">Nombre de la vacuna*</label>
                                        <input type="text" name="nombre_vacuna" id="nombre_vacuna" required class="w-full rounded border-gray-300">
                                    </div>

                                    <div>
                                        <label for="fecha_aplicacion" class="block mb-2">Fecha de aplicación*</label>
                                        <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" required class="w-full rounded border-gray-300">
                                    </div>

                                    <div>
                                        <label for="fecha_proxima" class="block mb-2">Próxima aplicación</label>
                                        <input type="date" name="fecha_proxima" id="fecha_proxima" class="w-full rounded border-gray-300">
                                    </div>

                                    <div>
                                        <label for="lote" class="block mb-2">Lote</label>
                                        <input type="text" name="lote" id="lote" class="w-full rounded border-gray-300">
                                    </div>

                                    <div>
                                        <label for="veterinario" class="block mb-2">Veterinario</label>
                                        <input type="text" name="veterinario" id="veterinario" class="w-full rounded border-gray-300">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="notas" class="block mb-2">Notas</label>
                                    <textarea name="notas" id="notas" rows="2" class="w-full rounded border-gray-300"></textarea>
                                </div>

                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                    Registrar vacuna
                                </button>
                            </form>
                        </div>
                    @endcan

                    <!-- Listado de vacunas -->
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
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
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
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                            @can('admin.vacunas.update')
                                                <button class="text-blue-600 hover:text-blue-900 mr-2" onclick="editarVacuna({{ $vacuna->id }})">Editar</button>
                                            @endcan

                                            @can('admin.vacunas.destroy')
                                                <form action="{{ route('admin.vacunas.destroy', $vacuna) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta vacuna?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="py-4">No hay vacunas registradas para esta mascota.</p>
                    @endif
                </div>

                <!-- Pestaña Desparasitaciones -->
                <div id="desparasitaciones" class="hidden p-4" role="tabpanel" aria-labelledby="desparasitaciones-tab">
                    <!-- Formulario para agregar desparasitación -->
                    @can('admin.desparasitaciones.store')
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Registrar nueva desparasitación</h3>
                            <form action="{{ route('admin.desparasitaciones.store') }}" method="POST" class="bg-gray-50 p-4 rounded">
                                @csrf
                                <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                    <div>
                                        <label for="medicamento" class="block mb-2">Medicamento*</label>
                                        <input type="text" name="medicamento" id="medicamento" required class="w-full rounded border-gray-300">
                                    </div>

                                    <div>
                                        <label for="fecha_aplicacion" class="block mb-2">Fecha de aplicación*</label>
                                        <input type="date" name="fecha_aplicacion" id="fecha_aplicacion" required class="w-full rounded border-gray-300">
                                    </div>

                                    <div>
                                        <label for="fecha_proxima" class="block mb-2">Próxima aplicación</label>
                                        <input type="date" name="fecha_proxima" id="fecha_proxima" class="w-full rounded border-gray-300">
                                    </div>

                                    <div>
                                        <label for="peso_aplicacion" class="block mb-2">Peso en aplicación (kg)</label>
                                        <input type="number" name="peso_aplicacion" id="peso_aplicacion" step="0.01" min="0.1" max="999.99" class="w-full rounded border-gray-300">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="notas" class="block mb-2">Notas</label>
                                    <textarea name="notas" id="notas" rows="2" class="w-full rounded border-gray-300"></textarea>
                                </div>

                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                    Registrar desparasitación
                                </button>
                            </form>
                        </div>
                    @endcan

                    <!-- Listado de desparasitaciones -->
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
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
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
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                            @can('admin.desparasitaciones.update')
                                                <button class="text-blue-600 hover:text-blue-900 mr-2" onclick="editarDesparasitacion({{ $desparasitacion->id }})">Editar</button>
                                            @endcan

                                            @can('admin.desparasitaciones.destroy')
                                                <form action="{{ route('admin.desparasitaciones.destroy', $desparasitacion) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta desparasitación?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="py-4">No hay desparasitaciones registradas para esta mascota.</p>
                    @endif
                </div>

                <!-- Pestaña Atenciones -->
                <!-- Busca esta sección: -->
                <div id="citas" class="hidden p-4" role="tabpanel" aria-labelledby="citas-tab">
                    <!-- Formulario para registrar una atención (cita completada manualmente) -->
                    @can('admin.visitas.store')
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold mb-2">Registrar atención</h3>

                            <!-- Reemplaza todo el contenido existente por este: -->

                            <!-- Opción para seleccionar una cita existente -->
                            <div class="mb-4 bg-blue-50 p-4 rounded">
                                <h4 class="font-semibold mb-2">Citas pendientes para esta mascota</h4>
                                @php
                                    // Obtener solo las citas específicas para esta mascota
                                    $citasPendientes = \App\Models\Event::with(['doctor', 'consultorio'])
                                        ->where('estado', 'pendiente')
                                        ->where('mascota_id', $mascota->id)
                                        ->orderBy('start', 'asc')
                                        ->get();
                                @endphp

                                @if($citasPendientes->count() > 0)
                                    <div class="overflow-x-auto mb-4">
                                        <table class="min-w-full bg-white border">
                                            <thead>
                                            <tr>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Doctor</th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Detalles</th>
                                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($citasPendientes as $cita)
                                                <tr>
                                                    <td class="px-6 py-2 border-b border-gray-200">
                                                        {{ \Carbon\Carbon::parse($cita->start)->format('d/m/Y H:i') }}
                                                    </td>
                                                    <td class="px-6 py-2 border-b border-gray-200">
                                                        {{ $cita->doctor->nombres }} {{ $cita->doctor->apellidos }}
                                                        @php
                                                            $doctorEspecialidades = $cita->doctor->specialties->pluck('nombre')->join(', ');
                                                        @endphp
                                                        @if($doctorEspecialidades)
                                                            ({{ $doctorEspecialidades }})
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-2 border-b border-gray-200">
                                                        {{ $cita->title }}
                                                    </td>
                                                    <td class="px-6 py-2 border-b border-gray-200">
                                                        <button type="button"
                                                                class="usar-cita text-blue-600 hover:text-blue-900"
                                                                data-cita="{{ $cita->id }}"
                                                                data-doctor="{{ $cita->doctor_id }}"
                                                                data-fecha="{{ \Carbon\Carbon::parse($cita->start)->format('Y-m-d') }}"
                                                                data-hora="{{ \Carbon\Carbon::parse($cita->start)->format('H:i') }}"
                                                                data-motivo="{{ $cita->title }}">
                                                            Usar esta cita
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <p class="py-2 italic text-gray-600">No hay citas pendientes para esta mascota.</p>
                                @endif
                            </div>

                            <form action="{{ route('admin.visitas.store') }}" method="POST" class="bg-gray-50 p-4 rounded" id="form-atencion">
                                @csrf
                                <input type="hidden" name="mascota_id" value="{{ $mascota->id }}">
                                <input type="hidden" name="estado" value="Completada">
                                <input type="hidden" name="crear_historial" value="1">
                                <input type="hidden" name="event_id" id="event_id" value="">

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                    <div>
                                        <label for="doctor_id" class="block mb-2">Doctor que atendió*</label>
                                        <select name="doctor_id" id="doctor_id" required class="w-full rounded border-gray-300">
                                            <option value="">Seleccione un doctor</option>
                                            @foreach(\App\Models\Doctor::with('specialties')->get() as $doctor)
                                                <option value="{{ $doctor->id }}"
                                                        data-specialties="{{ $doctor->specialties->pluck('id') }}"
                                                        data-specialty-names="{{ $doctor->specialties->pluck('nombre') }}">
                                                    {{ $doctor->nombres }} {{ $doctor->apellidos }}
                                                    @if($doctor->specialties->count() > 0)
                                                        ({{ $doctor->specialties->pluck('nombre')->join(', ') }})
                                                    @else
                                                        (Sin especialidad)
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div>
                                        <label for="specialty_id" class="block mb-2">Especialidad</label>
                                        <select name="specialty_id" id="specialty_id" class="w-full rounded border-gray-300">
                                            <option value="">Seleccione una especialidad</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="fecha_visita" class="block mb-2">Fecha de atención*</label>
                                        <input type="date" name="fecha_visita" id="fecha_visita" required class="w-full rounded border-gray-300" value="{{ now()->format('Y-m-d') }}">
                                    </div>

                                    <div>
                                        <label for="hora_visita" class="block mb-2">Hora de atención*</label>
                                        <input type="time" name="hora_visita" id="hora_visita" required class="w-full rounded border-gray-300" value="{{ now()->format('H:i') }}">
                                    </div>

                                    <div>
                                        <label for="motivo_consulta" class="block mb-2">Motivo de consulta*</label>
                                        <input type="text" name="motivo_consulta" id="motivo_consulta" required class="w-full rounded border-gray-300">
                                    </div>

                                    <div>
                                        <label for="peso" class="block mb-2">Peso actual (kg)</label>
                                        <input type="number" name="peso" id="peso" step="0.01" min="0.1" max="999.99" class="w-full rounded border-gray-300" value="{{ $mascota->peso }}">
                                    </div>

                                    <div>
                                        <label for="temperatura" class="block mb-2">Temperatura (°C)</label>
                                        <input type="number" name="temperatura" id="temperatura" step="0.1" min="30" max="45" class="w-full rounded border-gray-300">
                                    </div>

                                    <div>
                                        <label for="fecha_seguimiento" class="block mb-2">Fecha de seguimiento</label>
                                        <input type="date" name="fecha_seguimiento" id="fecha_seguimiento" class="w-full rounded border-gray-300">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="sintomas" class="block mb-2">Síntomas</label>
                                    <textarea name="sintomas" id="sintomas" rows="2" class="w-full rounded border-gray-300"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="diagnostico" class="block mb-2">Diagnóstico</label>
                                    <textarea name="diagnostico" id="diagnostico" rows="2" class="w-full rounded border-gray-300"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="tratamiento" class="block mb-2">Tratamiento</label>
                                    <textarea name="tratamiento" id="tratamiento" rows="2" class="w-full rounded border-gray-300"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="observaciones" class="block mb-2">Observaciones</label>
                                    <textarea name="observaciones" id="observaciones" rows="2" class="w-full rounded border-gray-300"></textarea>
                                </div>

                                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                                    Registrar atención
                                </button>
                            </form>
                        </div>

                        <script>
                            // Script para manejar la selección de citas existentes
                            document.addEventListener('DOMContentLoaded', function() {
                                const citaSelect = document.getElementById('cita_existente');
                                const doctorSelect = document.getElementById('doctor_id');
                                const specialtySelect = document.getElementById('specialty_id');
                                const fechaInput = document.getElementById('fecha_visita');
                                const horaInput = document.getElementById('hora_visita');
                                const motivoInput = document.getElementById('motivo_consulta');
                                const eventIdInput = document.getElementById('event_id');

                                // Función para cargar las especialidades de un doctor
                                function cargarEspecialidades(doctorId, defaultSpecialtyId = null) {
                                    // Limpiar primero el select de especialidades
                                    specialtySelect.innerHTML = '<option value="">Seleccione una especialidad</option>';

                                    if (!doctorId) return;

                                    // Obtener las especialidades del doctor seleccionado
                                    const doctorOption = Array.from(doctorSelect.options).find(option => option.value == doctorId);
                                    if (!doctorOption) return;

                                    // Obtener los IDs y nombres de especialidades del atributo data
                                    let specialtyIds = [];
                                    try {
                                        specialtyIds = JSON.parse(doctorOption.getAttribute('data-specialties') || '[]');
                                    } catch (e) {
                                        console.error("Error al parsear las especialidades:", e);
                                        return;
                                    }

                                    let specialtyNames = [];
                                    try {
                                        specialtyNames = JSON.parse(doctorOption.getAttribute('data-specialty-names') || '[]');
                                    } catch (e) {
                                        console.error("Error al parsear los nombres de especialidades:", e);
                                        return;
                                    }

                                    // Si el doctor tiene especialidades, agregarlas al select
                                    if (specialtyIds.length > 0) {
                                        specialtyIds.forEach((id, index) => {
                                            const option = document.createElement('option');
                                            option.value = id;
                                            option.text = specialtyNames[index] || `Especialidad ${id}`;
                                            // Si hay un ID de especialidad por defecto, seleccionarlo
                                            if (defaultSpecialtyId && id == defaultSpecialtyId) {
                                                option.selected = true;
                                            }
                                            specialtySelect.appendChild(option);
                                        });

                                        // Si solo hay una especialidad, seleccionarla automáticamente
                                        if (specialtyIds.length === 1) {
                                            specialtySelect.value = specialtyIds[0];
                                            specialtySelect.disabled = true;
                                        } else {
                                            specialtySelect.disabled = false;
                                        }
                                    } else {
                                        // Si no tiene especialidades, desactivar el selector
                                        specialtySelect.disabled = true;
                                    }
                                }

                                // Manejar la selección de una cita existente
                                if (citaSelect) {
                                    citaSelect.addEventListener('change', function() {
                                        if (this.value) {
                                            const option = this.options[this.selectedIndex];

                                            // Obtener los datos de la cita seleccionada
                                            const doctorId = option.getAttribute('data-doctor');
                                            const fecha = option.getAttribute('data-fecha');
                                            const hora = option.getAttribute('data-hora');
                                            const motivo = option.getAttribute('data-motivo');

                                            // Establecer los valores en el formulario
                                            doctorSelect.value = doctorId;
                                            cargarEspecialidades(doctorId);

                                            fechaInput.value = fecha;
                                            horaInput.value = hora;
                                            motivoInput.value = motivo;
                                            eventIdInput.value = this.value;

                                            // Bloquear campos que no deberían editarse si provienen de una cita
                                            doctorSelect.disabled = true;
                                            fechaInput.disabled = true;
                                            horaInput.disabled = true;
                                        } else {
                                            // Restablecer el formulario
                                            doctorSelect.disabled = false;
                                            specialtySelect.disabled = false;
                                            fechaInput.disabled = false;
                                            horaInput.disabled = false;
                                            eventIdInput.value = '';

                                            doctorSelect.value = '';
                                            specialtySelect.innerHTML = '<option value="">Seleccione una especialidad</option>';
                                            fechaInput.value = "{{ now()->format('Y-m-d') }}";
                                            horaInput.value = "{{ now()->format('H:i') }}";
                                            motivoInput.value = '';
                                        }
                                    });
                                }

                                // Manejar la selección de doctor para actualizar las especialidades disponibles
                                doctorSelect.addEventListener('change', function() {
                                    cargarEspecialidades(this.value);
                                });

                                // Al enviar el formulario, habilitar los campos deshabilitados para que se envíen sus valores
                                document.getElementById('form-atencion').addEventListener('submit', function() {
                                    doctorSelect.disabled = false;
                                    specialtySelect.disabled = false;
                                    fechaInput.disabled = false;
                                    horaInput.disabled = false;
                                });

                                // Botones "Usar esta cita"
                                document.querySelectorAll('.usar-cita').forEach(button => {
                                    button.addEventListener('click', function() {
                                        const citaId = this.getAttribute('data-cita');
                                        const doctorId = this.getAttribute('data-doctor');
                                        const fecha = this.getAttribute('data-fecha');
                                        const hora = this.getAttribute('data-hora');
                                        const motivo = this.getAttribute('data-motivo');

                                        // Establecer los valores en el formulario
                                        doctorSelect.value = doctorId;
                                        cargarEspecialidades(doctorId);

                                        fechaInput.value = fecha;
                                        horaInput.value = hora;
                                        motivoInput.value = motivo;
                                        eventIdInput.value = citaId;

                                        // Bloquear campos que no deberían editarse
                                        doctorSelect.disabled = true;
                                        fechaInput.disabled = true;
                                        horaInput.disabled = true;

                                        // Hacer scroll hasta el formulario
                                        document.getElementById('form-atencion').scrollIntoView({ behavior: 'smooth' });
                                    });
                                });

                                // Cargar especialidades del doctor seleccionado inicialmente si hay uno
                                if (doctorSelect.value) {
                                    cargarEspecialidades(doctorSelect.value);
                                }
                            });
                        </script>
                    @endcan

                    <!-- Listado de atenciones -->
                    <h3 class="text-lg font-semibold mb-2">Atenciones registradas</h3>
                    @if(count($mascota->visitas) > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white border">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Médico</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Motivo</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($mascota->visitas as $visita)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            {{ $visita->fecha_visita->format('d/m/Y') }} {{ $visita->hora_visita->format('H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            @if($visita->doctor)
                                                {{ $visita->doctor->nombres }} {{ $visita->doctor->apellidos }}
                                                @if($visita->specialty_id)
                                                    ({{ optional(\App\Models\Specialty::find($visita->specialty_id))->nombre ?? 'Sin especialidad' }})
                                                @elseif($visita->doctor->specialties->count() > 0)
                                                    ({{ $visita->doctor->specialties->pluck('nombre')->join(', ') }})
                                                @else
                                                    (Sin especialidad)
                                                @endif
                                            @else
                                                No asignado
                                            @endif
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
                                            <a href="{{ route('admin.visitas.show', $visita) }}" class="text-blue-600 hover:text-blue-900 mr-2">Ver detalles</a>

                                            @if($visita->estado == 'Programada')
                                                <form action="{{ route('admin.visitas.update', $visita) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="doctor_id" value="{{ $visita->doctor_id }}">
                                                    <input type="hidden" name="specialty_id" value="{{ $visita->specialty_id }}">
                                                    <!-- Mantener la fecha y hora exactas de la visita original -->
                                                    <input type="hidden" name="fecha_visita" value="{{ $visita->fecha_visita->format('Y-m-d') }}">
                                                    <input type="hidden" name="hora_visita" value="{{ $visita->hora_visita->format('H:i') }}">
                                                    <input type="hidden" name="motivo_consulta" value="{{ $visita->motivo_consulta }}">
                                                    <input type="hidden" name="peso" value="{{ $visita->peso }}">
                                                    <input type="hidden" name="temperatura" value="{{ $visita->temperatura }}">
                                                    <input type="hidden" name="sintomas" value="{{ $visita->sintomas }}">
                                                    <input type="hidden" name="diagnostico" value="{{ $visita->diagnostico }}">
                                                    <input type="hidden" name="tratamiento" value="{{ $visita->tratamiento }}">
                                                    <input type="hidden" name="observaciones" value="{{ $visita->observaciones }}">
                                                    <input type="hidden" name="fecha_seguimiento" value="{{ $visita->fecha_seguimiento ? $visita->fecha_seguimiento->format('Y-m-d') : '' }}">
                                                    <input type="hidden" name="estado" value="Completada">
                                                    <input type="hidden" name="crear_historial" value="1">
                                                    <button type="submit" class="text-green-600 hover:text-green-900 mr-2">Marcar como completada</button>
                                                </form>
                                            @endif

                                            @if($visita->estado == 'Completada')
                                                <a href="{{ route('admin.historial.porMascota', $mascota) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Ver historial</a>
                                            @endif

                                            @can('admin.visitas.destroy')
                                                <form action="{{ route('admin.visitas.destroy', $visita) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta atención?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="py-4">No hay atenciones registradas para esta mascota.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modales para edición (implementación básica) -->
    <div id="modalEditarVacuna" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <!-- Contenido del modal para editar vacuna -->
    </div>

    <div id="modalEditarDesparasitacion" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <!-- Contenido del modal para editar desparasitación -->
    </div>

    <script>
        // Script para manejar las pestañas
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('#tabs a');
            const tabContents = document.querySelectorAll('#tabContent > div');

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Desactivar todas las pestañas
                    tabs.forEach(t => {
                        t.classList.remove('text-blue-600', 'border-blue-600');
                        t.classList.add('border-transparent');
                    });

                    // Ocultar todos los contenidos
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    // Activar la pestaña actual
                    this.classList.remove('border-transparent');
                    this.classList.add('text-blue-600', 'border-blue-600');

                    // Mostrar el contenido correspondiente
                    const targetId = this.getAttribute('href').substring(1);
                    document.getElementById(targetId).classList.remove('hidden');
                });
            });

            // Activar la primera pestaña por defecto
            if (tabs.length > 0) {
                tabs[0].click();
            }
        });

        // Funciones para abrir modales de edición
        function editarVacuna(id) {
            // Ejemplo simple de cómo abrir el modal
            const modal = document.getElementById('modalEditarVacuna');
            modal.classList.remove('hidden');

            // Aquí se debería cargar el formulario con los datos de la vacuna
            // Implementación completa requeriría una petición AJAX para obtener los datos

            // Por ahora, simplemente mostramos un placeholder
            modal.innerHTML = `
        <div class="bg-white rounded-lg p-6 max-w-lg mx-auto">
            <h3 class="text-lg font-semibold mb-4">Editar Vacuna ID: ${id}</h3>
            <p class="mb-4">Aquí iría el formulario de edición de la vacuna</p>
            <div class="flex justify-end">
                <button onclick="document.getElementById('modalEditarVacuna').classList.add('hidden')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Cerrar
                </button>
            </div>
        </div>
    `;
        }

        function editarDesparasitacion(id) {
            // Similar a la función anterior
            const modal = document.getElementById('modalEditarDesparasitacion');
            modal.classList.remove('hidden');

            modal.innerHTML = `
        <div class="bg-white rounded-lg p-6 max-w-lg mx-auto">
            <h3 class="text-lg font-semibold mb-4">Editar Desparasitación ID: ${id}</h3>
            <p class="mb-4">Aquí iría el formulario de edición de la desparasitación</p>
            <div class="flex justify-end">
                <button onclick="document.getElementById('modalEditarDesparasitacion').classList.add('hidden')" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Cerrar
                </button>
            </div>
        </div>
    `;
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Verificar si hay un tab activo en la sesión
            @if(session('active_tab'))
            // Activar la pestaña correspondiente
            const tabToActivate = '{{ session('active_tab') }}';
            const tabButton = document.querySelector(`[aria-controls="${tabToActivate}"]`);
            if (tabButton) {
                tabButton.click();
            }
            @endif
        });
    </script>
@endsection
