@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-24 bg-gray-900">
    <div class="absolute inset-0">
        <img src="/api/placeholder/1920/600" alt="About Us" class="w-full h-full object-cover opacity-30">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center text-white">
            <h1 class="text-5xl font-bold mb-6" data-aos="fade-up">About Our Company</h1>
            <p class="text-xl max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                We are a team of passionate professionals dedicated to delivering exceptional digital solutions.
            </p>
        </div>
    </div>
</div>

<!-- Company Overview -->
<div class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <h2 class="text-4xl font-bold mb-6">Our Story</h2>
                <p class="text-gray-600 mb-6">
                    Founded in 2010, we've grown from a small team of dedicated developers to a full-service digital agency.
                    Our mission is to help businesses thrive in the digital age through innovative solutions and exceptional service.
                </p>
                <p class="text-gray-600 mb-6">
                    With over a decade of experience, we've successfully delivered hundreds of projects for clients across various industries.
                    Our commitment to quality and customer satisfaction has made us a trusted partner for businesses worldwide.
                </p>
                <div class="grid grid-cols-3 gap-8 text-center">
                    <div>
                        <div class="text-4xl font-bold text-blue-600">500+</div>
                        <div class="text-gray-600">Projects Completed</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-600">50+</div>
                        <div class="text-gray-600">Team Members</div>
                    </div>
                    <div>
                        <div class="text-4xl font-bold text-blue-600">300+</div>
                        <div class="text-gray-600">Happy Clients</div>
                    </div>
                </div>
            </div>
            <div data-aos="fade-left">
                <img src="/api/placeholder/600/400" alt="Our Team" class="rounded-lg shadow-xl">
            </div>
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold mb-4" data-aos="fade-up">Our Leadership Team</h2>
            <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">Meet the people behind our success</p>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            @for ($i = 1; $i <= 3; $i++)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <img src="/api/placeholder/400/400" alt="Team Member {{ $i }}" class="w-full h-64 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold mb-2">Team Member Name</h3>
                    <p class="text-gray-600 mb-4">Position</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-gray-400 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>