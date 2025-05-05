<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amaya School of Home Industries - Senior High School</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>
<body class="font-sans bg-gray-100 {{ $bodyClass ?? '' }}">
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
        <div class="container mx-auto flex items-center justify-between py-3 px-6">
            <a href="{{ route('homepage') }}#HomePage">
                <img id="ASHI-logo" src="{{ asset('images/ASHILOGO.png') }}" alt="ASHI Logo" draggable="false" class="h-12">
            </a>

            <button id="menu-toggle" class="lg:hidden text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>    
                
            <div id="mobile-menu" class="absolute top-full left-0 w-full bg-white p-4 
            flex flex-col items-center space-y-2 
            lg:flex-row lg:items-center lg:justify-end lg:w-auto lg:space-x-6 lg:p-0 lg:relative lg:block">
    
                <x-nav-link href="/" class="nav-link" data-section="HomePage">HOME</x-nav-link>
                <x-nav-link href="{{ route('homepage') }}#AboutUs" class="nav-link" data-section="AboutUs">
                    ABOUT
                </x-nav-link>
                <x-nav-link href="/trackenrollment" :active="request()->is('trackenrollment')">TRACK ENROLLMENT</x-nav-link>
                <x-nav-link href="{{ route('homepage') }}#Contact" class="nav-link" data-section="Contact">
                    CONTACT US
                </x-nav-link>
            </div>
        </div>
    </nav>

    <div class="w-screen mt-16 px-0 mx-0">
        <div class="row">
            {{ $slot }}
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    @if(session('success'))
                        Toastify({
                            text: "{{ session('success') }}",
                            duration: 3000,
                            gravity: "right",
                            position: "right",
                            backgroundColor: "green",
                            stopOnFocus: true
                        }).showToast();
                    @endif
        
                    @if(session('error'))
                        Toastify({
                            text: "{{ session('error') }}",
                            duration: 3000,
                            gravity: "right",
                            position: "right",
                            backgroundColor: "red",
                            stopOnFocus: true
                        }).showToast();
                    @endif
                });
            </script>
        </div>
    </div>
    
    <script>
        document.getElementById("menu-toggle").addEventListener("click", function () {
            if (window.innerWidth < 1024) {
                document.getElementById("mobile-menu").classList.toggle("hidden");
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function updateActiveLink() {
                let hash = window.location.hash.substring(1) || "home"; 
                document.querySelectorAll(".nav-link").forEach(link => {
                    if (link.dataset.section === hash) {
                        link.classList.add("text-white", "bg-blue-600");
                        link.classList.remove("text-gray-700");
                    } else {
                        link.classList.remove("text-white", "bg-blue-600");
                        link.classList.add("text-gray-700");
                    }
                });
            }
    
            window.addEventListener("hashchange", updateActiveLink);
            updateActiveLink();
        });
    </script>
</body>
</html>