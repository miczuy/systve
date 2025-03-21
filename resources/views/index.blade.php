<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria</title>
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js" defer></script>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
<header class="w-full relative z-50 font-sans">
    <!-- Barra superior con gradiente animado -->
    <div class="h-1 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 animate-gradient-x"></div>

    <nav class="backdrop-blur-md bg-white/90 dark:bg-gray-900/95 border-b border-gray-100 dark:border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <!-- Logo y branding corporativo con animación -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 group relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-r from-violet-600 to-indigo-600 rounded-full
                        opacity-0 group-hover:opacity-70 blur-md transition-all duration-700
                        group-hover:scale-110"></div>
                        <img src="./images/logo2.png" class="h-14 w-auto relative z-10 transition-transform duration-300
                    group-hover:scale-105" alt="Vetsys Logo">
                    </div>
                    <div class="pl-4 ml-4 border-l border-gray-200 dark:border-gray-700">
                        <h1 class="text-2xl font-extrabold tracking-tight">
              <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-600
                          dark:from-indigo-400 dark:to-purple-400">Vetsys</span>
                        </h1>
                        <p class="mt-0.5 text-xs font-medium text-gray-500 dark:text-gray-400 tracking-wide uppercase">
                            Servicios Veterinarios
                        </p>
                    </div>
                </div>

                <!-- Navegación principal - Escritorio con efectos 3D y microinteracciones -->
                <div class="hidden lg:flex lg:items-center">
                    <div class="flex items-center space-x-8">
                        <a href="#" class="group flex flex-col items-center">
                            <span class="text-sm font-medium text-indigo-600 dark:text-indigo-400">Inicio</span>
                            <span class="h-0.5 w-0 bg-indigo-600 dark:bg-indigo-400 transition-all duration-300 ease-out
                          group-hover:w-full"></span>
                        </a>

                        <a href="#Reseña" class="group flex flex-col items-center">
              <span class="text-sm font-medium text-gray-600 hover:text-indigo-600 dark:text-gray-300
                          dark:hover:text-indigo-400 transition-colors duration-300">Reseña</span>
                            <span class="h-0.5 w-0 bg-indigo-600 dark:bg-indigo-400 transition-all duration-300 ease-out
                          group-hover:w-full"></span>
                        </a>
                        <a href="#" id="lab-link" class="group flex flex-col items-center">
              <span class="text-sm font-medium text-gray-600 hover:text-indigo-600 dark:text-gray-300
                          dark:hover:text-indigo-400 transition-colors duration-300">Laboratorios</span>
                            <span class="h-0.5 w-0 bg-indigo-600 dark:bg-indigo-400 transition-all duration-300 ease-out
                          group-hover:w-full"></span>
                        </a>
                        <a href="#preguntas-frecuentes" class="group flex flex-col items-center">
              <span class="text-sm font-medium text-gray-600 hover:text-indigo-600 dark:text-gray-300
                          dark:hover:text-indigo-400 transition-colors duration-300">Equipo</span>
                            <span class="h-0.5 w-0 bg-indigo-600 dark:bg-indigo-400 transition-all duration-300 ease-out
                          group-hover:w-full"></span>
                        </a>
                        <a href="#contacto" class="group flex flex-col items-center">
              <span class="text-sm font-medium text-gray-600 hover:text-indigo-600 dark:text-gray-300
                          dark:hover:text-indigo-400 transition-colors duration-300">Contacto</span>
                            <span class="h-0.5 w-0 bg-indigo-600 dark:bg-indigo-400 transition-all duration-300 ease-out
                          group-hover:w-full"></span>
                        </a>
                    </div>

                    <!-- Botones de autenticación - Escritorio con efectos de morfismo -->
                    <div class="flex items-center ml-12 space-x-6">
                        @if (Route::has('login'))
                            @auth
                                <!-- Usuario autenticado con diseño neumórfico -->
                                <div class="relative">
                                    <button onclick="toggleDropdown()" aria-haspopup="true"
                                            class="bg-gradient-to-b from-white to-gray-100 dark:from-gray-800 dark:to-gray-900
                                flex items-center space-x-2 px-4 py-2 rounded-full text-sm font-medium
                                shadow-[0_2px_8px_rgba(0,0,0,0.05)] dark:shadow-[0_2px_8px_rgba(0,0,0,0.25)]
                                border border-gray-200 dark:border-gray-700 transition-all duration-300
                                hover:shadow-[0_4px_12px_rgba(0,0,0,0.1)] dark:hover:shadow-[0_4px_12px_rgba(0,0,0,0.35)]
                                active:scale-95">
                                        <div class="flex items-center justify-center w-8 h-8 rounded-full
                               bg-gradient-to-br from-indigo-600 to-purple-600">
                                            <span class="text-white text-xs font-bold">U</span>
                                        </div>
                                        <span class="text-gray-700 dark:text-gray-200">Mi cuenta</span>
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 transition-transform duration-300"
                                             id="dropdown-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/>
                                        </svg>
                                    </button>

                                    <!-- Menú desplegable con animación -->
                                    <div id="userDropdown"
                                         class="hidden opacity-0 transform -translate-y-2 absolute right-0 mt-3 w-60
                              rounded-xl bg-white dark:bg-gray-800 shadow-2xl border border-gray-100
                              dark:border-gray-700 transition-all duration-300 ease-out origin-top-right
                              overflow-hidden z-50">
                                        <div class="px-4 py-3 border-b border-gray-100 dark:border-gray-700">
                                            <p class="text-sm font-medium text-gray-900 dark:text-white">Usuario</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-1 truncate">usuario@email.com</p>
                                        </div>
                                        <div class="py-2">
                                            <a href="#"
                                               class="group flex items-center px-4 py-3 text-sm text-gray-700 dark:text-gray-200
                                hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-indigo-500
                                  dark:group-hover:text-indigo-400 transition-colors" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg>
                                                Mi perfil
                                            </a>
                                            <a href="#"
                                               class="group flex items-center px-4 py-3 text-sm text-gray-700 dark:text-gray-200
                                hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
                                                <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-indigo-500
                                  dark:group-hover:text-indigo-400 transition-colors" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Configuración
                                            </a>
                                            <div class="border-t border-gray-100 dark:border-gray-700 my-1"></div>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit"
                                                        class="group flex w-full items-center px-4 py-3 text-sm text-gray-700
                                       dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700/50
                                       transition-colors">
                                                    <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-rose-500
                                    dark:group-hover:text-rose-400 transition-colors" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                    </svg>
                                                    Cerrar sesión
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}"
                                   class="text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400
                          text-sm font-medium transition-colors duration-200">
                                    Iniciar sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="relative inline-flex items-center px-6 py-2.5 overflow-hidden rounded-full
                            group bg-indigo-600 hover:bg-gradient-to-r hover:from-indigo-600 hover:to-purple-600
                            text-white shadow-md transition-all duration-500">
                    <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform
                                translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40"></span>
                                        <span class="font-medium text-sm transition-all duration-200">Registrarse</span>
                                    </a>
                                @endif
                            @endauth
                        @endif
                    </div>
                </div>

                <!-- Botón de menú móvil con animación -->
                <div class="flex items-center lg:hidden">
                    <button id="mobile-menu-button" aria-expanded="false"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-500
                         hover:text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-200
                         dark:hover:bg-gray-800 transition duration-200 focus:outline-none focus:ring-2
                         focus:ring-inset focus:ring-indigo-500">
                        <span class="sr-only">Abrir menú principal</span>
                        <!-- Icon when menu is closed -->
                        <svg id="menu-open-icon" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Icon when menu is open -->
                        <svg id="menu-close-icon" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Panel móvil con animaciones y mejor organización -->
        <div id="mobile-menu"
             class="hidden lg:hidden transform opacity-0 scale-95 transition-all duration-300 ease-out">
            <div class="pt-2 pb-4 space-y-1 divide-y divide-gray-200 dark:divide-gray-700">
                <div class="px-3 py-2 space-y-1">
                    <a href="#"
                       class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-indigo-600
                    dark:text-indigo-400 bg-indigo-50 dark:bg-indigo-900/30">
                        <span class="h-8 w-1 rounded-r-full bg-indigo-600 dark:bg-indigo-400 mr-3"></span>
                        Inicio
                    </a>
                    <a href="#"
                       class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-indigo-600
                    hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-indigo-400
                    transition-colors duration-200">
                        <span class="h-8 w-1 rounded-r-full bg-transparent mr-3"></span>
                        Marketplace
                    </a>
                    <a href="#Reseña"
                       class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-indigo-600
                    hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-indigo-400
                    transition-colors duration-200">
                        <span class="h-8 w-1 rounded-r-full bg-transparent mr-3"></span>
                        Reseña
                    </a>
                    <a href="#" id="lab-link-mobile"
                       class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-indigo-600
                    hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-indigo-400
                    transition-colors duration-200">
                        <span class="h-8 w-1 rounded-r-full bg-transparent mr-3"></span>
                        Laboratorios
                    </a>
                    <a href="#preguntas-frecuentes"
                       class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-indigo-600
                    hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-indigo-400
                    transition-colors duration-200">
                        <span class="h-8 w-1 rounded-r-full bg-transparent mr-3"></span>
                        Equipo
                    </a>
                    <a href="#contacto"
                       class="flex items-center px-3 py-2 rounded-lg text-base font-medium text-gray-700 hover:text-indigo-600
                    hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-indigo-400
                    transition-colors duration-200">
                        <span class="h-8 w-1 rounded-r-full bg-transparent mr-3"></span>
                        Contacto
                    </a>
                </div>

                <!-- Botones de autenticación móvil -->
                @if (Route::has('login'))
                    <div class="px-4 py-3 space-y-3">
                        @auth
                            <div class="flex items-center px-1 py-3">
                                <div class="flex-shrink-0">
                                    <div class="h-12 w-12 rounded-full bg-gradient-to-br from-indigo-600 to-purple-600
                            flex items-center justify-center text-white text-base font-bold shadow-lg">
                                        <span>U</span>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-base font-medium text-gray-800 dark:text-white">Usuario</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">usuario@email.com</p>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 dark:border-gray-700 my-2"></div>
                            <div class="space-y-1">
                                <a href="#"
                                   class="flex items-center px-3 py-3 rounded-lg text-base font-medium text-gray-700
                          hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800
                          dark:hover:text-indigo-400 transition-colors duration-200">
                                    <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    Mi perfil
                                </a>
                                <a href="#"
                                   class="flex items-center px-3 py-3 rounded-lg text-base font-medium text-gray-700
                          hover:text-indigo-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800
                          dark:hover:text-indigo-400 transition-colors duration-200">
                                    <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Configuración
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                            class="flex w-full items-center px-3 py-3 rounded-lg text-base font-medium text-gray-700
                                 hover:text-red-600 hover:bg-gray-50 dark:text-gray-300 dark:hover:bg-gray-800
                                 dark:hover:text-red-400 transition-colors duration-200">
                                        <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Cerrar sesión
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="space-y-3 pt-3">
                                <a href="{{ route('login') }}"
                                   class="flex items-center justify-center w-full py-3 px-4 rounded-lg border
                          border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300
                          hover:bg-gray-50 dark:hover:bg-gray-800 text-base font-medium
                          transition-colors duration-200">
                                    <svg class="mr-3 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    Iniciar sesión
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                       class="flex items-center justify-center w-full py-3 px-4 rounded-lg
                            bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700
                            hover:to-purple-700 text-white text-base font-medium shadow-md
                            transition-all duration-200 hover:shadow-lg">
                                        <svg class="mr-3 h-5 w-5 text-indigo-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                        </svg>
                                        Registrarse
                                    </a>
                                @endif
                            </div>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>
</header>
<!-- Botón para abrir la modal de laboratorios -->
<button id="openLabModal"
        class="fixed bottom-6 right-6 bg-gradient-to-r from-indigo-600 to-purple-600 text-white
        rounded-full p-4 shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 z-30">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
    </svg>
</button>

<!-- Backdrop para la modal -->
<div id="labModalBackdrop"
     class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300 z-40">
</div>

<!-- Modal de Laboratorios (versión más compacta) -->
<div id="labModal"
     class="fixed inset-0 flex items-center justify-center hidden z-50">
    <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-2xl w-full max-w-3xl max-h-[80vh] overflow-hidden
                transform scale-95 opacity-0 transition-all duration-300 mx-4">
        <!-- Encabezado de la modal con gradiente -->
        <div class="relative">
            <div class="h-2 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 animate-gradient-x"></div>
            <div class="flex justify-between items-center px-4 py-3 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                    Servicios de Laboratorio Veterinario
                </h2>
                <button id="closeLabModal" class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Contenido de la modal con scroll -->
        <div class="overflow-y-auto p-4 max-h-[calc(80vh-56px)]">
            <!-- Introducción -->
            <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">
                Nuestro laboratorio veterinario ofrece servicios completos de diagnóstico con tecnología avanzada y personal especializado para garantizar la salud de tu mascota.
            </p>

            <!-- Categorías de laboratorio -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Hematología -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow
                            border border-gray-100 dark:border-gray-700 overflow-hidden group">
                    <div class="h-1 w-full bg-indigo-500 group-hover:bg-gradient-to-r group-hover:from-indigo-500
                               group-hover:to-purple-500 transition-all duration-300"></div>
                    <div class="p-3">
                        <div class="flex items-center mb-2">
                            <div class="p-1.5 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg mr-3">
                                <svg class="h-5 w-5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-800 dark:text-white">Hematología</h3>
                        </div>
                        <ul class="space-y-1 text-xs text-gray-600 dark:text-gray-300 ml-2">
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-indigo-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Hemograma completo
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-indigo-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Recuento de plaquetas
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-indigo-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Grupo sanguíneo
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-indigo-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Tiempo de coagulación
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Bioquímica sanguínea -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow
                            border border-gray-100 dark:border-gray-700 overflow-hidden group">
                    <div class="h-1 w-full bg-purple-500 group-hover:bg-gradient-to-r group-hover:from-purple-500
                               group-hover:to-pink-500 transition-all duration-300"></div>
                    <div class="p-3">
                        <div class="flex items-center mb-2">
                            <div class="p-1.5 bg-purple-100 dark:bg-purple-900/30 rounded-lg mr-3">
                                <svg class="h-5 w-5 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-800 dark:text-white">Bioquímica Sanguínea</h3>
                        </div>
                        <ul class="space-y-1 text-xs text-gray-600 dark:text-gray-300 ml-2">
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-purple-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Perfil hepático completo
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-purple-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Perfil renal
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-purple-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Glucosa
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-purple-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Electrolitos
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Parasitología -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow
                            border border-gray-100 dark:border-gray-700 overflow-hidden group">
                    <div class="h-1 w-full bg-green-500 group-hover:bg-gradient-to-r group-hover:from-green-500
                               group-hover:to-teal-500 transition-all duration-300"></div>
                    <div class="p-3">
                        <div class="flex items-center mb-2">
                            <div class="p-1.5 bg-green-100 dark:bg-green-900/30 rounded-lg mr-3">
                                <svg class="h-5 w-5 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-800 dark:text-white">Parasitología</h3>
                        </div>
                        <ul class="space-y-1 text-xs text-gray-600 dark:text-gray-300 ml-2">
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-green-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Análisis de heces
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-green-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Identificación de parásitos externos
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-green-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Test de parásitos sanguíneos
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-green-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Métodos de flotación
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Urinálisis -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow
                            border border-gray-100 dark:border-gray-700 overflow-hidden group">
                    <div class="h-1 w-full bg-blue-500 group-hover:bg-gradient-to-r group-hover:from-blue-500
                               group-hover:to-cyan-500 transition-all duration-300"></div>
                    <div class="p-3">
                        <div class="flex items-center mb-2">
                            <div class="p-1.5 bg-blue-100 dark:bg-blue-900/30 rounded-lg mr-3">
                                <svg class="h-5 w-5 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-800 dark:text-white">Urinálisis</h3>
                        </div>
                        <ul class="space-y-1 text-xs text-gray-600 dark:text-gray-300 ml-2">
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-blue-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Análisis físico-químico
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-blue-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Sedimento urinario
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-blue-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Prueba de cristaluria
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-blue-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Cultivo y antibiograma
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Microbiología -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow
                            border border-gray-100 dark:border-gray-700 overflow-hidden group">
                    <div class="h-1 w-full bg-amber-500 group-hover:bg-gradient-to-r group-hover:from-amber-500
                               group-hover:to-orange-500 transition-all duration-300"></div>
                    <div class="p-3">
                        <div class="flex items-center mb-2">
                            <div class="p-1.5 bg-amber-100 dark:bg-amber-900/30 rounded-lg mr-3">
                                <svg class="h-5 w-5 text-amber-600 dark:text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-800 dark:text-white">Microbiología</h3>
                        </div>
                        <ul class="space-y-1 text-xs text-gray-600 dark:text-gray-300 ml-2">
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-amber-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Cultivos bacterianos
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-amber-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Citología
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-amber-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Antibiogramas
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-amber-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Estudios micológicos
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Diagnóstico por imágenes -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow
                            border border-gray-100 dark:border-gray-700 overflow-hidden group">
                    <div class="h-1 w-full bg-rose-500 group-hover:bg-gradient-to-r group-hover:from-rose-500
                               group-hover:to-pink-500 transition-all duration-300"></div>
                    <div class="p-3">
                        <div class="flex items-center mb-2">
                            <div class="p-1.5 bg-rose-100 dark:bg-rose-900/30 rounded-lg mr-3">
                                <svg class="h-5 w-5 text-rose-600 dark:text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-gray-800 dark:text-white">Diagnóstico por Imágenes</h3>
                        </div>
                        <ul class="space-y-1 text-xs text-gray-600 dark:text-gray-300 ml-2">
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-rose-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Radiografías digitales
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-rose-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Ecografías
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-rose-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Ecocardiografías
                            </li>
                            <li class="flex items-center">
                                <svg class="h-3 w-3 text-rose-500 mr-1 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Endoscopía
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Información adicional -->
            <div class="mt-4 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg p-3 border border-indigo-100 dark:border-indigo-800">
                <h3 class="text-sm font-bold text-gray-800 dark:text-white mb-2 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-indigo-600 dark:text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Información Importante
                </h3>
                <div class="text-xs text-gray-700 dark:text-gray-300 space-y-1">
                    <p>• Algunos análisis requieren ayuno previo de 8-12 horas.</p>
                    <p>• Para toma de muestras, se recomienda agendar cita previa.</p>
                    <p>• Resultados disponibles en 24-48 horas según el tipo de análisis.</p>
                    <p>• Ofrecemos servicio de recogida de muestras a domicilio.</p>
                </div>
            </div>

            <!-- Formulario de contacto para análisis (versión compacta) -->
            <div class="mt-4">
                <h3 class="text-sm font-bold text-gray-800 dark:text-white mb-2">Solicita información sobre nuestros servicios</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <input type="text" placeholder="Nombre"
                               class="w-full text-xs rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2
                                      bg-white dark:bg-gray-800 text-gray-800 dark:text-white
                                      focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    </div>
                    <div>
                        <input type="email" placeholder="Email"
                               class="w-full text-xs rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2
                                      bg-white dark:bg-gray-800 text-gray-800 dark:text-white
                                      focus:outline-none focus:ring-1 focus:ring-indigo-500">
                    </div>
                    <div class="md:col-span-2">
                        <select
                            class="w-full text-xs rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2
                                       bg-white dark:bg-gray-800 text-gray-800 dark:text-white
                                       focus:outline-none focus:ring-1 focus:ring-indigo-500">
                            <option value="">Seleccione un servicio</option>
                            <option value="hematologia">Hematología</option>
                            <option value="bioquimica">Bioquímica Sanguínea</option>
                            <option value="parasitologia">Parasitología</option>
                            <option value="urinalisis">Urinálisis</option>
                            <option value="microbiologia">Microbiología</option>
                            <option value="imagenes">Diagnóstico por Imágenes</option>
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <textarea placeholder="Mensaje" rows="2"
                                  class="w-full text-xs rounded-lg border border-gray-300 dark:border-gray-600 px-3 py-2
                                         bg-white dark:bg-gray-800 text-gray-800 dark:text-white
                                         focus:outline-none focus:ring-1 focus:ring-indigo-500"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit"
                                class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent
                                       text-xs font-medium rounded-lg shadow-sm text-white bg-gradient-to-r
                                       from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500
                                       transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Enviar consulta
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para la funcionalidad de la modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Referencias a elementos de la modal
        const openLabModalBtn = document.getElementById('openLabModal');
        const closeLabModalBtn = document.getElementById('closeLabModal');
        const labModal = document.getElementById('labModal');
        const labModalBackdrop = document.getElementById('labModalBackdrop');
        const modalContent = labModal.querySelector('.bg-white');
        const labLink = document.getElementById('lab-link');
        const labLinkMobile = document.getElementById('lab-link-mobile');

        // Función para abrir la modal con animación
        function openModal() {
            // Mostrar backdrop y modal
            labModalBackdrop.classList.remove('hidden');
            labModal.classList.remove('hidden');

            // Animación de entrada
            setTimeout(() => {
                labModalBackdrop.classList.remove('opacity-0');
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);

            // Bloquear scroll del body
            document.body.style.overflow = 'hidden';
        }

        // Función para cerrar la modal con animación
        function closeModal() {
            // Animación de salida
            labModalBackdrop.classList.add('opacity-0');
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');

            // Ocultar modal después de la transición
            setTimeout(() => {
                labModal.classList.add('hidden');
                labModalBackdrop.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        // Event listeners
        if (openLabModalBtn) {
            openLabModalBtn.addEventListener('click', openModal);
        }

        if (closeLabModalBtn) {
            closeLabModalBtn.addEventListener('click', closeModal);
        }

        // Enlaces de navegación para abrir la modal
        if (labLink) {
            labLink.addEventListener('click', function(e) {
                e.preventDefault();
                openModal();
            });
        }

        if (labLinkMobile) {
            labLinkMobile.addEventListener('click', function(e) {
                e.preventDefault();
                openModal();

                // Cerrar el menú móvil si está abierto
                const mobileMenu = document.getElementById('mobile-menu');
                const mobileMenuButton = document.getElementById('mobile-menu-button');
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    if (mobileMenuButton) {
                        mobileMenuButton.setAttribute('aria-expanded', 'false');
                    }
                }
            });
        }

        // Cerrar modal al hacer clic en el backdrop
        if (labModalBackdrop) {
            labModalBackdrop.addEventListener('click', closeModal);
        }

        // Prevenir que clics dentro del contenido de la modal cierren la modal
        if (modalContent) {
            modalContent.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        }

        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && labModal && !labModal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>

<style>
    @keyframes gradient-x {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }

    .animate-gradient-x {
        background-size: 200% 200%;
        animation: gradient-x 3s ease infinite;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Variables para elementos del menú
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');
        const dropdownArrow = document.getElementById('dropdown-arrow');

        // Toggle para el menú móvil con animación
        mobileMenuButton.addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !expanded);

            // Animación para abrir/cerrar menú
            if (!expanded) {
                // Abrir menú
                mobileMenu.classList.remove('hidden');
                // Dar tiempo para que la transición funcione
                setTimeout(() => {
                    mobileMenu.classList.remove('opacity-0', 'scale-95');
                    mobileMenu.classList.add('opacity-100', 'scale-100');
                    menuOpenIcon.classList.add('hidden');
                    menuCloseIcon.classList.remove('hidden');
                }, 10);
            } else {
                // Cerrar menú
                mobileMenu.classList.remove('opacity-100', 'scale-100');
                mobileMenu.classList.add('opacity-0', 'scale-95');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');

                // Ocultar después de la transición
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        });

        // Función mejorada para el dropdown de usuario
        window.toggleDropdown = function() {
            const dropdown = document.getElementById('userDropdown');
            const isHidden = dropdown.classList.contains('hidden');

            if (isHidden) {
                // Mostrar dropdown
                dropdown.classList.remove('hidden');
                // Dar tiempo para que la transición funcione
                setTimeout(() => {
                    dropdown.classList.remove('opacity-0', '-translate-y-2');
                    dropdown.classList.add('opacity-100', 'translate-y-0');
                    if (dropdownArrow) dropdownArrow.classList.add('rotate-180');
                }, 10);
            } else {
                // Ocultar dropdown
                dropdown.classList.remove('opacity-100', 'translate-y-0');
                dropdown.classList.add('opacity-0', '-translate-y-2');
                if (dropdownArrow) dropdownArrow.classList.remove('rotate-180');

                // Ocultar después de la transición
                setTimeout(() => {
                    dropdown.classList.add('hidden');
                }, 300);
            }
        };

        // Cerrar dropdown al hacer clic afuera
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const button = document.querySelector('button[onclick="toggleDropdown()"]');

            if (dropdown && !dropdown.classList.contains('hidden') &&
                !dropdown.contains(event.target) &&
                button && !button.contains(event.target)) {
                // Ocultar dropdown
                dropdown.classList.remove('opacity-100', 'translate-y-0');
                dropdown.classList.add('opacity-0', '-translate-y-2');
                if (dropdownArrow) dropdownArrow.classList.remove('rotate-180');

                // Ocultar después de la transición
                setTimeout(() => {
                    dropdown.classList.add('hidden');
                }, 300);
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle para menú móvil
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', function() {
            const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';

            // Toggle aria-expanded
            mobileMenuButton.setAttribute('aria-expanded', !isExpanded);

            // Toggle mobile menu
            mobileMenu.classList.toggle('hidden');
        });

        // Toggle para dropdown de usuario
        window.toggleDropdown = function() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('hidden');
        }

        // Cerrar dropdown cuando se hace clic fuera
        window.addEventListener('click', function(event) {
            if (!event.target.matches('.dropdown-toggle') && !event.target.closest('.dropdown-toggle')) {
                const dropdowns = document.getElementsByClassName('dropdown-menu');
                for (let i = 0; i < dropdowns.length; i++) {
                    if (!dropdowns[i].classList.contains('hidden')) {
                        dropdowns[i].classList.add('hidden');
                    }
                }
            }
        });
    });
</script>
<section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <!-- Text and Buttons Section -->
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white text-center">
                Abriendo nuestros corazones para un futuro mejor
            </h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400 text-justify">
                En nuestra sociedad, el bienestar de los animales debe ser una prioridad. Todos tenemos la responsabilidad de asegurarnos de que los animales sean tratados con amor y respeto. Esto incluye proporcionar cuidado adecuado, hábitats saludables y evitar el maltrato o la explotación. Juntos, podemos crear un mundo más amable.
            </p>
            <!-- Buttons Container -->
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <!-- Instagram Button -->
                <a href="https://www.instagram.com/?hl=es" class="inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-white border border-gray-200 rounded-lg sm:w-auto focus:ring-4 focus:ring-gray-100 hover:bg-opacity-90 transition-all" style="background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path>
                        <circle cx="16.806" cy="7.207" r="1.078"></circle>
                        <path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056 1.267.056 3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path>
                    </svg>
                    <span class="ml-2">Instagram</span>
                </a>
                <!-- Facebook Button -->
                <a href="https://www.facebook.com" class="inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-white bg-blue-600 border border-gray-200 rounded-lg sm:w-auto focus:outline-none hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325 1.42-3.592 3.5-3.592.699-.002 1.399.034 2.095.107v2.42h-1.435c-1.128 0-1.348.538-1.348 1.325v1.735h2.697l-.35 2.725h-2.348V21H20a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z"></path>
                    </svg>
                    <span class="ml-2">Facebook</span>
                </a>

                <!-- Horario -->
                <button id="open_modal" class="inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-gray-800 bg-yellow-400 border-2 border-yellow-500 rounded-lg shadow-lg hover:bg-yellow-500 hover:text-white focus:outline-none focus:ring-4 focus:ring-yellow-300 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span class="ml-3">Horario</span>
                </button>
            </div>
        </div>
        <!-- Image Section -->
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="./images/hero.png" alt="hero image" class="rounded-lg shadow-lg">
        </div>
    </div>
</section>
<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm hidden z-50 flex items-center justify-center">
    <div id="consultorio_container" class="bg-white dark:bg-gray-800 rounded-lg shadow-md w-full max-w-3xl p-6 mx-4">
        <!-- Encabezado -->
        <div class="flex flex-col items-center gap-4 mb-6">
            <!-- Ícono -->
            <div class="bg-blue-500 p-3 rounded-lg text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <!-- Texto -->
            <div class="text-center">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100">Calendario de Doctores</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Visualización semanal de horarios médicos</p>
            </div>
        </div>

        <!-- Campo de selección -->
        <div class="mb-6">
            <label for="consultorio_select" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 text-center">Selecciona un consultorio:</label>
            <select id="consultorio_select" name="consultorio_id"
                    class="w-full px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-md border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200 dark:text-white">
                <option value="" disabled selected>Seleccione un consultorio</option>
                @foreach($consultorios as $consultorio)
                    <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}</option>
                @endforeach
            </select>
        </div>

        <!-- Espacio para información del consultorio -->
        <div id="consultorio_info" class="text-sm text-gray-600 dark:text-gray-300 mb-4 text-center"></div>

        <!-- Contenedor para centrar el botón -->
        <div class="flex justify-center">
            <!-- Botón de cerrar -->
            <button id="close_button" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-6 rounded-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-300">
                Cerrar
            </button>
        </div>
    </div>
</div>

<!-- Script para manejar el modal -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Mostrar el modal
    $('#open_modal').on('click', function () {
        $('#modal').removeClass('hidden');
        $('body').addClass('overflow-hidden'); // Evitar el scroll del body
    });

    // Cerrar el modal
    $('#close_button').on('click', function () {
        $('#modal').addClass('hidden');
        $('body').removeClass('overflow-hidden'); // Restaurar el scroll del body
        $('#consultorio_info').html(''); // Limpia la información del consultorio
        $('#consultorio_select').val(''); // Restablece el campo de selección
    });

    // Manejar el cambio de selección
    $('#consultorio_select').on('change', function () {
        const consultorio_id = $(this).val();
        if (consultorio_id) {
            let url = "{{ route('cargar_datos_consultorios', ':id') }}";
            url = url.replace(':id', consultorio_id);

            // Mostrar indicador de carga
            $('#consultorio_info').html('<p class="text-center">Cargando horario...</p>');

            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    $('#consultorio_info').html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error al obtener los datos del consultorio:', textStatus, errorThrown);
                    console.error('Status code:', jqXHR.status);
                    console.error('Response text:', jqXHR.responseText);

                    // Limpiar contenido previo
                    $('#consultorio_info').html('');

                    // Mostrar error con SweetAlert
                    let errorMessage = 'Error al cargar el horario. Por favor, intenta de nuevo.';

                    if (jqXHR.status === 403) {
                        errorMessage = 'No tienes permiso para ver estos datos. Contacta al administrador.';
                    }

                    Swal.fire({
                        title: '¡Error!',
                        text: errorMessage,
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                        confirmButtonColor: '#3085d6'
                    });
                }
            });
        } else {
            $('#consultorio_info').html('');
        }
    });
</script>
<div class="max-w-2xl mx-auto my-12">
    <!-- Carousel Container -->
    <div id="default-carousel" class="relative group" data-carousel="static">
        <!-- Carousel Wrapper -->
        <div class="overflow-hidden relative h-56 rounded-lg shadow-lg sm:h-64 xl:h-80 2xl:h-96">
            <!-- Carousel Items -->
            <div class="hidden duration-700 ease-in-out transform transition-all" data-carousel-item>
                <img src="https://media.informabtl.com/wp-content/uploads/2019/08/f62a9b82-purina-e-informabtl-concienten-a-tu-mascota.jpg"
                     alt="Purina e Informabtl concientizando sobre mascotas"
                     class="block absolute top-1/2 left-1/2 w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 transform transition-all hover:scale-105">
            </div>
            <div class="hidden duration-700 ease-in-out transform transition-all" data-carousel-item>
                <img src="https://catycanar.vtexassets.com/arquivos/ids/167739-800-auto?v=638155305026600000&width=800&height=auto&aspect=true"
                     alt="Productos Purina"
                     class="block absolute top-1/2 left-1/2 w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 transform transition-all hover:scale-105">
            </div>
            <div class="hidden duration-700 ease-in-out transform transition-all" data-carousel-item>
                <img src="https://kupfertax.mx/wp-content/uploads/2021/09/Banner-Productos-Purina_Mesa-de-trabajo-1-copia-002-1024x512.jpg"
                     alt="Banner de productos Purina"
                     class="block absolute top-1/2 left-1/2 w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 transform transition-all hover:scale-105">
            </div>
        </div>

        <!-- Slider Indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
            <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-colors" aria-label="Slide 1" data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-colors" aria-label="Slide 2" data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full bg-white/50 hover:bg-white/80 transition-colors" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        </div>

        <!-- Slider Controls -->
        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 hover:bg-white/50 focus:ring-4 focus:ring-white transition-all transform hover:scale-110">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 hover:bg-white/50 focus:ring-4 focus:ring-white transition-all transform hover:scale-110">
                <svg class="w-5 h-5 text-white sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <!-- Text Section -->
    <p class="mt-5 text-center text-gray-700 dark:text-gray-300 text-lg font-semibold">
        Marcas que trabajan para nosotros!
        <a class="text-blue-600 hover:text-blue-800 hover:underline transition-colors dark:text-blue-400 dark:hover:text-blue-300" href="https://www.youtube.com/watch?v=7bhKI0Mw6Yk&ab_channel=ExpertoAnimal" target="_blank">
            Disfruta de un video
        </a>.
    </p>
</div>
<section class="bg-gray-50 dark:bg-gray-800">
    <div id="Actividades" class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
            <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Actividades que Hacemos</h2>
                <p class="mb-8 font-light lg:text-xl">La veterinaria es responsable del cuidado integral de los animales, tanto domésticos como de granja. Sus tareas abarcan diversos aspectos Teniendo siempre en mente la salud y Bienestar.</p>

                <!-- Lista en columnas -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-8 border-t border-gray-200 my-7 dark:border-gray-700">
                    <!-- Primera columna -->
                    <ul role="list" class="space-y-5">
                        <li class="flex space-x-3">
                            <!-- Icono -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Exámenes físicos</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Diagnóstico y tratamiento</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Vacunación y prevención</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Cuidados de emergencia</span>
                        </li>
                    </ul>

                    <!-- Segunda columna -->
                    <ul role="list" class="space-y-5">
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Asesoramiento y educación</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Procedimientos quirúrgicos</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Manejo de registros</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Monitoreo y seguimiento</span>
                        </li>
                    </ul>
                </div>

                <p class="text-center mb-8 font-light text-2xl dark:text-gray-300">Perfeccionando tus habilidades, confía en tu formación y recuerda que tu trabajo mejora la vida de incontables seres vivos.</p>
            </div>

            <!-- Carrusel con Alpine.js -->
            <div class="mt-8 lg:mt-0">
                <div x-data="imageSlider" class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 dark:bg-gray-700 p-2 sm:p-4">
                    <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
                        <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
                    </div>

                    <button @click="previous()" class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-600 shadow-md">
                        <svg class="h-6 w-6 text-gray-500 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    <button @click="forward()" class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-600 shadow-md">
                        <svg class="h-6 w-6 text-gray-500 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <div class="relative h-80 w-full">
                        <template x-for="(image, index) in images">
                            <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0 w-full h-full">
                                <img :src="image" alt="Imagen de servicio veterinario" class="w-full h-full object-cover rounded-sm" />
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
            <!-- Mapa -->
            <div class="relative h-96 mb-8 lg:mb-0">
                <div class="absolute inset-0 bg-gray-300 dark:bg-gray-600 rounded-lg overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7846.070859080576!2d-66.9124916067298!3d10.497873257822716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a5f2a06b1913f%3A0xbc1e74b91c544a3f!2sSan%20Agust%C3%ADn%20del%20Nte%2C%20Caracas%2C%20Distrito%20Capital!5e0!3m2!1ses-419!2sve!4v1720573113492!5m2!1ses-419!2sve" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <!-- Formulario -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-8 shadow-md">
                <h2 class="text-gray-900 dark:text-white text-lg mb-1 font-medium title-font text-center">Comentario</h2>
                <p class="leading-relaxed mb-5 text-gray-600 dark:text-gray-400 text-center">Gracias por Comentar</p>
                <div class="relative mb-4">
                    <label for="email" class="leading-7 text-sm text-gray-600 dark:text-gray-400">Email</label>
                    <input type="email" id="email" name="email" class="w-full bg-white dark:bg-gray-700 rounded border border-gray-300 dark:border-gray-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-800 text-base outline-none text-gray-700 dark:text-gray-100 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <div class="relative mb-4">
                    <label for="message" class="leading-7 text-sm text-gray-600 dark:text-gray-400">Mensaje</label>
                    <textarea id="message" name="message" class="w-full bg-white dark:bg-gray-700 rounded border border-gray-300 dark:border-gray-600 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-800 h-32 text-base outline-none text-gray-700 dark:text-gray-100 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                </div>
                <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg w-full transition-colors">Enviar</button>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-3 text-center">La información será totalmente leída con precaución sin ningún beneficio.</p>
            </div>

            <!-- Reseña -->
            <div id="Reseña" class="text-gray-500 dark:text-gray-400 sm:text-lg lg:col-span-2 mt-12">
                <div class="flex justify-center"><h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Reseña</h2></div>
                <p class="mb-8 font-light lg:text-xl">La Veterinaria tiene una larga y distinguida historia en la comunidad local, brindando servicios veterinarios de alta calidad durante más de 25 años. Fue fundada por un veterinario con una profunda pasión por el cuidado de animales. Desde sus inicios, la Veterinaria se ha distinguido por su enfoque en la medicina preventiva y el bienestar integral de las mascotas. El fundador reunió a un equipo de veterinarios y personal de apoyo altamente capacitados, quienes comparten su visión de proporcionar una atención excepcional a cada uno de sus pacientes.</p>
                <!-- Lista -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-8 border-t border-gray-200 my-7 dark:border-gray-700">
                    <ul role="list" class="space-y-5">
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Excelencia en atención médica</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Enfoque en la prevención y el bienestar</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Infraestructura moderna</span>
                        </li>
                    </ul>
                    <ul role="list" class="space-y-5">
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Atención personalizada</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Compromiso con la comunidad</span>
                        </li>
                        <li class="flex space-x-3">
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Trayectoria y experiencia</span>
                        </li>
                    </ul>
                </div>
                <p class="font-light lg:text-xl text-center">Estos puntos fuertes han permitido a la Veterinaria posicionarse como una referencia en la prestación de servicios veterinarios de alta calidad en la región.</p>
            </div>
        </div>
    </div>
</section>
<section class="bg-white dark:bg-gray-900">
    <div class="items-center max-w-screen-xl px-4 py-8 mx-auto lg:grid lg:grid-cols-4 lg:gap-16 xl:gap-24 lg:py-24 lg:px-6">
        <div class="col-span-2 mb-8">
            <p class="text-lg font-medium text-purple-600 dark:text-purple-500">Confiable en todo el mundo</p>
            <h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-3xl dark:text-white">Con la confianza de más de 600 millones de usuarios y 1000 equipos</h2>
            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Nuestros rigurosos estándares de seguridad y cumplimiento son la base de todo lo que hacemos. Trabajamos incansablemente para protegerlo a usted y a sus Mascotas.</p>
            <div class="pt-6 mt-6 space-y-4 border-t border-gray-200 dark:border-gray-700">
                <div>
                    <a href="#" class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-400 transition-colors">
                        Documentación
                        <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                <div>
                    <a href="#" class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-400 transition-colors">
                        Confiabilidad
                        <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-span-2 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
            <div>
                <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path></svg>
                <h3 class="mb-2 text-2xl font-bold dark:text-white">99.99% Actividades</h3>
                <p class="font-light text-gray-500 dark:text-gray-400">Reconocimiento del esfuerzo y las habilidades: "¡Excelente trabajo! Tu dedicación y habilidad han hecho una diferencia tangible".</p>
            </div>
            <div>
                <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg>
                <h3 class="mb-2 text-2xl font-bold dark:text-white">600M+ Usuarios</h3>
                <p class="font-light text-gray-500 dark:text-gray-400">Con la confianza de más de 600 millones de usuarios en toda Venezuela</p>
            </div>
            <div>
                <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                <h3 class="mb-2 text-2xl font-bold dark:text-white">10+ Ciudad</h3>
                <p class="font-light text-gray-500 dark:text-gray-400">Llegando a Todos los hogares.</p>
            </div>
            <div>
                <svg class="w-10 h-10 mb-2 text-purple-600 md:w-12 md:h-12 dark:text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                <h3 class="mb-2 text-2xl font-bold dark:text-white">5+ Million</h3>
                <p class="font-light text-gray-500 dark:text-gray-400">Transacciones por día</p>
            </div>
        </div>
    </div>
</section>
<section class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
        <figure class="max-w-screen-md mx-auto">
            <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
            </svg>
            <blockquote>
                <p class="text-xl font-medium text-gray-900 md:text-2xl dark:text-white">"Nuestra misión es brindar un cuidado veterinario integral y compasivo a cada paciente que pasa por nuestras puertas. Nos esforzamos por ser un aliado de confianza y respaldo incondicional para los dueños de mascotas, ofreciéndoles un servicios médicos de la más alta calidad, basados en las últimas evidencias científicas y las técnicas de vanguardia."</p>
            </blockquote>
            <figcaption class="flex items-center justify-center mt-6 space-x-12">
                <img class="w-18 h-20 rounded-full object-cover" src="./images/diseño.jpg" alt="Foto de Jose Farias y Henry Ortiz">
                <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                    <div class="pr-3 font-medium text-gray-900 dark:text-white">Jose Farias & Henry Ortiz</div>
                    <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">CEO</div>
                </div>
            </figcaption>
        </figure>
    </div>
</section>
<section class="bg-gradient-to-bl from-blue-50 to-violet-50 dark:from-gray-800 dark:to-gray-900 py-12">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-extrabold text-center text-gray-900 dark:text-white mb-10">Nuestros amigos peludos</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 transition-transform hover:scale-105 duration-300 shadow-md">
                <img src="https://img.freepik.com/foto-gratis/adorable-gatito-blanco-negro-pared-monocromatica-detras-ella_23-2148955177.jpg?t=st=1720614265~exp=1720617865~hmac=12be83204507129b5a6ed1705762f7ee7167b842b53b000191ebaa640147ca8f&w=1060"
                     alt="Gato Tom"
                     class="w-full h-48 rounded-md object-cover">
                <div class="px-1 py-4">
                    <div class="font-bold text-xl text-center mb-2 text-gray-900 dark:text-white">Tom</div>
                    <p class="text-gray-700 dark:text-gray-300 text-base">
                        Tom es un gato juguetón y travieso. A pesar de su tamaño, es ágil y curioso, siempre explorando su entorno.
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 transition-transform hover:scale-105 duration-300 shadow-md">
                <img src="https://img.freepik.com/foto-gratis/aislado-feliz-sonriente-perro-fondo-blanco-retrato-4_1562-693.jpg?t=st=1720614501~exp=1720618101~hmac=5155b49970f2b97a1aba96392d18eee4935d474707aee49990d453b255c6c810&w=996"
                     alt="Perro Coco"
                     class="w-full h-48 rounded-md object-cover">
                <div class="px-1 py-4">
                    <div class="font-bold text-xl text-center mb-2 text-gray-900 dark:text-white">Coco</div>
                    <p class="text-gray-700 dark:text-gray-300 text-base">
                        Coco es un perro amable y enérgico. Con su pelaje suave y brillante, y una sonrisa permanente, siempre está listo para jugar y recibir cariño.
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 transition-transform hover:scale-105 duration-300 shadow-md">
                <img src="https://img.freepik.com/foto-gratis/conejito-pascua-huevo-pintado-pared-amarilla_155003-35887.jpg?t=st=1720615773~exp=1720619373~hmac=713b92fccb88c45659051e04099baa8958ff4894c79c6a2845437032f19ae386&w=996"
                     alt="Conejo Perla"
                     class="w-full h-48 rounded-md object-cover">
                <div class="px-1 py-4">
                    <div class="font-bold text-xl text-center mb-2 text-gray-900 dark:text-white">Perla</div>
                    <p class="text-gray-700 dark:text-gray-300 text-base">
                        Perla es un conejo curioso y encantador. Con sus grandes ojos redondos y sus suaves orejas, cautiva a todos los que lo conocen.
                    </p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-4 transition-transform hover:scale-105 duration-300 shadow-md">
                <img src="https://img.freepik.com/fotos-premium/lindo-pequeno-hamster-blanco-todo-cuerpo-fondo-blanco_943281-93846.jpg?w=740"
                     alt="Hámster Jerry"
                     class="w-full h-48 rounded-md object-cover">
                <div class="px-1 py-4">
                    <div class="font-bold text-xl text-center mb-2 text-gray-900 dark:text-white">Jerry</div>
                    <p class="text-gray-700 dark:text-gray-300 text-base">
                        Jerry es un hámster encantador y lleno de energía. Con su pelaje suave y sus mejillas abultadas, es una criatura adorable que cautiva a todos los que lo conocen.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-white dark:bg-gray-900">
    <div id="preguntas-frecuentes" class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-24 lg:px-6">
        <h2 class="mb-6 text-3xl font-extrabold tracking-tight text-center text-gray-900 lg:mb-8 lg:text-3xl dark:text-white">Preguntas Recurrentes</h2>
        <div class="max-w-screen-md mx-auto">
            <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                <h3 id="accordion-flush-heading-1">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-900 bg-white border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900 dark:text-white" data-accordion-target="#accordion-flush-body-1" aria-expanded="true" aria-controls="accordion-flush-body-1">
                        <span>Como nos Ubicamos</span>
                        <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h3>
                <div id="accordion-flush-body-1" class="" aria-labelledby="accordion-flush-heading-1">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Consultorio VeterinarioHuellitas del corazon c,a. San Agustín del Norte, frente al puente la Yerbera, </p>
                        <p class="text-gray-500 dark:text-gray-400">Urbanismo Gran Mariscal de Ayacucho. <a href="https://www.google.com/maps/dir//San+Agust%C3%ADn+del+Norte,+frente+al+puente+la+Yerbera,+Urbanismo+Gran+Mariscal+de+Ayacucho./data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x8c2a5f45b209f397:0x57d2da996487853c?sa=X&ved=1t:3061&ictx=111" class="text-purple-600 dark:text-purple-500 hover:underline">Maps</a></p>
                    </div>
                </div>
                <h3 id="accordion-flush-heading-2">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                        <span>Telefonos</span>
                        <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h3>
                <div id="accordion-flush-body-2" class="hidden" aria-labelledby="accordion-flush-heading-2">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Tlf: 0424.198.4281 <br> Tlf: 0416.664.3970</p>
                    </div>
                </div>
                <h3 id="accordion-flush-heading-3">
                    <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400" data-accordion-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                        <span>Administradora</span>
                        <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </h3>
                <div id="accordion-flush-body-3" class="hidden" aria-labelledby="accordion-flush-heading-3">
                    <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                        <p class="mb-2 text-gray-500 dark:text-gray-400">Yulliek Ortiz <br> Tlf:04241984281</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
        <div class="max-w-screen-sm mx-auto text-center">
            <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">Suscribete</h2>
            <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">Información sobre el Servicio.</p>
            <a href="register" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800 transition-colors">Aquí</a>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("imageSlider", () => ({
            currentIndex: 1,
            images: [
                "https://img.freepik.com/foto-gratis/prueba-medica-visita-al-veterinario_329181-10381.jpg?t=st=1720570171~exp=1720573771~hmac=746b5e23290b204f61a95aa03f755695440da7816ce43be076abc821b98b7b0c&w=1800",
                "https://img.freepik.com/foto-gratis/veterinario-cuidando-perro-mascota_23-2149198633.jpg?t=st=1720570199~exp=1720573799~hmac=217775892518040ca8281881a4766e35f88eb42b4c196e9c147b85272c0ba7c1&w=1800",
                "https://img.freepik.com/foto-gratis/cerca-veterinario-cuidando-perro_23-2149100186.jpg?t=st=1720570266~exp=1720573866~hmac=100e5ec19263b40fc8884430fd1f334257f283095cfbd0fd95c48842e50a05c2&w=1800",
            ],
            previous() {
                if (this.currentIndex > 1) {
                    this.currentIndex = this.currentIndex - 1;
                }
            },
            forward() {
                if (this.currentIndex < this.images.length) {
                    this.currentIndex = this.currentIndex + 1;
                }
            },
        }));
    });
</script>
<script src="https://unpkg.com/flowbite@2.4.1/dist/flowbite.min.js"></script>
