<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria</title>
    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

</head>
<body class="bg-gray-50 dark:bg-gray-900">
<header>
    <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="#" class="flex items-center">
                <img src="./images/logo2.png" class="h-20 mr-3 sm:h-20" alt="Landwind Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Vetsys</span>
            </a>
            <div class="flex items-center lg:order-2">
                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end space-x-3">
                        @auth
                        @else
                            <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Register</a>
                            @endif
                        @endauth
                    </nav>
                @endif
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li><a href="#" class="block py-2 pl-3 pr-4 text-white bg-purple-700 rounded lg:bg-transparent lg:text-purple-700 lg:p-0 dark:text-white" aria-current="page">Home</a></li>
                    <li><a href="#" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Marketplace</a></li>
                    <li><a href="#Reseña" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Reseña</a></li>
                    <li><a href="#Actividades que Hacemos" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Laboratorios</a></li>
                    <li><a href="#preguntas-frecuentes" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Equipo</a></li>
                    <li><a href="#" class="block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-purple-700 lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

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
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4 justify-center">
                <!-- Instagram Button -->
                <a href="https://www.instagram.com/?hl=es" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-center text-white border border-gray-200 rounded-lg sm:w-auto focus:ring-4 focus:ring-gray-100 hover:bg-opacity-90 transition-all" style="background-color: #f09433; background-image: linear-gradient(315deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter">
                        <path d="M11.999 7.377a4.623 4.623 0 1 0 0 9.248 4.623 4.623 0 0 0 0-9.248zm0 7.627a3.004 3.004 0 1 1 0-6.008 3.004 3.004 0 0 1 0 6.008z"></path>
                        <circle cx="16.806" cy="7.207" r="1.078"></circle>
                        <path d="M20.533 6.111A4.605 4.605 0 0 0 17.9 3.479a6.606 6.606 0 0 0-2.186-.42c-.963-.042-1.268-.054-3.71-.054s-2.755 0-3.71.054a6.554 6.554 0 0 0-2.184.42 4.6 4.6 0 0 0-2.633 2.632 6.585 6.585 0 0 0-.419 2.186c-.043.962-.056 1.267-.056 3.71 0 2.442 0 2.753.056 3.71.015.748.156 1.486.419 2.187a4.61 4.61 0 0 0 2.634 2.632 6.584 6.584 0 0 0 2.185.45c.963.042 1.268.055 3.71.055s2.755 0 3.71-.055a6.615 6.615 0 0 0 2.186-.419 4.613 4.613 0 0 0 2.633-2.633c.263-.7.404-1.438.419-2.186.043-.962.056 1.267.056 3.71s0-2.753-.056-3.71a6.581 6.581 0 0 0-.421-2.217zm-1.218 9.532a5.043 5.043 0 0 1-.311 1.688 2.987 2.987 0 0 1-1.712 1.711 4.985 4.985 0 0 1-1.67.311c-.95.044-1.218.055-3.654.055-2.438 0-2.687 0-3.655-.055a4.96 4.96 0 0 1-1.669-.311 2.985 2.985 0 0 1-1.719-1.711 5.08 5.08 0 0 1-.311-1.669c-.043-.95-.053-1.218-.053-3.654 0-2.437 0-2.686.053-3.655a5.038 5.038 0 0 1 .311-1.687c.305-.789.93-1.41 1.719-1.712a5.01 5.01 0 0 1 1.669-.311c.951-.043 1.218-.055 3.655-.055s2.687 0 3.654.055a4.96 4.96 0 0 1 1.67.311 2.991 2.991 0 0 1 1.712 1.712 5.08 5.08 0 0 1 .311 1.669c.043.951.054 1.218.054 3.655 0 2.436 0 2.698-.043 3.654h-.011z"></path>
                    </svg>
                    <span class="ml-2">Instagram</span>
                </a>
                <!-- Facebook Button -->
                <a href="https://www.facebook.com" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-medium text-white bg-blue-600 border border-gray-200 rounded-lg sm:w-auto focus:outline-none hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: msFilter">
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
<div id="modal" class="fixed inset-0 bg-black bg-opacity-100 flex items-center justify-center hidden z-50">
    <div id="consultorio_container" class="bg-white rounded-lg shadow-md w-3/4 p-4">
        <!-- Encabezado -->
        <div class="flex flex-col items-center gap-4 mb-6">
            <!-- Ícono -->
            <div class="bg-blue-500 p-2 rounded-lg">
                <img src="https://cdn-icons-png.freepik.com/512/3652/3652191.png" alt="Calendario" class="w-8 h-8">
            </div>
            <!-- Texto -->
            <div class="text-center">
                <h2 class="text-xl font-bold text-gray-800">Calendario de Doctores</h2>
                <p class="text-sm text-gray-500">Visualización semanal de horarios médicos</p>
            </div>
        </div>

        <!-- Campo de selección -->
        <div class="mb-6">
            <label for="consultorio_select" class="block text-sm font-medium text-gray-700 mb-2 text-center">Selecciona un consultorio:</label>
            <select id="consultorio_select" name="consultorio_id"
                    class="w-full px-4 py-2 bg-gray-100 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-200">
                <option value="" disabled selected>Seleccione un consultorio</option>
                @foreach($consultorios as $consultorio)
                    <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}</option>
                @endforeach
            </select>
        </div>

        <!-- Espacio para información del consultorio -->
        <div id="consultorio_info" class="text-sm text-gray-600 mb-4 text-center"></div>

        <!-- Contenedor para centrar el botón -->
        <div class="flex justify-center">
            <!-- Botón de cerrar -->
            <button id="close_button" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">
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
        $('#modal').css('backdrop-filter', 'blur(5px)'); // Aplicar desenfoque
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
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    $('#consultorio_info').html(data);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error('Error al obtener los datos del consultorio:', textStatus, errorThrown);
                    alert('Error al obtener los datos del consultorio. Por favor, inténtelo de nuevo más tarde.');
                }
            });
        } else {
            $('#consultorio_info').html('');
        }
    });
</script>

<style>
    /* Estilo para el desenfoque del fondo */
    body.modal-open {
        overflow: hidden; /* Evitar el scroll del body */
    }
</style>



<div class="max-w-2xl mx-auto">
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
    <p class="mt-5 text-center text-gray-700 text-lg font-semibold">
        Marcas que trabajan para nosotros!
        <a class="text-blue-600 hover:text-blue-800 hover:underline transition-colors" href="https://www.youtube.com/watch?v=7bhKI0Mw6Yk&ab_channel=ExpertoAnimal" target="_blank">
            Disfruta de un video
        </a>.
    </p>

    <!-- Script for Carousel -->
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
</div>
<!-- End block -->


<!-- Start block -->

<section class="bg-gray-50 dark:bg-gray-800">
    <div id="Actividades que Hacemos" class="max-w-screen-xl px-4 py-8 mx-auto space-y-12 lg:space-y-20 lg:py-24 lg:px-6">
        <!-- Row -->
        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
            <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Actividades que Hacemos</h2>
                <p class="mb-8 font-light lg:text-xl">La veterinaria es responsable del cuidado integral de los animales, tanto domésticos como de granja. Sus tareas abarcan diversos aspectos Teniendo siempre en mente la salud y Bienestar.</p>

                <!-- Lista en columnas -->
                <div class="grid grid-cols-2 gap-6 pt-8 border-t border-gray-200 my-7 dark:border-gray-700">
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
                            <!-- Icono -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Diagnóstico y tratamiento</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icono -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Vacunación y prevención</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icono -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Cuidados de emergencia</span>
                        </li>
                    </ul>

                    <!-- Segunda columna -->
                    <ul role="list" class="space-y-5">
                        <li class="flex space-x-3">
                            <!-- Icono -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Asesoramiento y educación</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icono -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Procedimientos quirúrgicos</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icono -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Manejo de registros</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icono -->
                            <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Monitoreo y seguimiento</span>
                        </li>
                    </ul>
                </div>

                <p class="text-center mb-8 font-light text-2xl">Perfeccionando tus habilidades, confía en tu formación y recuerda que tu trabajo mejora la vida de incontables seres vivos.</p>
            </div>


            <!-- Carrusel Nota: Este se realizo con otro metodo.-->
            <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


            <main class="grid min-h-screen w-full place-content-center ">
                <div x-data="imageSlider" class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
                    <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
                        <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
                    </div>

                    <button @click="previous()" class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                        <i class="fas fa-chevron-left text-2xl font-bold text-gray-500"></i>
                    </button>

                    <button @click="forward()" class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                        <i class="fas fa-chevron-right text-2xl font-bold text-gray-500"></i>
                    </button>

                    <div class="relative h-80" style="width: 30rem">
                        <template x-for="(image, index) in images">
                            <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0">
                                <img :src="image" alt="image" class="rounded-sm" />
                            </div>
                        </template>
                    </div>
                </div>
            </main>

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
        </div>


        <!-- Row -->


        <div class="items-center gap-8 lg:grid lg:grid-cols-2 xl:gap-16">
            <!-- component -->
            <section class="text-gray-600 body-font relative">
                <div class="absolute inset-0 bg-gray-300">
                    <iframe width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" title="map" scrolling="no" <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7846.070859080576!2d-66.9124916067298!3d10.497873257822716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c2a5f2a06b1913f%3A0xbc1e74b91c544a3f!2sSan%20Agust%C3%ADn%20del%20Nte%2C%20Caracas%2C%20Distrito%20Capital!5e0!3m2!1ses-419!2sve!4v1720573113492!5m2!1ses-419!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="container px-5 py-24 mx-auto flex">
                    <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
                        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font text-center">Comentario</h2>
                        <p class="leading-relaxed mb-5 text-gray-600  text-center ">Gracias por Comentar</p>
                        <div class="relative mb-4">
                            <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                            <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="relative mb-4">
                            <label for="message" class="leading-7 text-sm text-gray-600">Mensaje</label>
                            <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Enviar</button>
                        <p class="text-xs text-gray-500 mt-3">La informacion sera Totalmente Leida con Preacausion sin ningun benefinicio.</p>
                    </div>
                </div>
            </section>
            <div id="Reseña" class="text-gray-500 sm:text-lg dark:text-gray-400">
                <div class="flex justify-center"><h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Reseña</h2></div>
                <p class="mb-8 font-light lg:text-xl">La Veterinaria tiene una larga y distinguida historia en la comunidad local, brindando servicios veterinarios de alta calidad durante más de 25 años. Fue fundada por un veterinario con una profunda pasión por el cuidado de animales.Desde sus inicios, la Veterinaria se ha distinguido por su enfoque en la medicina preventiva y el bienestar integral de las mascotas. El fundador reunió a un equipo de veterinarios y personal de apoyo altamente capacitados, quienes comparten su visión de proporcionar una atención excepcional a cada uno de sus pacientes.</p>
                <!-- List -->
                <ul role="list" class="pt-8 space-y-5 border-t border-gray-200 my-7 dark:border-gray-700">
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Excelencia en atención médica</span>
                    </li>
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Enfoque en la prevención y el bienestar</span>
                    </li>
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Infraestructura moderna</span>
                    </li>
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Atención personalizada</span>
                    </li>
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Compromiso con la comunidad</span>
                    </li>
                    <li class="flex space-x-3">
                        <!-- Icon -->
                        <svg class="flex-shrink-0 w-5 h-5 text-purple-500 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Trayectoria y experiencia</span>
                    </li>
                </ul>
                <p class="font-light lg:text-xl">Estos puntos fuertes han permitido a la Veterinaria posicionarse como una referencia en la prestación de servicios veterinarios de alta calidad en la región.</p>
            </div>
        </div>
    </div>
</section>
<!-- End block -->

<!-- Start block -->
<section class="bg-white dark:bg-gray-900">
    <div class="items-center max-w-screen-xl px-4 py-8 mx-auto lg:grid lg:grid-cols-4 lg:gap-16 xl:gap-24 lg:py-24 lg:px-6">
        <div class="col-span-2 mb-8">
            <p class="text-lg font-medium text-purple-600 dark:text-purple-500">Confiable en todo el mundo</p>
            <h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-3xl dark:text-white">Con la confianza de más de 600 millones de usuarios y 1000 equipos</h2>
            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Nuestros rigurosos estándares de seguridad y cumplimiento son la base de todo lo que hacemos. Trabajamos incansablemente para protegerlo a usted y a sus Mascotas.</p>
            <div class="pt-6 mt-6 space-y-4 border-t border-gray-200 dark:border-gray-700">
                <div>
                    <a href="#" class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-700">
                        Documentacion
                        <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                <div>
                    <a href="#" class="inline-flex items-center text-base font-medium text-purple-600 hover:text-purple-800 dark:text-purple-500 dark:hover:text-purple-700">
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
<!-- End block -->
<!-- Start block -->
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
                <img class="w-18 h-20 rounded-full" src="./images/diseño.jpg" alt="hero image" >
                <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                    <div class="pr-3 font-medium text-gray-900 dark:text-white">Jose Farias & Henry Ortiz </div>
                    <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">CEO</div>
                </div>
            </figcaption>
        </figure>
    </div>
</section>
<!-- End block -->
<!-- Start block -->
<!-- component -->
<div class="bg-gradient-to-bl from-blue-50 to-violet-50 flex items-center justify-center lg:h-screen">
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-4">
            <!-- Replace this with your grid items -->
            <div class="bg-white rounded-lg border p-4">
                <img src="https://img.freepik.com/foto-gratis/adorable-gatito-blanco-negro-pared-monocromatica-detras-ella_23-2148955177.jpg?t=st=1720614265~exp=1720617865~hmac=12be83204507129b5a6ed1705762f7ee7167b842b53b000191ebaa640147ca8f&w=1060" alt="Placeholder Image" class="w-full h-48 rounded-md object-cover">
                <div class="px-1 py-4">
                    <div class="font-bold text-xl text-center mb-2">Tom</div>
                    <p class="text-gray-700 text-base">
                        Ton es un gato juguetón y travieso. A pesar de su tamaño, es ágil y curioso, siempre explorando su entorno.
                    </p>
                </div>

            </div>
            <div class="bg-white rounded-lg border p-4">
                <img src="https://img.freepik.com/foto-gratis/aislado-feliz-sonriente-perro-fondo-blanco-retrato-4_1562-693.jpg?t=st=1720614501~exp=1720618101~hmac=5155b49970f2b97a1aba96392d18eee4935d474707aee49990d453b255c6c810&w=996" alt="Placeholder Image" class="w-full h-48 rounded-md object-cover">
                <div class="px-1 py-4">
                    <div class="font-bold text-xl text-center mb-2">Coco</div>
                    <p class="text-gray-700 text-base">
                        Fido es un perro amable y enérgico. Con su pelaje suave y brillante, y una sonrisa permanente, siempre está listo para jugar y recibir cariño.
                    </p>
                </div>

            </div>
            <div class="bg-white rounded-lg border p-4">
                <img src="https://img.freepik.com/foto-gratis/conejito-pascua-huevo-pintado-pared-amarilla_155003-35887.jpg?t=st=1720615773~exp=1720619373~hmac=713b92fccb88c45659051e04099baa8958ff4894c79c6a2845437032f19ae386&w=996" alt="Placeholder Image" class="w-full h-48 rounded-md object-cover">
                <div class="px-1 py-4">
                    <div class="font-bold text-xl text-center mb-2">Perla</div>
                    <p class="text-gray-700 text-base">
                        Perla es un conejo curioso y encantador. Con sus grandes ojos redondos y sus suaves orejas, cautiva a todos los que lo conocen.
                    </p>
                </div>

            </div>
            <div class="bg-white rounded-lg border p-4">
                <img src="https://img.freepik.com/fotos-premium/lindo-pequeno-hamster-blanco-todo-cuerpo-fondo-blanco_943281-93846.jpg?w=740" alt="Placeholder Image" class="w-full h-48 rounded-md object-cover">
                <div class="px-1 py-4">
                    <div class="font-bold text-xl text-center mb-2">Jerry</div>
                    <p class="text-gray-700 text-base">
                        Jerry es un hámster encantador y lleno de energía. Con su pelaje suave y sus mejillas abultadas, es una criatura adorable que cautiva a todos los que lo conocen.
                    </p>
                </div>
            </div>
            <!-- Add more items as needed -->
        </div>
    </div>
</div>
<!-- End block -->
<!-- Start block -->
<section class="bg-white dark:bg-gray-900">
    <div id="preguntas-frecuentes" class="max-w-screen-xl px-4 pb-8 mx-auto lg:pb-24 lg:px-6 ">
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
                        <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400">

                        </ul>
                    </div>
                </div>

            </div>
</section>
<!-- End block -->
<!-- Start block -->
<section class="bg-gray-50 dark:bg-gray-800">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-16 lg:px-6">
        <div class="max-w-screen-sm mx-auto text-center">
            <h2 class="mb-4 text-3xl font-extrabold leading-tight tracking-tight text-gray-900 dark:text-white">Suscribete</h2>
            <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">Informacion sobre el Servicio.</p>
            <a href="register" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Aqui</a>
        </div>
    </div>
</section>
<!-- End block -->
<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

</body>
</html>
