@extends('layouts.app')

@section('title', 'About Us - Premium Catering Services')

@section('content')
<!-- Enhanced Hero Section with Parallax -->
<div class="relative min-h-screen bg-red-900 overflow-hidden">
    <div class="absolute inset-0 parallax-bg">
        <img src="{{ asset('images/hero-bg.jpg') }}" alt="Catering Excellence" 
             class="w-full h-full object-cover opacity-40 transform scale-110">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-red-900/80 via-red-900/70 to-red-950/90"></div>
    
    <!-- Floating Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="floating-spice floating-spice-1"></div>
        <div class="floating-spice floating-spice-2"></div>
        <div class="floating-spice floating-spice-3"></div>
    </div>

    <div class="relative h-screen flex items-center justify-center text-center px-4">
        <div class="space-y-8" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-6xl md:text-8xl font-bold text-white mb-6 tracking-tight">
                Crafting Culinary
                <span class="block mt-2 text-red-300">Excellence</span>
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-3xl mx-auto leading-relaxed">
                Where passion meets perfection in every dish we serve since 2010
            </p>
            <div class="pt-8">
                <button class="bg-white text-red-900 px-8 py-4 rounded-full font-semibold hover:bg-red-100 transform hover:scale-105 transition-all duration-300 shadow-lg">
                    Discover Our Journey
                </button>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</div>

<!-- Enhanced Story Section with Timeline -->
<div class="py-24 bg-white relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/3 h-full bg-red-50 transform skew-x-12"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <!-- Left Content -->
            <div class="space-y-8" data-aos="fade-right">
                <div class="inline-block">
                    <span class="text-red-600 text-lg font-medium tracking-wider">OUR STORY</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2">A Journey of Flavors</h2>
                </div>
                
                <p class="text-lg text-gray-600 leading-relaxed">
                    From humble beginnings in a family kitchen to becoming the city's premier catering service, our journey has been seasoned with passion, dedication, and an unwavering commitment to culinary excellence.
                </p>

                <div class="grid grid-cols-2 gap-8">
                    <div class="bg-red-50 p-6 rounded-xl transform hover:scale-105 transition-all duration-300">
                        <span class="text-3xl font-bold text-red-900">15+</span>
                        <p class="text-gray-600 mt-2">Years of Excellence</p>
                    </div>
                    <div class="bg-red-50 p-6 rounded-xl transform hover:scale-105 transition-all duration-300">
                        <span class="text-3xl font-bold text-red-900">5000+</span>
                        <p class="text-gray-600 mt-2">Events Catered</p>
                    </div>
                </div>
            </div>

            <!-- Timeline -->
            <div class="relative" data-aos="fade-left">
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-red-200 rounded"></div>
                @php
                    $milestones = [
                        ['year' => '2010', 'title' => 'The Beginning', 'desc' => 'Started our journey from a family kitchen'],
                        ['year' => '2015', 'title' => 'Major Expansion', 'desc' => 'Launched corporate catering services'],
                        ['year' => '2018', 'title' => 'Innovation Hub', 'desc' => 'Opened state-of-the-art central kitchen'],
                        ['year' => '2023', 'title' => 'Sustainability Focus', 'desc' => 'Implemented eco-friendly practices']
                    ];
                @endphp

                @foreach($milestones as $index => $milestone)
                    <div class="ml-8 mb-12 relative timeline-item" data-aos="fade-left" data-aos-delay="{{ $index * 100 }}">
                        <div class="absolute -left-10 top-0 w-4 h-4 bg-red-600 rounded-full border-4 border-white"></div>
                        <span class="text-red-600 font-bold">{{ $milestone['year'] }}</span>
                        <h3 class="text-xl font-bold text-gray-900 mt-1">{{ $milestone['title'] }}</h3>
                        <p class="text-gray-600 mt-2">{{ $milestone['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Core Values with Interactive Cards -->
<div class="py-24 bg-gradient-to-b from-red-50 to-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-red-600 text-lg font-medium tracking-wider">CORE VALUES</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2">What Drives Us</h2>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            @php
                $values = [
                    [
                        'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4',
                        'title' => 'Quality',
                        'desc' => 'Premium ingredients and exceptional taste in every dish we serve'
                    ],
                    [
                        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                        'title' => 'Innovation',
                        'desc' => 'Blending traditional recipes with modern culinary techniques'
                    ],
                    [
                        'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                        'title' => 'Service',
                        'desc' => 'Dedicated team committed to exceeding expectations'
                    ],
                    [
                        'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                        'title' => 'Reliability',
                        'desc' => 'Consistent excellence in every catering experience'
                    ]
                ];
            @endphp

            @foreach($values as $index => $value)
                <div class="group relative" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-300">
                        <div class="absolute -top-4 left-4">
                            <div class="bg-red-600 text-white p-3 rounded-lg shadow-lg">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $value['icon'] }}"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mt-4">{{ $value['title'] }}</h3>
                        <p class="text-gray-600 mt-2">{{ $value['desc'] }}</p>
                        <div class="mt-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <a href="#" class="text-red-600 font-medium hover:text-red-700">Learn more →</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Enhanced Team Section with Hover Effects -->
<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-red-600 text-lg font-medium tracking-wider">OUR TEAM</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2">Culinary Experts</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-12">
            @php
                $team = [
                    [
                        'name' => 'Chef John Doe',
                        'role' => 'Executive Chef',
                        'quote' => 'Passion is the key ingredient in every dish',
                        'image' => 'team-1.jpg'
                    ],
                    [
                        'name' => 'Sarah Smith',
                        'role' => 'Operations Director',
                        'quote' => 'Excellence in every detail',
                        'image' => 'team-2.jpg'
                    ],
                    [
                        'name' => 'Mike Johnson',
                        'role' => 'Event Coordinator',
                        'quote' => 'Creating memorable experiences',
                        'image' => 'team-3.jpg'
                    ]
                ];
            @endphp

            @foreach($team as $index => $member)
                <div class="relative group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative overflow-hidden rounded-xl aspect-[3/4]">
                        <img src="{{ asset('images/' . $member['image']) }}" 
                             alt="{{ $member['name'] }}"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-900/90 via-red-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-8 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform duration-300">
                                <p class="text-lg italic mb-4">"{{ $member['quote'] }}"</p>
                                <h3 class="text-2xl font-bold">{{ $member['name'] }}</h3>
                                <p class="text-red-200">{{ $member['role'] }}</p>
                                <div class="flex gap-4 mt-4">
                                    {{-- <a href="#" class="text-white hover:text-red-200">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                                        </svg>
                                    </a>
                                    <a href="#" class="text-white hover:text-red-200">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0
                                            1.705 1.242 4.006 1.534 4.845.806.043.06.084.12.127.179-1.009.229-2.07.358-3.131.44-1.061.082-2.113.123-3.255.123-1.142 0-2.194-.04-3.255-.123-1.06-.082-2.121-.211-3.131-.44.043-.059.084-.119.127-.179.291-.239 1.832-2.54 1.832-4.245 0-.917-.347-1.775-.957-2.475-3.827 2.968-7.45 4.932-11.541 5.125A4.921 4.921 0 008.42 14.48a4.92 4.92 0 004.921-4.921A4.92 4.92 0 008.42 4.638a4.92 4.92 0 00-4.921 4.921c0 .915.348 1.773.958 2.474"/>
                                        </svg>
                                    </a> --}}
                                    <a href="#" class="text-white hover:text-red-200">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.897 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.897-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Enhanced Tagline & Philosophy -->
<div class="py-24 bg-red-900 relative overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-red-800 opacity-50 pattern-dots"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-red-900 via-transparent to-red-950"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center" data-aos="fade-up">
            <span class="inline-block px-4 py-1 bg-red-800 text-red-100 rounded-full text-sm mb-8">OUR PHILOSOPHY</span>
            <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-tight">
                "Elevating Every Occasion <br>Through Culinary Excellence"
            </h2>
            <p class="text-xl text-red-100 max-w-3xl mx-auto leading-relaxed mb-12">
                Our commitment goes beyond food. We create memorable experiences that bring people together and celebrate life's special moments.
            </p>
            <div class="grid md:grid-cols-3 gap-8 mt-16">
                @php
                    $philosophies = [
                        ['number' => '01', 'title' => 'Exceptional Quality', 'desc' => 'Only the finest ingredients'],
                        ['number' => '02', 'title' => 'Creative Presentation', 'desc' => 'Visual artistry in every dish'],
                        ['number' => '03', 'title' => 'Perfect Service', 'desc' => 'Attention to every detail']
                    ];
                @endphp

                @foreach($philosophies as $philosophy)
                    <div class="text-center p-6" data-aos="fade-up">
                        <div class="text-red-300 text-lg font-bold mb-4">{{ $philosophy['number'] }}</div>
                        <h3 class="text-white text-xl font-bold mb-2">{{ $philosophy['title'] }}</h3>
                        <p class="text-red-100">{{ $philosophy['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Enhanced CTA Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-red-50 rounded-2xl p-12 relative overflow-hidden">
            <div class="absolute right-0 top-0 w-1/3 h-full bg-red-100 transform skew-x-12"></div>
            <div class="relative">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Ready to Create Your Perfect Event?</h2>
                        <p class="text-lg text-gray-600 mb-8">Let's work together to make your next occasion truly memorable.</p>
                        <button class="bg-red-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg">
                            Contact Us Today
                        </button>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach(range(1, 4) as $index)
                            <div class="aspect-square overflow-hidden rounded-lg">
                                <img src="{{ asset('images/gallery-' . $index . '.jpg') }}" 
                                     alt="Gallery Image {{ $index }}"
                                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="https://wa.me/your_whatsapp_number" target="_blank" class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.4 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2Z" />
    </svg>
</a>

@endsection

@push('styles')
<style>
    .pattern-dots {
        background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        background-size: 20px 20px;
    }

    .floating-spice {
        position: absolute;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        pointer-events: none;
    }

    .floating-spice-1 {
        top: 20%;
        left: 10%;
        animation: float 8s infinite;
    }

    .floating-spice-2 {
        top: 50%;
        right: 20%;
        animation: float 12s infinite;
    }

    .floating-spice-3 {
        bottom: 30%;
        left: 30%;
        animation: float 10s infinite;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotate(0deg);
        }
        50% {
            transform: translateY(-20px) rotate(180deg);
        }
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -8px;
        top: 0;
        width: 2px;
        height: 100%;
        background: #fee2e2;
    }

    .parallax-bg {
        transform: translateZ(-1px) scale(1.5);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Parallax effect on scroll
        window.addEventListener('scroll', function() {
            const parallax = document.querySelector('.parallax-bg');
            let scrollPosition = window.pageYOffset;
            parallax.style.transform = 'translateY(' + scrollPosition * 0.5 + 'px)';
        });
    });
</script>
@endpush