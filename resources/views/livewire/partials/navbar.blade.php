<header id="navbar" class="w-full fixed top-0 left-0 z-50 px-8 py-4 flex items-center justify-between bg-white bg-opacity-0 text-white transition-all duration-300">
    <!-- Logo -->
    <div>
        <img src="{{ asset('img/logoEtilesa.png') }}" alt="Etilesa Logo" class="h-7" id="logo">
    </div>

    <!-- Botón Hamburguesa -->
    <button id="menu-btn" class="md:hidden text-white text-2xl cursor-pointer transition duration-300">
        <i class="fa-solid fa-bars" id="burger-icon"></i>
    </button>

    <!-- Navegación Desktop -->
    <nav class="hidden md:flex flex-row items-center gap-8 font-semibold">
        <a href="/product-detail-page/quikipad" class="nav-link hover:text-gray-400 transition">Quikipad</a>
        <a href="/sobre-nosotros" class="nav-link hover:text-gray-400 transition">Sobre Nosotros</a>
        <a href="/products-page" class="nav-link hover:text-gray-400 transition">Comprar</a>
        
        <!-- Carrito de compras -->
        <div class="flex items-center gap-3">
            <a href="#" class="nav-link text-2xl flex items-center hover:text-gray-400 transition">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="py-1 px-2 rounded-full text-xs font-medium bg-purple-500 text-white">3</span>
            </a>

            <!-- Botón Iniciar Sesión -->
            <a href="#" class="nav-button bg-black text-white px-6 py-2 rounded-full shadow-md font-semibold hover:bg-gray-800 transition">
                Iniciar Sesión
            </a>
        </div>
    </nav>

    <!-- Menú Móvil -->
    <div id="mobile-menu" class="fixed inset-0 bg-white text-black flex flex-col items-center justify-center space-y-8 text-xl font-semibold transform translate-x-full transition-transform duration-300 md:hidden">
        <button id="close-menu" class="absolute top-6 right-6 text-3xl text-black">
            <i class="fa-solid fa-times"></i>
        </button>
        <img src="{{ asset('img/logoEtilesa.png') }}" alt="Etilesa Logo" class="h-16 mb-8"> <!-- Logo en menú móvil -->
        <a href="/product-detail-page/quikipad" class="hover:text-gray-600 transition">Quikipad</a>
        <a href="/sobre-nosotros" class="hover:text-gray-600 transition">Sobre Nosotros</a>
        <a href="/products-page" class="hover:text-gray-600 transition">Comprar</a>
        <a href="#" class="text-2xl flex items-center gap-2 hover:text-gray-600 transition">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="py-1 px-2 rounded-full text-xs font-medium bg-blue-500 text-white">3</span>
        </a>
        <a href="#" class="bg-black text-white px-6 py-2 rounded-full shadow-md font-semibold hover:bg-gray-800 transition">
            Iniciar Sesión
        </a>
    </div>
</header>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const navbar = document.getElementById("navbar");
    const menuBtn = document.getElementById("menu-btn");
    const mobileMenu = document.getElementById("mobile-menu");
    const closeMenu = document.getElementById("close-menu");
    const navLinks = document.querySelectorAll(".nav-link");
    const navButton = document.querySelector(".nav-button");
    const burgerIcon = document.getElementById("burger-icon");
    const logo = document.getElementById("logo");

    // Define las rutas donde quieres que el navbar sea transparente
    const transparentPages = ["/", , "/sobre-nosotros"]; // Añade aquí tus rutas específicas
    
    // Función para aplicar estilos según la página
    function applyNavbarStyles() {
        const currentPath = window.location.pathname;
        const shouldBeTransparent = transparentPages.includes(currentPath);
        
        // Al cargar la página, establece el estilo inicial según la página actual
        if (shouldBeTransparent) {
            // Estilo transparente para páginas específicas
            if (window.scrollY <= 50) {
                setTransparentStyle();
            } else {
                setSolidStyle();
            }
        } else {
            // Estilo sólido (blanco) para todas las demás páginas
            setSolidStyle();
        }
    }
    
    // Función para establecer estilo transparente
    function setTransparentStyle() {
        navbar.classList.remove("bg-white", "shadow-lg", "text-black");
        navbar.classList.add("bg-opacity-0", "text-white");
        navLinks.forEach(link => link.classList.remove("text-black"));
        navButton.classList.remove("bg-white", "text-black", "border", "border-gray-300");
        navButton.classList.add("bg-black", "text-white");
        burgerIcon.classList.remove("text-black");
        logo.classList.remove("text-black");
    }
    
    // Función para establecer estilo sólido (blanco)
    function setSolidStyle() {
        navbar.classList.add("bg-white", "shadow-lg", "text-black");
        navbar.classList.remove("bg-opacity-0", "text-white");
        navLinks.forEach(link => link.classList.add("text-black"));
        navButton.classList.add("bg-white", "text-black", "border", "border-gray-300");
        navButton.classList.remove("bg-black", "text-white");
        burgerIcon.classList.add("text-black");
        logo.classList.add("text-black");
    }

    // Aplica los estilos iniciales al cargar la página
    applyNavbarStyles();

    // Cambia el estilo del navbar al hacer scroll solo en las páginas transparentes
    window.addEventListener("scroll", function() {
        const currentPath = window.location.pathname;
        const shouldBeTransparent = transparentPages.includes(currentPath);
        
        if (shouldBeTransparent) {
            if (window.scrollY > 50) {
                setSolidStyle();
            } else {
                setTransparentStyle();
            }
        }
    });

    // Abre el menú móvil
    menuBtn.addEventListener("click", function() {
        mobileMenu.classList.remove("translate-x-full");
        mobileMenu.classList.add("translate-x-0");
    });

    // Cierra el menú móvil
    closeMenu.addEventListener("click", function() {
        mobileMenu.classList.remove("translate-x-0");
        mobileMenu.classList.add("translate-x-full");
    });
});
</script>
