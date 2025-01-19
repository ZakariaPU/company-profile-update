@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-blue-600 to-purple-600 min-h-screen flex items-center">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600/50 to-purple-600/50"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="text-white" data-aos="fade-right">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">Transform Your Business Digital Presence</h1>
                <p class="text-xl mb-8">We create innovative digital solutions that help businesses grow and succeed in the modern world.</p>
                <div class="flex space-x-4">
                    <a href="/contact" class="px-6 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Get Started
                    </a>
                    <a href="/projects" class="px-6 py-3 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                        View Projects
                    </a>
                </div>
            </div>
            <div class="hidden md:block" data-aos="fade-left">
                <img src="/api/placeholder/600/400" alt="Hero Image" class="rounded-lg shadow-xl animate-float">
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-4">Why Choose Us</h2>
            <p class="text-xl text-gray-600">We deliver excellence through our core strengths</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-lightbulb text-3xl text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Innovative Solutions</h3>
                <p class="text-gray-600">We create cutting-edge solutions that keep you ahead of the competition.</p>
            </div>
            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-users text-3xl text-purple-600"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Expert Team</h3>
                <p class="text-gray-600">Our skilled professionals bring years of industry experience to your project.</p>
            </div>
            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas fa-chart-line text-3xl text-green-600"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">Proven Results</h3>
                <p class="text-gray-600">We deliver measurable results that drive your business growth.</p>
            </div>
        </div>
    </div>
</div>

<!-- Services Preview -->
<div class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-4">Our Services</h2>
            <p class="text-xl text-gray-600">Comprehensive solutions for your business needs</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Service 1 -->
            <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="100">
                <img src="/api/placeholder/400/300" alt="Web Development" class="w-full h-48 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                    <h3 class="text-xl font-bold text-white mb-2">Web Development</h3>
                    <p class="text-gray-300">Custom websites and web applications</p>
                </div>
            </div>
            <!-- Service 2 -->
            <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="200">
                <img src="/api/placeholder/400/300" alt="Mobile Apps" class="w-full h-48 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                    <h3 class="text-xl font-bold text-white mb-2">Mobile Apps</h3>
                    <p class="text-gray-300">iOS and Android applications</p>
                </div>
            </div>
            <!-- Service 3 -->
            <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="300">
                <img src="/api/placeholder/400/300" alt="UI/UX Design" class="w-full h-48 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                    <h3 class="text-xl font-bold text-white mb-2">UI/UX Design</h3>
                    <p class="text-gray-300">User-centered design solutions</p>
                </div>
            </div>
            <!-- Service 4 -->
            <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="400">
                <img src="/api/placeholder/400/300" alt="Digital Marketing" class="w-full h-48 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent p-6 flex flex-col justify-end">
                    <h3 class="text-xl font-bold text-white mb-2">Digital Marketing</h3>
                    <p class="text-gray-300">Results-driven marketing strategies</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Projects Preview -->
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-4">Featured Projects</h2>
            <p class="text-xl text-gray-600">Some of our best work</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @for ($i = 1; $i <= 3; $i++)
            <div class="group relative overflow-hidden rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <img src="/api/placeholder/400/500" alt="Project {{ $i }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-6 flex flex-col justify-end">
                    <h3 class="text-xl font-bold text-white mb-2">Project Title {{ $i }}</h3>
                    <p class="text-gray-300">Brief project description goes here</p>
                    <a href="/projects" class="mt-4 inline-flex items-center text-white">
                        Learn More <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-4xl font-bold mb-4">What Our Clients Say</h2>
            <p class="text-xl text-gray-600">Trusted by businesses worldwide</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @for ($i = 1; $i <= 3; $i++)
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex text-yellow-400 mb-4">
                    @for ($star = 1; $star <= 5; $star++)
                    <i class="fas fa-star"></i>
                    @endfor
                </div>
                <p class="text-gray-600 mb-6">"Outstanding service and results! The team went above and beyond our expectations."</p>
                <div class="flex items-center">
                    <img src="/api/placeholder/100/100" alt="Client {{ $i }}" class="w-12 h-12 rounded-full object-cover mr-4">
                    <div>
                        <h4 class="font-bold">Client Name {{ $i }}</h4>
                        <p class="text-gray-500">Position, Company</p>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>