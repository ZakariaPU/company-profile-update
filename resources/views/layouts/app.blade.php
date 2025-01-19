<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - DXYARY</title>
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
    </head>

<!-- Add padding to body to account for fixed navbar -->
<body class="pt-16 font-sans antialiased">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 w-full z-50 bg-white/80 backdrop-blur-md shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold gradient-text">
                        DXYARY
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Home</a>
                    <a href="/about" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">About</a>
                    <a href="/services" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Services</a>
                    <a href="/projects" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">Projects</a>
                    <a href="/contact" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">Contact Us</a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="mobile-menu-button p-2 rounded-md hover:bg-gray-100">
                        <i class="fas fa-bars text-gray-700 text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="mobile-menu hidden md:hidden bg-white border-t">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-blue-600 rounded-lg">Home</a>
                <a href="/about" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-blue-600 rounded-lg">About</a>
                <a href="/services" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-blue-600 rounded-lg">Services</a>
                <a href="/projects" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 hover:text-blue-600 rounded-lg">Projects</a>
                <a href="/contact" class="block px-4 py-2 text-base font-medium text-gray-700 hover:bg-blue-50 hover:text-blue-600 rounded-lg">Contact</a>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="space-y-4">
                    <h3 class="text-2xl font-bold gradient-text">PT Hanjaya Dayari Raya</h3>
                    <p class="text-gray-400">Transforming ideas into digital reality. We create innovative solutions for modern businesses.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="/about" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="/services" class="text-gray-400 hover:text-white transition-colors">Services</a></li>
                        <li><a href="/projects" class="text-gray-400 hover:text-white transition-colors">Projects</a></li>
                        <li><a href="/contact" class="text-gray-400 hover:text-white transition-colors">Contacts</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Our Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Web Development</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Mobile Apps</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">UI/UX Design</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Digital Marketing</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-map-marker-alt w-6"></i>
                            123 Business Street, New York, USA
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-phone w-6"></i>
                            +1 234 567 890
                        </li>
                        <li class="flex items-center text-gray-400">
                            <i class="fas fa-envelope w-6"></i>
                            info@company.com
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
                <p>&copy; 2025 CompanyName. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Initialize AOS
        AOS.init();

            // Add this to your JavaScript file or script section
            document.addEventListener('DOMContentLoaded', function() {
                const mobileMenuButton = document.querySelector('.mobile-menu-button');
                const mobileMenu = document.querySelector('.mobile-menu');

                mobileMenuButton.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });

                // Close menu when clicking outside
                document.addEventListener('click', function(event) {
                    if (!mobileMenu.contains(event.target) && !mobileMenuButton.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });
            });
    </script>
</body>
</html>