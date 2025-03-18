<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">
    <nav class="fixed top-0 left-0 w-full bg-white shadow-md z-50">
        <div class="container mx-auto flex items-center justify-between py-3 px-6">
            <a href="{{ route('homepage') }}#HomePage">
                <img id="ASHI-logo" src="{{ asset('images/ASHILOGO.png') }}" alt="ASHI Logo" draggable="false" class="h-12">
            </a>
            <button class="lg:hidden text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-2xl"></i>
            </button>
            <div class="hidden lg:flex space-x-6">
                <a href="{{ route('homepage') }}#HomePage" class="text-gray-700 hover:text-blue-600">HOME</a>
                <a href="{{ route('homepage') }}#AboutUs" class="text-gray-700 hover:text-blue-600">ABOUT</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">TRACK ENROLLMENT</a>
                <a href="{{ route('homepage') }}#Contact" class="text-gray-700 hover:text-blue-600">CONTACT US</a>
            </div>
        </div>
    </nav>

    <div class="w-screen mt-16 px-0 mx-0">
        <div class="row">
            {{ $slot }}
        </div>
    </div>
    
</body>
</html>