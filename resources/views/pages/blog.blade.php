@extends('layouts.app')

@section('title', 'Blog Kesehatan & Kuliner')

@section('content')
<!-- Hero Section with Enhanced Design -->
<div class="relative pt-32 pb-24 bg-gradient-to-r from-red-800 to-red-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
            <defs>
                <pattern id="pattern-circles" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1" fill="currentColor" class="text-white"/>
                </pattern>
                <pattern id="pattern-lines" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
                    <line x1="0" y1="0" x2="10" y2="10" stroke="currentColor" stroke-width="0.5" class="text-white"/>
                </pattern>
            </defs>
            <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-circles)"/>
            <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-lines)" opacity="0.5"/>
        </svg>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center text-white">
            <h1 class="text-6xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-white to-red-200" data-aos="fade-up">
                Sehat & Lezat
            </h1>
            <p class="text-xl max-w-3xl mx-auto font-light" data-aos="fade-up" data-aos-delay="100">
                Temukan resep sehat, tips diet, kuliner Yogyakarta, dan informasi gaya hidup sehat
            </p>
            <div class="mt-8 flex justify-center space-x-4" data-aos="fade-up" data-aos-delay="200">
                <span class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm text-sm">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                    </svg>
                    100+ Resep
                </span>
                <span class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm text-sm">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/>
                    </svg>
                    50K+ Pembaca
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Category Filters with Animation -->
{{-- <div class="bg-white shadow-lg sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex overflow-x-auto py-4 space-x-4" id="blog-filters">
            <button class="filter-btn px-6 py-2 rounded-full bg-red-900 text-white hover:shadow-lg transition-all duration-300" data-filter="all">
                Semua
            </button>
            <button class="filter-btn px-6 py-2 rounded-full bg-red-50 text-red-900 hover:bg-red-900 hover:text-white transition-all duration-300" data-filter="makanan-sehat">
                Makanan Sehat
            </button>
            <button class="filter-btn px-6 py-2 rounded-full bg-red-50 text-red-900 hover:bg-red-900 hover:text-white transition-all duration-300" data-filter="tips-diet">
                Tips Diet
            </button>
            <button class="filter-btn px-6 py-2 rounded-full bg-red-50 text-red-900 hover:bg-red-900 hover:text-white transition-all duration-300" data-filter="yogyakarta">
                Yogyakarta
            </button>
            <button class="filter-btn px-6 py-2 rounded-full bg-red-50 text-red-900 hover:bg-red-900 hover:text-white transition-all duration-300" data-filter="dll">
                DLL
            </button>
        </div>
    </div>
</div> --}}

<!-- Enhanced Featured Post with Hover Effects -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-2xl overflow-hidden group cursor-pointer" data-aos="fade-up">
            <img src="/api/placeholder/1200/600" alt="Featured Post" class="w-full h-[600px] object-cover transform group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-red-900/95 via-red-900/50 to-transparent group-hover:from-red-900/90 transition-all duration-300"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8 transform group-hover:translate-y-0 transition-transform duration-300">
                <div class="max-w-3xl">
                    <span class="inline-block px-4 py-1 bg-red-700 rounded-full text-sm mb-4 group-hover:bg-red-600 transition-colors duration-300">Unggulan</span>
                    <h2 class="text-4xl font-bold mb-4 text-white group-hover:text-red-100 transition-colors duration-300">5 Resep Mudah untuk Diet Seimbang</h2>
                    <p class="text-lg text-red-100 mb-6 opacity-90">Temukan 5 resep makanan sehat yang mudah dibuat dan cocok untuk diet seimbang Anda.</p>
                    <div class="flex items-center space-x-6 text-white/80">
                        <div class="flex items-center space-x-2">
                            <img src="/api/placeholder/40/40" alt="Author" class="w-10 h-10 rounded-full border-2 border-red-400">
                            <span>Oleh Dr. Rina Wijaya</span>
                        </div>
                        <span>|</span>
                        <span>10 menit baca</span>
                        <span>|</span>
                        <span>28 Januari 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Latest Posts Grid -->
<div class="py-16 bg-gradient-to-b from-red-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-red-900 mb-12" data-aos="fade-up">Artikel Terbaru</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $posts = [
                [
                    'title' => 'Cara Menjaga Motivasi Selama Diet',
                    'category' => 'tips-diet',
                    'excerpt' => 'Simak tips untuk tetap termotivasi selama menjalani program diet Anda.',
                    'author' => 'Nina Sari',
                    'readTime' => '7 menit',
                    'date' => '27 Januari 2025'
                ],
                [
                    'title' => 'Kuliner Sehat yang Wajib Dicoba di Yogyakarta',
                    'category' => 'yogyakarta',
                    'excerpt' => 'Jelajahi kuliner sehat yang ada di Yogyakarta dan nikmati kelezatan lokal.',
                    'author' => 'Budi Santoso',
                    'readTime' => '8 menit',
                    'date' => '26 Januari 2025'
                ],
                [
                    'title' => 'Manfaat Olahraga untuk Kesehatan Mental',
                    'category' => 'Lainya',
                    'excerpt' => 'Pelajari bagaimana olahraga dapat meningkatkan kesehatan mental Anda.',
                    'author' => 'Dr. Fadli Rahman',
                    'readTime' => '6 menit',
                    'date' => '25 Januari 2025'
                ]
                // ,
                // [
                //     'title' => 'Superfood yang Harus Ada di Piring Anda',
                //     'category' => 'makanan-sehat',
                //     'excerpt' => 'Kenali berbagai superfood yang dapat meningkatkan kesehatan Anda.',
                //     'author' => 'Diana Putri',
                //     'readTime' => '5 menit',
                //     'date' => '24 Januari 2025'
                // ],
                // [
                //     'title' => 'Kesalahan Umum yang Harus Dihindari Saat Diet',
                //     'category' => 'tips-diet',
                //     'excerpt' => 'Hindari kesalahan umum yang sering dilakukan saat menjalani diet.',
                //     'author' => 'Dr. Rina Wijaya',
                //     'readTime' => '9 menit',
                //     'date' => '23 Januari 2025'
                // ],
                // [
                //     'title' => 'Tempat Makan Sehat yang Instagramable di Yogyakarta',
                //     'category' => 'yogyakarta',
                //     'excerpt' => 'Temukan tempat makan sehat di Yogyakarta yang juga Instagramable.',
                //     'author' => 'Maya Kusuma',
                //     'readTime' => '7 menit',
                //     'date' => '22 Januari 2025'
                // ],
                // [
                //     'title' => 'Pentingnya Hidrasi dalam Diet Sehat',
                //     'category' => 'Lainya',
                //     'excerpt' => 'Mengapa hidrasi sangat penting dalam program diet Anda.',
                //     'author' => 'Dr. Hadi Wijaya',
                //     'readTime' => '5 menit',
                //     'date' => '21 Januari 2025'
                // ],
                // [
                //     'title' => 'Menu Sarapan Sehat untuk Awali Hari',
                //     'category' => 'makanan-sehat',
                //     'excerpt' => 'Mulai hari Anda dengan sarapan sehat dan bergizi tinggi.',
                //     'author' => 'Chef Anita',
                //     'readTime' => '6 menit',
                //     'date' => '20 Januari 2025'
                // ],
                // [
                //     'title' => 'Resep Smoothie Bowl untuk Diet Sehat',
                //     'category' => 'makanan-sehat',
                //     'excerpt' => 'Kreasi smoothie bowl sehat dan lezat untuk menu diet Anda.',
                //     'author' => 'Chef Maria',
                //     'readTime' => '4 menit',
                //     'date' => '19 Januari 2025'
                // ]
            ];
            @endphp

            @foreach ($posts as $index => $post)
            <div class="group blog-card bg-white rounded-xl shadow-lg overflow-hidden transform hover:-translate-y-1 transition-all duration-300" 
                 data-category="{{ $post['category'] }}" 
                 data-aos="fade-up" 
                 data-aos-delay="{{ $index * 100 }}">
                <div class="relative h-64 overflow-hidden">
                    <img src="/api/placeholder/600/400" alt="{{ $post['title'] }}" 
                         class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1 bg-red-900 text-white rounded-full text-sm shadow-lg">
                            @switch($post['category'])
                                @case('makanan-sehat')
                                    Makanan Sehat
                                    @break
                                @case('tips-diet')
                                    Tips Diet
                                    @break
                                @case('yogyakarta')
                                    Yogyakarta
                                    @break
                                @default
                                    Lainya
                            @endswitch
                        </span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-red-900 mb-3 group-hover:text-red-700 transition-colors duration-300">
                        {{ $post['title'] }}
                    </h3>
                    <p class="text-gray-600 mb-4">{{ $post['excerpt'] }}</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                            </svg>
                            {{ $post['author'] }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/>
                            </svg>
                            {{ $post['readTime'] }} baca
                        </span>
                    </div>
                </div>
                <div class="px-6 py-4 bg-red-50 border-t border-red-100">
                    <button class="w-full text-red-900 font-medium hover:text-red-700 transition-colors duration-300 flex items-center justify-center">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Newsletter Section -->
{{-- <div class="bg-red-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-white mb-4">Bergabung dengan Newsletter Kami</h2>
            <p class="text-red-100 mb-8">Dapatkan artikel terbaru dan tips kesehatan langsung di inbox Anda</p>
            <form class="max-w-md mx-auto">
                <div class="flex gap-4">
                    <input type="email" placeholder="Masukkan email Anda" class="flex-1 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500">
                    <button type="submit" class="px-6 py-3 bg-white text-red-900 rounded-lg font-medium hover:bg-red-100 transition-colors duration-300">
                        Berlangganan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<!-- Enhanced WhatsApp Button -->
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

@push('scripts')
<script>
    // Initialize AOS with enhanced settings
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100,
        easing: 'ease-out-cubic'
    });

    // Enhanced blog filtering functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filters = document.querySelectorAll('#blog-filters button');
        const cards = document.querySelectorAll('.blog-card');

        // Function to handle filtering with animation
        function filterPosts(category) {
            cards.forEach(card => {
                const cardCategory = card.dataset.category;
                const shouldShow = category === 'all' || cardCategory === category;
                
                // Add fade out effect
                if (!shouldShow) {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.95) translateY(10px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                } else {
                    card.style.display = 'block';
                    // Small delay for the fade in effect
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1) translateY(0)';
                    }, 50);
                }
            });
        }

        // Add click handlers to filter buttons
        filters.forEach(filter => {
            filter.addEventListener('click', function() {
                const category = this.dataset.filter;
                
                // Update active filter styling
                filters.forEach(f => {
                    f.classList.remove('bg-red-900', 'text-white');
                    f.classList.add('bg-red-50', 'text-red-900');
                });
                this.classList.remove('bg-red-50', 'text-red-900');
                this.classList.add('bg-red-900', 'text-white');

                // Apply filtering with animation
                filterPosts(category);
            });
        });

        // Add transition styles to cards
        cards.forEach(card => {
            card.style.transition = 'all 0.3s ease-in-out';
        });
    });
</script>
@endpush