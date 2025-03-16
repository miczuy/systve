@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-5">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Mascotas</h1>
            <a href="{{ route('admin.mascotas.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Nueva Mascota
            </a>
        </div>

        <!-- Filtros -->
        <div class="bg-white shadow rounded-lg p-4 mb-6">
            <form action="{{ route('admin.mascotas.index') }}" method="GET" class="flex flex-wrap items-end space-x-4">
                <div class="flex-1 min-w-[200px] mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Buscar</label>
                    <input type="text" name="buscar" value="{{ request('buscar') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Buscar mascota o propietario...">
                </div>

                <div class="w-full md:w-auto mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Especie</label>
                    <select name="especie" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Todas</option>
                        <option value="Perro" {{ request('especie') == 'Perro' ? 'selected' : '' }}>Perro</option>
                        <option value="Gato" {{ request('especie') == 'Gato' ? 'selected' : '' }}>Gato</option>
                        <option value="Ave" {{ request('especie') == 'Ave' ? 'selected' : '' }}>Ave</option>
                        <option value="Reptil" {{ request('especie') == 'Reptil' ? 'selected' : '' }}>Reptil</option>
                        <option value="Otro" {{ request('especie') == 'Otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                <div class="w-full md:w-auto mb-4 md:mb-0">
                    <label class="block text-gray-700 text-sm font-medium mb-2">Estado</label>
                    <select name="estado" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Todos</option>
                        <option value="Activo" {{ request('estado') == 'Activo' ? 'selected' : '' }}>Activo</option>
                        <option value="Inactivo" {{ request('estado') == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        <option value="Fallecido" {{ request('estado') == 'Fallecido' ? 'selected' : '' }}>Fallecido</option>
                    </select>
                </div>

                <div class="flex space-x-2">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-lg">
                        Filtrar
                    </button>
                    <a href="{{ route('admin.mascotas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg">
                        Limpiar
                    </a>
                </div>
            </form>
        </div>

        <!-- Listado de mascotas -->
        <div class="bg-white shadow overflow-hidden rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Mascota
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Propietario
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Especie/Raza
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Edad
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($mascotas as $mascota)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    @if($mascota->foto)
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Storage::url($mascota->foto) }}" alt="{{ $mascota->nombre }}">
                                    @else
                                        <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $mascota->nombre }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        @if($mascota->sexo == 'Macho')
                                            <span class="text-blue-600">♂ Macho</span>
                                        @elseif($mascota->sexo == 'Hembra')
                                            <span class="text-pink-600">♀ Hembra</span>
                                        @else
                                            <span class="text-gray-500">No especificado</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $mascota->paciente->nombres }} {{ $mascota->paciente->apellidos }}</div>
                            <div class="text-sm text-gray-500">{{ $mascota->paciente->cedula }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $mascota->especie }}</div>
                            <div class="text-sm text-gray-500">{{ $mascota->raza }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $mascota->edad ?? 'No registrada' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
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
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.mascotas.show', $mascota) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                Ver
                            </a>
                            <a href="{{ route('admin.mascotas.edit', $mascota) }}" class="text-yellow-600 hover:text-yellow-900 mr-3">
                                Editar
                            </a>
                            <a href="{{ route('admin.mascotas.confirmDelete', $mascota) }}" class="text-red-600 hover:text-red-900">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            No se encontraron mascotas
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="px-6 py-4">
                {{ $mascotas->links() }}
            </div>
        </div>
    </div>
@endsection
