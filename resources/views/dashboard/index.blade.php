<!-- resources/views/dashboard/index.blade.php -->
@extends('layouts.dashboard')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Replace with your content -->
        <div class="py-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Stats Card -->
                <div class="bg-white overflow-hidden shadow rounded-lg">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-users text-blue-500 text-3xl"></i>
                            </div>
                            <div class="ml-5">
                                <p class="text-gray-500 text-sm font-medium">Total Users</p>
                                <h3 class="text-2xl font-bold text-gray-900">1,234</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Add more stats cards as needed -->
            </div>
        </div>
        <!-- /End replace -->
    </div>
</div>
@endsection