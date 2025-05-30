@extends('layouts.app')

@section('title', 'Menu Kami')

@section('content')
<!-- Hero Section dengan Pattern Background -->
<div class="relative pt-32 pb-24 bg-red-900 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.4\" fill-rule=\"evenodd\"%3E%3Ccircle cx=\"3\" cy=\"3\" r=\"3\"/%3E%3Ccircle cx=\"13\" cy=\"13\" r=\"3\"/%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center text-white">
            <span class="inline-block px-4 py-1 bg-red-700 rounded-full text-sm font-medium mb-4" data-aos="fade-down">
                Selamat Datang di Menu Spesial Kami
            </span>
            <h1 class="text-5xl font-bold mb-6 leading-tight" data-aos="fade-up">
                Rasakan Kelezatan<br/>Hidangan Pilihan Kami
            </h1>
            <p class="text-xl max-w-3xl mx-auto text-red-100" data-aos="fade-up" data-aos-delay="100">
                Nikmati kombinasi sempurna antara cita rasa sehat dan kelezatan masakan nusantara
            </p>
        </div>
    </div>
    <!-- Decorative wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="#fff1f2" d="M0,32L48,37.3C96,43,192,53,288,58.7C384,64,480,64,576,58.7C672,53,768,43,864,42.7C960,43,1056,53,1152,53.3C1248,53,1344,43,1392,37.3L1440,32L1440,100L1392,100C1344,100,1248,100,1152,100C1056,100,960,100,864,100C768,100,672,100,576,100C480,100,384,100,288,100C192,100,96,100,48,100L0,100Z"></path>
        </svg>
    </div>
</div>

<!-- Menu Categories -->
<div class="py-16 bg-red-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Healthy Menu Section -->
        <div class="mb-20" data-aos="fade-up">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium mb-4">
                    Menu Sehat
                </span>
                <h2 class="text-4xl font-bold text-red-900 mb-4">Menu Healthy</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Untuk kamu yang sedang fokus pada pola makan sehat atau sedang diet, Healthy Menu kami adalah pilihan yang tepat! 
                    Setiap menu dirancang dengan proses minimal, rendah lemak, rendah gula, dan tanpa MSG.
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Healthy Lite -->
                <div class="group bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="aspect-w-16 aspect-h-9 relative overflow-hidden">
                        <img src="assets\img_web\healthy_lite.jpg" alt="Healthy Lite" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-300"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="inline-block px-3 py-1 bg-green-500 text-white rounded-full text-sm font-medium">
                                Rendah Kalori
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-red-900 mb-4">Healthy Lite</h3>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Bahan segar berkualitas tinggi
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Dimasak tanpa minyak berlebih
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Porsi tepat untuk diet
                            </li>
                        </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-red-900">Rp 25.000</span>
                        <a href="/catering" class="px-6 py-3 bg-red-900 text-white rounded-lg hover:bg-red-800 transition-colors flex items-center">
                            Pesan Sekarang
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>

                <!-- Healthy Gourmet -->
                <div class="group bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="aspect-w-16 aspect-h-9 relative overflow-hidden">
                        <img src="assets\img_web\healthy_gourmet.jpg" alt="Healthy Gourmet" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-300"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="inline-block px-3 py-1 bg-purple-500 text-white rounded-full text-sm font-medium">
                                Premium
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-red-900 mb-4">Healthy Gourmet</h3>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-purple-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Bahan premium organik
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-purple-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Teknik memasak modern
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-purple-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Plating eksklusif
                            </li>
                        </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-red-900">Rp 25.000</span>
                        <a href="/catering" class="px-6 py-3 bg-red-900 text-white rounded-lg hover:bg-red-800 transition-colors flex items-center">
                            Pesan Sekarang
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nusantara Menu Section -->
        <div class="mb-16" data-aos="fade-up">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium mb-4">
                    Menu Nusantara
                </span>
                <h2 class="text-4xl font-bold text-red-900 mb-4">Menu Nusantara</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Jika kamu merindukan cita rasa khas Indonesia, Menu Nusantara kami siap memanjakan lidahmu! 
                    Nikmati kelezatan kuliner nusantara yang autentik dan selalu fresh setiap harinya.
                </p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Nusantara Hype -->
                <div class="group bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="aspect-w-16 aspect-h-9 relative overflow-hidden">
                        <img src="assets\img_web\hype.jpg" alt="Nusantara Hype" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-300"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="inline-block px-3 py-1 bg-yellow-500 text-white rounded-full text-sm font-medium">
                                Trending
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-red-900 mb-4">Nusantara Hype</h3>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-yellow-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Fusion masakan tradisional
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-yellow-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Presentasi instagramable
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-yellow-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Rasa autentik dengan tampilan modern
                            </li>
                        </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-red-900">Rp 25.000</span>
                        <a href="/catering" class="px-6 py-3 bg-red-900 text-white rounded-lg hover:bg-red-800 transition-colors flex items-center">
                            Pesan Sekarang
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>
                <!-- Nusantara Fit -->
                <div class="group bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                    <div class="aspect-w-16 aspect-h-9 relative overflow-hidden">
                        <img src="assets\img_web\lite.jpg" alt="Nusantara Fit" class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-300"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <div class="absolute bottom-4 left-4">
                            <span class="inline-block px-3 py-1 bg-blue-500 text-white rounded-full text-sm font-medium">
                                Sehat & Lezat
                            </span>
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="text-2xl font-bold text-red-900 mb-4">Nusantara Fit</h3>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Masakan nusantara rendah kalori
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Bahan organik pilihan
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 text-blue-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Tetap otentik, lebih sehat
                            </li>
                        </ul>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-red-900">Rp 25.000</span>
                        <a href="/catering" class="px-6 py-3 bg-red-900 text-white rounded-lg hover:bg-red-800 transition-colors flex items-center">
                            Pesan Sekarang
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Keunggulan Kami Section -->
        <div class="py-16" data-aos="fade-up">
            <div class="text-center mb-12">
                <span class="inline-block px-4 py-1 bg-red-100 text-red-800 rounded-full text-sm font-medium mb-4">
                    Mengapa Memilih Kami
                </span>
                <h2 class="text-4xl font-bold text-red-900 mb-4">Keunggulan Kami</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-red-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-red-900 mb-4">Bahan Berkualitas</h3>
                    <p class="text-gray-600">Kami hanya menggunakan bahan-bahan segar berkualitas tinggi untuk setiap hidangan</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-red-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-red-900 mb-4">Pengiriman Cepat</h3>
                    <p class="text-gray-600">Layanan pengiriman express untuk menjaga kualitas dan kehangatan makanan</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-red-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-red-900 mb-4">Menu Bervariasi</h3>
                    <p class="text-gray-600">Pilihan menu yang beragam untuk memenuhi selera dan kebutuhan Anda</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-gradient-to-r from-red-900 to-red-700 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">Siap Memesan?</h2>
        <p class="text-xl text-red-100 mb-8" data-aos="fade-up" data-aos-delay="100">
            Pesan sekarang untuk menikmati hidangan spesial kami
        </p>
        <div class="flex justify-center gap-4">
            <a href="/catering" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-lg hover:bg-red-50 transition-colors font-bold">
                Pesan Sekarang
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>
            <a href="/services" class="inline-flex items-center px-8 py-4 bg-red-800 text-white rounded-lg hover:bg-red-700 transition-colors font-bold">
                Lihat Menu
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- WhatsApp Button -->
<a href="https://wa.me/your_whatsapp_number" target="_blank" 
   class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 z-50">
    <div class="flex items-center">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2Z"/>
        </svg>
        <span class="ml-2">Chat Kami</span>
    </div>
</a>
@endsection
                                