@extends('layouts.admin')

@section('content')
    <div class="flex flex-col items-center justify-start py-12">
        <div class="max-w-6xl w-full px-4 sm:px-6 lg:px-8">
            <!--
            ========================================
            SECCIÓN: ENCABEZADO DEL DASHBOARD
            Contiene el título principal y la descripción del panel
            ========================================
            -->
            <div class="text-center mb-12">
                <!-- Título con efecto de gradiente mejorado -->
                <div class="text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500 dark:from-blue-300 dark:via-indigo-300 dark:to-purple-300">
                    Dashboard
                </div>
                <!-- Descripción del panel con mejor tipografía -->
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                    Bienvenido al panel de administración. Aquí encontrarás estadísticas clave del sistema.
                </p>
                <!-- Línea decorativa con animación sutil -->
                <div class="mt-4 h-1.5 w-32 bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
            </div>

            <!--
            ========================================
            SECCIÓN: TARJETAS DE ESTADÍSTICAS
            Muestra contadores de diferentes entidades del sistema
            ========================================
            -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- TARJETA: TOTAL USUARIOS -->
                @can('admin.usuarios.index')
                    <div class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                        <!-- Fondo decorativo con patrones sutiles -->
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-50/40 to-white dark:from-blue-900/30 dark:to-gray-800/30"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-blue-100 dark:bg-blue-800/30 rounded-full opacity-40"></div>

                        <a href="{{ url('admin/usuarios') }}" class="block p-6 relative z-10">
                            <div class="flex flex-col items-center">
                                <!-- Icono original en contenedor mejorado -->
                                <div class="w-24 h-24 bg-gradient-to-br from-blue-400 to-indigo-500 dark:from-blue-500 dark:to-indigo-600 rounded-full flex items-center justify-center shadow-lg mb-5 transform transition-all duration-300 hover:scale-110">
                                    <img src="https://cdn-icons-png.flaticon.com/512/17948/17948663.png" alt="Usuarios" class="h-14 w-14">
                                </div>

                                <!-- Título con tipografía mejorada -->
                                <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-wide">Total Usuarios</h2>

                                <!-- Contador con efecto de destaque -->
                                <div class="relative mt-3 mb-3">
                                    <div class="absolute inset-0 bg-blue-100 dark:bg-blue-900/50 blur-md rounded-full transform scale-110"></div>
                                    <p class="relative z-10 text-5xl font-black text-blue-600 dark:text-blue-300 counter" data-target="{{ $total_usuarios }}">0</p>
                                </div>

                                <!-- Línea divisoria decorativa -->
                                <div class="w-16 h-1 bg-gradient-to-r from-blue-300 to-indigo-400 dark:from-blue-400 dark:to-indigo-500 rounded-full my-3"></div>

                                <!-- Frase inspiradora mejorada -->
                                <div class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300 italic">
                                    "Conectando a todos los usuarios."
                                </div>

                                <!-- Botón sutil para indicar acción -->
                                <div class="mt-4 px-4 py-1.5 rounded-full bg-blue-50 dark:bg-blue-900/30 text-xs font-medium text-blue-600 dark:text-blue-300 border border-blue-200 dark:border-blue-800 hover:bg-blue-100 dark:hover:bg-blue-800/50 transition-colors duration-300">
                                    Ver detalles
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan

                <!-- TARJETA: TOTAL ENFERMERAS -->
                @can('admin.enfermeras.index')
                    <div class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                        <!-- Fondo decorativo con patrones sutiles -->
                        <div class="absolute inset-0 bg-gradient-to-br from-green-50/40 to-white dark:from-green-900/30 dark:to-gray-800/30"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-green-100 dark:bg-green-800/30 rounded-full opacity-40"></div>

                        <a href="{{ url('admin/enfermeras') }}" class="block p-6 relative z-10">
                            <div class="flex flex-col items-center">
                                <!-- Icono original en contenedor mejorado -->
                                <div class="w-24 h-24 bg-gradient-to-br from-green-400 to-teal-500 dark:from-green-500 dark:to-teal-600 rounded-full flex items-center justify-center shadow-lg mb-5 transform transition-all duration-300 hover:scale-110">
                                    <img src="https://cdn-icons-png.flaticon.com/512/3621/3621358.png" alt="Enfermeras" class="h-14 w-14">
                                </div>

                                <!-- Título con tipografía mejorada -->
                                <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-wide">Total Enfermeras</h2>

                                <!-- Contador con efecto de destaque -->
                                <div class="relative mt-3 mb-3">
                                    <div class="absolute inset-0 bg-green-100 dark:bg-green-900/50 blur-md rounded-full transform scale-110"></div>
                                    <p class="relative z-10 text-5xl font-black text-green-600 dark:text-green-300 counter" data-target="{{ $total_enfermeras }}">0</p>
                                </div>

                                <!-- Línea divisoria decorativa -->
                                <div class="w-16 h-1 bg-gradient-to-r from-green-300 to-teal-400 dark:from-green-400 dark:to-teal-500 rounded-full my-3"></div>

                                <!-- Frase inspiradora mejorada -->
                                <div class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300 italic">
                                    "Cuidando a quienes más lo necesitan."
                                </div>

                                <!-- Botón sutil para indicar acción -->
                                <div class="mt-4 px-4 py-1.5 rounded-full bg-green-50 dark:bg-green-900/30 text-xs font-medium text-green-600 dark:text-green-300 border border-green-200 dark:border-green-800 hover:bg-green-100 dark:hover:bg-green-800/50 transition-colors duration-300">
                                    Ver detalles
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan

                <!-- TARJETA: TOTAL PACIENTES -->
                @can('admin.pacientes.index')
                    <div class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                        <!-- Fondo decorativo con patrones sutiles -->
                        <div class="absolute inset-0 bg-gradient-to-br from-yellow-50/40 to-white dark:from-yellow-900/30 dark:to-gray-800/30"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-yellow-100 dark:bg-yellow-800/30 rounded-full opacity-40"></div>

                        <a href="{{ url('admin/pacientes') }}" class="block p-6 relative z-10">
                            <div class="flex flex-col items-center">
                                <!-- Icono original en contenedor mejorado -->
                                <div class="w-24 h-24 bg-gradient-to-br from-yellow-400 to-amber-500 dark:from-yellow-500 dark:to-amber-600 rounded-full flex items-center justify-center shadow-lg mb-5 transform transition-all duration-300 hover:scale-110">
                                    <img src="https://cdn-icons-png.flaticon.com/512/789/789479.png" alt="Pacientes" class="h-14 w-14">
                                </div>

                                <!-- Título con tipografía mejorada -->
                                <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-wide">Total Pacientes</h2>

                                <!-- Contador con efecto de destaque -->
                                <div class="relative mt-3 mb-3">
                                    <div class="absolute inset-0 bg-yellow-100 dark:bg-yellow-900/50 blur-md rounded-full transform scale-110"></div>
                                    <p class="relative z-10 text-5xl font-black text-amber-600 dark:text-amber-300 counter" data-target="{{ $total_pacientes }}">0</p>
                                </div>

                                <!-- Línea divisoria decorativa -->
                                <div class="w-16 h-1 bg-gradient-to-r from-yellow-300 to-amber-400 dark:from-yellow-400 dark:to-amber-500 rounded-full my-3"></div>

                                <!-- Frase inspiradora mejorada -->
                                <div class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300 italic">
                                    "Siempre el camino a la salud."
                                </div>

                                <!-- Botón sutil para indicar acción -->
                                <div class="mt-4 px-4 py-1.5 rounded-full bg-yellow-50 dark:bg-yellow-900/30 text-xs font-medium text-amber-600 dark:text-amber-300 border border-yellow-200 dark:border-yellow-800 hover:bg-yellow-100 dark:hover:bg-yellow-800/50 transition-colors duration-300">
                                    Ver detalles
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan

                <!-- TARJETA: TOTAL CONSULTORIOS -->
                @can('admin.consultorios.index')
                    <div class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                        <!-- Fondo decorativo con patrones sutiles -->
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-50/40 to-white dark:from-purple-900/30 dark:to-gray-800/30"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-purple-100 dark:bg-purple-800/30 rounded-full opacity-40"></div>

                        <a href="{{ url('admin/consultorios') }}" class="block p-6 relative z-10">
                            <div class="flex flex-col items-center">
                                <!-- Icono original en contenedor mejorado -->
                                <div class="w-24 h-24 bg-gradient-to-br from-purple-400 to-fuchsia-500 dark:from-purple-500 dark:to-fuchsia-600 rounded-full flex items-center justify-center shadow-lg mb-5 transform transition-all duration-300 hover:scale-110">
                                    <img src="https://cdn-icons-png.flaticon.com/512/17958/17958385.png" alt="Consultorios" class="h-14 w-14">
                                </div>

                                <!-- Título con tipografía mejorada -->
                                <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-wide">Total Consultorios</h2>

                                <!-- Contador con efecto de destaque -->
                                <div class="relative mt-3 mb-3">
                                    <div class="absolute inset-0 bg-purple-100 dark:bg-purple-900/50 blur-md rounded-full transform scale-110"></div>
                                    <p class="relative z-10 text-5xl font-black text-purple-600 dark:text-purple-300 counter" data-target="{{ $total_consultorios }}">0</p>
                                </div>

                                <!-- Línea divisoria decorativa -->
                                <div class="w-16 h-1 bg-gradient-to-r from-purple-300 to-fuchsia-400 dark:from-purple-400 dark:to-fuchsia-500 rounded-full my-3"></div>

                                <!-- Frase inspiradora mejorada -->
                                <div class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300 italic">
                                    "Espacios diseñados para tu bienestar."
                                </div>

                                <!-- Botón sutil para indicar acción -->
                                <div class="mt-4 px-4 py-1.5 rounded-full bg-purple-50 dark:bg-purple-900/30 text-xs font-medium text-purple-600 dark:text-purple-300 border border-purple-200 dark:border-purple-800 hover:bg-purple-100 dark:hover:bg-purple-800/50 transition-colors duration-300">
                                    Ver detalles
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan

                <!-- TARJETA: TOTAL DOCTORES -->
                @can('admin.doctores.index')
                    <div class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                        <!-- Fondo decorativo con patrones sutiles -->
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-50/40 to-white dark:from-indigo-900/30 dark:to-gray-800/30"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-indigo-100 dark:bg-indigo-800/30 rounded-full opacity-40"></div>

                        <a href="{{ url('admin/doctores') }}" class="block p-6 relative z-10">
                            <div class="flex flex-col items-center">
                                <!-- Icono original en contenedor mejorado -->
                                <div class="w-24 h-24 bg-gradient-to-br from-indigo-400 to-violet-500 dark:from-indigo-500 dark:to-violet-600 rounded-full flex items-center justify-center shadow-lg mb-5 transform transition-all duration-300 hover:scale-110">
                                    <img src="https://cdn-icons-png.flaticon.com/512/4807/4807695.png" alt="Doctores" class="h-14 w-14">
                                </div>

                                <!-- Título con tipografía mejorada -->
                                <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-wide">Total Doctores</h2>

                                <!-- Contador con efecto de destaque -->
                                <div class="relative mt-3 mb-3">
                                    <div class="absolute inset-0 bg-indigo-100 dark:bg-indigo-900/50 blur-md rounded-full transform scale-110"></div>
                                    <p class="relative z-10 text-5xl font-black text-indigo-600 dark:text-indigo-300 counter" data-target="{{ $total_doctores }}">0</p>
                                </div>

                                <!-- Línea divisoria decorativa -->
                                <div class="w-16 h-1 bg-gradient-to-r from-indigo-300 to-violet-400 dark:from-indigo-400 dark:to-violet-500 rounded-full my-3"></div>

                                <!-- Frase inspiradora mejorada -->
                                <div class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300 italic">
                                    "Expertos comprometidos con tu salud."
                                </div>

                                <!-- Botón sutil para indicar acción -->
                                <div class="mt-4 px-4 py-1.5 rounded-full bg-indigo-50 dark:bg-indigo-900/30 text-xs font-medium text-indigo-600 dark:text-indigo-300 border border-indigo-200 dark:border-indigo-800 hover:bg-indigo-100 dark:hover:bg-indigo-800/50 transition-colors duration-300">
                                    Ver detalles
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan

                <!-- TARJETA: TOTAL HORARIOS -->
                @can('admin.horarios.index')
                    <div class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                        <!-- Fondo decorativo con patrones sutiles -->
                        <div class="absolute inset-0 bg-gradient-to-br from-cyan-50/40 to-white dark:from-cyan-900/30 dark:to-gray-800/30"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-cyan-100 dark:bg-cyan-800/30 rounded-full opacity-40"></div>

                        <a href="{{ url('admin/horarios') }}" class="block p-6 relative z-10">
                            <div class="flex flex-col items-center">
                                <!-- Icono original en contenedor mejorado -->
                                <div class="w-24 h-24 bg-gradient-to-br from-cyan-400 to-sky-500 dark:from-cyan-500 dark:to-sky-600 rounded-full flex items-center justify-center shadow-lg mb-5 transform transition-all duration-300 hover:scale-110">
                                    <img src="https://cdn-icons-png.flaticon.com/512/13717/13717782.png" alt="Horarios" class="h-14 w-14">
                                </div>

                                <!-- Título con tipografía mejorada -->
                                <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-wide">Total Horarios</h2>

                                <!-- Contador con efecto de destaque -->
                                <div class="relative mt-3 mb-3">
                                    <div class="absolute inset-0 bg-cyan-100 dark:bg-cyan-900/50 blur-md rounded-full transform scale-110"></div>
                                    <p class="relative z-10 text-5xl font-black text-cyan-600 dark:text-cyan-300 counter" data-target="{{ $total_horarios }}">0</p>
                                </div>

                                <!-- Línea divisoria decorativa -->
                                <div class="w-16 h-1 bg-gradient-to-r from-cyan-300 to-sky-400 dark:from-cyan-400 dark:to-sky-500 rounded-full my-3"></div>

                                <!-- Frase inspiradora mejorada -->
                                <div class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300 italic">
                                    "Organizando el tiempo para ti."
                                </div>

                                <!-- Botón sutil para indicar acción -->
                                <div class="mt-4 px-4 py-1.5 rounded-full bg-cyan-50 dark:bg-cyan-900/30 text-xs font-medium text-cyan-600 dark:text-cyan-300 border border-cyan-200 dark:border-cyan-800 hover:bg-cyan-100 dark:hover:bg-cyan-800/50 transition-colors duration-300">
                                    Ver detalles
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan

                <!-- TARJETA: TOTAL RESERVAS -->
                @can('admin.horarios.index')
                    <div class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                        <!-- Fondo decorativo con patrones sutiles -->
                        <div class="absolute inset-0 bg-gradient-to-br from-emerald-50/40 to-white dark:from-emerald-900/30 dark:to-gray-800/30"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-emerald-100 dark:bg-emerald-800/30 rounded-full opacity-40"></div>

                        <a href="" class="block p-6 relative z-10">
                            <div class="flex flex-col items-center">
                                <!-- Icono original en contenedor mejorado -->
                                <div class="w-24 h-24 bg-gradient-to-br from-emerald-400 to-teal-500 dark:from-emerald-500 dark:to-teal-600 rounded-full flex items-center justify-center shadow-lg mb-5 transform transition-all duration-300 hover:scale-110">
                                    <img src="   https://cdn-icons-png.flaticon.com/512/3147/3147258.png " width="50" height="50" alt="" title="" class="img-small">
                                </div>

                                <!-- Título con tipografía mejorada -->
                                <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-wide">Total Reservas</h2>

                                <!-- Contador con efecto de destaque -->
                                <div class="relative mt-3 mb-3">
                                    <div class="absolute inset-0 bg-emerald-100 dark:bg-emerald-900/50 blur-md rounded-full transform scale-110"></div>
                                    <p class="relative z-10 text-5xl font-black text-emerald-600 dark:text-emerald-300 counter" data-target="{{ $total_eventos }}">0</p>
                                </div>

                                <!-- Línea divisoria decorativa -->
                                <div class="w-16 h-1 bg-gradient-to-r from-emerald-300 to-teal-400 dark:from-emerald-400 dark:to-teal-500 rounded-full my-3"></div>

                                <!-- Frase inspiradora mejorada -->
                                <div class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300 italic">
                                    "Organizando el tiempo de manera eficiente"
                                </div>

                                <!-- Botón sutil para indicar acción -->
                                <div class="mt-4 px-4 py-1.5 rounded-full bg-emerald-50 dark:bg-emerald-900/30 text-xs font-medium text-emerald-600 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800 hover:bg-emerald-100 dark:hover:bg-emerald-800/50 transition-colors duration-300">
                                    Ver detalles
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan

                <!-- TARJETA: TOTAL Configuraciones -->
                @can('admin.horarios.index')
                    <div class="relative bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                        <!-- Fondo decorativo con patrones sutiles -->
                        <div class="absolute inset-0 bg-gradient-to-br from-rose-50/40 to-white dark:from-rose-900/30 dark:to-gray-800/30"></div>
                        <div class="absolute top-0 right-0 w-32 h-32 -mt-8 -mr-8 bg-amber-100 dark:bg-amber-800/30 rounded-full opacity-40"></div>

                        <a href="{{ url('admin/configuraciones') }}" class="block p-6 relative z-10">
                            <div class="flex flex-col items-center">
                                <!-- Icono original en contenedor mejorado -->
                                <div class="w-24 h-24 bg-gradient-to-br from-amber-400 to-rose-500 dark:from-amber-500 dark:to-rose-600 rounded-full flex items-center justify-center shadow-lg mb-5 transform transition-all duration-300 hover:scale-110">
                                    <svg class="w-50 h-50 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>

                                <!-- Título con tipografía mejorada -->
                                <h2 class="text-2xl font-bold text-gray-800 dark:text-white tracking-wide">Total Configuraciones</h2>

                                <!-- Contador con efecto de destaque -->
                                <div class="relative mt-3 mb-3">
                                    <div class="absolute inset-0 bg-rose-100 dark:bg-rose-900/50 blur-md rounded-full transform scale-110"></div>
                                    <p class="relative z-10 text-5xl font-black text-rose-600 dark:text-rose-300 counter" data-target="{{ $total_configuraciones }}">0</p>
                                </div>

                                <!-- Línea divisoria decorativa -->
                                <div class="w-16 h-1 bg-gradient-to-r from-amber-300 to-rose-400 dark:from-amber-400 dark:to-rose-500 rounded-full my-3"></div>

                                <!-- Frase inspiradora mejorada -->
                                <div class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300 italic">
                                    "Cada perfil cuenta una historia"
                                </div>

                                <!-- Botón sutil para indicar acción -->
                                <div class="mt-4 px-4 py-1.5 rounded-full bg-rose-50 dark:bg-rose-900/30 text-xs font-medium text-rose-600 dark:text-rose-300 border border-rose-200 dark:border-rose-800 hover:bg-rose-100 dark:hover:bg-rose-800/50 transition-colors duration-300">
                                    Ver detalles
                                </div>
                            </div>
                        </a>
                    </div>
                @endcan
            </div>



            @can('cargar_datos_consultorios')
                <!--
            ========================================
            SECCIÓN: CALENDARIO DE DOCTORES
            Permite visualizar los horarios por consultorio
            ========================================
            -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100/60 transition-all duration-300 hover:shadow-xl mt-6">
                    <div class="p-6">
                        <!-- Encabezado de sección con diseño mejorado -->
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                            <div class="flex items-center gap-4">
                                <!-- Ícono decorativo con gradiente -->
                                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 p-3 rounded-lg shadow-md transform transition-all duration-300 hover:scale-105 text-white">
                                    <img src="https://cdn-icons-png.freepik.com/512/3652/3652191.png" alt="Calendario" class="w-7 h-7">
                                </div>
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-800">Calendario de Doctores</h2>
                                    <p class="text-sm text-gray-500 mt-1">Visualización semanal de horarios médicos</p>
                                </div>
                            </div>

                            <!-- Badge de estado -->
                            <div class="hidden sm:flex items-center gap-2 bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-medium">
                                <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                Actualizado
                            </div>
                        </div>

                        <!-- Selector de consultorio mejorado -->
                        <div class="mb-6">
                            <label for="consultorio_select" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                                Seleccione un consultorio:
                            </label>
                            <div class="relative">
                                <select
                                    name="consultorio_id"
                                    id="consultorio_select"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 appearance-none transition-colors duration-200"
                                >
                                    <option value="">Seleccione un consultorio</option>
                                    @foreach($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}</option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-1.5 text-xs text-gray-500 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Los horarios se actualizarán automáticamente al seleccionar
                            </p>
                        </div>

                        <!-- Indicador de carga mejorado -->
                        <div id="loading_indicator" class="hidden">
                            <div class="flex justify-center items-center py-6">
                                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-blue-500"></div>
                                <span class="ml-3 text-sm text-gray-600">Cargando información...</span>
                            </div>
                        </div>

                        <!-- Contenedor donde se cargarán los datos del consultorio con diseño mejorado -->
                        <div id="consultorio_info" class="mt-4 border-t border-gray-100 pt-5">
                            <!-- Estado inicial -->
                            <div class="py-8 flex flex-col items-center justify-center text-center">
                                <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-lg font-medium text-gray-700 mb-1">Sin datos para mostrar</h3>
                                <p class="text-gray-500 max-w-sm">Seleccione un consultorio para visualizar el calendario de horarios médicos</p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- jQuery para la funcionalidad AJAX -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        // Evento que se dispara cuando se cambia el consultorio seleccionado
                        $('#consultorio_select').on('change', function() {
                            const consultorioId = $(this).val();

                            // Solo continuar si se ha seleccionado un consultorio
                            if (consultorioId) {
                                // Mostrar indicador de carga y ocultar el contenido actual
                                $('#consultorio_info').fadeOut(300, function() {
                                    $('#loading_indicator').removeClass('hidden');

                                    // Construir URL para la petición AJAX
                                    let url = "{{ route('cargar_datos_consultorios', ':id') }}";
                                    url = url.replace(':id', consultorioId);

                                    // Realizar la petición AJAX para obtener los datos
                                    $.ajax({
                                        url: url,
                                        type: 'GET',
                                        success: function(data) {
                                            // Ocultar indicador de carga después de un breve retraso
                                            setTimeout(function() {
                                                $('#loading_indicator').addClass('hidden');

                                                // Mostrar los datos con una animación de fade
                                                $('#consultorio_info').html(data).fadeIn(400);
                                            }, 400); // Pequeño retraso para mejor experiencia visual
                                        },
                                        error: function(jqXHR, textStatus, errorThrown) {
                                            // Ocultar indicador de carga después de un breve retraso
                                            setTimeout(function() {
                                                $('#loading_indicator').addClass('hidden');

                                                // Mostrar mensaje de error estilizado
                                                $('#consultorio_info').html(`
                                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                            </div>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-red-800">Error al cargar los datos</p>
                                                <p class="text-sm text-red-700 mt-1">
                                                    No se pudo obtener la información del consultorio. Por favor, inténtelo de nuevo.
                                                </p>
                                                <div class="mt-3">
                                                    <button type="button" onclick="$('#consultorio_select').trigger('change')" class="text-sm text-red-700 font-medium hover:text-red-600 flex items-center">
                                                        <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                        </svg>
                                                        Reintentar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `).fadeIn(400);
                                            }, 400);

                                            console.error('Error al obtener los datos del consultorio:', textStatus, errorThrown);
                                        }
                                    });
                                });
                            } else {
                                // Si no hay consultorio seleccionado, mostrar el estado inicial
                                $('#consultorio_info').fadeOut(300, function() {
                                    $(this).html(`
                        <div class="py-8 flex flex-col items-center justify-center text-center">
                            <div class="w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-700 mb-1">Sin datos para mostrar</h3>
                            <p class="text-gray-500 max-w-sm">Seleccione un consultorio para visualizar el calendario de horarios médicos</p>
                        </div>
                    `).fadeIn(400);
                                });
                            }
                        });
                    });
                </script>
                <br>

                <!--
 ========================================
 SECCIÓN: AGENDA DE CITAS (REDISEÑO FINAL)
 Calendario completo para gestión de citas
 ========================================
 -->
                <div class="mt-10">
                    <!-- Contenedor principal con diseño moderno pero sin efectos de escala -->
                    <div class="relative bg-gradient-to-br from-white to-slate-50 dark:from-gray-800 dark:to-gray-900 rounded-3xl shadow-xl overflow-hidden border border-slate-100/60 dark:border-slate-700/40">

                        <!-- Elementos decorativos de fondo (sutiles, no borrosos) -->
                        <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-blue-400/5 to-purple-500/5 rounded-full transform translate-x-1/3 -translate-y-1/3 dark:from-blue-500/10 dark:to-purple-600/10"></div>
                        <div class="absolute bottom-0 left-0 w-96 h-96 bg-gradient-to-tr from-cyan-400/5 to-teal-500/5 rounded-full transform -translate-x-1/3 translate-y-1/3 dark:from-cyan-500/10 dark:to-teal-600/10"></div>

                        <!-- Encabezado superior optimizado -->
                        <div class="relative">
                            <!-- Barra de estado y acciones -->
                            <div class="relative flex justify-between items-center px-6 py-3 bg-gradient-to-r from-slate-50/80 to-white/80 dark:from-gray-800/80 dark:to-gray-900/80 border-b border-slate-200/50 dark:border-slate-700/50">
                                <div class="flex items-center space-x-2">
                    <span class="flex h-3 w-3 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                    </span>
                                    <span class="text-xs font-medium text-slate-500 dark:text-slate-400">Sistema activo</span>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <button class="p-1.5 rounded-full bg-white/80 dark:bg-gray-700/80 shadow-sm border border-slate-200/50 dark:border-slate-600/50 text-slate-400 hover:text-blue-500 dark:text-slate-400 dark:hover:text-blue-400 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Título principal con diseño asimétrico -->
                            <div class="relative px-6 pt-10 pb-10">
                                <!-- Diseño moderno del título principal sin métricas -->
                                <div class="relative z-10 flex flex-col md:flex-row justify-between items-start gap-6">
                                    <div class="flex-1">
                                        <!-- Insignia de actualización flotante -->
                                        <div class="inline-flex items-center px-3 py-1 mb-4 text-xs font-semibold text-blue-700 dark:text-blue-300 bg-blue-50 dark:bg-blue-900/30 border border-blue-100 dark:border-blue-800 rounded-full shadow-sm">
                                            <svg class="w-3.5 h-3.5 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                            </svg>
                                            Actualizado hace {{ random_int(1, 5) }} min
                                        </div>

                                        <!-- Título principal con efecto de gradiente -->
                                        <h2 class="text-4xl font-black tracking-tight bg-gradient-to-br from-blue-700 via-indigo-700 to-purple-700 dark:from-blue-400 dark:via-indigo-400 dark:to-purple-400 bg-clip-text text-transparent">
                                            Agenda de Citas
                                        </h2>
                                        <p class="mt-2 text-slate-500 dark:text-slate-400 max-w-2xl">
                                            Sistema inteligente de organización y gestión de citas médicas.
                                        </p>
                                    </div>

                                    <!-- Ilustración decorativa con icono más pequeño -->
                                    <div class="hidden lg:block relative -mr-12 -mt-10">
                                        <div class="w-56 h-56 overflow-hidden relative">
                                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-full opacity-50"></div>
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <div class="w-32 h-32 bg-white dark:bg-gray-800 rounded-full shadow-xl flex items-center justify-center">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/1048/1048953.png" width="50" height="50" alt="Calendario" class="opacity-90">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Layout de dos columnas optimizado: controles y calendario -->
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 px-6 pb-8">
                            <!-- COLUMNA 1: CONTROLES INTEGRADOS CON DISEÑO OPTIMIZADO -->
                            <div class="md:col-span-1 space-y-4">
                                <!-- Panel de filtro principal -->
                                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 p-5 relative overflow-hidden">
                                    <!-- Título del panel con icono -->
                                    <div class="flex items-center space-x-3 mb-5">
                                        <div class="flex items-center justify-center w-9 h-9 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white shadow-md shadow-blue-500/30">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                                            </svg>
                                        </div>
                                        <h3 class="font-semibold text-lg text-slate-800 dark:text-white">Filtrar citas</h3>
                                    </div>

                                    <!-- Selector de doctor con diseño premium -->
                                    <div class="mb-3 relative z-10">
                                        <label for="doctor_select" class="block text-sm font-medium text-slate-600 dark:text-slate-400 mb-2 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1.5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            Seleccione un Doctor
                                        </label>
                                        <div class="relative">
                                            <select name="doctor_id" id="doctor_select" class="form-select appearance-none block w-full px-4 py-3 pr-10 text-base text-slate-700 dark:text-slate-200 bg-slate-50 dark:bg-slate-800/60 bg-clip-padding bg-no-repeat border border-slate-200 dark:border-slate-700 rounded-xl transition-all focus:border-blue-500 dark:focus:border-blue-500 focus:ring-2 focus:ring-blue-200 dark:focus:ring-blue-800/20 focus:outline-none hover:border-blue-400 dark:hover:border-blue-700">
                                                <option value="">Todos los Doctores</option>
                                                @foreach($doctores as $doctor)
                                                    <option value="{{ $doctor->id }}" class="py-2">
                                                        {{ $doctor->nombres }} {{ $doctor->apellidos }}
                                                        @if(count($doctor->specialties) > 0)
                                                            - {{ $doctor->specialties->pluck('nombre')->join(', ') }}
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-slate-500 dark:text-slate-400">
                                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Panel de acciones con botones modernos -->
                                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg shadow-blue-500/20 dark:shadow-blue-800/20 p-5 relative overflow-hidden">
                                    <!-- Elementos decorativos -->
                                    <div class="absolute inset-0 bg-grid-slate-50/[0.05] bg-[length:20px_20px]"></div>
                                    <div class="absolute -right-20 -top-20 w-64 h-64 bg-white/10 rounded-full"></div>

                                    <!-- Título del panel -->
                                    <h3 class="font-semibold text-lg text-white mb-5 drop-shadow-sm relative z-10">Acciones rápidas</h3>

                                    <!-- Botón principal con efecto neomórfico -->
                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="relative z-10 w-full flex items-center justify-center space-x-3 py-3.5 px-4 mb-3.5 bg-white/10 hover:bg-white/15 backdrop-blur-sm border border-white/20 rounded-xl text-white font-semibold transition-all duration-200 hover:shadow-lg hover:shadow-blue-600/20 group">
                        <span class="p-1.5 bg-white rounded-lg shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </span>
                                        <span class="text-sm tracking-wide">Nueva Cita Médica</span>
                                    </button>

                                    <!-- Botón secundario -->
                                    <a href="{{url('/admin/ver_reservas',Auth::user()->id)}}" class="relative z-10 w-full flex items-center justify-center space-x-3 py-3.5 px-4 bg-white/10 hover:bg-white/15 backdrop-blur-sm border border-white/20 rounded-xl text-white font-semibold transition-all duration-200 hover:shadow-lg hover:shadow-blue-600/20 group">
                        <span class="p-1.5 bg-white rounded-lg shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </span>
                                        <span class="text-sm tracking-wide">Historial de citas</span>
                                    </a>
                                </div>

                                <!-- Panel informativo con diseño minimalista -->
                                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-2xl border border-blue-100 dark:border-blue-800/40 p-5 relative overflow-hidden">
                                    <!-- Icono decorativo -->
                                    <div class="absolute right-3 bottom-3 opacity-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-blue-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>

                                    <!-- Contenido informativo -->
                                    <h4 class="flex items-center text-blue-800 dark:text-blue-300 font-semibold mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        Información útil
                                    </h4>

                                    <ul class="space-y-2.5 text-sm text-blue-700 dark:text-blue-300 relative z-10">
                                        <li class="flex items-start">
                                            <svg class="w-4 h-4 mr-1.5 mt-0.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Haga clic en cualquier día para ver el detalle de las citas programadas</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="w-4 h-4 mr-1.5 mt-0.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Use el botón "Nueva Cita" para programar una nueva consulta médica</span>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="w-4 h-4 mr-1.5 mt-0.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span>Filtre por doctor para una mejor visualización</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Contenedor para mostrar información del doctor seleccionado -->
                                <div id="doctor_info" class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 p-5 hidden">
                                    <!-- El contenido se cargará dinámicamente con JavaScript -->
                                </div>
                            </div>

                            <!-- COLUMNA 2: CALENDARIO FULLCALENDAR CON DISEÑO FUTURISTA -->
                            <div class="md:col-span-3">
                                <!-- Contenedor principal del calendario sin efectos de scale o blur -->
                                <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-slate-100 dark:border-slate-700 p-5 relative transition-all duration-300 overflow-hidden">
                                    <!-- Elementos decorativos en las esquinas (sutiles) -->
                                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-500/5 to-purple-500/5 dark:from-blue-500/10 dark:to-purple-500/10 rounded-full transform translate-x-1/3 -translate-y-1/3"></div>
                                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-emerald-500/5 to-teal-500/5 dark:from-emerald-500/10 dark:to-teal-500/10 rounded-full transform -translate-x-1/3 translate-y-1/3"></div>

                                    <!-- Vista del calendario mejorada -->
                                    <div id="calendar" class="fc-calendar-container neo-calendar" style="height: 700px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    /* Fondo de patrones para elementos decorativos */
                    .bg-grid-slate-50 {
                        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='32' height='32' fill='none' stroke='rgb(226 232 240 / 0.8)'%3E%3Cpath d='M0 .5H31.5V32'/%3E%3C/svg%3E");
                    }

                    /* Tema futurista para FullCalendar */
                    .neo-calendar.fc {
                        --fc-border-color: rgba(226, 232, 240, 0.5);
                        --fc-event-border-color: transparent;
                        --fc-event-bg-color: #4f46e5;
                        --fc-event-text-color: #fff;
                        --fc-neutral-bg-color: #fff;
                        --fc-today-bg-color: rgba(239, 246, 255, 0.5);

                        font-family: 'Inter', 'Segoe UI', -apple-system, sans-serif;
                    }

                    .dark .neo-calendar.fc {
                        --fc-border-color: rgba(55, 65, 81, 0.5);
                        --fc-neutral-bg-color: #1f2937;
                        --fc-today-bg-color: rgba(30, 58, 138, 0.2);
                    }

                    /* Cabecera mejorada */
                    .neo-calendar .fc-header-toolbar {
                        margin-bottom: 1.5rem !important;
                    }

                    .neo-calendar .fc-toolbar-title {
                        font-size: 1.375rem !important;
                        font-weight: 700 !important;
                        color: #1e293b !important;
                        letter-spacing: -0.02em !important;
                    }

                    .dark .neo-calendar .fc-toolbar-title {
                        color: #f1f5f9 !important;
                    }

                    /* Botones estilizados */
                    .neo-calendar .fc-button-primary {
                        background-color: #f8fafc !important;
                        border-color: #e2e8f0 !important;
                        color: #475569 !important;
                        font-weight: 500 !important;
                        font-size: 0.875rem !important;
                        padding: 0.5rem 1rem !important;
                        box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05) !important;
                        border-radius: 0.75rem !important;
                        transition: all 0.2s !important;
                    }

                    .dark .neo-calendar .fc-button-primary {
                        background-color: #334155 !important;
                        border-color: #475569 !important;
                        color: #e2e8f0 !important;
                    }

                    .neo-calendar .fc-button-primary:hover {
                        background-color: #f1f5f9 !important;
                        border-color: #cbd5e1 !important;
                        color: #1e293b !important;
                    }

                    .dark .neo-calendar .fc-button-primary:hover {
                        background-color: #475569 !important;
                        border-color: #64748b !important;
                        color: #f8fafc !important;
                    }

                    .neo-calendar .fc-button-primary:not(:disabled).fc-button-active,
                    .neo-calendar .fc-button-primary:not(:disabled):active {
                        background-color: #3b82f6 !important;
                        border-color: #3b82f6 !important;
                        color: #ffffff !important;
                    }

                    .dark .neo-calendar .fc-button-primary:not(:disabled).fc-button-active,
                    .dark .neo-calendar .fc-button-primary:not(:disabled):active {
                        background-color: #3b82f6 !important;
                        border-color: #3b82f6 !important;
                    }

                    /* Días de la semana */
                    .neo-calendar .fc-col-header-cell {
                        background-color: #f8fafc !important;
                        padding: 0.75rem 0 !important;
                        border-width: 0 !important;
                    }

                    .dark .neo-calendar .fc-col-header-cell {
                        background-color: #1f2937 !important;
                    }

                    .neo-calendar .fc-col-header-cell-cushion {
                        color: #64748b !important;
                        font-weight: 600 !important;
                        font-size: 0.8rem !important;
                        text-transform: uppercase !important;
                        letter-spacing: 0.05em !important;
                        padding: 0.75rem 0 !important;
                        text-decoration: none !important;
                    }

                    .dark .neo-calendar .fc-col-header-cell-cushion {
                        color: #94a3b8 !important;
                    }

                    /* Diseño de cuadrícula y celdas de día */
                    .neo-calendar .fc-daygrid-day {
                        border: none !important;
                        cursor: pointer !important;
                    }

                    .neo-calendar .fc-daygrid-day-frame {
                        padding: 0.375rem !important;
                        min-height: 120px !important;
                        border: 1px solid var(--fc-border-color) !important;
                        margin: 2px !important;
                        border-radius: 0.75rem !important;
                        background-color: rgba(248, 250, 252, 0.4) !important;
                        transition: all 0.2s !important;
                    }

                    .dark .neo-calendar .fc-daygrid-day-frame {
                        background-color: rgba(31, 41, 55, 0.4) !important;
                    }

                    .neo-calendar .fc-daygrid-day:hover .fc-daygrid-day-frame {
                        background-color: rgba(239, 246, 255, 0.6) !important;
                        border-color: rgba(191, 219, 254, 0.7) !important;
                        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03) !important;
                    }

                    .dark .neo-calendar .fc-daygrid-day:hover .fc-daygrid-day-frame {
                        background-color: rgba(30, 58, 138, 0.2) !important;
                        border-color: rgba(59, 130, 246, 0.5) !important;
                    }

                    /* Números de día */
                    .neo-calendar .fc-daygrid-day-top {
                        justify-content: center !important;
                        padding-top: 0.25rem !important;
                    }

                    .neo-calendar .fc-daygrid-day-number {
                        margin: 0.25rem 0 0.5rem 0 !important;
                        width: 30px !important;
                        height: 30px !important;
                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        font-weight: 600 !important;
                        color: #475569 !important;
                        font-size: 0.9rem !important;
                        background-color: rgba(248, 250, 252, 0.8) !important;
                        border-radius: 0.75rem !important;
                        text-decoration: none !important;
                        transition: all 0.2s !important;
                    }

                    .dark .neo-calendar .fc-daygrid-day-number {
                        color: #e2e8f0 !important;
                        background-color: rgba(31, 41, 55, 0.8) !important;
                    }

                    .neo-calendar .fc-daygrid-day:hover .fc-daygrid-day-number {
                        background-color: white !important;
                        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) !important;
                    }

                    .dark .neo-calendar .fc-daygrid-day:hover .fc-daygrid-day-number {
                        background-color: #374151 !important;
                    }

                    /* Día actual con diseño especial */
                    .neo-calendar .fc-day-today .fc-daygrid-day-frame {
                        background-color: rgba(219, 234, 254, 0.3) !important;
                        border-color: rgba(59, 130, 246, 0.3) !important;
                    }

                    .dark .neo-calendar .fc-day-today .fc-daygrid-day-frame {
                        background-color: rgba(30, 58, 138, 0.3) !important;
                        border-color: rgba(59, 130, 246, 0.5) !important;
                    }

                    .neo-calendar .fc-day-today .fc-daygrid-day-number {
                        background: linear-gradient(to right, #3b82f6, #4f46e5) !important;
                        color: white !important;
                        box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3) !important;
                        font-weight: 700 !important;
                        position: relative !important;
                    }

                    .neo-calendar .fc-day-today .fc-daygrid-day-number::after {
                        content: "" !important;
                        position: absolute !important;
                        inset: -2px !important;
                        border-radius: 0.75rem !important;
                        background: linear-gradient(to right, #3b82f6, #4f46e5) !important;
                        opacity: 0.2 !important;
                        z-index: -1 !important;
                        animation: pulse 2s infinite !important;
                    }

                    @keyframes pulse {
                        0% {
                            transform: scale(1);
                            opacity: 0.2;
                        }
                        50% {
                            transform: scale(1.15);
                            opacity: 0.1;
                        }
                        100% {
                            transform: scale(1);
                            opacity: 0.2;
                        }
                    }

                    /* Eventos con diseño moderno */
                    .neo-calendar .fc-daygrid-event {
                        margin: 2px 4px !important;
                        padding: 0.4rem 0.6rem !important;
                        border-radius: 0.5rem !important;
                        background-color: #4f46e5 !important;
                        border-left: 3px solid #4338ca !important;
                        font-weight: 500 !important;
                        font-size: 0.7rem !important;
                        line-height: 1.2 !important;
                        box-shadow: 0 1px 2px rgba(79, 70, 229, 0.3) !important;
                        transition: all 0.2s !important;
                    }

                    .neo-calendar .fc-daygrid-event:hover {
                        transform: translateY(-1px) !important;
                        box-shadow: 0 3px 6px rgba(79, 70, 229, 0.4) !important;
                    }

                    /* Estilos para el enlace "más eventos" */
                    .neo-calendar .fc-daygrid-more-link {
                        display: block !important;
                        margin: 2px 4px !important;
                        padding: 0.3rem 0.5rem !important;
                        background-color: rgba(99, 102, 241, 0.1) !important;
                        color: #4f46e5 !important;
                        border-radius: 0.5rem !important;
                        font-size: 0.7rem !important;
                        font-weight: 600 !important;
                        text-align: center !important;
                        text-decoration: none !important;
                        transition: all 0.2s !important;
                    }

                    .dark .neo-calendar .fc-daygrid-more-link {
                        background-color: rgba(99, 102, 241, 0.2) !important;
                        color: #818cf8 !important;
                    }

                    .neo-calendar .fc-daygrid-more-link:hover {
                        background-color: rgba(99, 102, 241, 0.2) !important;
                    }

                    .dark .neo-calendar .fc-daygrid-more-link:hover {
                        background-color: rgba(99, 102, 241, 0.3) !important;
                    }

                    /* Estilos para días fuera del mes actual */
                    .neo-calendar .fc-day-other .fc-daygrid-day-frame {
                        opacity: 0.5 !important;
                        background-color: rgba(248, 250, 252, 0.3) !important;
                    }

                    .dark .neo-calendar .fc-day-other .fc-daygrid-day-frame {
                        background-color: rgba(31, 41, 55, 0.3) !important;
                    }

                    .neo-calendar .fc-day-other .fc-daygrid-day-number {
                        color: #94a3b8 !important;
                    }

                    /* Estilos para el popover de más eventos */
                    .neo-calendar .fc-popover {
                        border: none !important;
                        border-radius: 1rem !important;
                        overflow: hidden !important;
                        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
                    }

                    .neo-calendar .fc-popover-header {
                        background-color: #f8fafc !important;
                        padding: 0.75rem 1rem !important;
                        border-bottom: 1px solid #e2e8f0 !important;
                    }

                    .dark .neo-calendar .fc-popover-header {
                        background-color: #1f2937 !important;
                        border-color: #374151 !important;
                    }

                    .neo-calendar .fc-popover-title {
                        font-weight: 600 !important;
                        font-size: 0.95rem !important;
                        color: #1e293b !important;
                    }

                    .dark .neo-calendar .fc-popover-title {
                        color: #f1f5f9 !important;
                    }

                    .neo-calendar .fc-popover-close {
                        font-size: 1.25rem !important;
                        opacity: 0.5 !important;
                    }

                    .neo-calendar .fc-popover-body {
                        padding: 0.75rem !important;
                    }

                    /* Ajustes responsive */
                    @media (max-width: 768px) {
                        .neo-calendar .fc-toolbar {
                            flex-direction: column !important;
                            gap: 0.75rem !important;
                            margin-bottom: 1rem !important;
                        }

                        .neo-calendar .fc-toolbar-chunk {
                            display: flex !important;
                            justify-content: center !important;
                            width: 100% !important;
                        }

                        .neo-calendar .fc-toolbar-title {
                            font-size: 1.125rem !important;
                        }

                        .neo-calendar .fc-daygrid-day-frame {
                            min-height: 90px !important;
                            padding: 0.25rem !important;
                        }

                        .neo-calendar .fc-daygrid-day-number {
                            width: 24px !important;
                            height: 24px !important;
                            font-size: 0.8rem !important;
                            margin: 0.125rem 0 0.25rem 0 !important;
                        }

                        .neo-calendar .fc-daygrid-event {
                            padding: 0.2rem 0.4rem !important;
                            font-size: 0.65rem !important;
                        }
                    }
                </style>

                <!--
                ========================================
                MODAL: DETALLES DEL DÍA
                Muestra las citas programadas para un día específico
                ========================================
                -->
                <div id="day-details-modal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
                    <div class="relative p-6 w-full max-w-lg">
                        <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                            <!-- Encabezado del modal con gradiente -->
                            <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-5 text-white relative">
                                <h3 id="day-details-title" class="text-xl font-bold mb-1">Citas para el</h3>
                                <p id="selected-date" class="text-lg opacity-90"></p>

                                <!-- Botón de cierre (X) -->
                                <button type="button" id="close-day-details" class="absolute top-4 right-4 text-white hover:text-gray-200 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full p-1.5 focus:outline-none transition-colors duration-200">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    <span class="sr-only">Cerrar modal</span>
                                </button>
                            </div>

                            <!-- Contenido del modal (lista de citas) -->
                            <div id="day-details-content" class="p-5 max-h-96 overflow-y-auto">
                                <!-- El contenido se cargará dinámicamente con JavaScript -->
                                <div class="text-center text-gray-500 py-8">
                                    <svg class="mx-auto w-16 h-16 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p class="mt-4 text-lg">No hay citas programadas para este día.</p>
                                </div>
                            </div>

                            <!-- Pie del modal con botón de cierre -->
                            <div class="bg-gray-50 p-4 border-t border-gray-200 text-right">
                                <button id="close-details-btn" class="bg-gradient-to-r from-blue-600 to-purple-600 text-white hover:opacity-90 font-medium py-2 px-5 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-300">
                                    Cerrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--
                ========================================
                MODAL: FORMULARIO DE RESERVA MÉDICA
                Permite crear nuevas citas médicas
                ========================================
                -->
                <div id="popup-modal" tabindex="-1" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
                    <div class="relative p-6 w-full max-w-lg">
                        <div class="bg-white rounded-xl shadow-2xl dark:bg-gray-800 transform transition-all duration-300 ease-in-out hover:scale-105">
                            <!-- Botón para cerrar el modal (X) -->
                            <button type="button" class="absolute top-4 right-4 text-gray-500 hover:text-gray-900 bg-gray-100 hover:bg-gray-200 rounded-full p-2 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-white transition-colors duration-200" data-modal-hide="popup-modal">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                <span class="sr-only">Cerrar modal</span>
                            </button>

                            <!-- Formulario de reserva de cita -->
                            <form action="{{url('admin/eventos/create')}}" method="POST">
                                @csrf
                                <div class="p-6 text-center">
                                    <!-- Icono decorativo -->
                                    <div class="inline-block bg-gradient-to-br from-blue-600 to-purple-600 p-4 rounded-full shadow-lg mb-4 transform transition-all duration-300 hover:scale-110">
                                        <svg class="w-12 h-12 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <h3 class="mb-5 text-2xl font-bold text-gray-800 dark:text-gray-200">Reserva Médica</h3>

                                    <!-- Campos del formulario -->
                                    <div class="space-y-4">
                                        <!-- Selector de médico -->
                                        <div class="form-group">
                                            <label class="block text-sm font-medium text-slate-700/90 mb-2 ml-1 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                Médico responsable
                                            </label>
                                            <select name="doctor_id" id="doctor_modal_select" class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-400">
                                                @foreach($doctores as $doctor)
                                                    <option value="{{$doctor->id}}" class="py-2">
                                                        {{ $doctor->nombres }} {{ $doctor->apellidos }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Mostrar especialidades del doctor seleccionado -->
                                        <div class="form-group">
                                            <label class="block text-sm font-medium text-slate-700/90 mb-2 ml-1 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                                                </svg>
                                                Especialidad
                                            </label>
                                            <div id="especialidad-doctor" class="mt-1 p-4 bg-slate-50 rounded-lg text-gray-700 min-h-[60px] flex flex-wrap gap-2 justify-start items-center">
                                                <!-- Las especialidades se mostrarán aquí con JavaScript -->
                                                <div class="text-gray-500 italic text-center w-full">Seleccione un doctor para ver sus especialidades</div>
                                            </div>
                                        </div>

                                        <!-- Selector de fecha -->
                                        <div class="form-group">
                                            <label for="fecha" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                Fecha
                                            </label>
                                            <input type="date" id="fecha_reserva" value="<?php echo date('Y-m-d');?>" name="fecha_reserva" class="mt-1 block w-full px-4 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 hover:border-blue-400">
                                        </div>

                                        <!-- Selector de hora -->
                                        <div class="space-y-1">
                                            <label class="block text-sm font-medium text-slate-700/90 mb-2 ml-1 flex items-center">
                                                <svg class="w-5 h-5 mr-2 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Hora de inicio
                                            </label>
                                            <input type="text" name="hora_reserva" id="hora_reserva" class="w-full px-5 py-3.5 border-0 bg-slate-50/70 rounded-xl ring-2 ring-slate-200/60 focus:ring-4 focus:ring-cyan-400/30 focus:bg-white placeholder-slate-400/60 transition-all duration-200 shadow-sm font-medium hover:ring-cyan-400/60" required placeholder="Seleccione hora inicio">
                                        </div>

                                        <!-- Botones de acción -->
                                        <div class="flex justify-center space-x-4 mt-6">
                                            <!-- Botón de envío del formulario -->
                                            <button data-modal-hide="popup-modal" type="submit" class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-2.5 px-6 rounded-lg focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-800 transition-all duration-300 shadow-md hover:scale-105">
                                                Registrar Cita
                                            </button>

                                            <!-- Botón para cancelar -->
                                            <button data-modal-hide="popup-modal" type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-900 font-bold py-2.5 px-6 rounded-lg border border-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600 transition-all duration-300 shadow-md hover:scale-105">
                                                No, cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!--
                ========================================
                SCRIPTS JAVASCRIPT
                Funcionalidad del calendario y modales
                ========================================
                -->
                @endcan

            @if(Auth::check() && Auth::user()->doctor)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl mt-8 border border-gray-100">
                    <!-- Header decorativo -->
                    <div class="bg-gradient-to-r from-blue-500/90 to-indigo-600/90 h-12 w-full relative">
                        <div class="absolute -bottom-6 left-8">
                            <div class="bg-white p-3 rounded-lg shadow-lg flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 md:p-8 pt-10">
                        <!-- Encabezado de sección con diseño mejorado -->
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800 font-montserrat">Calendario de Reservas</h2>
                                <p class="text-sm text-gray-500 mt-1">Visualización de citas programadas para atención médica</p>
                            </div>

                            <!-- Filtros y fecha de actualización -->
                            <div class="flex flex-col md:flex-row md:items-center gap-3">
                    <span class="text-xs bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full font-medium flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        Actualizado: {{ now()->format('d M, Y') }}
                    </span>
                            </div>
                        </div>

                        <!-- Tarjeta contenedora de la tabla -->
                        <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
                            <!-- Contenedor de tabla con scroll horizontal en móviles -->
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                    <tr class="bg-gray-50">
                                        <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                                        <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Paciente</th>
                                        <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Fecha</th>
                                        <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Hora</th>
                                        <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Consultorio</th>
                                        <th class="px-5 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Especialidad</th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-100">
                                    @php $contador = 1; @endphp
                                    @foreach($eventos as $evento)
                                        @if(Auth::user()->doctor->id == $evento->doctor->id)
                                            <tr class="hover:bg-blue-50/30 transition-colors duration-200">
                                                <td class="px-5 py-4 whitespace-nowrap text-sm font-medium text-gray-600">{{ $contador++ }}</td>
                                                <td class="px-5 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="h-9 w-9 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-medium text-sm mr-3 shadow-sm">
                                                            {{ substr($evento->user->name, 0, 1) }}
                                                        </div>
                                                        <div>
                                                            <div class="font-medium text-sm text-gray-800">{{ $evento->user->name }}</div>
                                                            <div class="text-xs text-gray-500">Paciente</div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="bg-blue-50 rounded-lg p-1.5 mr-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                            </svg>
                                                        </div>
                                                        <span class="text-sm text-gray-700 font-medium">
                                                    {{ \Carbon\Carbon::parse($evento->start)->format('d/m/Y') }}
                                                </span>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="bg-indigo-50 rounded-lg p-1.5 mr-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                        </div>
                                                        <span class="text-sm text-gray-700 font-medium">
                                                    {{ \Carbon\Carbon::parse($evento->start)->format('h:i A') }}
                                                </span>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="bg-emerald-50 rounded-lg p-1.5 mr-3">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            </svg>
                                                        </div>
                                                        <span class="text-sm text-gray-700">{{ $evento->consultorio->ubicacion }}</span>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-4">
                                                    @if($evento->doctor && $evento->doctor->specialties->isNotEmpty())
                                                        <div class="flex flex-wrap gap-1.5">
                                                            @foreach($evento->doctor->specialties as $specialty)
                                                                <span class="inline-flex bg-gray-100 text-gray-700 text-xs font-medium px-2.5 py-1 rounded-full">
                                                            {{ $specialty->nombre }}
                                                        </span>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <span class="text-gray-400 text-xs">Sin especialidad</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach

                                    <!-- Estado vacío mejorado -->
                                    @if(count(array_filter($eventos->toArray(), function($e) { return $e['doctor_id'] == Auth::user()->doctor->id; })) == 0)
                                        <tr>
                                            <td colspan="6" class="px-6 py-12 text-center">
                                                <div class="flex flex-col items-center justify-center">
                                                    <div class="bg-blue-50 p-4 rounded-full mb-4">
                                                        <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-lg font-medium text-gray-800 mb-1">No hay citas programadas</h3>
                                                    <p class="text-sm text-gray-500 max-w-md">No tienes citas reservadas en tu agenda para los próximos días. Las nuevas reservas aparecerán aquí.</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                            <!-- Footer informativo -->
                            <div class="px-6 py-3 bg-gray-50 border-t border-gray-100 flex justify-between items-center text-xs text-gray-500">
                                <div>
                                    Mostrando todas las citas programadas
                                </div>
                                <div class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Última sincronización: {{ now()->format('h:i A') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif


            <script>
                // Script para validar fechas pasadas en el formulario de reserva
                document.addEventListener('DOMContentLoaded', function(){
                    const fechaReservaInput = document.getElementById('fecha_reserva');

                    // Evento que verifica que no se puedan seleccionar fechas pasadas
                    fechaReservaInput.addEventListener('change', function (){
                        let selectedDate = this.value; // Fecha seleccionada por el usuario
                        let today = new Date().toISOString().slice(0, 10); // Fecha actual en formato YYYY-MM-DD

                        // Si la fecha seleccionada es anterior a hoy
                        if (selectedDate < today) {
                            this.value = null; // Limpiar el campo

                            // Mostrar mensaje de error
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'No se puede reservar fechas pasadas.'
                            });
                        }
                    });
                });

                // Inicialización del selector de hora con flatpickr (plugin de calendario)
                flatpickr("#hora_reserva", {
                    enableTime: true, // Habilitar selección de hora
                    noCalendar: true, // No mostrar calendario
                    dateFormat: "h:i K", // Formato 12h con AM/PM
                    time_24hr: false, // Usar formato 12h
                    static: true, // Mantener el calendario abierto
                    placeholder: "Seleccione hora inicio",
                    theme: "light_rounded", // Tema visual
                    minuteIncrement: 60 // Intervalos de 1 hora
                });

                // Script para mostrar las especialidades del doctor seleccionado
                document.addEventListener('DOMContentLoaded', function() {
                    const doctorSelect = document.getElementById('doctor_modal_select');
                    const especialidadDoctor = document.getElementById('especialidad-doctor');

                    // Objeto con las especialidades de cada doctor (generado desde el backend)
                    const doctoresEspecialidades = {
                        @foreach($doctores as $doctor)
                        "{{ $doctor->id }}": [
                            @foreach($doctor->specialties as $specialty)
                                "{{ $specialty->nombre }}"{{ !$loop->last ? ',' : '' }}
                                @endforeach
                        ],
                        @endforeach
                    };

                    // Actualizar especialidades cuando cambia el doctor seleccionado
                    doctorSelect.addEventListener('change', function() {
                        const doctorId = this.value;
                        updateDoctorSpecialties(doctorId);
                    });

                    // Función que actualiza visualmente las especialidades
                    function updateDoctorSpecialties(doctorId) {
                        if (doctorId && doctoresEspecialidades[doctorId]) {
                            const especialidades = doctoresEspecialidades[doctorId];
                            if (especialidades.length > 0) {
                                // Generar badges para cada especialidad
                                let badgesHtml = '';
                                especialidades.forEach(especialidad => {
                                    badgesHtml += `<span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                    <svg class="w-4 h-4 mr-1 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    ${especialidad}
                </span>`;
                                });
                                especialidadDoctor.innerHTML = badgesHtml;
                            } else {
                                // Mensaje cuando el doctor no tiene especialidades
                                especialidadDoctor.innerHTML = '<div class="text-yellow-600 bg-yellow-50 p-2 rounded-lg border border-yellow-200 w-full text-center">No tiene especialidades asignadas</div>';
                            }
                        } else {
                            // Mensaje inicial/por defecto
                            especialidadDoctor.innerHTML = '<div class="text-gray-500 italic text-center w-full">Seleccione un doctor para ver sus especialidades</div>';
                        }
                    }

                    // Mostrar especialidades del doctor seleccionado por defecto al cargar
                    if (doctorSelect.value) {
                        updateDoctorSpecialties(doctorSelect.value);
                    }
                });

                // Inicialización y configuración del calendario FullCalendar
                document.addEventListener('DOMContentLoaded', function() {
                    // Array de eventos (citas) obtenidos del backend
                    let globalEvents = [
                            @foreach($eventos as $evento)
                        {
                            id: '{{$evento->id}}',
                            title: 'Cita: {{$evento->doctor->nombres ?? "Dr."}}',
                            start: '{{$evento->start}}',
                            end: '{{$evento->end}}',
                            color: '#f97316', // Naranja para todas las citas
                            // Datos adicionales para el modal de detalles
                            doctor: '{{$evento->doctor->nombres ?? ""}} {{$evento->doctor->apellidos ?? ""}}',
                            especialidad: '{{$evento->doctor->specialties->first()->nombre ?? "Sin especialidad"}}',
                            consultorio: '{{$evento->consultorio->nombre ?? ""}}',
                            ubicacion: '{{$evento->consultorio->ubicacion ?? ""}}',
                            hora: '{{date("h:i A", strtotime($evento->start))}}'
                        },
                        @endforeach
                    ];

                    // Inicializar el calendario FullCalendar
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth', // Vista de mes por defecto
                        locale: 'es', // Idioma español
                        headerToolbar: {
                            left: 'prev,next today', // Botones navegación
                            center: 'title', // Título mes/semana
                            right: 'dayGridMonth' // Vistas disponibles
                        },
                        buttonText: {
                            today: 'Hoy' // Texto para botón de hoy
                        },
                        events: [], // Inicialmente sin eventos
                        dayMaxEvents: 3, // Máximo 3 eventos visibles por día
                        eventTimeFormat: { // Formato de hora para eventos
                            hour: '2-digit',
                            minute: '2-digit',
                            omitZeroMinute: true,
                            meridiem: 'short'
                        },
                        displayEventTime: true, // Mostrar hora del evento
                        eventDisplay: 'block', // Estilo de visualización
                        dateClick: function(info) {
                            // Al hacer clic en un día
                            const doctorId = $('#doctor_select').val();
                            if (doctorId) {
                                // Si hay un doctor seleccionado, mostrar detalles del día
                                showDayDetailsModal(info.date);
                            } else {
                                // Si no hay doctor seleccionado, mostrar mensaje de aviso
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Seleccione un doctor',
                                    text: 'Por favor, seleccione un doctor para ver las citas de este día.'
                                });
                            }
                        }
                    });

                    // Renderizar el calendario
                    calendar.render();

                    // Filtrar citas por doctor seleccionado
                    $('#doctor_select').on('change', function() {
                        const doctorId = $(this).val();

                        if (doctorId) {
                            // Si hay un doctor seleccionado, cargar sus citas
                            let url = "{{ url('cargar_reserva_doctores') }}/" + doctorId;
                            url = url.replace(':id', doctorId);

                            // Mostrar indicador de carga
                            $('#calendar').prepend('<div class="calendar-loading bg-white bg-opacity-70 absolute inset-0 flex items-center justify-center"><div class="spinner-border text-blue-500" role="status"><span class="sr-only">Cargando...</span></div></div>');

                            // Petición AJAX para obtener citas del doctor
                            $.ajax({
                                url: url,
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    // Actualizar el calendario con las citas del doctor
                                    calendar.removeAllEventSources();
                                    calendar.addEventSource(data);

                                    // Actualizar eventos globales para el modal
                                    globalEvents = data;

                                    // Quitar indicador de carga
                                    $('.calendar-loading').remove();
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error('Error al obtener los datos del doctor:', textStatus, errorThrown);
                                    $('.calendar-loading').remove();

                                    // Mostrar mensaje de error
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Error al obtener los datos del doctor. Por favor, inténtelo de nuevo más tarde.'
                                    });
                                }
                            });
                        } else {
                            // Si no hay doctor seleccionado, mostrar todas las citas
                            calendar.removeAllEventSources();
                            calendar.addEventSource(globalEvents);
                        }
                    });

                    // Referencias a elementos del modal de detalles del día
                    const dayDetailsModal = document.getElementById('day-details-modal');
                    const selectedDateSpan = document.getElementById('selected-date');
                    const dayDetailsContent = document.getElementById('day-details-content');
                    const closeDayDetailsBtn = document.getElementById('close-day-details');
                    const closeDetailsBtnFooter = document.getElementById('close-details-btn');

                    // Función para mostrar el modal con las citas de un día
                    function showDayDetailsModal(date) {
                        // Formatear la fecha para mostrarla en el título (ej: "Lunes, 26 de febrero de 2025")
                        const options = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
                        const formattedDate = date.toLocaleDateString('es-ES', options);
                        const capitalizedDate = formattedDate.charAt(0).toUpperCase() + formattedDate.slice(1);
                        selectedDateSpan.textContent = capitalizedDate;

                        // Formatear fecha para comparar con los eventos (YYYY-MM-DD)
                        const compareDate = date.toISOString().split('T')[0];

                        // Filtrar eventos para el día seleccionado
                        const eventsForThisDay = globalEvents.filter(event => {
                            return event.start.includes(compareDate);
                        });

                        // Generar contenido HTML para el modal
                        if (eventsForThisDay.length > 0) {
                            // Ordenar eventos por hora
                            eventsForThisDay.sort((a, b) => {
                                return new Date('1970/01/01 ' + a.hora) - new Date('1970/01/01 ' + b.hora);
                            });

                            // Crear HTML para cada cita
                            let htmlContent = '<div class="space-y-3">';

                            eventsForThisDay.forEach((event, index) => {
                                // Alternar colores para mejor visualización
                                const bgColorClass = index % 2 === 0 ? 'bg-orange-50' : 'bg-blue-50';
                                const accentColorClass = index % 2 === 0 ? 'text-orange-600' : 'text-blue-600';
                                const borderColorClass = index % 2 === 0 ? 'border-orange-200' : 'border-blue-200';

                                htmlContent += `
                <div class="${bgColorClass} p-4 rounded-xl border ${borderColorClass} hover:shadow-md transition-all duration-200">
                    <div class="flex items-center mb-3">
                        <div class="flex items-center justify-center rounded-full w-10 h-10 ${accentColorClass} bg-white border ${borderColorClass}">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <div class="text-lg font-bold ${accentColorClass}">${event.hora}</div>
                        </div>
                    </div>

                    <div class="pl-1">
                        <div class="flex items-start mb-2">
                            <svg class="w-5 h-5 mr-2 text-gray-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <div>
                                <span class="text-gray-800 font-medium">Dr. ${event.doctor}</span>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-${index % 2 === 0 ? 'orange' : 'blue'}-100 text-${index % 2 === 0 ? 'orange' : 'blue'}-800 mt-1">
                                    ${event.especialidad}
                                </span>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-gray-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span class="text-gray-800">${event.consultorio}<br><span class="text-sm text-gray-600">${event.ubicacion}</span></span>
                        </div>
                    </div>
                </div>
                `;
                            });

                            htmlContent += '</div>';
                            dayDetailsContent.innerHTML = htmlContent;
                        } else {
                            // Mensaje cuando no hay citas para el día
                            dayDetailsContent.innerHTML = `
            <div class="text-center py-10 px-4">
                <div class="bg-gray-50 inline-flex items-center justify-center w-20 h-20 rounded-full mb-4">
                    <svg class="w-10 h-10 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">No hay citas programadas</h3>
                <p class="text-gray-500">No hay citas médicas agendadas para este día.</p>
            </div>
            `;
                        }

                        // Mostrar el modal
                        dayDetailsModal.classList.remove('hidden');
                    }

                    // Configurar evento para cerrar el modal con el botón X
                    closeDayDetailsBtn.addEventListener('click', function() {
                        dayDetailsModal.classList.add('hidden');
                    });

                    // Configurar evento para cerrar el modal con el botón inferior
                    closeDetailsBtnFooter.addEventListener('click', function() {
                        dayDetailsModal.classList.add('hidden');
                    });

                    // Cerrar modal al hacer clic fuera de él
                    dayDetailsModal.addEventListener('click', function(e) {
                        if (e.target === dayDetailsModal) {
                            dayDetailsModal.classList.add('hidden');
                        }
                    });
                });

                // Animación de contadores para estadísticas
                document.addEventListener('DOMContentLoaded', () => {
                    const counters = document.querySelectorAll('.counter');
                    counters.forEach(counter => {
                        // Función para animar el contador incrementalmente
                        const updateCounter = () => {
                            const target = +counter.getAttribute('data-target'); // Valor final
                            const current = +counter.innerText; // Valor actual
                            const increment = target / 200; // Incremento por iteración (velocidad)

                            // Si no hemos llegado al valor final, seguir incrementando
                            if (current < target) {
                                counter.innerText = Math.ceil(current + increment);
                                setTimeout(updateCounter, 10); // Actualizar cada 10ms
                            } else {
                                counter.innerText = target; // Asegurarse de llegar exactamente al valor final
                            }
                        };
                        updateCounter(); // Iniciar la animación
                    });
                });
            </script>
    <div>
@endsection
