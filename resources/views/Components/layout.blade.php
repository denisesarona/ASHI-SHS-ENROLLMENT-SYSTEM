<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="">
</head>
<body class="font-sans bg-gray-100">
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
        <div class="container mx-auto flex items-center justify-between py-3 px-6">
            <!-- Logo -->
            <a href="{{ route('homepage') }}#HomePage">
                <img id="ASHI-logo" src="{{ asset('images/ASHILOGO.png') }}" alt="ASHI Logo" draggable="false" class="h-12">
            </a>
    
            <!-- Mobile Menu Button -->
            <button id="menu-toggle" class="lg:hidden text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>    
                
            <!-- Navigation Links -->
            <div id="mobile-menu" class="hidden absolute top-full left-0 w-full bg-white p-4 
                flex flex-col items-center space-y-2 
                lg:flex lg:flex-row lg:items-center lg:justify-end lg:w-auto lg:space-x-6 lg:p-0 lg:relative lg:block">
                <a href="{{ route('homepage') }}#HomePage" class="text-gray-700 hover:text-blue-600 px-4 py-2 mt-2">HOME</a>
                <a href="{{ route('homepage') }}#AboutUs" class="text-gray-700 hover:text-blue-600 px-4 py-2">ABOUT</a>
                <a href="#" class="text-gray-700 hover:text-blue-600 px-4 py-2">TRACK ENROLLMENT</a>
                <a href="{{ route('homepage') }}#Contact" class="text-gray-700 hover:text-blue-600 px-4 py-2">CONTACT US</a>
            </div>

        </div>
    </nav>

    <div class="w-screen mt-16 px-0 mx-0">
        <div class="row">
            {{ $slot }}
        </div>
    </div>
    

    <script>
        document.getElementById("menu-toggle").addEventListener("click", function () {
            // Check if screen width is less than 1024px (mobile & tablets)
            if (window.innerWidth < 1024) {
                document.getElementById("mobile-menu").classList.toggle("hidden");
            }
        });
    </script>
</body>
</html>