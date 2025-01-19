@extends('layouts.app')

@section('title', 'Our Services')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-24 bg-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center text-white">
            <h1 class="text-5xl font-bold mb-6" data-aos="fade-up">Our Services</h1>
            <p class="text-xl max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Comprehensive digital solutions tailored to your business needs
            </p>
        </div>
    </div>
</div>

<!-- Services Grid -->
<div class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-8">
            @php
            $services = [
                [
                    'icon' => 'fa-laptop-code',
                    'title' => 'Web Development',
                    'description' => 'Custom websites and web applications built with the latest technologies.',
                    'features' => ['Responsive Design', 'E-commerce Solutions', 'CMS Development', 'API Integration']
                ],
                [
                    'icon' => 'fa-mobile-alt',
                    'title' => 'Mobile Development',
                    'description' => 'Native and cross-platform mobile applications for iOS and Android.',
                    'features' => ['iOS Development', 'Android Development', 'Cross-platform Apps', 'App Maintenance']
                ],
                [
                    'icon' => 'fa-paint-brush',
                    'title' => 'UI/UX Design',
                    'description' => 'User-centered design solutions that enhance user experience.',
                    'features' => ['User Research', 'Wireframing', 'Prototyping', 'Visual Design']
                ],
                [
                    'icon' => 'fa-chart-line',
                    'title' => 'Digital Marketing',
                    'description' => 'Results-driven digital marketing strategies to grow your business.',
                    'features' => ['SEO', 'Social Media Marketing', 'Content Marketing', 'PPC Advertising']
                ]
            ];
            @endphp

            @foreach ($services as $index => $service)
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <i class="fas {{ $service['icon'] }} text-3xl text-blue-600"></i>
                </div>
                <h3 class="text-2xl font-bold mb-4">{{ $service['title'] }}</h3>
                <p class="text-gray-600 mb-6">{{ $service['description'] }}</p>
                <ul class="space-y-2">
                    @foreach ($service['features'] as $feature)
                    <li class="flex items-center text-gray-600">
                        <i class="fas fa-check text-green-500 mr-2"></i>
                        {{ $feature }}
                    </li>
                    @endforeach
                </ul>
                <a href="/contact" class="mt-8 inline-flex items-center text-blue-600 hover:text-blue-700">
                    Get Started <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Process Section -->
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4" data-aos="fade-up">Our Process</h2>
            <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">How we deliver exceptional results</p>
        </div>
        <div class="grid md:grid-cols-4 gap-8">
            @php
            $steps = [
                ['number' => '01', 'title' => 'Discovery', 'description' => 'We understand your needs and objectives'],
                ['number' => '02', 'title' => 'Planning', 'description' => 'We create a detailed project strategy'],
                ['number' => '03', 'title' => 'Development', 'description' => 'We build your solution with precision'],
                ['number' => '04', 'title' => 'Delivery', 'description' => 'We launch and ensure your success']
            ];
            @endphp

            @foreach ($steps as $index => $step)
            <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-6">
                    {{ $step['number'] }}
                </div>
                <h3 class="text-xl font-bold mb-4">{{ $step['title'] }}</h3>
                <p class="text-gray-600">{{ $step['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>