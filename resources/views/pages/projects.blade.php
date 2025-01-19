@extends('layouts.app')

@section('title', 'Our Projects')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-24 bg-gradient-to-r from-purple-600 to-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center text-white">
            <h1 class="text-5xl font-bold mb-6" data-aos="fade-up">Our Projects</h1>
            <p class="text-xl max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Explore our portfolio of successful projects and innovative solutions
            </p>
        </div>
    </div>
</div>

<!-- Filter Categories -->
<div class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex overflow-x-auto py-4 space-x-4" id="project-filters">
            <button class="px-6 py-2 rounded-full bg-blue-600 text-white" data-filter="all">All</button>
            <button class="px-6 py-2 rounded-full bg-gray-200 hover:bg-blue-600 hover:text-white transition-colors" data-filter="web">Web Development</button>
            <button class="px-6 py-2 rounded-full bg-gray-200 hover:bg-blue-600 hover:text-white transition-colors" data-filter="mobile">Mobile Apps</button>
            <button class="px-6 py-2 rounded-full bg-gray-200 hover:bg-blue-600 hover:text-white transition-colors" data-filter="design">UI/UX Design</button>
        </div>
    </div>
</div>

<!-- Projects Grid -->
<div class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $projects = [
                [
                    'title' => 'E-commerce Platform',
                    'category' => 'web',
                    'description' => 'A full-featured e-commerce solution with advanced features.',
                    'client' => 'RetailCo',
                    'duration' => '4 months'
                ],
                [
                    'title' => 'Fitness Tracking App',
                    'category' => 'mobile',
                    'description' => 'Mobile application for tracking workouts and nutrition.',
                    'client' => 'FitLife',
                    'duration' => '3 months'
                ],
                [
                    'title' => 'Banking Dashboard',
                    'category' => 'design',
                    'description' => 'Modern UI/UX design for a banking platform.',
                    'client' => 'FinBank',
                    'duration' => '2 months'
                ],
                // Add more projects as needed
            ];
            @endphp

            @foreach ($projects as $index => $project)
            <div class="group project-card" data-category="{{ $project['category'] }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="relative overflow-hidden rounded-xl shadow-lg">
                    <img src="/api/placeholder/600/400" alt="{{ $project['title'] }}" class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                        <span class="text-sm text-blue-400 mb-2">{{ ucfirst($project['category']) }}</span>
                        <h3 class="text-xl font-bold text-white mb-2">{{ $project['title'] }}</h3>
                        <p class="text-gray-300 mb-4">{{ $project['description'] }}</p>
                        <div class="flex justify-between text-sm text-gray-300">
                            <span>Client: {{ $project['client'] }}</span>
                            <span>Duration: {{ $project['duration'] }}</span>
                        </div>
                        <a href="#" class="mt-4 inline-flex items-center text-white hover:text-blue-400">
                            View Details <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Case Studies -->
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4" data-aos="fade-up">Case Studies</h2>
            <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">Deep dive into our success stories</p>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            @for ($i = 1; $i <= 2; $i++)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <img src="/api/placeholder/800/400" alt="Case Study {{ $i }}" class="w-full h-64 object-cover">
                <div class="p-8">
                    <h3 class="text-2xl font-bold mb-4">Case Study Title {{ $i }}</h3>
                    <p class="text-gray-600 mb-6">Detailed exploration of the challenges, solutions, and results achieved for our client.</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">Technology</span>
                            <span class="text-gray-500">Read time: 5 min</span>
                        </div>
                        <a href="#" class="text-blue-600 hover:text-blue-700">Read More →</a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>