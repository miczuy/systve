@vite('resources/css/app.css')

<body class="bg-gray-100">
<!-- Fondo animado -->
<div class="relative w-full h-screen overflow-hidden">
    <!-- Formas abstractas -->
    <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-200 opacity-50"></div>
    <div class="absolute top-20 left-10 bg-blue-400 w-64 h-64 rounded-full mix-blend-multiply filter blur-2xl opacity-50 animate-spin-slow"></div>
    <div class="absolute top-40 right-10 bg-pink-400 w-72 h-72 rounded-full mix-blend-multiply filter blur-2xl opacity-50 animate-spin-reverse"></div>
    <div class="absolute bottom-20 left-32 bg-purple-400 w-48 h-48 rounded-full mix-blend-multiply filter blur-2xl opacity-50 animate-pulse"></div>
</div>

<!-- Contenido principal -->
<section class="absolute inset-0 flex items-center justify-center">
    <div id="login-container" class="flex flex-col lg:flex-row bg-gradient-to-br from-white via-gray-100 to-gray-200 shadow-2xl rounded-lg overflow-hidden max-w-4xl w-full transform opacity-0 translate-y-10 transition-all duration-700 ease-out">
        <!-- Lado izquierdo con bienvenida -->
        <div class="hidden lg:flex lg:flex-col lg:w-1/2 bg-gradient-to-tr from-indigo-600 via-purple-600 to-pink-400 text-white items-center justify-center p-8 relative">
            <div class="text-center">
                <h1 class="text-4xl font-bold">¡Bienvenido a Vetsys!</h1>
                <p class="mt-4 text-lg">Tu sistema confiable para el cuidado de tus mascotas.</p>
                <img src="https://img.freepik.com/fotos-premium/perro-lindo-asoma-debajo-mesa_916191-21380.jpg" alt="Mascota feliz" class="mt-8 rounded-lg shadow-lg w-full max-w-xs mx-auto">

                <!-- Botón de Regresar personalizado -->
                <a href="{{ route('index') }}" class="mt-8 inline-flex items-center gap-2 px-6 py-3 bg-white/20 hover:bg-white/30 text-white rounded-full backdrop-blur-sm transition-all duration-300 shadow-lg group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform duration-300 group-hover:-translate-x-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Regresar a Inicio</span>
                </a>
            </div>
        </div>

        <!-- Lado derecho con formulario -->
        <div class="w-full lg:w-1/2 p-8">
            <div class="text-center mb-8">
                <img src="./images/logo2.png" alt="Logo del sistema" class="mx-auto h-12 mb-4">
                <h2 class="text-2xl font-bold text-gray-800">Iniciar Sesión</h2>
                <p class="text-gray-600">Accede a tu cuenta para continuar.</p>
            </div>

            <!-- SweetAlert Error -->
            @if ($errors->any())
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: "{{ $errors->first() }}", // Muestra el primer error
                            customClass: {
                                popup: "rounded-xl shadow-lg bg-gray-100", // Fondo gris claro
                                title: "text-red-600", // Título en rojo
                                confirmButton: "bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                            }
                        });
                    });
                </script>
            @endif

            <!-- SweetAlert Bienvenida -->
            @if (session('welcome'))
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: "{{ session('welcome') }}",
                            text: "Bienvenido a nuestro sistema",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
                </script>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="correo@ejemplo.com" class="w-full px-4 py-2 mt-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-500 text-gray-900 @error('email') border-red-500 @enderror">
                    @error('email') @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" placeholder="********" class="w-full px-4 py-2 mt-1 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-500 text-gray-900 @error('password') border-red-500 @enderror">
                    @error('password') @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-pink-500 shadow-sm focus:ring focus:ring-pink-300 focus:ring-opacity-50" name="remember">
                        <label for="remember_me" class="ml-2 text-sm text-gray-700">Recuérdame</label>
                    </div>

                </div>

                <!-- Login Button -->
                <div>
                    <button type="submit" class="w-full py-3 bg-pink-400 hover:bg-pink-600 rounded-lg text-white font-semibold focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-opacity-75 transition">Iniciar Sesión</button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <p class="text-gray-600 text-sm">¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-pink-500 hover:text-pink-700 font-semibold">Regístrate aquí</a></p>
            </div>

            <!-- Botón de regresar para versión móvil -->
            <div class="mt-6 text-center lg:hidden">
                <a href="{{ route('home') }}" class="inline-flex items-center gap-2 px-5 py-2 bg-gradient-to-r from-indigo-500 to-pink-400 text-white rounded-full transition-all duration-300 transform hover:scale-105 shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Regresar</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Animación personalizada -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const loginContainer = document.getElementById('login-container');
        setTimeout(() => {
            loginContainer.classList.remove('opacity-0', 'translate-y-10');
            loginContainer.classList.add('opacity-100', 'translate-y-0');
        }, 500); // Suaviza la transición
    });
</script>

<!-- Animaciones personalizadas -->
<style>
    @keyframes spin-slow {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    @keyframes spin-reverse {
        0% {
            transform: rotate(360deg);
        }
        100% {
            transform: rotate(0deg);
        }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            opacity: 0.5;
        }
        50% {
            transform: scale(1.2);
            opacity: 0.7;
        }
    }

    .animate-spin-slow {
        animation: spin-slow 15s linear infinite;
    }

    .animate-spin-reverse {
        animation: spin-reverse 10s linear infinite;
    }

    .animate-pulse {
        animation: pulse 6s ease-in-out infinite;
    }
</style>
</body>
