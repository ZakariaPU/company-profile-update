@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<div class="relative min-h-screen flex items-center bg-gradient-to-br from-red-700 via-red-600 to-red-500">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M54.627 0l.83.828-1.415 1.415L51.8 0h2.827zM5.373 0l-.83.828L5.96 2.243 8.2 0H5.374zM48.97 0l3.657 3.657-1.414 1.414L46.143 0h2.828zM11.03 0L7.372 3.657 8.787 5.07 13.857 0H11.03zm32.284 0L49.8 6.485 48.384 7.9l-7.9-7.9h2.83zM16.686 0L10.2 6.485 11.616 7.9l7.9-7.9h-2.83zM22.344 0L13.858 8.485 15.272 9.9l7.9-7.9h-.828zm5.656 0L19.515 8.485 17.343 10.657 28 0h-2.83zM32.656 0L26.172 6.485 24 8.657 34.657 0h-2zM44.97 0L40.5 4.47 39.086 5.884 50.343 0h-5.374zM0 5.373l.828-.83L2.243 5.96 0 8.2V5.374zm0 5.656l.828-.829L5.656 0 0 0v11.03zm0 5.656l.828-.828L8.485 5.657 0 0v16.686zm0 5.657l.828-.828L11.313 8.485 0 0v22.343zm0 5.656l.828-.828L14.142 11.313 0 0v28zM0 28l.828-.828L17.313 13.142 0 0v28zm0 5.657l.828-.828L20.142 16.313 0 0v33.657zM0 38.97l.828-.828L22.97 19.142 0 0v38.97zm0 5.657l.828-.828L25.8 21.97 0 0v44.627zm0 5.657l.828-.828L28.627 24.8 0 0v50.284zM0 0l.828-.828L0 0h-.828L0 0zm5.657.828L0 0h5.657v.828zm5.657.828L0 0h11.314v.828zm5.657.828L0 0h16.971v.828zm5.657.828L0 0h22.628v.828zm5.657.828L0 0h28.285v.828zm5.657.828L0 0h33.942v.828zm5.657.828L0 0h39.599v.828zm5.657.828L0 0h45.256v.828zm5.657.828L0 0h50.913v.828z\' fill=\'%23ffffff\' fill-opacity=\'0.4\' fill-rule=\'evenodd\'/%3E%3C/svg%3E')"></div>
    </div>

    <!-- Content Container -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Text Content -->
            <div class="text-white" data-aos="fade-up">
                <span class="text-red-200 font-medium text-lg mb-4 block tracking-wider">LUXURY CATERING SERVICE</span>
                <h1 class="text-5xl lg:text-7xl font-bold mb-6 leading-tight">
                    Crafting Culinary
                    <span class="block text-red-200">Excellence</span>
                </h1>
                <p class="text-xl mb-8 text-gray-100 leading-relaxed">
                    Experience the perfect blend of flavors, presentation, and service. We transform your events into extraordinary culinary journeys.
                </p>
                <div class="flex flex-wrap gap-6">
                    <a href="/services" class="group px-8 py-4 bg-white text-red-600 rounded-lg font-semibold hover:bg-red-50 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                        <span class="flex items-center">
                            Explore Menu
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </span>
                    </a>
                    <a href="/contact" class="px-8 py-4 border-2 border-white text-white rounded-lg font-semibold hover:bg-white hover:text-red-600 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                        Get Quote
                    </a>
                </div>
            </div>

            <!-- Image Grid -->
            <div class="hidden lg:grid grid-cols-12 gap-4 h-[600px]" data-aos="fade-left">
                <div class="col-span-5 space-y-4">
                    <div class="rounded-2xl overflow-hidden shadow-2xl h-2/3 transform hover:scale-105 transition-all duration-500">
                        <img src="assets\img\" alt="Gourmet Dish" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-2xl h-1/3 transform hover:scale-105 transition-all duration-500">
                        <img src="/api/placeholder/400/300" alt="Table Setting" class="w-full h-full object-cover">
                    </div>
                </div>
                <div class="col-span-7 space-y-4 pt-16">
                    <div class="rounded-2xl overflow-hidden shadow-2xl h-1/3 transform hover:scale-105 transition-all duration-500">
                        <img src="assets\img\.jpg" alt="Chef Preparation" class="w-full h-full object-cover">
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-2xl h-2/3 transform hover:scale-105 transition-all duration-500">
                        <img src="/api/placeholder/500/600" alt="Event Setup" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Strip -->
        <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group bg-white/10 backdrop-blur-md rounded-xl p-6 hover:bg-white/20 transition-all duration-300 border border-white/20">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-red-500 rounded-lg group-hover:bg-red-600 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h3 class="font-bold text-lg">24/7 Service</h3>
                        <p class="text-red-100">Always at your service</p>
                    </div>
                </div>
            </div>
            
            <div class="group bg-white/10 backdrop-blur-md rounded-xl p-6 hover:bg-white/20 transition-all duration-300 border border-white/20">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-red-500 rounded-lg group-hover:bg-red-600 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h3 class="font-bold text-lg">Premium Quality</h3>
                        <p class="text-red-100">Finest ingredients only</p>
                    </div>
                </div>
            </div>
            
            <div class="group bg-white/10 backdrop-blur-md rounded-xl p-6 hover:bg-white/20 transition-all duration-300 border border-white/20">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-red-500 rounded-lg group-hover:bg-red-600 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                        </svg>
                    </div>
                    <div class="text-white">
                        <h3 class="font-bold text-lg">Custom Menus</h3>
                        <p class="text-red-100">Tailored to your taste</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-red-600 font-medium text-lg mb-4 block tracking-wider">OUR SPECIALTIES</span>
            <h2 class="text-4xl lg:text-5xl font-bold mb-4 text-gray-900">Exquisite Catering Services</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Discover our range of premium catering services designed to make your event unforgettable</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <div class="relative h-64 overflow-hidden">
                    <img src="/api/placeholder/600/400" alt="Wedding Catering" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-2xl font-bold">Wedding Celebrations</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Elegant catering solutions for your perfect wedding day, from intimate gatherings to grand celebrations.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Custom menu planning
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Professional service staff
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Full setup and cleanup
                        </li>
                    </ul>
                    <a href="/services/weddings" class="inline-flex items-center text-red-600 font-semibold hover:text-red-700 transition-colors">
                        Learn More
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="relative h-64 overflow-hidden">
                    <img src="/api/placeholder/600/400" alt="Corporate Events" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-2xl font-bold">Corporate Events</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Professional catering services for business meetings, conferences, and corporate gatherings.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Breakfast & lunch options
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Flexible scheduling
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Corporate packages
                        </li>
                    </ul>
                    <a href="/services/corporate" class="inline-flex items-center text-red-600 font-semibold hover:text-red-700 transition-colors">
                        Learn More
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="group bg-white rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-300 overflow-hidden" data-aos="fade-up" data-aos-delay="300">
                <div class="relative h-64 overflow-hidden">
                    <img src="/api/placeholder/600/400" alt="Private Parties" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 text-white">
                        <h3 class="text-2xl font-bold">Private Parties</h3>
                    </div>
                </div>
                <div class="p-6">
                    <p class="text-gray-600 mb-4">Personalized catering for birthdays, anniversaries, and special celebrations.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Customized menus
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Theme-based decoration
                        </li>
                        <li class="flex items-center text-gray-600">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Full event planning
                        </li>
                    </ul>
                    <a href="/services/private-parties" class="inline-flex items-center text-red-600 font-semibold hover:text-red-700 transition-colors">
                        Learn More
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-red-600 font-medium text-lg mb-4 block tracking-wider">OUR PORTFOLIO</span>
            <h2 class="text-4xl lg:text-5xl font-bold mb-4 text-gray-900">Recent Events</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Take a look at some of our recent catering events and creative culinary presentations</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4 lg:gap-8">
            @for ($i = 1; $i <= 6; $i++)
            <div class="group relative overflow-hidden rounded-2xl shadow-lg aspect-square" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <img src="/api/placeholder/600/600" alt="Event {{ $i }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-all duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                    <div class="absolute bottom-0 left-0 right-0 p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Elegant Wedding Reception</h3>
                        <p class="text-gray-300 text-sm">A beautiful celebration at Garden Villa</p>
                        <a href="/gallery" class="inline-flex items-center text-white mt-4 font-medium hover:text-red-200 transition-colors">
                            View Gallery
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-red-600 font-medium text-lg mb-4 block tracking-wider">TESTIMONIALS</span>
            <h2 class="text-4xl lg:text-5xl font-bold mb-4 text-gray-900">What Our Clients Say</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">Read about the experiences of our valued customers</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @for ($i = 1; $i <= 3; $i++)
            <div class="bg-white p-8 rounded-2xl shadow-xl" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex text-red-500 mb-6">
                    @for ($star = 1; $star <= 5; $star++)
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <div class="relative">
                    <svg class="absolute -top-4 -left-4 w-8 h-8 text-red-200" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M11.9 3.75c-4.55 0-8.23 3.68-8.23 8.23s3.68 8.23 8.23 8.23 8.23-3.68 8.23-8.23-3.69-8.23-8.23-8.23zm.02 13c-.65 0-1.18-.53-1.18-1.18s.53-1.18 1.18-1.18 1.18.53 1.18 1.18-.53 1.18-1.18 1.18zm1.27-4.65c-.29.67-.86 1.12-1.52 1.12-.66 0-1.23-.45-1.52-1.12-.16-.37-.25-.77-.25-1.18 0-1.63 1.32-2.95 2.95-2.95s2.95 1.32 2.95 2.95c0 .41-.09.81-.25 1.18z"/>
                    </svg>
                    <p class="text-gray-600 mb-8 text-lg leading-relaxed">"The attention to detail and quality of service provided was exceptional. Our wedding guests couldn't stop raving about the food!"</p>
                    <div class="flex items-center">
                        <img src="/api/placeholder/100/100" alt="Client {{ $i }}" class="w-14 h-14 rounded-full object-cover ring-4 ring-red-50">
                        <div class="ml-4">
                            <h4 class="font-bold text-gray-900">Sarah & Michael</h4>
                            <p class="text-red-600">Wedding Reception</p>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<a href="https://wa.me/your_whatsapp_number" target="_blank" class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.4 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2Z" />
    </svg>
</a>
@endsection
