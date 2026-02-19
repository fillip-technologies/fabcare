<header class="w-full bg-white shadow-sm fixed top-0 left-0 z-50">
    <div class="max-w-full mx-auto px-6 md:px-10 py-4 flex items-center justify-between">

        <!-- Logo -->
        <a href="/" class="flex items-center gap-3">
            <img src="assets/logo.png" class="h-12 md:h-16" />
            <img src="assets/fabcare.png" class="h-7 md:h-10" />

            {{-- <span class="text-xl md:text-2xl font-semibold text-primary">Fab Care</span> --}}
        </a>

        <!-- Desktop Nav -->
        <nav class="hidden md:flex gap-8 text-gray-700 font-medium">
            <a href="/"
                class="hover:text-primary transition {{ request()->is('/') ? 'font-semibold text-primary' : '' }}">
                Home
            </a>

            <a href="/facilities"
                class="hover:text-primary transition {{ request()->is('facilities') ? 'font-semibold text-primary' : '' }}">
                Facilities
            </a>

            <a href="/pricing"
                class="hover:text-primary transition {{ request()->is('pricing') ? 'font-semibold text-primary' : '' }}">
                Pricing
            </a>
        </nav>


        <!-- Mobile Hamburger -->
        <button id="menuBtn" class="md:hidden text-2xl text-gray-700 focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
        class="hidden md:hidden bg-white border-t border-gray-200 px-6 py-6 space-y-4 text-gray-700 font-medium">

        <a href="/"
            class="block hover:text-primary 
       {{ request()->is('/') ? 'font-semibold text-primary' : '' }}">
            Home
        </a>

        <a href="/facilities"
            class="block hover:text-primary 
       {{ request()->is('facilities') ? 'font-semibold text-primary' : '' }}">
            Facilities
        </a>

        <a href="/pricing"
            class="block hover:text-primary 
       {{ request()->is('pricing') ? 'font-semibold text-primary' : '' }}">
            Pricing
        </a>

    </div>

</header>


<script>
    const menuBtn = document.getElementById("menuBtn");
    const mobileMenu = document.getElementById("mobileMenu");

    menuBtn.addEventListener("click", () => {
        mobileMenu.classList.toggle("hidden");

        const icon = menuBtn.querySelector("i");
        icon.classList.toggle("fa-bars");
        icon.classList.toggle("fa-xmark");
    });
</script>
