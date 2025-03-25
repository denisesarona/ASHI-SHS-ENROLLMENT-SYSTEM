<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    
    {{-- Tailwind CSS and BoxIcons --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="font-sans bg-gray-100 {{ $bodyClass ?? '' }}"">



    <div class="w-screen mt-16 px-0 mx-0">
        <div class="row">
            {{-- Slot where the child content will be inserted --}}
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
</body>
</html>
