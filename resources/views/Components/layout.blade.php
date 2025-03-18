<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-light .navbar-nav .nav-link {
            color: #000;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img id="MDB-logo" src="{{ asset('images/ASHILOGO.png') }}" alt="MDB Logo" draggable="false" height=60">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">ABOUT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">TRACK ENROLLMENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2" href="#">CONTACT US</a>
                    </li>   
                </ul>
            </div>
        </div>
    </nav>

    <!-- Laravel Blade slot -->
    {{ $slot }}

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
