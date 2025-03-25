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
    <button id="sidebarToggle" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
        </svg>
    </button>

    <aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen bg-gray-50 dark:bg-blue-600 transition-transform -translate-x-full sm:translate-x-0">
        <div class="h-full px-3 py-4 overflow-y-auto">
            
            <!-- Logo and School Name -->
            <div class="flex flex-col items-center pb-4 border-b border-gray-200 dark:border-gray-400">
                <img src="{{ asset('images/ASHIlogowbg.png') }}" alt="ASHI Logo" class="w-20 h-20 mb-2">
                <h1 class="text-lg font-semibold text-gray-900 dark:text-white text-center">Amaya School of Home Industries</h1>
            </div>

            <ul class="space-y-2 font-medium mt-4">
                <li>
                    <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-blue-500">
                        <i class='bx bxs-dashboard'></i>
                        <span class="ms-3">Dashboard</span>
                    </a> 
                </li>
                <li>
                    <button type="button" class="dropdown-toggle flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-blue-500">
                        <i class='bx bx-user'></i>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Administrators</span>
                        <svg class="w-3 h-3 transition-transform transform rotate-0" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M1 1l4 4 4-4"></path>
                        </svg>
                    </button>
                    <ul class="dropdown-menu hidden py-2 space-y-2">
                        <li><a href="#" class="block p-2 pl-10 hover:bg-gray-100 dark:text-white dark:hover:bg-blue-500">List of Admin</a></li>
                        <li><a href="#" class="block p-2 pl-10 hover:bg-gray-100 dark:text-white dark:hover:bg-blue-500">Add New Admin</a></li>
                    </ul>
                </li>
                <li>
                    <button type="button" class="dropdown-toggle flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-blue-500">
                        <i class='bx bxs-graduation'></i>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Learners</span>
                        <svg class="w-3 h-3 transition-transform transform rotate-0" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M1 1l4 4 4-4"></path>
                        </svg>
                    </button>
                    <ul class="dropdown-menu hidden py-2 space-y-2">
                        <li><a href="#" class="block p-2 pl-10 hover:bg-gray-100 dark:text-white dark:hover:bg-blue-500">Pending Learners</a></li>
                        <li><a href="#" class="block p-2 pl-10 hover:bg-gray-100 dark:text-white dark:hover:bg-blue-500">Enrolled Learners</a></li>
                    </ul>
                </li>

                <li>
                    <button type="button" class="dropdown-toggle flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-blue-500">
                        <i class='bx bx-list-check'></i>
                        <span class="flex-1 ms-3 text-left whitespace-nowrap">Enrollment Form</span>
                        <svg class="w-3 h-3 transition-transform transform rotate-0" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M1 1l4 4 4-4"></path>
                        </svg>
                    </button>
                    <ul class="dropdown-menu hidden py-2 space-y-2">
                        <li><a href="#" class="block p-2 pl-10 hover:bg-gray-100 dark:text-white dark:hover:bg-blue-500">School Year</a></li>
                        <li><a href="#" class="block p-2 pl-10 hover:bg-gray-100 dark:text-white dark:hover:bg-blue-500">Strands</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    
    <div class="p-4 sm:ml-64">
        Dashboard
    </div>

 
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

    <!-- JavaScript for Sidebar and Dropdown -->
    <script>
        // Sidebar Toggle
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            let sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("-translate-x-full");
        });
    
        // Dropdown Toggle
        document.querySelectorAll(".dropdown-toggle").forEach(function(button) {
            button.addEventListener("click", function() {
                let dropdownMenu = this.nextElementSibling; // Get the next sibling which is the dropdown menu
                let dropdownIcon = this.querySelector("svg"); // Get the icon inside the button
                
                dropdownMenu.classList.toggle("hidden");
                dropdownIcon.classList.toggle("rotate-180");
            });
        });
    </script>
    
</body>
</html>


