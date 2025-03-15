<!-- resources/views/admin/reports.blade.php -->
@extends('layouts.admin')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Encabezado con diseño moderno -->
        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Reportes de Citas Médicas</h1>
            <div class="h-1 w-24 bg-blue-600 mx-auto rounded-full"></div>
            <p class="mt-4 text-gray-600">Genera informes detallados sobre las reservas de citas</p>
        </div>

        <!-- Contenedor de tarjetas de reportes -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            <!-- Tarjeta de reporte 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                <div class="h-2 bg-green-500 w-full"></div>
                <div class="p-6">
                    <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center text-gray-800 mb-3">Reporte Completo</h3>
                    <p class="text-gray-600 text-center mb-6">Genera un listado completo de todas las reservas de citas médicas en el sistema.</p>
                    <div class="text-center">
                        <a href="{{ url('/admin/reservas/pdf') }}" class="inline-flex items-center px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition duration-300 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Descargar PDF
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de reporte 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                <div class="h-2 bg-blue-500 w-full"></div>
                <div class="p-6">
                    <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center text-gray-800 mb-3">Reporte de Pacientes</h3>
                    <p class="text-gray-600 text-center mb-6">Visualiza las estadísticas de los pacientes agrupados.</p>
                    <div class="text-center">
                        <a href="{{ route('admin.pacientes.export-pdf') }}" class="inline-flex items-center px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Generar Reporte
                        </a>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de reporte 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                <div class="h-2 bg-purple-500 w-full"></div>
                <div class="p-6">
                    <div class="w-16 h-16 rounded-full bg-purple-100 flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center text-gray-800 mb-3">Reporte de Doctores</h3>
                    <p class="text-gray-600 text-center mb-6">Genera un informe de doctores con su especialidades.</p>
                    <div class="text-center">
                        <a href="{{ route('admin.doctores.export-pdf') }}" class="inline-flex items-center px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition duration-300 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Generar Reporte
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulario de reportes por fechas - Versión mejorada y centrada -->
        <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden mb-16">
            <div class="h-2 bg-indigo-500 w-full"></div>
            <div class="px-6 py-8">
                <div class="flex justify-center mb-6">
                    <div class="w-14 h-14 rounded-full bg-indigo-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-semibold text-center text-gray-800 mb-2">Reporte por Fechas</h3>
                <p class="text-gray-500 text-center mb-8">Selecciona un rango de fechas para generar un informe personalizado</p>

                <form action="{{route('admin.reservas.pdf_fechas')}}" method="GET">
                    @csrf
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
                        <div>
                            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700 mb-1">Fecha inicio</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio"
                                   class="block w-full sm:w-44 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div>
                            <label for="fecha_fin" class="block text-sm font-medium text-gray-700 mb-1">Fecha fin</label>
                            <input type="date" id="fecha_fin" name="fecha_fin"
                                   class="block w-full sm:w-44 px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        </div>
                        <div class="mt-6 sm:mt-0 h-6">
                            <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-300 shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                                Generar Reporte
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Panel de estadísticas rápidas -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-12">
            <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Estadísticas Rápidas</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-blue-50 rounded-lg p-4 text-center">
                    <div class="text-blue-500 text-2xl font-bold">{{ $totalCitas }}</div>
                    <div class="text-gray-600">Citas Totales</div>
                </div>
                <div class="bg-green-50 rounded-lg p-4 text-center">
                    <div class="text-green-500 text-2xl font-bold">{{ $citasAtendidas }}</div>
                    <div class="text-gray-600">Citas Atendidas</div>
                </div>
                <div class="bg-yellow-50 rounded-lg p-4 text-center">
                    <div class="text-yellow-500 text-2xl font-bold">{{ $citasPendientes }}</div>
                    <div class="text-gray-600">Citas Pendientes</div>
                </div>
                <div class="bg-red-50 rounded-lg p-4 text-center">
                    <div class="text-red-500 text-2xl font-bold">{{ $citasCanceladas }}</div>
                    <div class="text-gray-600">Citas Canceladas</div>
                </div>
            </div>
        </div>

        <!-- Sección de ayuda -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/4 mb-4 md:mb-0 flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="md:w-3/4 md:pl-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">¿Necesitas ayuda con los reportes?</h3>
                    <p class="text-gray-600 mb-4">Si necesitas asistencia para generar reportes personalizados o tienes alguna duda sobre los formatos disponibles, contacta al equipo de soporte.</p>
                    <a href="#" class="text-blue-600 hover:text-blue-800 font-medium">Ver documentación →</a>
                </div>
            </div>
        </div>
    </div>
@endsection
