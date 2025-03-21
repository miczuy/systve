@vite('resources/css/app.css')

<div class="relative flex h-screen bg-cover bg-center" style="background-image: url('https://www.pixelstalk.net/wp-content/uploads/2016/03/Free-Animal-HD-Wallpaper-1080p.jpg');">
    <!-- Left Pane: Fondo temático -->
    <div class="hidden lg:flex items-center justify-center flex-1">
        <div class="text-center space-y-4">
            <h1 class="text-6xl font-bold text-white drop-shadow-lg">¡Bienvenido!</h1>
            <p class="text-lg text-white drop-shadow-md">
                Regístrate para brindarle a tus mascotas el cuidado que merecen.
            </p>
        </div>
    </div>

    <!-- Right Pane -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:pl-20">
        <!-- Cuadro de registro con animación -->
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-lg transition-transform transform scale-0 opacity-0 animate-fade-in">
            <!-- Imagen interactiva -->
            <img
                class="w-20 h-20 rounded-full shadow-md mb-6 mx-auto hover:scale-110 transition-transform duration-300"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRMgDGnAJYf1nFdUolIJ34XYy7U-kRjtng_8C4nycjlFK7AEBTzw6m8S6kqaE60t-203cc&usqp=CAU"
                alt="Imagen interactiva"
            />

            <h1 class="text-4xl font-bold text-red-500 text-center">Huellitas de Corazón</h1>
            <p class="text-sm text-gray-600 text-center mb-8">
                ¡Por favor completa los campos para registrar tu cuenta y cuidar de tus mascotas!
            </p>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Nombre -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input id="name" type="text" class="mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 transition" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Coloque su nombre" autofocus>
                    @error('name')
                    <span class="text-sm text-red-600 mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input id="email" type="email" class="mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 transition" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Coloque correo electronico">
                    @error('email')
                    <span class="text-sm text-red-600 mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input id="password" type="password" class="mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 transition" name="password" required autocomplete="new-password" placeholder="Coloque una contraseña de 8 digitos">
                    @error('password')
                    <span class="text-sm text-red-600 mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div>
                    <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" class="mt-2 p-3 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400 transition" placeholder="Coloque una contraseña de 8 digitos"
                           name="password_confirmation" required autocomplete="new-password">
                </div>

                <!-- Botón de Registro -->
                <div>
                    <button type="submit" class="w-full bg-red-500 text-white py-3 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
                        Registrarse
                    </button>
                </div>
            </form>

            <!-- Redes Sociales -->
            <div class="mt-6 flex justify-center space-x-4">
                <a href="#" class="text-gray-500 hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22 12.07c0-5.52-4.48-10-10-10S2 6.55 2 12.07c0 5.01 3.66 9.14 8.44 9.88v-6.99H7.9v-2.89h2.54V9.4c0-2.51 1.5-3.89 3.8-3.89 1.1 0 2.25.2 2.25.2v2.47h-1.27c-1.25 0-1.64.78-1.64 1.58v1.9h2.79l-.44 2.89h-2.35v6.99C18.34 21.21 22 17.08 22 12.07z" />
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 4.56c-.89.39-1.84.65-2.84.77 1.02-.61 1.8-1.57 2.17-2.72-.95.56-2 1-3.13 1.23a4.92 4.92 0 0 0-8.38 4.48A13.97 13.97 0 0 1 1.64 3.16a4.93 4.93 0 0 0 1.52 6.57c-.8-.02-1.55-.25-2.2-.62v.06a4.93 4.93 0 0 0 3.95 4.83 5 5 0 0 1-2.22.08 4.92 4.92 0 0 0 4.6 3.42A9.89 9.89 0 0 1 0 19.54a13.93 13.93 0 0 0 7.55 2.21c9.05 0 14-7.5 14-14v-.64c.96-.69 1.8-1.56 2.46-2.54z" />
                    </svg>
                </a>
            </div>

            <!-- Link a Login -->
            <div class="mt-6 text-sm text-gray-600 text-center">
                <p>¿Ya tienes cuenta? <a href="{{ url('login') }}" class="text-red-500 hover:underline">Inicia Sesión</a></p>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: scale(0.9);
        }
        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }
</style>
