<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
    </head>

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

    {{-- @yield('content') --}}
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
                
                {{-- <!-- Logout Button -->
                <div class="p-4">
                    <form method="POST" action="{{ route('admin.messages') }}">
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

    <!-- Footer -->
    <footer class="bg-gradient-to-br from-red-900 to-red-800 text-white">
        <div class="max-w-7xl mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-white/10 rounded-full flex items-center justify-center">
                            <i class="fas fa-utensils text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold font-playfair text-white">RESAP KITCHEN</h3>
                    </div>
                    <p class="text-red-100">Bringing delightful flavors to your special moments. Professional catering services for all occasions.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 text-white hover:bg-white/20 transition-colors">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-white">Quick Links</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="/" class="text-red-100 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>Home
                            </a>
                        </li>
                        <li>
                            <a href="/about" class="text-red-100 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>About Us
                            </a>
                        </li>
                        <li>
                            <a href="/services" class="text-red-100 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>Our Menu
                            </a>
                        </li>
                        <li>
                            <a href="/blog" class="text-red-100 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>Blog
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-white">Our Services</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="text-red-100 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>Wedding Catering
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-red-100 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>Corporate Events
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-red-100 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>Private Parties
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-red-100 hover:text-white transition-colors flex items-center group">
                                <i class="fas fa-chevron-right mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>Food Delivery
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-6 text-white">Contact Info</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start text-red-100 group">
                            <i class="fas fa-map-marker-alt w-6 mt-1 group-hover:text-white transition-colors"></i>
                            <span class="ml-2 group-hover:text-white transition-colors">Jl. Amerta VII No.10, Jombor Lor, Sinduadi, Kec. Mlati, Kab. Sleman, DI Yogyakarta 55284</span>
                        </li>
                        <li>
                            <a href="tel:+628112658048" class="flex items-center text-red-100 hover:text-white transition-colors">
                                <i class="fas fa-phone w-6"></i>
                                <span class="ml-2">+62 811 2658 048</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@resapkitchen.com" class="flex items-center text-red-100 hover:text-white transition-colors">
                                <i class="fas fa-envelope w-6"></i>
                                <span class="ml-2">info@resapkitchen.com</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-red-700/50 mt-12 pt-8 text-center text-red-100">
                <p>&copy; 2025 RESAP KITCHEN. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        AOS.init({
            duration: 800,
            offset: 100,
            once: true
        });

        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.querySelector('.mobile-menu-button');
            const mobileMenu = document.querySelector('.mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
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

        document.getElementById('sidebarToggle').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            
            if (window.innerWidth < 1024 && // Only on mobile
                !sidebar.contains(event.target) && // Not clicking inside sidebar
                !sidebarToggle.contains(event.target) && // Not clicking toggle button
                !sidebar.classList.contains('-translate-x-full')) { // Sidebar is open
                sidebar.classList.add('-translate-x-full');
            }
        });
   
    </script>
    @yield('scripts')
</body>
</html>