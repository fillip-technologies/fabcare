<nav class="mt-6 flex-1 overflow-y-auto bg-white text-white p-2">

    <div class="px-4 mb-6 mt-4">
        <p class="text-xs uppercase text-white font-bold tracking-wider opacity-80">
            Navigation
        </p>
    </div>

    <a href="{{ route('dashboard') }}"
        class="flex items-center px-6 py-3 mb-3 mt-5 rounded-xl shadow-md
      bg-white text-black backdrop-blur-xl border border-[#21B7E2]
      hover:bg-gradient-to-r from-[#21B7E2] to-[#21B7E2]
      hover:text-white hover:border-white hover:scale-[1.03]
      transition-all duration-300 group">
        <i class="fas fa-tachometer-alt mr-4"></i>
        Dashboard
    </a>

    <a href="{{ route('user.index') }}"
        class="flex items-center px-6 py-3 mb-3 mt-5 rounded-xl shadow-md
      bg-white text-black backdrop-blur-xl border border-[#21B7E2]
      hover:bg-gradient-to-r from-[#21B7E2] to-[#21B7E2]
      hover:text-white hover:border-white hover:scale-[1.03]
      transition-all duration-300 group">
        <i class="fa fa-users mr-4 "></i>
        Users
    </a>



    <div x-data="{ open: false }" class="w-full">

        <!-- Main Button -->
        <button @click="open = !open"
            class="flex items-center justify-between w-full px-6 py-3 mt-4 mb-2 rounded-xl shadow-md
        bg-white text-black backdrop-blur-xl border border-[#21B7E2]
        hover:bg-gradient-to-r from-[#21B7E2] to-[#21B7E2]
        hover:text-white hover:border-white hover:scale-[1.03]
        transition-all duration-300 group">

            <div class="flex items-center">
                <i
                    class="fa-solid fa-gear mr-4 text-black
               group-hover:text-white transition"></i>
                <span>Billings</span>
            </div>

            <!-- Arrow -->
            <i class="fa-solid fa-chevron-down transition-transform duration-300"
                :class="open ? 'rotate-180 text-white' : 'text-black'"></i>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="open" x-transition class="ml-8 mt-2 space-y-2">

            <a href="{{ route('weight.bill.list') }}"
                class="block px-4 py-2 rounded-lg text-sm font-medium
           bg-gray-100 text-gray-700
           hover:bg-gradient-to-r hover:from-[#21B7E2] to-[#21B7E2]
           hover:text-white transition duration-300">
              + Weight Wise Billing
            </a>


        </div>

        <div x-show="open" x-transition class="ml-8 mt-2 space-y-2">

            <a href="{{ route('billing.list') }}"
                class="block px-4 py-2 rounded-lg text-sm font-medium
           bg-gray-100 text-gray-700
           hover:bg-gradient-to-r hover:from-[#21B7E2] to-[#21B7E2]
           hover:text-white transition duration-300">
              + Items Wise Billings
            </a>


        </div>


    </div>

    <div x-data="{ open: false }" class="w-full">

        <!-- Main Button -->
        <button @click="open = !open"
            class="flex items-center justify-between w-full px-6 py-3 mt-4 mb-2 rounded-xl shadow-md
        bg-white text-black backdrop-blur-xl border border-[#21B7E2]
        hover:bg-gradient-to-r from-[#21B7E2] to-[#21B7E2]
        hover:text-white hover:border-white hover:scale-[1.03]
        transition-all duration-300 group">

            <div class="flex items-center">
                <i
                    class="fa-solid fa-gear mr-4 text-black
               group-hover:text-white transition"></i>
                <span>Settings</span>
            </div>

            <!-- Arrow -->
            <i class="fa-solid fa-chevron-down transition-transform duration-300"
                :class="open ? 'rotate-180 text-white' : 'text-black'"></i>
        </button>

        <!-- Dropdown Menu -->
        <div x-show="open" x-transition class="ml-8 mt-2 space-y-2">

            <a href="{{ route('weight.index') }}"
                class="block px-4 py-2 rounded-lg text-sm font-medium
           bg-gray-100 text-gray-700
           hover:bg-gradient-to-r hover:from-[#21B7E2] to-[#21B7E2]
           hover:text-white transition duration-300">
              + Add Weight Range
            </a>


        </div>

        <div x-show="open" x-transition class="ml-8 mt-2 space-y-2">

            <a href="{{ route('laundrytype.index') }}"
                class="block px-4 py-2 rounded-lg text-sm font-medium
           bg-gray-100 text-gray-700
           hover:bg-gradient-to-r hover:from-[#21B7E2] to-[#21B7E2]
           hover:text-white transition duration-300">
              + Add Laundry Type
            </a>


        </div>
        <div x-show="open" x-transition class="ml-8 mt-2 space-y-2">

            <a href="{{ route('price.index') }}"
                class="block px-4 py-2 rounded-lg text-sm font-medium
           bg-gray-100 text-gray-700
           hover:bg-gradient-to-r hover:from-[#21B7E2] to-[#21B7E2]
           hover:text-white transition duration-300">
            + Add Price
            </a>


        </div>

    </div>

</nav>
