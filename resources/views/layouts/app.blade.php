<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Default Website Title')</title>
    <meta name="description" content="@yield('meta_description', 'Default website description here.')">
    <meta name="google-site-verification" content="h9RGlaCYZzHlDmJLPZGqzrECJUlpiHJqQoJ3fl2bWG0" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('image/LVS_logo.png') }}" type="image/x-icon">

    <!-- Tailwind (CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- JS Libraries -->
    <script defer src="{{ asset('js/app.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#21B7E2',
                    }

                }
            }
        }
    </script>

    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        span,
        a,
        li,
        button,
        input,
        textarea {
            font-family: 'Poppins', sans-serif !important;
        }

        .font-quicksand {
            font-family: 'Quicksand', sans-serif !important;
        }
    </style>
</head>


<body class="m-0 p-0 overflow-x-hidden">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')


    <div id="whatsappBtn" class="fixed bottom-6 left-6 z-50 hidden">
        <a href="https://wa.me/919999999999" target="_blank"
            class="text-green-600 text-4xl hover:text-6xl transition-all duration-300 ease-in-out">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

    <div id="scrollToTop" class="fixed bottom-6 right-6 z-50 hidden">
        <button onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
            class="bg-primary hover:bg-primary/80 text-white text-base md:text-lg sm:px-4 sm:py-2  px-3 py-1.5 rounded-full shadow-lg transition duration-300">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>


    <!-- Script to Show/Hide on Scroll -->
    <script>
        const scrollToTopBtn = document.getElementById("scrollToTop");
        const whatsappBtn = document.getElementById("whatsappBtn");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
                scrollToTopBtn.classList.remove("hidden");
                whatsappBtn.classList.remove("hidden");
            } else {
                scrollToTopBtn.classList.add("hidden");
                whatsappBtn.classList.add("hidden");
            }
        });
    </script>


</body>

</html>
