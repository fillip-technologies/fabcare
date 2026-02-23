<!-- Include Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<!-- Topbar -->
<header class="bg-[#21B7E2] text-white shadow-sm py-4 px-6 flex items-center justify-between" x-data="{ showNotifications: false }">
    <div class="flex items-center">
        <button id="sidebar-toggle" class="text-gray-500 mr-4 md:hidden">
            <i class="fas fa-bars text-xl"></i>
        </button>
        <h1 class="text-xl font-semibold text-white">@yield('heading', 'Dashboard')</h1>
    </div>


</header>
