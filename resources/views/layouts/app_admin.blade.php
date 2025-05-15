<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - RESAP KITCHEN</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ... -->
    @stack('styles')
    <!-- ... -->
    @stack('scripts')
    <!-- Single Vite CSS import -->
    @vite('resources/css/app.css')
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-poppins { font-family: 'Poppins', sans-serif; }
        .gradient-text {
            background: linear-gradient(135deg, #7f1d1d 0%, #ef4444 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #991b1b;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>

<body class="font-poppins antialiased bg-red-50/30">
    <div class="flex min-h-screen">
        <!-- Sidebar - Hidden on mobile, shown on larger screens -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64 bg-red-900 fixed h-full">
                <div class="flex flex-col h-full">
                    <div class="flex items-center flex-shrink-0 px-4 h-16">
                        <img class="h-8 w-auto" src="assets\img\logo_resap_bulat.png" alt="Logo">
                        <span class="ml-2 text-xl font-bold text-white">Resap Kitchen</span>
                    </div>
                    <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
                        <!-- Dashboard menu - visible for all roles -->
                        <a href="/dashboard" class="text-red-100 hover:bg-red-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-home mr-3 h-6 w-6"></i>
                            Dashboard
                        </a>
                        
                        <!-- Laporan menu - visible for all roles -->
                        <a href="/laporan" class="text-red-100 hover:bg-red-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-chart-bar mr-3 h-6 w-6"></i>
                            Laporan
                        </a>
                        
                        <!-- Pengguna menu - visible only for Admin role -->
                        @if(Auth::user()->role == 'admin')
                        <a href="/users" class="text-red-100 hover:bg-red-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-users mr-3 h-6 w-6"></i>
                            Pengguna
                        </a>
                        @endif
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col md:ml-64">
            <!-- Fixed Header -->
            <header class="bg-white shadow fixed w-full md:w-[calc(100%-16rem)] z-40">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-semibold text-gray-900">@yield('title')</h1>
                        <div class="flex items-center" x-data="{ isOpen: false }">
                            <!-- User Info Button -->
                            <div class="flex items-center cursor-pointer hover:bg-red-50 rounded-lg px-3 py-2 transition-colors duration-150" 
                                @click="isOpen = !isOpen">
                                <div class="hidden sm:flex flex-col items-end mr-3">
                                    <div class="flex items-center">
                                        <span class="text-gray-900 font-medium whitespace-nowrap">Hallo, {{ Auth::user()->name }}</span>
                                        <i class="fas fa-chevron-down ml-2 text-gray-500 text-xs" :class="{ 'transform rotate-180': isOpen }"></i>
                                    </div>
                                    <span class="text-sm text-red-900 whitespace-nowrap">{{ ucfirst(Auth::user()->role) }}</span>
                                </div>
                                <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                    <span class="text-red-900 font-medium text-sm">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Dropdown Menu -->
                            <div x-show="isOpen" 
                                @click.away="isOpen = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95"
                                class="absolute right-2 sm:right-4 top-[4.5rem] w-48 sm:w-72 bg-white rounded-lg shadow-lg py-2 border border-gray-100"
                                style="display: none;">
                                <!-- User Info Section -->
                                <div class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center mr-3">
                                            <span class="text-red-900 font-medium">
                                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                            </span>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name }}</div>
                                            <div class="text-sm text-gray-500 truncate">{{ Auth::user()->email }}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Divider -->
                                <div class="border-t border-gray-100 my-1"></div>
                                
                                <!-- Menu Items -->
                                <div class="px-2">                        
                                    <form method="GET" action="{{ route('logout') }}" class="px-0">
                                        @csrf
                                        <button type="submit" class="w-full flex items-center px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-red-50 transition-colors duration-150">
                                            <i class="fas fa-sign-out-alt w-5 text-red-900"></i>
                                            <span class="ml-2">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content with proper padding -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto pt-20 px-4 sm:px-6 lg:px-8">
                @yield('content')
            </main>
            
        </div>

        <!-- Mobile menu button -->
        <div class="md:hidden fixed bottom-4 right-4 z-50">
            <button type="button" onclick="toggleMobileMenu()" 
                    class="bg-red-900 text-white p-3 rounded-full shadow-lg hover:bg-red-800 transition-colors duration-200">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile menu -->
        <div id="mobileMenu" class="hidden fixed inset-0 z-50 md:hidden">
            <!-- Backdrop -->
            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" onclick="toggleMobileMenu()"></div>
            
            <!-- Sidebar -->
            <div class="fixed inset-y-0 left-0 w-64 bg-red-900 transform -translate-x-full transition-transform duration-300 ease-in-out">
                <div class="flex flex-col h-full">
                    <div class="flex items-center justify-between px-4 h-16">
                        <div class="flex items-center">
                            <img class="h-8 w-auto" src="assets\img\logo_resap_bulat.png" alt="Logo">
                            <span class="ml-2 text-xl font-bold text-white">Resap Kitchen</span>
                        </div>
                        <button onclick="toggleMobileMenu()" class="text-white p-2 hover:bg-red-800 rounded-md">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto">
                        <!-- Dashboard menu - visible for all roles -->
                        <a href="/dashboard" class="text-red-100 hover:bg-red-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-home mr-3 h-6 w-6"></i>
                            Dashboard
                        </a>
                        
                        <!-- Laporan menu - visible for all roles -->
                        <a href="/laporan" class="text-red-100 hover:bg-red-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-chart-bar mr-3 h-6 w-6"></i>
                            Laporan
                        </a>
                        
                        <!-- Pengguna menu - visible only for Admin role -->
                        @if(Auth::user()->role == 'admin')
                        <a href="/users" class="text-red-100 hover:bg-red-800 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                            <i class="fas fa-users mr-3 h-6 w-6"></i>
                            Pengguna
                        </a>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        AOS.init({
            duration: 800,
            offset: 100,
            once: true
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Toggle mobile menu with slide animation
            window.toggleMobileMenu = function() {
                const mobileMenu = document.getElementById('mobileMenu');
                const sidebar = mobileMenu.querySelector('.transform');
                
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    setTimeout(() => {
                        sidebar.classList.remove('-translate-x-full');
                    }, 0);
                } else {
                    sidebar.classList.add('-translate-x-full');
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                }
            };

            // Close mobile menu when clicking navigation links
            document.querySelectorAll('nav a').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    if (window.innerWidth < 768) {
                        toggleMobileMenu();
                    }
                });
            });

            // Add scroll effect to navbar
            const navbar = document.querySelector('nav');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('shadow-lg');
                } else {
                    navbar.classList.remove('shadow-lg');
                }
            });
        });
    </script>
    @yield('scripts')
</body>
</html>