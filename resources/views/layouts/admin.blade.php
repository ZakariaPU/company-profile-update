<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - Admin Dashboard</title>
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-red-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="flex flex-col">
            <!-- Mobile Sidebar Toggle -->
            <div class="lg:hidden fixed top-4 left-4 z-50">
                <button id="sidebarToggle" class="p-2 rounded-lg bg-red-900 text-white hover:bg-red-800 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Sidebar Content -->
            <div id="sidebar" class="fixed inset-y-0 left-0 transform -translate-x-full lg:translate-x-0 lg:relative transition-transform duration-300 ease-in-out w-64 bg-red-900 text-white flex flex-col justify-between z-40">
                <!-- Logo and Navigation -->
                <div>
                    <div class="p-4">
                        <h1 class="text-2xl font-bold text-white">Admin Panel</h1>
                    </div>
                    
                    <nav class="mt-4">
                        <div class="px-4 py-2">
                            <h2 class="text-xs uppercase tracking-wider text-red-200">Main Menu</h2>
                        </div>
                        
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-800 hover:text-white transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-red-800' : '' }}">
                            <i class="fas fa-home w-6"></i>
                            <span>Dashboard</span>
                        </a>
                        
                        <a href="{{ route('admin.messages') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-800 hover:text-white transition-colors {{ request()->routeIs('admin.messages') ? 'bg-red-800' : '' }}">
                            <i class="fas fa-envelope w-6"></i>
                            <span>Messages</span>
                        </a>
                        
                        <a href="{{ route('admin.reports') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-800 hover:text-white transition-colors {{ request()->routeIs('admin.reports') ? 'bg-red-800' : '' }}">
                            <i class="fas fa-chart-bar w-6"></i>
                            <span>Reports</span>
                        </a>
                        
                        <div class="px-4 py-2 mt-4">
                            <h2 class="text-xs uppercase tracking-wider text-red-200">Settings</h2>
                        </div>
                        
                        <a href="{{ route('admin.profile') }}" class="flex items-center px-4 py-3 text-red-100 hover:bg-red-800 hover:text-white transition-colors {{ request()->routeIs('admin.profile') ? 'bg-red-800' : '' }}">
                            <i class="fas fa-user w-6"></i>
                            <span>Profile</span>
                        </a>
                    </nav>
                </div>
                
                <!-- Logout Button -->
                {{-- <div class="p-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center px-4 py-2 bg-red-800 hover:bg-red-700 text-white rounded-lg transition-colors">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </button>
                    </form>
                </div> --}}
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-x-hidden">
            @yield('content')
        </div>
    </div>


</body>
</html>