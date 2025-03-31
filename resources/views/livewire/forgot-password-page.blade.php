<div class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Video de fondo -->
    <video autoplay muted loop class="absolute h-full w-full object-cover">
        <source src="{{ asset('vid/login.mp4') }}" type="video/mp4">
    </video>
    
    <!-- Gradiente para mejorar la visibilidad del contenido sobre el video -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-purple-600 to-purple-800 opacity-90"></div>
    
    <!-- Contenedor del formulario -->
    <div class="z-10 max-w-md w-full bg-white rounded-3xl shadow-xl p-8">
        <!-- Logo ETILESA como imagen -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('img/logoEtilesa.png') }}" alt="ETILESA" class="h-12">
        </div>
        
        <h2 class="text-lg font-medium text-center text-gray-700 mb-4">Recuperar contraseña</h2>
        
        <p class="text-sm text-gray-600 text-center mb-8">
            Introduce tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.
        </p>
        
        <form>
            <!-- Correo -->
            <div class="mb-6">
                <input id="email" type="email" name="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Correo electrónico">
            </div>
            
            <!-- Botón de enviar -->
            <button type="submit" class="w-full bg-purple-500 text-white py-3 px-4 rounded-full hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 transition duration-200">
                Enviar enlace
            </button>
        </form>
        
        <!-- Enlace de login -->
        <p class="text-center mt-6 text-sm text-gray-600">
            <a href="/login" class="text-purple-500 hover:text-purple-700">
                Volver a iniciar sesión
            </a>
        </p>
    </div>
</div>