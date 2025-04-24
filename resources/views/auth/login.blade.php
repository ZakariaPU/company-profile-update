<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RESAP KITCHEN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        body{
            font-family: 'Poppins', sans-serif;
        }
        @keyframes moveFood {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        @keyframes rotateServing {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(5deg); }
        }
        .food-item {
            animation: moveFood 3s ease-in-out infinite;
        }
        .serving-plate {
            animation: rotateServing 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="container mx-auto flex items-center justify-center">
        <div class="w-full max-w-4xl flex shadow-2xl rounded-2xl overflow-hidden">
            <!-- Catering Visualization Section -->
            <div class="w-1/2 bg-gradient-to-br from-red-500 to-red-700 relative overflow-hidden flex items-center justify-center p-8">
                <div class="absolute inset-0 opacity-10">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="absolute w-full h-full">
                        <circle cx="100" cy="100" r="80" fill="none" stroke="white" stroke-width="2" stroke-dasharray="10,10"/>
                        <circle cx="100" cy="100" r="60" fill="none" stroke="white" stroke-width="2" stroke-dasharray="10,10"/>
                    </svg>
                </div>

                <div class="relative z-10 text-center">
                    <div class="flex justify-center mb-6 space-x-4">
                        <!-- Food Items -->
                        <div class="food-item bg-white rounded-full p-4 shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </div>
                        <div class="food-item bg-white rounded-full p-4 shadow-lg delay-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>

                    <div class="serving-plate bg-white rounded-2xl p-6 shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 mx-auto text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                        <h2 class="mt-4 text-2xl font-bold text-gray-800">Resap Kitchen</h2>
                        <p class="text-gray-600">Professional Catering Services</p>
                    </div>
                </div>
            </div>

            <!-- Login Form Section -->
            <div class="w-1/2 bg-white p-12 flex flex-col justify-center">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome Back</h1>
                    <p class="text-gray-500">Sign In to Your Account</p>
                </div>

                <form class="space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input id="email" name="email" type="email" required 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300 ease-in-out" 
                                   placeholder="Enter your email">
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <div class="relative">
                                <input id="password" name="password" type="password" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300 ease-in-out pr-10" 
                                       placeholder="Enter your password">
                                <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-red-500 transition duration-300">
                                    <svg id="eye-open" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg id="eye-closed" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" 
                                   class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button type="submit" 
                                class="w-full py-3 px-4 bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold rounded-lg hover:from-red-600 hover:to-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out transform hover:scale-101 active:scale-99">
                            Sign In
                        </button>

                        <a href="/home" class="w-full block">
                            <button type="button" 
                                    class="w-full py-3 px-4 bg-white border border-red-500 text-red-500 font-semibold rounded-lg hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition duration-300 ease-in-out transform hover:scale-101 active:scale-99">
                                <div class="flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    Go to Home
                                </div>
                            </button>
                        </a>
                    </div>
                </form>

                <div class="mt-6 text-center">
                    {{-- <p class="text-sm text-gray-600">
                        Don't have an account? 
                        <a href="#" class="text-red-600 hover:text-red-500 font-medium">
                            Sign up
                        </a>
                    </p> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordInput = document.getElementById('password');
            const togglePasswordBtn = document.getElementById('toggle-password');
            const eyeOpen = document.getElementById('eye-open');
            const eyeClosed = document.getElementById('eye-closed');

            togglePasswordBtn.addEventListener('click', function() {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeOpen.classList.add('hidden');
                    eyeClosed.classList.remove('hidden');
                } else {
                    passwordInput.type = 'password';
                    eyeOpen.classList.remove('hidden');
                    eyeClosed.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>