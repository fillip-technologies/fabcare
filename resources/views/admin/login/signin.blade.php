<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FabCare</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#10b981',
                        dark: '#1f2937',
                        light: '#f3f4f6'
                    }
                }
            }
        }
    </script>

    <style>
        .sidebar-link.active {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            color: #b45309;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .login-card {
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        video {
            position: fixed !important;
        }
    </style>
</head>

<body class="bg-blue-100 font-sans">

    <!-- Login Screen -->
    <div id="login-screen" class="relative min-h-screen flex items-center justify-center overflow-hidden">

        <!-- VIDEO BACKGROUND (UNCHANGED - COMMENTED) -->
        {{--
        <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover">
            <source src="{{ asset('assets/logo.png') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        --}}

        <!-- LIGHT BLUE OVERLAY -->
        <div class="absolute inset-0 bg-[#21B7E2]"></div>

        <!-- LOGIN CARD -->
        <div
            class="relative z-10 w-full max-w-5xl grid grid-cols-1 md:grid-cols-2 rounded-2xl overflow-hidden shadow-2xl bg-white">

            <!-- Left Logo Section -->
            <div
                class="flex flex-col items-center justify-center p-10 bg-blue-50 border-r">

                <img src="{{ asset('assets/logo.png') }}"
                    class="w-60 h-60 object-contain drop-shadow-xl mb-6">

                <h1 class="text-4xl font-bold text-blue-700 text-center">FabCare</h1>
                <p class="text-gray-600 mt-3 text-center text-lg">Admin Login Panel</p>
            </div>

            <!-- Right Login Form -->
            <div class="p-10 bg-white">
                <form id="login-form" method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <h2 class="text-gray-800 text-3xl font-semibold mb-8 text-center">
                        Welcome Back
                    </h2>

                    <input type="email" name="email" placeholder="Enter Your Username "
                        class="w-full mb-5 px-4 py-3 rounded-lg bg-gray-100 text-gray-800 placeholder-gray-400 border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        required>

                    <input type="password" name="password" placeholder="Enter Your Password"
                        class="w-full mb-6 px-4 py-3 rounded-lg bg-gray-100 text-gray-800 placeholder-gray-400 border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        required>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600 rounded">
                            <label class="ml-2 text-sm text-gray-600">Remember me</label>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300">
                        Sign In
                    </button>

                    <div class="mt-6 text-center text-gray-500 text-sm">
                        © {{ date("Y") }} FabCare . All rights reserved.
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Invalid Email',
            text: 'Please enter a valid email address!',
            confirmButtonText: 'OK'
        });
    </script>
    @endif


    <script>
        // Toggle between login and admin panel
        document.getElementById('login-form').addEventListener('submit', function(e) {
            document.getElementById('login-screen').classList.add('hidden');
            document.getElementById('admin-panel').classList.remove('hidden');
        });

        // Mobile sidebar toggle
        const sidebarToggle = document.getElementById('sidebar-toggle');
        if(sidebarToggle){
            sidebarToggle.addEventListener('click', function() {
                const sidebar = document.querySelector('.w-64');
                if(sidebar){
                    sidebar.classList.toggle('hidden');
                    sidebar.classList.toggle('absolute');
                    sidebar.classList.toggle('z-50');
                }
            });
        }

        // Set active state for sidebar links
        const sidebarLinks = document.querySelectorAll('.sidebar-link');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                sidebarLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>

</body>
</html>
