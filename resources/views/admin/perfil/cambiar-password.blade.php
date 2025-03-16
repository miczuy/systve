@extends('layouts.admin')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-violet-50 via-indigo-50 to-sky-50 py-12 px-4 flex items-center justify-center">
        <div class="max-w-xl w-full">
            <!-- Card con efecto de glassmorphism -->
            <div class="backdrop-blur-md bg-white/80 rounded-3xl shadow-xl overflow-hidden border border-white/20">
                <!-- Header con diseño mejorado -->
                <div class="relative">
                    <!-- Fondo con ondas y patrones -->
                    <div class="h-48 bg-gradient-to-r from-violet-600 via-indigo-600 to-blue-600 overflow-hidden relative">
                        <div class="absolute inset-0 opacity-20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0">
                                <path fill="white" fill-opacity="1" d="M0,192L60,176C120,160,240,128,360,138.7C480,149,600,203,720,202.7C840,203,960,149,1080,144C1200,139,1320,181,1380,202.7L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
                            </svg>
                        </div>

                        <!-- Círculos decorativos -->
                        <div class="absolute top-8 right-8 w-16 h-16 rounded-full bg-white/10"></div>
                        <div class="absolute top-12 right-24 w-8 h-8 rounded-full bg-white/10"></div>

                        <!-- Título -->
                        <div class="relative z-10 h-full flex flex-col items-center justify-center pt-4">
                            <h1 class="text-3xl font-extrabold text-white mb-2 tracking-tight">Cambiar Contraseña</h1>
                            <p class="text-blue-100 text-sm">Actualiza tu contraseña para mantener tu cuenta segura</p>
                        </div>
                    </div>

                    <!-- Ícono flotante -->
                    <div class="absolute -bottom-12 left-0 right-0 flex justify-center">
                        <div class="w-24 h-24 rounded-2xl bg-white shadow-lg flex items-center justify-center transform rotate-45 border-4 border-white">
                            <div class="transform -rotate-45">
                                <div class="w-16 h-16 bg-gradient-to-br from-violet-600 to-blue-600 rounded-xl flex items-center justify-center">
                                    <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contenido del formulario -->
                <div class="p-8 pt-16">
                    <!-- Mensajes de alerta con animación -->
                    @if(session('mensaje'))
                        <div class="mb-6 rounded-xl overflow-hidden animate-fade-in-down">
                            <div class="p-4 bg-{{ session('icono') == 'success' ? 'emerald' : (session('icono') == 'info' ? 'blue' : 'rose') }}-50 border-l-4 border-{{ session('icono') == 'success' ? 'emerald' : (session('icono') == 'info' ? 'blue' : 'rose') }}-500 flex items-center">
                                <div class="flex-shrink-0 mr-3">
                                    @if(session('icono') == 'success')
                                        <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-emerald-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    @elseif(session('icono') == 'info')
                                        <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-rose-100 flex items-center justify-center">
                                            <svg class="w-5 h-5 text-rose-500" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-{{ session('icono') == 'success' ? 'emerald' : (session('icono') == 'info' ? 'blue' : 'rose') }}-700">
                                        {{ session('mensaje') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form action="{{ route('perfil.actualizar-password') }}" method="POST" class="space-y-6" id="password-form">
                        @csrf

                        <!-- Contraseña actual con animación en focus -->
                        <div class="space-y-1 group">
                            <label for="current_password" class="block text-sm font-medium text-gray-700 group-focus-within:text-indigo-600 transition-colors duration-200">
                                Contraseña Actual <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input id="current_password" type="password" name="current_password" required
                                       class="w-full pl-10 pr-10 py-3.5 bg-gray-50/70 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 transition duration-200"
                                       placeholder="••••••••">
                                <button type="button" class="toggle-password absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 p-1 rounded-full hover:bg-gray-100" data-target="current_password">
                                    <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg class="w-5 h-5 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                    </svg>
                                </button>
                            </div>
                            @error('current_password')
                            <p class="text-sm text-rose-600 mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Nueva contraseña -->
                        <div class="space-y-1 group">
                            <label for="password" class="block text-sm font-medium text-gray-700 group-focus-within:text-indigo-600 transition-colors duration-200">
                                Nueva Contraseña <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <input id="password" type="password" name="password" required
                                       class="w-full pl-10 pr-10 py-3.5 bg-gray-50/70 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 transition duration-200"
                                       placeholder="••••••••">
                                <button type="button" class="toggle-password absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 p-1 rounded-full hover:bg-gray-100" data-target="password">
                                    <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg class="w-5 h-5 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                    </svg>
                                </button>
                            </div>

                            <div class="mt-2 flex items-center gap-2">
                                <div class="text-xs text-gray-500 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-indigo-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                    La contraseña debe tener al menos:
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-2 mt-1">
                                <div class="text-xs flex items-center" id="length-check">
                                    <div class="w-3 h-3 rounded-full bg-gray-100 mr-2 flex items-center justify-center" id="length-indicator">
                                        <div class="w-1.5 h-1.5 rounded-full bg-gray-400"></div>
                                    </div>
                                    8 caracteres
                                </div>
                                <div class="text-xs flex items-center" id="uppercase-check">
                                    <div class="w-3 h-3 rounded-full bg-gray-100 mr-2 flex items-center justify-center" id="uppercase-indicator">
                                        <div class="w-1.5 h-1.5 rounded-full bg-gray-400"></div>
                                    </div>
                                    Una letra mayúscula
                                </div>
                                <div class="text-xs flex items-center" id="number-check">
                                    <div class="w-3 h-3 rounded-full bg-gray-100 mr-2 flex items-center justify-center" id="number-indicator">
                                        <div class="w-1.5 h-1.5 rounded-full bg-gray-400"></div>
                                    </div>
                                    Un número
                                </div>
                                <div class="text-xs flex items-center" id="special-check">
                                    <div class="w-3 h-3 rounded-full bg-gray-100 mr-2 flex items-center justify-center" id="special-indicator">
                                        <div class="w-1.5 h-1.5 rounded-full bg-gray-400"></div>
                                    </div>
                                    Un carácter especial
                                </div>
                            </div>

                            @error('password')
                            <p class="text-sm text-rose-600 mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Confirmar nueva contraseña -->
                        <div class="space-y-1 group">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 group-focus-within:text-indigo-600 transition-colors duration-200">
                                Confirmar Nueva Contraseña <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <input id="password_confirmation" type="password" name="password_confirmation" required
                                       class="w-full pl-10 pr-10 py-3.5 bg-gray-50/70 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-400/30 focus:border-indigo-400 transition duration-200"
                                       placeholder="••••••••">
                                <button type="button" class="toggle-password absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600 p-1 rounded-full hover:bg-gray-100" data-target="password_confirmation">
                                    <svg class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg class="w-5 h-5 eye-closed hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                                    </svg>
                                </button>
                            </div>
                            <p id="match-message" class="text-xs text-gray-500 mt-1 hidden">Las contraseñas deben coincidir</p>
                            @error('password_confirmation')
                            <p class="text-sm text-rose-600 mt-1 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Botones con efectos mejorados -->
                        <div class="flex flex-col sm:flex-row sm:justify-end gap-3 pt-6">
                            <a href="{{ route('perfil.index') }}" class="px-5 py-3 border border-gray-200 text-gray-700 font-medium rounded-xl hover:bg-gray-50 hover:shadow-sm transition-all duration-200 text-center sm:order-1">
                                Cancelar
                            </a>
                            <button type="submit" id="submit-btn" class="px-6 py-3 bg-gradient-to-r from-violet-600 via-indigo-600 to-blue-600 hover:from-violet-700 hover:via-indigo-700 hover:to-blue-700 text-white font-medium rounded-xl shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center sm:order-2" disabled>
                                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Actualizar Contraseña
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Elemento decorativo inferior -->
            <div class="mt-8 text-center text-sm text-gray-500">
                <p>Por seguridad, tu contraseña expirará cada 90 días</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Funcionalidad para mostrar/ocultar contraseñas con efecto de transición
            const toggleButtons = document.querySelectorAll('.toggle-password');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);
                    const eyeOpen = this.querySelector('.eye-open');
                    const eyeClosed = this.querySelector('.eye-closed');

                    // Añadir efecto de transición
                    this.classList.add('transform', 'scale-90');
                    setTimeout(() => {
                        this.classList.remove('transform', 'scale-90');
                    }, 100);

                    if (passwordInput.type === 'password') {
                        passwordInput.type = 'text';
                        eyeOpen.classList.add('hidden');
                        eyeClosed.classList.remove('hidden');
                    } else {
                        passwordInput.type = 'password';
                        eyeOpen.classList.remove('hidden');
                        eyeClosed.classList.add('hidden');
                    }
                });
            });

            // Agrega animación a mensajes de alerta
            const alerts = document.querySelectorAll('.animate-fade-in-down');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.add('transition-all', 'duration-500');
                }, 100);
            });

            // Estilizar inputs en focus para mejor experiencia de usuario
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.parentElement.classList.add('focus-within');
                });
                input.addEventListener('blur', () => {
                    input.parentElement.parentElement.classList.remove('focus-within');
                });
            });

            // Validaciones en tiempo real para la contraseña
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            const submitBtn = document.getElementById('submit-btn');
            const matchMessage = document.getElementById('match-message');

            // Elementos de validación
            const lengthCheck = document.getElementById('length-check');
            const uppercaseCheck = document.getElementById('uppercase-check');
            const numberCheck = document.getElementById('number-check');
            const specialCheck = document.getElementById('special-check');

            // Indicadores visuales
            const lengthIndicator = document.getElementById('length-indicator');
            const uppercaseIndicator = document.getElementById('uppercase-indicator');
            const numberIndicator = document.getElementById('number-indicator');
            const specialIndicator = document.getElementById('special-indicator');

            // Función de validación de contraseña
            function validatePassword() {
                const password = passwordInput.value;
                const confirmPassword = confirmInput.value;

                // Validar longitud (mínimo 8 caracteres)
                const hasLength = password.length >= 8;
                updateIndicator(lengthCheck, lengthIndicator, hasLength);

                // Validar mayúscula
                const hasUppercase = /[A-Z]/.test(password);
                updateIndicator(uppercaseCheck, uppercaseIndicator, hasUppercase);

                // Validar número
                const hasNumber = /[0-9]/.test(password);
                updateIndicator(numberCheck, numberIndicator, hasNumber);

                // Validar carácter especial
                const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);
                updateIndicator(specialCheck, specialIndicator, hasSpecial);

                // Verificar si las contraseñas coinciden
                if (confirmPassword) {
                    const passwordsMatch = password === confirmPassword;
                    matchMessage.classList.remove('hidden');

                    if (passwordsMatch) {
                        matchMessage.textContent = '✓ Las contraseñas coinciden';
                        matchMessage.classList.remove('text-rose-500');
                        matchMessage.classList.add('text-emerald-500');
                    } else {
                        matchMessage.textContent = '✗ Las contraseñas no coinciden';
                        matchMessage.classList.remove('text-emerald-500');
                        matchMessage.classList.add('text-rose-500');
                    }

                    // Habilitar/deshabilitar botón de envío
                    submitBtn.disabled = !(hasLength && hasUppercase && hasNumber && hasSpecial && passwordsMatch);
                } else {
                    matchMessage.classList.add('hidden');
                    submitBtn.disabled = !(hasLength && hasUppercase && hasNumber && hasSpecial);
                }

                // Estilo del botón de envío cuando está deshabilitado
                if (submitBtn.disabled) {
                    submitBtn.classList.add('opacity-70', 'cursor-not-allowed');
                } else {
                    submitBtn.classList.remove('opacity-70', 'cursor-not-allowed');
                }
            }

            // Función para actualizar los indicadores visuales
            function updateIndicator(checkElement, indicatorElement, isValid) {
                const indicatorDot = indicatorElement.querySelector('div');

                if (isValid) {
                    checkElement.classList.remove('text-gray-600');
                    checkElement.classList.add('text-emerald-600');
                    indicatorElement.classList.remove('bg-gray-100');
                    indicatorElement.classList.add('bg-emerald-100');
                    indicatorDot.classList.remove('bg-gray-400');
                    indicatorDot.classList.add('bg-emerald-500');
                } else {
                    checkElement.classList.remove('text-emerald-600');
                    checkElement.classList.add('text-gray-600');
                    indicatorElement.classList.remove('bg-emerald-100');
                    indicatorElement.classList.add('bg-gray-100');
                    indicatorDot.classList.remove('bg-emerald-500');
                    indicatorDot.classList.add('bg-gray-400');
                }
            }

            // Eventos para validar en tiempo real
            passwordInput.addEventListener('input', validatePassword);
            confirmInput.addEventListener('input', validatePassword);

            // Validar el formulario antes de enviar
            document.getElementById('password-form').addEventListener('submit', function(event) {
                validatePassword();

                if (submitBtn.disabled) {
                    event.preventDefault();
                    // Mostrar mensaje de error si se intenta enviar con datos inválidos
                    const errorContainer = document.createElement('div');
                    errorContainer.className = 'p-3 bg-rose-50 text-rose-700 rounded-lg mb-4 text-sm';
                    errorContainer.textContent = 'Por favor, corrige los errores en el formulario antes de continuar.';

                    const form = document.getElementById('password-form');
                    form.insertBefore(errorContainer, form.firstChild);

                    // Eliminar el mensaje después de 3 segundos
                    setTimeout(() => {
                        errorContainer.remove();
                    }, 3000);
                }
            });
        });
    </script>
@endsection
