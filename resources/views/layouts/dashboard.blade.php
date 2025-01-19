<!-- resources/views/layouts/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - {{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-64">
                <div class="flex flex-col h-0 flex-1">
                    <div class="flex items-center h-16 flex-shrink-0 px-4 bg-blue-600">
                        <h1 class="text-xl font-bold text-white">Admin Panel</h1>
                    </div>
                    <div class="flex-1 flex flex-col overflow-y-auto bg-white">
                        <nav class="flex-1 px-2 py-4">
                            <a href="{{ route('dashboard') }}" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('dashboard') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="fas fa-home mr-3"></i>
                                Dashboard
                            </a>
                            <a href="{{ route('dashboard.profile') }}" class="mt-1 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('dashboard.profile') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="fas fa-user mr-3"></i>
                                Profile
                            </a>
                            <a href="{{ route('dashboard.settings') }}" class="mt-1 group flex items-center px-2 py-2 text-sm font-medium rounded-md {{ Request::routeIs('dashboard.settings') ? 'bg-blue-100 text-blue-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="fas fa-cog mr-3"></i>
                                Settings
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
                <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 md:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <i class="fas fa-bars"></i>
                </button>
                <div class="flex-1 px-4 flex justify-between">
                    <div class="flex-1 flex"></div>
                    <div class="ml-4 flex items-center md:ml-6">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <span class="sr-only">Logout</span>
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <main class="flex-1 relative overflow-y-auto focus:outline-none">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Mobile menu functionality
        document.querySelector('button').addEventListener('click', function() {
            document.querySelector('.md\\:flex').classList.toggle('hidden');
        });
    </script>
</body>
</html>