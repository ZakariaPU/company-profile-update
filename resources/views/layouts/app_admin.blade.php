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
        
        /* Active navigation item styling */
        .nav-item.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #fff;
        }
        
        /* Pulse animation for mobile toggle button */
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(153, 27, 27, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(153, 27, 27, 0); }
            100% { box-shadow: 0 0 0 0 rgba(153, 27, 27, 0); }
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        /* Animate sidebar toggle */
        .sidebar-slide-enter {
            transform: translateX(-100%);
        }
        
        .sidebar-slide-enter-active {
            transform: translateX(0);
            transition: transform 300ms;
        }
        
        .sidebar-slide-exit {
            transform: translateX(0);
        }
        
        .sidebar-slide-exit-active {
            transform: translateX(-100%);
            transition: transform 300ms;
        }
        
        /* Page transition effects */
        .page-enter {
            opacity: 0;
            transform: translateY(20px);
        }
        
        .page-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 300ms, transform 300ms;
        }
        
        /* Modal backdrop */
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 50;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Modal animation */
        .modal-content {
            max-height: 90vh;
            overflow-y: auto;
            transition: all 0.3s ease-out;
        }
        
        .modal-enter {
            opacity: 0;
            transform: scale(0.95);
        }
        
        .modal-enter-active {
            opacity: 1;
            transform: scale(1);
        }
        
        .modal-exit {
            opacity: 1;
            transform: scale(1);
        }
        
        .modal-exit-active {
            opacity: 0;
            transform: scale(0.95);
        }
    </style>
</head>

<body class="font-poppins antialiased bg-red-50/30" x-data="{ 
    sidebarOpen: false, 
    currentPage: '{{ Request::path() }}',
    profileModalOpen: false,
    logoutModalOpen: false
}">
    <div class="flex min-h-screen">
        <!-- Sidebar - Hidden on mobile, shown on larger screens -->
        <div class="hidden md:flex md:flex-shrink-0" :class="{'md:hidden': !sidebarOpen}">
            <div class="flex flex-col w-64 bg-red-900 fixed h-full">
                <div class="flex flex-col h-full">
                    <div class="flex items-center justify-between flex-shrink-0 px-4 h-16">
                        <div class="flex items-center">
                            <img class="h-10 w-auto" src="{{ asset('assets/img/logo_resap_bulat.png') }}" alt="Logo">
                            <span class="ml-2 text-xl font-bold text-white">Resap Kitchen</span>
                        </div>
                        <!-- Desktop sidebar toggle -->
                        <button @click="sidebarOpen = !sidebarOpen" class="hidden md:block text-white hover:text-red-200 transition-colors duration-200">
                            <i class="fas fa-chevron-left" :class="{'rotate-180': !sidebarOpen}"></i>
                        </button>
                    </div>
                    
                    <div class="mt-6 px-4">
                        <div class="flex items-center">
                            <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                                <span class="text-red-900 font-medium text-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                                <p class="text-xs text-red-200">{{ ucfirst(Auth::user()->role) }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto mt-6">
                        <!-- Dashboard menu - visible for all roles -->
                        <a href="/dashboard" 
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200 nav-item"
                           :class="{'active text-white': currentPage === 'dashboard', 'text-red-100 hover:bg-red-800': currentPage !== 'dashboard'}">
                            <i class="fas fa-home mr-3 h-6 w-6" :class="{'text-white': currentPage === 'dashboard', 'text-red-300': currentPage !== 'dashboard'}"></i>
                            Dashboard
                        </a>
                        
                        <!-- Laporan menu - visible for all roles -->
                        <a href="/laporan" 
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200 nav-item"
                           :class="{'active text-white': currentPage === 'laporan', 'text-red-100 hover:bg-red-800': currentPage !== 'laporan'}">
                            <i class="fas fa-chart-bar mr-3 h-6 w-6" :class="{'text-white': currentPage === 'laporan', 'text-red-300': currentPage !== 'laporan'}"></i>
                            Laporan
                        </a>
                        
                        <!-- Pengguna menu - visible only for Admin role -->
                        @if(Auth::user()->role == 'admin')
                        <a href="/users" 
                           class="group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200 nav-item"
                           :class="{'active text-white': currentPage === 'users', 'text-red-100 hover:bg-red-800': currentPage !== 'users'}">
                            <i class="fas fa-users mr-3 h-6 w-6" :class="{'text-white': currentPage === 'users', 'text-red-300': currentPage !== 'users'}"></i>
                            Pengguna
                        </a>
                        @endif
                        
                        <!-- Divider -->
                        <div class="border-t border-red-800 my-4"></div>
                        
                        <!-- Logout Option -->
                        <button @click="logoutModalOpen = true" class="w-full group flex items-center px-2 py-2 text-sm font-medium rounded-md text-red-100 hover:bg-red-800 transition-all duration-200">
                            <i class="fas fa-sign-out-alt mr-3 h-6 w-6 text-red-300"></i>
                            Logout
                        </button>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col" :class="{'md:ml-64': sidebarOpen || window.innerWidth < 768, 'md:ml-0': !sidebarOpen && window.innerWidth >= 768}">
            <!-- Fixed Header -->
            <header class="bg-white shadow fixed w-full z-40" :class="{'md:w-[calc(100%-16rem)]': sidebarOpen, 'md:w-full': !sidebarOpen}">
                <div class="px-4 sm:px-6 lg:px-8 py-4">
                    <div class="flex items-center justify-between">
                        <!-- Left side: Toggle button and title -->
                        <div class="flex items-center">
                            <!-- Mobile sidebar toggle -->
                            <button @click="sidebarOpen = !sidebarOpen" class="mr-3 md:hidden text-red-900 hover:text-red-700 focus:outline-none">
                                <i class="fas" :class="sidebarOpen ? 'fa-times' : 'fa-bars'"></i>
                            </button>
                            
                            <!-- Desktop toggle for collapsed state -->
                            <button @click="sidebarOpen = !sidebarOpen" class="hidden md:block mr-3 text-red-900 hover:text-red-700 focus:outline-none" x-show="!sidebarOpen">
                                <i class="fas fa-bars"></i>
                            </button>
                            
                            <!-- Page Title with dynamic breadcrumb -->
                            <div>
                                <div class="flex items-center text-sm text-gray-500 mb-1">
                                    <a href="/dashboard" class="hover:text-red-900">Home</a>
                                    <i class="fas fa-chevron-right mx-2 text-xs"></i>
                                    <span x-text="currentPage.charAt(0).toUpperCase() + currentPage.slice(1)" class="text-red-900"></span>
                                </div>
                                <h1 class="text-2xl font-semibold text-gray-900">
                                    <span x-show="currentPage === 'dashboard'">Dashboard</span>
                                    <span x-show="currentPage === 'laporan'">Laporan</span>
                                    <span x-show="currentPage === 'users'">Kelola Pengguna</span>
                                </h1>
                            </div>
                        </div>
                        
                        <!-- User Info Button -->
                        <div class="flex items-center" x-data="{ isOpen: false }">
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
                                    <!-- Profile option -->
                                    <button @click="profileModalOpen = true; isOpen = false" class="w-full flex items-center px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-red-50 transition-colors duration-150">
                                        <i class="fas fa-user-circle w-5 text-red-900"></i>
                                        <span class="ml-2">Profil</span>
                                    </button>
                                    
                                    <!-- Divider -->
                                    <div class="border-t border-gray-100 my-1"></div>
                                    
                                    <!-- Logout option -->
                                    <button @click="logoutModalOpen = true; isOpen = false" class="w-full flex items-center px-3 py-2 text-sm text-gray-700 rounded-lg hover:bg-red-50 transition-colors duration-150">
                                        <i class="fas fa-sign-out-alt w-5 text-red-900"></i>
                                        <span class="ml-2">Logout</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content with proper padding -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto pt-24 px-4 sm:px-6 lg:px-8 pb-8">
                <!-- Page indicator - shows which page user is on -->
                {{-- <div class="mb-6 flex items-center opacity-75">
                    <div class="flex space-x-2 items-center text-sm">
                        <span x-show="currentPage === 'dashboard'" class="bg-red-100 text-red-800 px-2 py-1 rounded-md flex items-center">
                            <i class="fas fa-home mr-2"></i> Halaman Dashboard
                        </span>
                        <span x-show="currentPage === 'laporan'" class="bg-red-100 text-red-800 px-2 py-1 rounded-md flex items-center">
                            <i class="fas fa-chart-bar mr-2"></i> Halaman Laporan
                        </span>
                        <span x-show="currentPage === 'users'" class="bg-red-100 text-red-800 px-2 py-1 rounded-md flex items-center">
                            <i class="fas fa-users mr-2"></i> Halaman Pengguna
                        </span>
                    </div>
                </div> --}}
                
                <!-- Content wrapper with transition effects -->
                <div class="page-enter page-enter-active" x-ref="contentArea">
                    @yield('content')
                </div>
            </main>
            
            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 py-4 px-6 text-center text-sm text-gray-600">
                <p>&copy; {{ date('Y') }} Resap Kitchen. All rights reserved.</p>
            </footer>
        </div>

        <!-- Mobile menu button - only visible when sidebar is closed -->
        {{-- <div class="md:hidden fixed bottom-4 right-4 z-50" x-show="!sidebarOpen">
            <button type="button" @click="sidebarOpen = true" 
                    class="bg-red-900 text-white p-3 rounded-full shadow-lg hover:bg-red-800 transition-colors duration-200 pulse-animation">
                <i class="fas fa-bars"></i>
            </button>
        </div> --}}

        <!-- Mobile sidebar overlay -->
        <div class="md:hidden fixed inset-0 z-40 bg-black bg-opacity-50 transition-opacity" 
             x-show="sidebarOpen" 
             @click="sidebarOpen = false"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"></div>
        
        <!-- Mobile sidebar -->
        <div class="md:hidden fixed inset-y-0 left-0 w-64 bg-red-900 z-50 transform transition-transform duration-300 ease-in-out"
             x-show="sidebarOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full">
            <!-- Mobile sidebar content -->
            <div class="flex flex-col h-full">
                <div class="flex items-center justify-between px-4 h-16">
                    <div class="flex items-center">
                        <img class="h-8 w-auto" src="{{ asset('assets/img/logo_resap_bulat.png') }}" alt="Logo">
                        <span class="ml-2 text-xl font-bold text-white">Resap Kitchen</span>
                    </div>
                    <button @click="sidebarOpen = false" class="text-white p-2 hover:bg-red-800 rounded-md">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="mt-6 px-4">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                            <span class="text-red-900 font-medium text-sm">
                                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                            </span>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-red-200">{{ ucfirst(Auth::user()->role) }}</p>
                        </div>
                    </div>
                </div>
                
                <nav class="flex-1 px-2 py-4 space-y-1 overflow-y-auto mt-6">
                    <!-- Dashboard menu - visible for all roles -->
                    <a href="/dashboard" 
                       class="group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200 nav-item"
                       :class="{'active text-white': currentPage === 'dashboard', 'text-red-100 hover:bg-red-800': currentPage !== 'dashboard'}"
                       @click="sidebarOpen = false">
                        <i class="fas fa-home mr-3 h-6 w-6" :class="{'text-white': currentPage === 'dashboard', 'text-red-300': currentPage !== 'dashboard'}"></i>
                        Dashboard
                    </a>
                    
                    <!-- Laporan menu - visible for all roles -->
                    <a href="/laporan" 
                       class="group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200 nav-item"
                       :class="{'active text-white': currentPage === 'laporan', 'text-red-100 hover:bg-red-800': currentPage !== 'laporan'}"
                       @click="sidebarOpen = false">
                        <i class="fas fa-chart-bar mr-3 h-6 w-6" :class="{'text-white': currentPage === 'laporan', 'text-red-300': currentPage !== 'laporan'}"></i>
                        Laporan
                    </a>
                    
                    <!-- Pengguna menu - visible only for Admin role -->
                    @if(Auth::user()->role == 'admin')
                    <a href="/users" 
                       class="group flex items-center px-2 py-2 text-sm font-medium rounded-md transition-all duration-200 nav-item"
                       :class="{'active text-white': currentPage === 'users', 'text-red-100 hover:bg-red-800': currentPage !== 'users'}"
                       @click="sidebarOpen = false">
                        <i class="fas fa-users mr-3 h-6 w-6" :class="{'text-white': currentPage === 'users', 'text-red-300': currentPage !== 'users'}"></i>
                        Pengguna
                    </a>
                    @endif
                    
                    <!-- Divider -->
                    <div class="border-t border-red-800 my-4"></div>
                    
                    <!-- Logout Option -->
                    <button @click="logoutModalOpen = true" class="w-full group flex items-center px-2 py-2 text-sm font-medium rounded-md text-red-100 hover:bg-red-800 transition-all duration-200">
                        <i class="fas fa-sign-out-alt mr-3 h-6 w-6 text-red-300"></i>
                        Logout
                    </button>
                </nav>
            </div>
        </div>
    </div>

    <!-- Profile Modal -->
    <div class="modal-backdrop" 
         x-show="profileModalOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         style="display: none;">
        <div class="modal-content bg-white rounded-lg shadow-xl w-full max-w-md mx-auto p-6"
             x-show="profileModalOpen"
             @click.away="profileModalOpen = false"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform scale-95"
             x-transition:enter-end="opacity-100 transform scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform scale-100"
             x-transition:leave-end="opacity-0 transform scale-95">
            
            <!-- Modal Header -->
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-gray-900">Profil Pengguna</h3>
                <button @click="profileModalOpen = false" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <!-- User Profile Content -->
            <div class="mb-6">
                <div class="flex flex-col items-center mb-6">
                    <div class="h-24 w-24 rounded-full bg-red-100 flex items-center justify-center mb-3">
                        <span class="text-red-900 font-bold text-2xl">
                            {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                        </span>
                    </div>
                    <h4 class="text-lg font-medium text-gray-900">{{ Auth::user()->name }}</h4>
                    <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                    <span class="mt-1 inline-block bg-red-100 text-red-800 text-xs px-2 py-1 rounded-full">
                        {{ ucfirst(Auth::user()->role) }}
                    </span>
                </div>
                
                <!-- User Details -->
                <div class="space-y-4">
                    <div class="border-t border-gray-200"></div>
                    
                    <div>
                        <h5 class="text-sm font-medium text-gray-500">Nama Lengkap</h5>
                        <p class="text-base text-gray-900">{{ Auth::user()->name }}</p>
                    </div>
                    
                    <div>
                        <h5 class="text-sm font-medium text-gray-500">Email</h5>
                        <p class="text-base text-gray-900">{{ Auth::user()->email }}</p>
                    </div>
                    
                    <div>
                        <h5 class="text-sm font-medium text-gray-500">Role</h5>
                        <p class="text-base text-gray-900">{{ ucfirst(Auth::user()->role) }}</p>
                    </div>
                    
                    <div>
                        <h5 class="text-sm font-medium text-gray-500">Bergabung Pada</h5>
                        <p class="text-base text-gray-900">{{ Auth::user()->created_at->format('d M Y') }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Footer Actions -->
            <div class="flex justify-end">
                <button @click="profileModalOpen = false" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors duration-200">
                    Tutup
                </button>
                {{-- <button class="ml-3 px-4 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors duration-200">
                    Edit Profil
                </button> --}}
            </div>
        </div>
    </div>

<!-- Logout Confirmation Modal - Continuation -->
<div class="modal-backdrop" 
     x-show="logoutModalOpen" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     style="display: none;">
    <div class="modal-content bg-white rounded-lg shadow-xl w-full max-w-md mx-auto p-6"
         x-show="logoutModalOpen"
         @click.away="logoutModalOpen = false"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95">
        
        <!-- Modal Header -->
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-semibold text-gray-900">Konfirmasi Logout</h3>
            <button @click="logoutModalOpen = false" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <!-- Logout Confirmation Content -->
        <div class="mb-6 text-center">
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-50 mb-4">
                <i class="fas fa-sign-out-alt text-red-800 text-2xl"></i>
            </div>
            <h4 class="text-lg font-medium text-gray-900 mb-2">Apakah Anda yakin ingin keluar?</h4>
            <p class="text-sm text-gray-600">Anda akan keluar dari sistem dan kembali ke halaman login.</p>
        </div>
        
        <!-- Footer Actions -->
        <div class="flex justify-center space-x-4">
            <button @click="logoutModalOpen = false" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors duration-200">
                Batal
            </button>
            <form method="GET" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-700 text-white rounded-md hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors duration-200">
                    Ya, Logout
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Initialize AOS library for animations -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            offset: 100,
            easing: 'ease-in-out'
        });
    });
</script>

<!-- Alpine.js responsive handling for sidebar -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('sidebarState', () => ({
            isOpen: window.innerWidth >= 768, // Default open on desktop
            init() {
                this.$watch('isOpen', value => {
                    if (window.innerWidth >= 768) {
                        document.body.classList.toggle('sidebar-open', value);
                    }
                });

                window.addEventListener('resize', () => {
                    if (window.innerWidth < 768) {
                        this.isOpen = false;
                    }
                });
            }
        }));
    });
</script>

<!-- Vite script import -->
@vite('resources/js/app.js')

</body>
</html>