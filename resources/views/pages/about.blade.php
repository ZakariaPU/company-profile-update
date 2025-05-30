@extends('layouts.app')

@section('title', 'Tentang Kami - Resap Catering Yogyakarta')

@section('content')
<!-- Enhanced Hero Section with Parallax -->
<div class="relative min-h-screen bg-red-900 overflow-hidden">
    <div class="absolute inset-0 parallax-bg">
        <img src="{{ asset('images/hero-bg.jpg') }}" alt="Resap Catering Excellence" 
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
                Resap
                <span class="block mt-2 text-red-300">Kitchen</span>
            </h1>
            <p class="text-xl md:text-2xl text-red-100 max-w-3xl mx-auto leading-relaxed">
                Penyedia jasa catering harian sehat di Yogyakarta sejak 2019
            </p>
            <div class="pt-8">
                <button class="bg-white text-red-900 px-8 py-4 rounded-full font-semibold hover:bg-red-100 transform hover:scale-105 transition-all duration-300 shadow-lg">
                    Jelajahi Perjalanan Kami
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
                    <span class="text-red-600 text-lg font-medium tracking-wider">CERITA KAMI</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2">Perjalanan Cita Rasa Sehat</h2>
                </div>
                
                <p class="text-lg text-gray-600 leading-relaxed">
                    Resap Catering bermula dari keinginan untuk menyediakan makan sehat bagi saudara-saudara kita yang sedang isolasi mandiri selama pandemi Covid-19. Walau pandemi usai, kami tetap melanjutkan visi untuk menyediakan jasa catering harian sehat dengan menu variatif yang memperhatikan nilai gizi.
                </p>

                <div class="grid grid-cols-2 gap-8">
                    <div class="bg-red-50 p-6 rounded-xl transform hover:scale-105 transition-all duration-300">
                        <span class="text-3xl font-bold text-red-900">5+</span>
                        <p class="text-gray-600 mt-2">Tahun Mengabdi</p>
                    </div>
                    <div class="bg-red-50 p-6 rounded-xl transform hover:scale-105 transition-all duration-300">
                        <span class="text-3xl font-bold text-red-900">12x</span>
                        <p class="text-gray-600 mt-2">Pengantaran per Minggu</p>
                    </div>
                </div>
            </div>

            <!-- Timeline -->
            <div class="relative" data-aos="fade-left">
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-red-200 rounded"></div>
                @php
                    $milestones = [
                        ['year' => '2019-2020', 'title' => 'Awal Mula', 'desc' => 'Bermula dari keinginan menyediakan makan sehat saat pandemi Covid-19'],
                        ['year' => '2021-2022', 'title' => 'Pengembangan Menu', 'desc' => 'Memiliki 3 pilihan menu: Reguler, Reguler+, dan Healthy dengan 12x pengantaran'],
                        ['year' => '2023-Sekarang', 'title' => 'Transformasi Brand', 'desc' => 'Berganti nama menjadi Resap Kitchen & Resap Nusantara dengan 4 pilihan menu']
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
            <span class="text-red-600 text-lg font-medium tracking-wider">NILAI KAMI</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2">Yang Menggerakkan Kami</h2>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            @php
                $values = [
                    [
                        'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4',
                        'title' => 'Kualitas Sehat',
                        'desc' => 'Bahan-bahan premium dengan nilai gizi yang dipertahankan dalam setiap hidangan'
                    ],
                    [
                        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                        'title' => 'Menu Variatif',
                        'desc' => 'Memadukan resep tradisional dengan menu sehat khas rumahan Bunda Resap'
                    ],
                    [
                        'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                        'title' => 'Pelayanan Prima',
                        'desc' => 'Tim yang berdedikasi untuk melayani catering harian, event, dan wedding'
                    ],
                    [
                        'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                        'title' => 'Dapat Diandalkan',
                        'desc' => 'Konsistensi dalam setiap pengalaman catering dengan pengantaran rutin setiap hari'
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
                            <a href="#" class="text-red-600 font-medium hover:text-red-700">Pelajari lebih lanjut →</a>
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
            <span class="text-red-600 text-lg font-medium tracking-wider">TIM KAMI</span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mt-2">Para Ahli Kuliner Sehat</h2>
        </div>

        <div class="grid md:grid-cols-4 gap-12">
            @php
                $team = [
                    [
                        'name' => 'Nugroho Ndaru Adi Susatyo',
                        'role' => 'Managing Director',
                        'quote' => 'Semangat adalah bumbu utama dalam setiap hidangan',
                        'image' => 'adi.jpg'
                    ],
                    [
                        'name' => 'Rara',
                        'role' => 'Marketing',
                        'quote' => 'Memberikan yang terbaik untuk setiap pelanggan',
                        'image' => 'rara.jpg'
                    ],
                    [
                        'name' => 'Gege',
                        'role' => 'Operational',
                        'quote' => 'Keunggulan dalam setiap detail operasional',
                        'image' => 'gege.jpg'
                    ],
                    [
                        'name' => 'Mutia',
                        'role' => 'Finance',
                        'quote' => 'Mengelola dengan penuh tanggung jawab',
                        'image' => 'mutia.jpg'
                    ]
                ];
            @endphp

            @foreach($team as $index => $member)
                <div class="relative group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <div class="relative overflow-hidden rounded-xl aspect-[3/4]">
                        <img src="assets/img_web/{{ $member['image'] }}"
                             alt="{{ $member['name'] }}"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-900/90 via-red-900/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-8 text-white transform translate-y-6 group-hover:translate-y-0 transition-transform duration-300">
                                <p class="text-lg italic mb-4">"{{ $member['quote'] }}"</p>
                                <h3 class="text-2xl font-bold">{{ $member['name'] }}</h3>
                                <p class="text-red-200">{{ $member['role'] }}</p>
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
            <span class="inline-block px-4 py-1 bg-red-800 text-red-100 rounded-full text-sm mb-8">FILOSOFI KAMI</span>
            <h2 class="text-4xl md:text-6xl font-bold text-white mb-8 leading-tight">
                "Rasakan Nikmatnya <br>Masakan Sehat Khas Rumahan"
            </h2>
            <p class="text-xl text-red-100 max-w-3xl mx-auto leading-relaxed mb-12">
                Komitmen kami lebih dari sekadar makanan. Kami menciptakan pengalaman berkesan yang menyatukan orang dan merayakan momen-momen spesial dalam hidup dengan menu yang memperhatikan nilai gizi.
            </p>
            <div class="grid md:grid-cols-4 gap-8 mt-16">
                @php
                    $philosophies = [
                        ['number' => '01', 'title' => 'Healthy Lite', 'desc' => 'Menu ringan dan sehat'],
                        ['number' => '02', 'title' => 'Healthy Gourmet', 'desc' => 'Resap Kitchen berkualitas tinggi'],
                        ['number' => '03', 'title' => 'Nusantara Hype', 'desc' => 'Citarasa nusantara yang menggugah'],
                        ['number' => '04', 'title' => 'Nusantara Fit', 'desc' => 'Menu nusantara yang sehat']
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
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">Siap Untuk Merasakan Kelezatan Masakan Sehat?</h2>
                        <p class="text-lg text-gray-600 mb-8">Mari berkolaborasi untuk menjadikan acara Anda berikutnya benar-benar berkesan dengan catering terbaik di Yogyakarta.</p>
                        <a href="https://wa.me/628112658048" target = "blank" class="bg-red-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-red-700 transform hover:scale-105 transition-all duration-300 shadow-lg inline-block text-center">
                            Hubungi Kami Sekarang
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach(range(1, 4) as $index)
                            <div class="aspect-square overflow-hidden rounded-lg">
                                <img src="{{ asset('assets/img_web/gm' . $index . '.jpg') }}" alt="Gambar Galeri">
                                     alt="Galeri Masakan {{ $index }}"
                                     class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="https://wa.me/628112658048" target="_blank" 
   class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 z-50">
    <div class="flex items-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2Z"/>
        </svg>
        <span class="ml-2">Chat Kami</span>
    </div>
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