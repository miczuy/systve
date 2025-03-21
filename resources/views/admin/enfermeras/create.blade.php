@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-blue-50 p-4 md:p-8 flex items-center justify-center">
        <div class="w-full max-w-5xl">
            <!-- Card principal con efecto de cristal -->
            <div class="relative bg-white/80 backdrop-blur-xl rounded-3xl shadow-[0_20px_60px_-15px_rgba(79,70,229,0.25)] overflow-hidden border border-white/40">
                <!-- Decoración de fondo -->
                <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                    <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-purple-400/20 to-indigo-400/20 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-gradient-to-tr from-indigo-300/20 to-purple-400/20 rounded-full blur-3xl"></div>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[radial-gradient(circle_at_center,rgba(120,119,198,0.08)_0,rgba(255,255,255,0)_60%)]"></div>
                </div>

                <!-- Header con diseño premium -->
                <div class="relative bg-gradient-to-r from-indigo-600 via-violet-600 to-purple-600 pt-16 pb-12 px-8 md:px-12 overflow-hidden">
                    <!-- Patrones decorativos -->
                    <div class="absolute inset-0 opacity-10">
                        <svg viewBox="0 0 100 100" class="absolute inset-0 w-full h-full">
                            <defs>
                                <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                    <rect width="0.5" height="0.5" fill="white"></rect>
                                </pattern>
                            </defs>
                            <rect width="100" height="100" fill="url(#grid)"></rect>
                        </svg>
                    </div>

                    <!-- Círculos decorativos con animación -->
                    <div class="absolute top-10 right-10 w-40 h-40 bg-gradient-to-tr from-indigo-500/40 to-purple-500/40 rounded-full blur-3xl animate-pulse-slow"></div>
                    <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-gradient-to-br from-indigo-500/40 to-fuchsia-500/40 rounded-full blur-3xl animate-pulse-slow delay-700"></div>

                    <!-- Contenido del header -->
                    <div class="relative flex flex-col items-center text-center">
                        <div class="inline-flex p-4 mb-6 bg-white/15 backdrop-blur-md rounded-2xl shadow-xl ring-1 ring-white/20 transform hover:rotate-6 transition-all duration-300 group">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <h1 class="text-4xl font-bold text-white tracking-tight mb-2 drop-shadow-md">Registro de Enfermera</h1>
                        <p class="text-xl text-indigo-100 font-light max-w-xl">Añade nuevos profesionales médicos al equipo de atención</p>

                        <!-- Indicador de progreso -->
                        <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2">
                            <div class="px-4 py-2 bg-white rounded-full shadow-lg">
                                <div class="flex space-x-2">
                                    <span class="w-2.5 h-2.5 bg-indigo-600 rounded-full"></span>
                                    <span class="w-2.5 h-2.5 bg-indigo-200 rounded-full"></span>
                                    <span class="w-2.5 h-2.5 bg-indigo-200 rounded-full"></span>
                                    <span class="w-2.5 h-2.5 bg-indigo-200 rounded-full"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenido del formulario -->
                <form action="{{ url('/admin/enfermeras/create') }}" method="POST" class="relative z-10 px-6 md:px-12 py-14">
                    @csrf

                    <!-- Notificación de error -->
                    @if (session('error'))
                        <div class="mb-8 bg-red-50 border-l-4 border-red-500 rounded-xl overflow-hidden animate-enter-right">
                            <div class="p-4 flex items-start space-x-4">
                                <div class="flex-shrink-0 bg-red-100 rounded-lg p-1.5">
                                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-base font-medium text-red-800">Ha ocurrido un error</h3>
                                    <p class="mt-1 text-sm text-red-700">{{ session('error') }}</p>
                                </div>
                                <button type="button" class="ml-auto bg-red-50 text-red-500 hover:text-red-700 rounded-full p-1 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endif

                    <!-- Sección: Datos Personales -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6 space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center shadow-md shadow-indigo-200">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Datos Personales</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombres -->
                            <div class="space-y-1 form-field group">
                                <label class="inline-block text-sm font-semibold text-gray-700 mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors duration-200">
                                    Nombres <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input class="form-input peer w-full px-5 py-4 rounded-xl bg-white border-2 border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 placeholder-gray-300"
                                           type="text"
                                           name="nombres"
                                           value="{{ old('nombres') }}"
                                           placeholder="Ingrese nombres"
                                           required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 peer-focus:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        @error('nombres')
                                        <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        @enderror
                                    </div>
                                </div>
                                @error('nombres')
                                <p class="text-sm text-red-600 mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Apellidos -->
                            <div class="space-y-1 form-field group">
                                <label class="inline-block text-sm font-semibold text-gray-700 mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors duration-200">
                                    Apellidos <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input class="form-input peer w-full px-5 py-4 rounded-xl bg-white border-2 border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 placeholder-gray-300"
                                           type="text"
                                           name="apellidos"
                                           value="{{ old('apellidos') }}"
                                           placeholder="Ingrese apellidos"
                                           required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 peer-focus:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        @error('apellidos')
                                        <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        @enderror
                                    </div>
                                </div>
                                @error('apellidos')
                                <p class="text-sm text-red-600 mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Cédula -->
                            <div class="space-y-1 form-field group">
                                <label class="inline-block text-sm font-semibold text-gray-700 mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors duration-200">
                                    Cédula <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input class="form-input peer w-full px-5 py-4 rounded-xl bg-white border-2 border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 placeholder-gray-300"
                                           type="text"
                                           name="cedula"
                                           value="{{ old('cedula') }}"
                                           placeholder="Ingrese cédula"
                                           required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 peer-focus:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5M10 6h4M10 6v2h4V6"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        @error('cedula')
                                        <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        @enderror
                                    </div>
                                </div>
                                @error('cedula')
                                <p class="text-sm text-red-600 mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Fecha de Nacimiento (Versión mejorada con datepicker personalizado) -->
                            <div class="space-y-1 form-field group">
                                <label class="inline-block text-sm font-semibold text-gray-700 mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors duration-200">
                                    Fecha de Nacimiento <span class="text-red-500">*</span>
                                </label>
                                <div class="relative date-picker-container">
                                    <input class="form-input peer w-full px-5 py-4 rounded-xl bg-white border-2 border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 placeholder-gray-300"
                                           type="text"
                                           id="fecha_nacimiento_display"
                                           placeholder="Seleccione fecha"
                                           readonly>
                                    <input type="hidden"
                                           id="fecha_nacimiento"
                                           name="fecha_nacimiento"
                                           value="{{ old('fecha_nacimiento') }}"
                                           required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 peer-focus:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <button type="button" id="calendar-toggle" class="text-gray-400 hover:text-indigo-600 focus:outline-none">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Calendario emergente personalizado -->
                                    <div id="calendar-popup" class="hidden absolute z-50 mt-2 bg-white rounded-xl shadow-xl border border-gray-200 p-4 w-72 animate-fade-in-down">
                                        <div class="flex justify-between items-center mb-4">
                                            <button type="button" id="prev-month" class="text-gray-500 hover:text-indigo-600 focus:outline-none">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                                                </svg>
                                            </button>
                                            <div class="text-center">
                                                <span id="current-month-year" class="text-sm font-medium text-gray-700"></span>
                                            </div>
                                            <button type="button" id="next-month" class="text-gray-500 hover:text-indigo-600 focus:outline-none">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="grid grid-cols-7 gap-1 text-center">
                                            <div class="text-xs font-medium text-gray-500">D</div>
                                            <div class="text-xs font-medium text-gray-500">L</div>
                                            <div class="text-xs font-medium text-gray-500">M</div>
                                            <div class="text-xs font-medium text-gray-500">M</div>
                                            <div class="text-xs font-medium text-gray-500">J</div>
                                            <div class="text-xs font-medium text-gray-500">V</div>
                                            <div class="text-xs font-medium text-gray-500">S</div>
                                        </div>

                                        <div id="calendar-days" class="grid grid-cols-7 gap-1 mt-2">
                                            <!-- Los días se generarán dinámicamente por JavaScript -->
                                        </div>
                                    </div>
                                </div>
                                @error('fecha_nacimiento')
                                <p class="text-sm text-red-600 mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Agregar este script al final del formulario, antes del </form> -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const displayInput = document.getElementById('fecha_nacimiento_display');
                                    const actualInput = document.getElementById('fecha_nacimiento');
                                    const calendarToggle = document.getElementById('calendar-toggle');
                                    const calendarPopup = document.getElementById('calendar-popup');
                                    const calendarDays = document.getElementById('calendar-days');
                                    const currentMonthYear = document.getElementById('current-month-year');
                                    const prevMonthBtn = document.getElementById('prev-month');
                                    const nextMonthBtn = document.getElementById('next-month');

                                    let currentDate = new Date();
                                    let selectedDate = actualInput.value ? new Date(actualInput.value) : null;

                                    // Si hay una fecha preseleccionada, mostrarla en el campo
                                    if (selectedDate) {
                                        displayInput.value = formatDate(selectedDate);
                                        currentDate = new Date(selectedDate);
                                    }

                                    // Generar calendario
                                    function generateCalendar(date) {
                                        const year = date.getFullYear();
                                        const month = date.getMonth();

                                        // Mostrar mes y año actuales
                                        const monthNames = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                                        currentMonthYear.textContent = `${monthNames[month]} ${year}`;

                                        // Calcular primer día del mes
                                        const firstDay = new Date(year, month, 1);
                                        const startingDay = firstDay.getDay(); // 0 = Domingo, 1 = Lunes, etc.

                                        // Calcular número de días en el mes
                                        const lastDay = new Date(year, month + 1, 0);
                                        const totalDays = lastDay.getDate();

                                        // Limpiar calendario
                                        calendarDays.innerHTML = '';

                                        // Agregar espacios vacíos para los días anteriores al primer día del mes
                                        for (let i = 0; i < startingDay; i++) {
                                            const emptyDay = document.createElement('div');
                                            calendarDays.appendChild(emptyDay);
                                        }

                                        // Generar días del mes
                                        for (let day = 1; day <= totalDays; day++) {
                                            const dayElement = document.createElement('div');
                                            dayElement.textContent = day;
                                            dayElement.classList.add('text-center', 'py-1', 'text-sm', 'rounded-full', 'cursor-pointer', 'hover:bg-indigo-100');

                                            // Si es hoy
                                            const today = new Date();
                                            if (day === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                                                dayElement.classList.add('bg-gray-100');
                                            }

                                            // Si es la fecha seleccionada
                                            if (selectedDate && day === selectedDate.getDate() && month === selectedDate.getMonth() && year === selectedDate.getFullYear()) {
                                                dayElement.classList.add('bg-indigo-600', 'text-white', 'font-medium');
                                            }

                                            // Evento al hacer clic en un día
                                            dayElement.addEventListener('click', () => {
                                                selectedDate = new Date(year, month, day);
                                                actualInput.value = formatDateForDatabase(selectedDate);
                                                displayInput.value = formatDate(selectedDate);
                                                calendarPopup.classList.add('hidden');
                                                generateCalendar(selectedDate); // Actualizar calendario
                                            });

                                            calendarDays.appendChild(dayElement);
                                        }
                                    }

                                    // Formato de fecha para mostrar (DD/MM/YYYY)
                                    function formatDate(date) {
                                        const day = date.getDate().toString().padStart(2, '0');
                                        const month = (date.getMonth() + 1).toString().padStart(2, '0');
                                        const year = date.getFullYear();
                                        return `${day}/${month}/${year}`;
                                    }

                                    // Formato de fecha para la base de datos (YYYY-MM-DD)
                                    function formatDateForDatabase(date) {
                                        const day = date.getDate().toString().padStart(2, '0');
                                        const month = (date.getMonth() + 1).toString().padStart(2, '0');
                                        const year = date.getFullYear();
                                        return `${year}-${month}-${day}`;
                                    }

                                    // Mostrar/ocultar calendario
                                    calendarToggle.addEventListener('click', () => {
                                        calendarPopup.classList.toggle('hidden');
                                        if (!calendarPopup.classList.contains('hidden')) {
                                            generateCalendar(currentDate);
                                        }
                                    });

                                    displayInput.addEventListener('click', () => {
                                        calendarPopup.classList.toggle('hidden');
                                        if (!calendarPopup.classList.contains('hidden')) {
                                            generateCalendar(currentDate);
                                        }
                                    });

                                    // Cambiar de mes
                                    prevMonthBtn.addEventListener('click', () => {
                                        currentDate.setMonth(currentDate.getMonth() - 1);
                                        generateCalendar(currentDate);
                                    });

                                    nextMonthBtn.addEventListener('click', () => {
                                        currentDate.setMonth(currentDate.getMonth() + 1);
                                        generateCalendar(currentDate);
                                    });

                                    // Cerrar calendario al hacer clic fuera
                                    document.addEventListener('click', (e) => {
                                        if (!calendarPopup.contains(e.target) && e.target !== displayInput && e.target !== calendarToggle && !calendarToggle.contains(e.target)) {
                                            calendarPopup.classList.add('hidden');
                                        }
                                    });

                                    // Inicializar el calendario
                                    generateCalendar(currentDate);
                                });
                            </script>

                            <style>
                                /* Animación para el calendario emergente */
                                @keyframes fadeInDown {
                                    from {
                                        opacity: 0;
                                        transform: translateY(-10px);
                                    }
                                    to {
                                        opacity: 1;
                                        transform: translateY(0);
                                    }
                                }

                                .animate-fade-in-down {
                                    animation: fadeInDown 0.2s ease-out forwards;
                                }

                                /* Estilos adicionales para el selector de fecha */
                                .date-picker-container {
                                    position: relative;
                                }

                                #fecha_nacimiento_display {
                                    cursor: pointer;
                                    background-color: white;
                                }
                            </style>
                        </div>
                    </div>

                    <!-- Sección: Información de Contacto -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6 space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-violet-500 to-fuchsia-600 rounded-xl flex items-center justify-center shadow-md shadow-fuchsia-200">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Información de Contacto</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Celular -->
                            <div class="space-y-1 form-field group">
                                <label class="inline-block text-sm font-semibold text-gray-700 mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors duration-200">
                                    Celular <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input class="form-input peer w-full px-5 py-4 rounded-xl bg-white border-2 border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 placeholder-gray-300"
                                           type="text"
                                           name="celular"
                                           value="{{ old('celular') }}"
                                           placeholder="Ingrese celular"
                                           required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 peer-focus:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        @error('celular')
                                        <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        @enderror
                                    </div>
                                </div>
                                @error('celular')
                                <p class="text-sm text-red-600 mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Correo -->
                            <div class="space-y-1 form-field group">
                                <label class="inline-block text-sm font-semibold text-gray-700 mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors duration-200">
                                    Correo <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input class="form-input peer w-full px-5 py-4 rounded-xl bg-white border-2 border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 placeholder-gray-300"
                                           type="email"
                                           name="email"
                                           value="{{ old('email') }}"
                                           placeholder="Ingrese correo"
                                           required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 peer-focus:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        @error('email')
                                        <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        @enderror
                                    </div>
                                </div>
                                @error('email')
                                <p class="text-sm text-red-600 mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Sección: Información de Acceso -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6 space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-indigo-600 to-blue-600 rounded-xl flex items-center justify-center shadow-md shadow-blue-200">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Información de Acceso</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Contraseña -->
                            <div class="space-y-1 form-field group">
                                <label class="inline-block text-sm font-semibold text-gray-700 mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors duration-200">
                                    Contraseña <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input class="form-input peer w-full px-5 py-4 rounded-xl bg-white border-2 border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 placeholder-gray-300"
                                           type="password"
                                           name="password"
                                           placeholder="Ingrese contraseña"
                                           required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 peer-focus:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600" onclick="togglePasswordVisibility(this)">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1 ml-1">Mínimo 8 caracteres, incluya letras y números</p>
                                @error('password')
                                <p class="text-sm text-red-600 mt-1 ml-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div class="space-y-1 form-field group">
                                <label class="inline-block text-sm font-semibold text-gray-700 mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors duration-200">
                                    Confirmar Contraseña <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <input class="form-input peer w-full px-5 py-4 rounded-xl bg-white border-2 border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 placeholder-gray-300"
                                           type="password"
                                           name="password_confirmation"
                                           placeholder="Confirme contraseña"
                                           required>
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 peer-focus:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <button type="button" class="text-gray-400 hover:text-gray-600 focus:outline-none focus:text-gray-600" onclick="togglePasswordVisibility(this)">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sección: Dirección -->
                    <div class="mb-10">
                        <div class="flex items-center mb-6 space-x-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl flex items-center justify-center shadow-md shadow-pink-200">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Dirección</h2>
                        </div>

                        <div class="space-y-1 form-field group">
                            <label class="inline-block text-sm font-semibold text-gray-700 mb-2 ml-1 group-focus-within:text-indigo-600 transition-colors duration-200">
                                Dirección <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                            <textarea class="form-textarea peer w-full px-5 py-4 rounded-xl bg-white border-2 border-gray-200 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 transition-all duration-200 placeholder-gray-300"
                                      name="direccion"
                                      rows="4"
                                      placeholder="Ingrese dirección completa"
                                      required>{{ old('direccion') }}</textarea>
                                <div class="absolute top-4 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 peer-focus:text-indigo-600 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <div class="absolute top-4 right-0 pr-3 flex items-center">
                                    @error('direccion')
                                    <svg class="w-5 h-5 text-red-500 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    @enderror
                                </div>
                            </div>
                            @error('direccion')
                            <p class="text-sm text-red-600 mt-1 ml-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-4 pt-6 mt-10 border-t border-gray-100">
                        <a href="{{ url('admin/enfermeras') }}" class="relative inline-flex items-center justify-center px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-xl overflow-hidden group hover:bg-gray-50 transition-all duration-300 ease-out">
                            <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-gray-100 rounded-full group-hover:w-80 group-hover:h-80 opacity-10"></span>
                            <svg class="w-5 h-5 mr-2 text-gray-500 group-hover:text-gray-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            <span class="relative">Cancelar</span>
                        </a>

                        <button type="submit" class="relative inline-flex items-center justify-center px-10 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl overflow-hidden group hover:shadow-lg transition-all duration-300 ease-out">
                            <span class="absolute w-0 h-0 transition-all duration-500 ease-out bg-white rounded-full group-hover:w-80 group-hover:h-80 opacity-10"></span>
                            <svg class="w-5 h-5 mr-2 text-white/90 group-hover:animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span class="relative">Registrar Enfermera</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Script para mostrar/ocultar contraseña -->
        <script>
            function togglePasswordVisibility(button) {
                const input = button.closest('.relative').querySelector('input');
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);

                // Cambiar ícono
                const svg = button.querySelector('svg');
                if (type === 'text') {
                    svg.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                `;
                } else {
                    svg.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                `;
                }
            }

            // Agregar clases específicas cuando se enfoca un input
            document.querySelectorAll('.form-input, .form-textarea').forEach(input => {
                input.addEventListener('focus', () => {
                    input.closest('.form-field').classList.add('focused');
                });
                input.addEventListener('blur', () => {
                    input.closest('.form-field').classList.remove('focused');
                });
            });

            // Efecto de ripple en los botones
            document.querySelectorAll('button[type="submit"], a[href]').forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!this.classList.contains('group')) return;

                    const rect = button.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const ripple = document.createElement('span');
                    ripple.classList.add('ripple-effect');
                    ripple.style.left = `${x}px`;
                    ripple.style.top = `${y}px`;

                    button.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        </script>

        <style>
            /* Animaciones personalizadas */
            @keyframes pulse-slow {
                0%, 100% { opacity: 0.5; }
                50% { opacity: 0.8; }
            }

            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }

            @keyframes enter-right {
                from { opacity: 0; transform: translateX(20px); }
                to { opacity: 1; transform: translateX(0); }
            }

            .animate-pulse-slow {
                animation: pulse-slow 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            .animate-enter-right {
                animation: enter-right 0.5s ease-out forwards;
            }

            .delay-700 {
                animation-delay: 700ms;
            }

            .form-field.focused .text-gray-700 {
                color: rgb(79 70 229);
            }

            /* Estilo para el efecto ripple */
            .ripple-effect {
                position: absolute;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.4);
                width: 100px;
                height: 100px;
                margin-top: -50px;
                margin-left: -50px;
                animation: ripple 0.6s linear;
                pointer-events: none;
            }

            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }

            /* Mejoras para los inputs */
            .form-input, .form-textarea {
                padding-left: 2.5rem;
            }

            .form-input:focus, .form-textarea:focus {
                @apply ring-2 ring-indigo-300 border-indigo-500;
                box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.1);
            }

            /* Fondo con patrón */
            .bg-pattern {
                background-size: 20px 20px;
                background-image: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            }
        </style>
    </div>
@endsection
