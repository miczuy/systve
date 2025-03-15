<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Systve</title>
    @vite('resources/css/app.css')
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="{{url('https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js')}}"></script>

    <!-- Boxicon-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Reloj -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- FullCalendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="fullcalendar/es.global.js"></script>

</head>
<body>
<nav class="sidebar close">
    <header>
        <div class="image-text">
        <span class="image">
            <img src="{{ asset('systve/public/images/logo2.png') }}" alt="Corazón">
        </span>

            <div class="text header-text">
                <span class="name">{{ Auth::user()->name }}</span>
                <span class="professional">Huellitas del Corazón</span>
            </div>
        </div>
        <div class="toggle-container">
            <img class="toggle" src="{{ asset('systve/public/images/corazon.png') }}" alt="Corazón">
        </div>
    </header>


    <div class="menu-bar">
        <div class="menu">
            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="text" placeholder="Search...">
            </li>
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="{{url('admin')}}">
                        <div class="icon">
                            <img src="{{ asset('systve/public/images/patita.png') }}" alt="Dashboard">
                        </div>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- Vista que solo ve Admin-->

                 @can('admin.usuarios.index')
                    <li class="nav-link">
                        <a href="{{url('admin/usuarios/create')}}">
                            <div class="icon">
                                    <img src="https://cdn-icons-png.flaticon.com/512/17948/17948663.png" alt="Usuarios" class="h-14 w-14">
                            </div>
                            <span class="text nav-text">Usuario</span>
                        </a>
                    </li>
                @endcan


                <!-- Vista que solo ve Enfermera-->
                @can('admin.enfermeras.index')
                <li class="nav-link">
                    <a href="{{url('admin/enfermeras/create')}}">
                        <div class="icon">
                            <img src="https://cdn-icons-png.flaticon.com/512/3621/3621358.png" alt="Enfermera">
                        </div>
                        <span class="text nav-text">Enfermera</span>
                    </a>
                </li>
                @endcan

                <!-- Vista que solo ve Enfermera-->
                @can('admin.pacientes.index')
                <li class="nav-link">
                    <a href="{{url('admin/pacientes/create')}}">
                        <div class="icon">
                            <img src="https://cdn-icons-png.flaticon.com/512/789/789479.png" alt="Paciente">
                        </div>
                        <span class="text nav-text">Paciente</span>
                    </a>
                </li>
                @endcan


                <!-- Vista que solo ve Consultorio-->
                @can('admin.consultorios.index')
                <li class="nav-link">
                    <a href="{{url('admin/consultorios/create')}}">
                        <div class="icon">
                            <img src="https://cdn-icons-png.flaticon.com/512/17958/17958385.png" alt="Consultorio">
                        </div>
                        <span class="text nav-text">Consultorio</span>
                    </a>
                </li>
                @endcan

                <!-- Vista que solo ve Doctores-->
                @can('admin.doctores.index')
                <li class="nav-link">
                    <a href="{{url('admin/doctores/create')}}">
                        <div class="icon">
                            <img src="https://cdn-icons-png.flaticon.com/512/4807/4807695.png" alt="Doctor">
                        </div>
                        <span class="text nav-text">Doctor</span>
                    </a>
                </li>
                @endcan

                <!-- Vista que solo ve Doctores-->
                @can('admin.horarios.index')
                <li class="nav-link">
                    <a href="{{url('admin/horarios/create')}}">
                        <div class="icon">
                            <img src="https://cdn-icons-png.flaticon.com/512/13717/13717782.png" alt="Horario">
                        </div>
                        <span class="text nav-text">Horario</span>
                    </a>
                </li>
                @endcan


                <!-- Vista que solo ve Usuarios (Reportes)-->
                @can('admin.usuarios.index')
                    <li class="nav-link">
                        <a href="{{url('admin/reservas/reportes')}}">
                            <div class="icon">
                                <img src="   https://cdn-icons-png.flaticon.com/512/3147/3147258.png " width="50" height="50" alt="" title="" class="img-small">
                            </div>
                            <span class="text nav-text">Reservas</span>
                        </a>
                    </li>
                @endcan

                <!-- Vista que solo ve Usuarios (Reportes)-->
                @can('admin.historial.index')
                    <li class="nav-link">
                        <a href="{{url('/admin/historial')}}">
                            <div class="icon">
                                <img src="   https://cdn-icons-png.flaticon.com/512/3045/3045155.png "  width="50" height="50" alt="" title="" class="img-small">
                            </div>
                            <span class="text nav-text">Historial Medico</span>
                        </a>
                    </li>
                @endcan



            </ul>


        </div>

        <div class="bottom-content">

            <!-- Vista que solo ve Admin -->
            @can('admin.usuarios.index')
                <li class="nav-link">
                    <a href="{{url('/admin/configuraciones')}}">
                        <div class="icon">
                            <!-- Eliminado el div con el fondo de gradiente -->
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <span class="text nav-text">Configuraciones</span>
                    </a>
                </li>
            @endcan

            <li class="logout-item">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out icon'></i>
                    <span class="text nav-text">Logout</span>
                </a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <li class="mode">
                <div class="moon-sun">
                    <i class='bx bx-moon icon moon '></i>
                    <i class='bx bx-sun icon sun '></i>
                </div>
                <span class="mode-text text">Dark Mode</span>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </li>
        </div>

    </div>
</nav>

<section class="home place-content-center">
    @yield('content')
</section>


<script>
    // Selecciona el elemento <body> del documento HTML
    const body = document.querySelector("body"),
        // Selecciona el elemento con la clase "sidebar" dentro del body
        sidebar = body.querySelector(".sidebar"),
        // Selecciona el elemento con la clase "toggle" dentro del body
        toggle = body.querySelector(".toggle"),
        // Selecciona el elemento con la clase "search-box" dentro del body
        searchBtn = body.querySelector(".search-box"),
        // Selecciona el elemento con la clase "toggle-switch" dentro del body
        modeSwtich = body.querySelector(".toggle-switch"),
        // Selecciona el elemento con la clase "mode-text" dentro del body
        modeText = body.querySelector(".mode-text");

    // Añade un evento "click" al botón de toggle (menu hamburguesa u otro controlador)
    toggle.addEventListener("click", () =>{
        // Alterna la clase "close" en el elemento "sidebar"
        // Si la clase "close" está presente, la elimina; si no está presente, la añade
        // Esto se usa típicamente para abrir/cerrar o mostrar/ocultar la barra lateral
        sidebar.classList.toggle("close");
    });

    // Añade un evento "click" al interruptor de modo (claro/oscuro)
    modeSwtich.addEventListener("click", () =>{
        // Alterna la clase "dark" en el elemento <body>
        // Si la clase "dark" está presente, la elimina (modo claro); si no está, la añade (modo oscuro)
        body.classList.toggle("dark");

        // Comprueba si el cuerpo tiene la clase "dark"
        if(body.classList.contains("dark")){
            // Si está en modo oscuro, cambia el texto contenido en "modeText" a "Light Mode"
            modeText.innerText = "Light Mode";
        }else{
            // Si no está en modo oscuro, cambia el texto contenido en "modeText" a "Dark Mode"
            modeText.innerText = "Dark Mode";
        }
    });
</script>

    <!-- Script para la alerta de sesión -->
@if(Session::has('mensaje') && Session::has('icono'))
    <script>
        Swal.fire({
            position: "center",
            icon: "{{ Session::get('icono') }}",
            title: "{{ Session::get('mensaje') }}",
            showConfirmButton: false,
            timer: 4500
        });
    </script>
@endif
</body>
</html>
