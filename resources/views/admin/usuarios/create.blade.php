@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-indigo-50 flex items-center justify-center p-4">
        <div class="w-full max-w-2xl bg-white rounded-[1.5rem] shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-3xl">
            <!-- Encabezado con efecto vidrio -->
            <div class="relative bg-gradient-to-r from-indigo-700 to-purple-700 px-10 pt-8 pb-12">
                <div class="absolute inset-0 bg-noise opacity-10"></div>
                <div class="relative flex flex-col items-center space-y-4 text-center">
                    <div class="p-3 bg-white/10 rounded-xl backdrop-blur-sm">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white tracking-tight">Crear Nuevo Usuario</h1>
                        <p class="mt-1 text-indigo-100/90 font-light">Registro de cuentas para acceso al sistema</p>
                    </div>
                </div>
            </div>

            <form action="{{ url('/admin/usuarios/create') }}" method="POST" class="px-10 py-8 space-y-8">
                @csrf

                <!-- Campo de nombre de usuario -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Nombre de Usuario</label>
                    <div class="relative group">
                        <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm" type="text" name="name" value="{{ old('name') }}" placeholder="Ej: juan_perez" required>
                        @error('name')
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        @enderror
                    </div>
                    @error('name')
                    <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                        <span>{{ $message }}</span>
                    </p>
                    @enderror
                </div>

                <!-- Campo de correo electrónico -->
                <div class="space-y-1">
                    <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Correo Electrónico</label>
                    <div class="relative group">
                        <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm" type="email" name="email" value="{{ old('email') }}" placeholder="Ej: contacto@empresa.com" required>
                        @error('email')
                        <div class="absolute right-4 top-1/2 -translate-y-1/2 flex items-center space-x-2">
                            <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        @enderror
                    </div>
                    @error('email')
                    <p class="text-sm text-red-600/90 mt-1 ml-1 flex items-center space-x-2">
                        <span>{{ $message }}</span>
                    </p>
                    @enderror
                </div>

                <!-- Campos de contraseña -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Contraseña</label>
                        <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm" type="password" name="password" placeholder="Mínimo 8 caracteres" required>
                    </div>

                    <div class="space-y-1">
                        <label class="block text-sm font-medium text-gray-700/90 mb-2 ml-1">Confirmar Contraseña</label>
                        <input class="w-full px-5 py-3.5 border-0 bg-gray-50/70 rounded-xl ring-2 ring-gray-200/60 focus:ring-4 focus:ring-indigo-400/30 focus:bg-white placeholder-gray-400/60 transition-all duration-200 shadow-sm" type="password" name="password_confirmation" placeholder="Repite la contraseña" required>
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end space-x-3 mt-10">
                    <a href="{{ url('admin/usuarios') }}" class="px-6 py-3.5 border border-gray-300/80 text-gray-700/90 rounded-xl hover:bg-gray-50/50 transition-all duration-200 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        <span>Cancelar</span>
                    </a>
                    <button type="submit" class="px-8 py-3.5 bg-gradient-to-br from-indigo-600 to-purple-600 text-white/95 rounded-xl hover:shadow-lg transition-all duration-200 flex items-center space-x-2 group">
                        <svg class="w-5 h-5 text-white/80 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span>Registrar Usuario</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
