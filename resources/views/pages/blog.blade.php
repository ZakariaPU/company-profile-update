@extends('layouts.app')

@section('title', 'Blog Resap Kitchen - Sehat, Lezat, dan Penuh Kasih Sayang')

@section('content')
<!-- Hero Section dengan Background Makanan Sehat -->
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
                Resap Kitchen
            </h1>
            <p class="text-xl max-w-3xl mx-auto font-light" data-aos="fade-up" data-aos-delay="100">
                Sehat, Lezat, dan Penuh Kasih Sayang - Mengubah Hidangan Sehari-hari Menjadi Lebih Bermakna
            </p>
            <div class="mt-8 flex justify-center space-x-4" data-aos="fade-up" data-aos-delay="200">
                <span class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm text-sm">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                    </svg>
                    Makanan Bergizi
                </span>
                <span class="inline-flex items-center px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm text-sm">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                    </svg>
                    Penuh Kasih Sayang
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Featured Article Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-2xl overflow-hidden group cursor-pointer" data-aos="fade-up">
            <img src="assets/img_web/healthy_gourmet.jpg" alt="Makanan Sehat Resap Kitchen" class="w-full h-[600px] object-cover transform group-hover:scale-105 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-red-900/95 via-red-900/50 to-transparent group-hover:from-red-900/90 transition-all duration-300"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8 transform group-hover:translate-y-0 transition-transform duration-300">
                <div class="max-w-3xl">
                    <span class="inline-block px-4 py-1 bg-red-700 rounded-full text-sm mb-4 group-hover:bg-red-600 transition-colors duration-300">Artikel Utama</span>
                    <h2 class="text-4xl font-bold mb-4 text-white group-hover:text-red-100 transition-colors duration-300">Bagaimana Resap Kitchen Mengubah Hidangan Sehari-hari</h2>
                    <p class="text-lg text-red-100 mb-6 opacity-90">Makan sehat tidak harus membosankan atau rumit. Temukan bagaimana setiap hidangan dibuat dengan rasa kasih sayang seperti masakan ibu.</p>
                    <div class="flex items-center space-x-6 text-white/80">
                        <div class="flex items-center space-x-2">
                            <img src="assets/img_web/tes.jpg" alt="Chef Resap Kitchen" class="w-10 h-10 rounded-full border-2 border-red-400">
                            <span>Oleh Tim Resap Kitchen</span>
                        </div>
                        <span>|</span>
                        <span>30 Mei 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mengapa Pola Makan Sehat Penting -->
<div class="py-16 bg-gradient-to-b from-red-50 to-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-red-900 mb-6">Mengapa Pola Makan Sehat Itu Penting?</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                Kita semua tahu bahwa makanan memainkan peran penting dalam kesejahteraan kita secara keseluruhan. Pola makan seimbang dapat membantu menjaga tingkat energi, meningkatkan sistem kekebalan tubuh, memperbaiki pencernaan, dan bahkan meningkatkan suasana hati.
            </p>
        </div>

        <!-- Benefits Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
            @php
            $benefits = [
                [
                    'icon' => '<path d="M13 10V3L4 14h7v7l9-11h-7z"/>',
                    'title' => 'Tingkat Energi',
                    'description' => 'Menjaga energi stabil sepanjang hari'
                ],
                [
                    'icon' => '<path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                    'title' => 'Sistem Imun',
                    'description' => 'Meningkatkan daya tahan tubuh'
                ],
                [
                    'icon' => '<path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                    'title' => 'Pencernaan',
                    'description' => 'Memperbaiki sistem pencernaan'
                ],
                [
                    'icon' => '<path d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1.01M15 10h1.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>',
                    'title' => 'Suasana Hati',
                    'description' => 'Meningkatkan mood dan kesehatan mental'
                ]
            ];
            @endphp

            @foreach($benefits as $index => $benefit)
            <div class="text-center group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="w-16 h-16 mx-auto mb-4 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-200 transition-colors duration-300">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $benefit['icon'] !!}
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-red-900 mb-2">{{ $benefit['title'] }}</h3>
                <p class="text-gray-600">{{ $benefit['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Apa yang Membuat Makanan Resap Kitchen Berbeda -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-red-900 mb-6">Apa yang Membuat Makanan Resap Kitchen Berbeda?</h2>
        </div>

        <div class="space-y-16">
            @php
            $features = [
                [
                    'title' => 'Dirancang oleh Koki dengan Sentuhan Kasih Sayang',
                    'description' => 'Setiap hidangan di Resap Kitchen dibuat oleh koki profesional, memastikan keseimbangan yang sempurna antara protein, karbohidrat, dan lemak sehat. Menu Bunda terinspirasi dari berbagai cita rasa dunia, menawarkan makanan lezat yang memenuhi berbagai kebutuhan diet, namun tetap menghadirkan kehangatan seperti masakan rumah.',
                    'image' => 'assets/img_web/pengaturan acara.jpg',
                    'reverse' => false
                ],
                [
                    'title' => 'Bahan Berkualitas Tinggi',
                    'description' => 'Bunda hanya menggunakan bahan-bahan segar, bersumber secara lokal, dan organik jika memungkinkan. Makanan Bunda bebas dari pengawet buatan, gula berlebih, dan bahan tambahan yang tidak sehat, sehingga Kakak bisa menikmati makanan asli yang memberikan energi yang tepat bagi tubuh Kakak.',
                    'image' => 'assets/img_web/hype.jpg',
                    'reverse' => true
                ],
                [
                    'title' => 'Porsi Seimbang untuk Pola Makan yang Lebih Baik',
                    'description' => 'Pengendalian porsi adalah kunci dalam menjaga pola makan sehat. Resap Kitchen menghilangkan kebutuhan untuk menghitung kalori dan menakar makanan dengan menyediakan porsi yang seimbang untuk mendukung gaya hidup Kakak—baik untuk menjaga berat badan, membangun otot, atau sekadar makan lebih sehat.',
                    'image' => 'assets/img_web/healthy_lite.jpg',
                    'reverse' => false
                ],
                [
                    'title' => 'Variasi Menu yang Menggugah Selera',
                    'description' => 'Tidak ada lagi kebosanan dengan makanan sehat! Dengan Resap Kitchen, Kakak dapat menikmati menu yang selalu berubah, penuh dengan cita rasa unik, hidangan kreatif, dan bahan musiman yang memastikan Kakak tetap menikmati setiap santapan sehat, sekaligus menghadirkan cita rasa yang familiar seperti di rumah.',
                    'image' => 'assets/img_web/gourmet.jpg',
                    'reverse' => true
                ],
                [
                    'title' => 'Praktis Tanpa Mengorbankan Kualitas',
                    'description' => 'Bunda memahami bahwa memasak makanan sehat dari nol bisa memakan waktu. Itulah mengapa Resap Kitchen menghadirkan makanan siap saji dari koki profesional langsung ke depan pintu Kakak, memungkinkan Kakak menikmati hidangan rumahan yang segar tanpa harus menghabiskan waktu berjam-jam di dapur.',
                    'image' => 'assets/img_web/motivasi.jpg',
                    'reverse' => false
                ]
            ];
            @endphp

            @foreach($features as $index => $feature)
            <div class="flex flex-col {{ $feature['reverse'] ? 'lg:flex-row-reverse' : 'lg:flex-row' }} items-center gap-12" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="lg:w-1/2">
                    <img src="{{ $feature['image'] }}" alt="{{ $feature['title'] }}" class="w-full h-80 object-cover rounded-2xl shadow-lg">
                </div>
                <div class="lg:w-1/2">
                    <h3 class="text-2xl font-bold text-red-900 mb-4">{{ $feature['title'] }}</h3>
                    <p class="text-gray-700 leading-relaxed text-lg">{{ $feature['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Target Audience Section -->
<div class="py-16 bg-gradient-to-b from-red-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-red-900 mb-6">Bagaimana Resap Kitchen Cocok dengan Gaya Hidup Kakak?</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @php
            $audiences = [
                [
                    'title' => 'Untuk Profesional yang Sibuk',
                    'description' => 'Jam kerja panjang? Tidak sempat memasak? Resap Kitchen sangat cocok bagi Kakak yang menginginkan makanan bergizi tanpa harus repot belanja, memasak, dan mencuci piring.',
                    'icon' => '<path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>',
                    'color' => 'bg-blue-100 text-blue-600'
                ],
                [
                    'title' => 'Untuk Individu yang Peduli Kesehatan',
                    'description' => 'Apakah Kakak mengikuti diet rendah karbohidrat, tinggi protein, atau berbasis nabati? Resap Kitchen menyediakan berbagai pilihan menu yang dapat disesuaikan dengan tujuan kesehatan dan kebugaran Kakak.',
                    'icon' => '<path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                    'color' => 'bg-green-100 text-green-600'
                ],
                [
                    'title' => 'Untuk Keluarga yang Ingin Makan Sehat dan Enak',
                    'description' => 'Menemukan makanan yang disukai seluruh keluarga bisa menjadi tantangan. Dengan menu Bunda yang beragam, setiap anggota keluarga dapat menikmati makanan sehat yang lezat tanpa perlu kompromi dengan rasa, seolah-olah dimasak dengan penuh cinta oleh ibu di rumah.',
                    'icon' => '<path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>',
                    'color' => 'bg-purple-100 text-purple-600'
                ]
            ];
            @endphp

            @foreach($audiences as $index => $audience)
            <div class="text-center group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="w-20 h-20 mx-auto mb-6 {{ $audience['color'] }} rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        {!! $audience['icon'] !!}
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-red-900 mb-4">{{ $audience['title'] }}</h3>
                <p class="text-gray-700 leading-relaxed">{{ $audience['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Call to Action Section -->
<div class="py-16 bg-red-900">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-bold text-white mb-6">Bergabunglah dengan Komunitas Resap Kitchen Hari Ini!</h2>
        <p class="text-xl text-red-100 mb-8 leading-relaxed">
            Makan sehat seharusnya mudah dan menyenangkan. Dengan Resap Kitchen, Kakak tidak perlu lagi mengorbankan rasa demi kesehatan. Hidangan Bunda dirancang untuk memberi energi pada tubuh Kakak, sesuai dengan gaya hidup Kakak, dan menjadikan waktu makan sebagai momen yang dinantikan setiap hari.
        </p>
        <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:justify-center">
            <a href="/catering" class="w-full sm:w-auto px-8 py-4 bg-white text-red-900 rounded-lg font-bold hover:bg-red-100 transition-colors duration-300 transform hover:scale-105 inline-block text-center">
                Coba Resap Kitchen Sekarang
            </a>
            <a href="/services" class="w-full sm:w-auto px-8 py-4 border-2 border-white text-white rounded-lg font-bold hover:bg-white hover:text-red-900 transition-all duration-300 inline-block text-center">
                Lihat Menu Kami
            </a>
        </div>
        <p class="mt-6 text-red-200 text-sm">
            Siap mengubah pola makan Kakak? Rasakan perpaduan sempurna antara kesehatan, cita rasa, dan kasih sayang dalam setiap hidangan!
        </p>
    </div>
</div>

<!-- Enhanced WhatsApp Button -->
<a href="https://wa.me/628112658048" target="_blank" 
   class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 z-50">
    <div class="flex items-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2Z"/>
        </svg>
        <span class="ml-2 hidden sm:block">Chat Kami</span>
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

    // Smooth scrolling for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add parallax effect to hero section
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.relative.pt-32.pb-24');
        if (hero) {
            hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });

    // Add animation on scroll for cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
            }
        });
    }, observerOptions);

    // Observe all feature cards
    document.querySelectorAll('[data-aos]').forEach(el => {
        observer.observe(el);
    });
</script>

<style>
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.6s ease-out forwards;
}

/* Hover effects for feature cards */
.group:hover img {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}

/* Smooth transitions for all interactive elements */
* {
    scroll-behavior: smooth;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #991b1b;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #7f1d1d;
}
</style>
@endpush