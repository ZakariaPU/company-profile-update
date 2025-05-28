@extends('layouts.app')

@section('title', 'Pesan Katering Premium')

@section('content')

    <style>
        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-in-out, padding 0.4s ease-in-out;
            padding-top: 0;
            padding-bottom: 0;
        }
        .faq-content.active {
            max-height: 500px;
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .faq-arrow {
            transition: transform 0.3s ease;
        }
        .faq-arrow.rotated {
            transform: rotate(180deg);
        }
        .faq-item {
            border: 1px solid #fecaca;
            transition: all 0.3s ease;
        }
        .faq-item:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
<!-- Hero Section with Parallax -->
<div class="relative min-h-screen pt-32 pb-48 bg-gradient-to-br from-red-950 via-red-900 to-red-800 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-pattern opacity-10"></div>
        <img src="/api/placeholder/1920/1080" alt="Premium Catering" class="w-full h-full object-cover opacity-20">
        <div class="absolute inset-0 bg-gradient-to-b from-red-950/80 to-red-900/90"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-20 left-10 w-32 h-32 bg-red-500/10 rounded-full blur-2xl"></div>
        <div class="absolute bottom-20 right-10 w-40 h-40 bg-red-300/10 rounded-full blur-3xl"></div>
    </div>

    <!-- Hero Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
            <div class="inline-flex items-center space-x-2 px-4 py-2 bg-red-500/10 rounded-full mb-6" data-aos="fade-down">
                <span class="w-2 h-2 bg-red-400 rounded-full animate-pulse"></span>
                <span class="text-red-100 text-sm font-medium">Premium Catering Service</span>
            </div>
            
            <h1 class="text-7xl font-bold mb-8 tracking-tight text-white" data-aos="fade-up">
                Pesan Katering
                <span class="block text-red-300">Premium Anda</span>
            </h1>
            
            <p class="text-xl max-w-3xl mx-auto font-light leading-relaxed text-red-100/90 mb-12" data-aos="fade-up" data-aos-delay="100">
                Nikmati pengalaman kuliner eksklusif dengan layanan katering premium kami. 
                Setiap hidangan dibuat dengan bahan berkualitas tinggi dan chef berpengalaman.
            </p>

            <!-- Features Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto mt-16">
                <div class="bg-white/5 backdrop-blur-lg rounded-2xl p-6 transform hover:scale-105 transition-all" data-aos="fade-up" data-aos-delay="150">
                    <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-utensils text-red-300 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Menu Premium</h3>
                    <p class="text-red-100/80 text-sm">Pilihan menu berkualitas dengan berbagai variasi masakan</p>
                </div>
                
                <div class="bg-white/5 backdrop-blur-lg rounded-2xl p-6 transform hover:scale-105 transition-all" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-truck text-red-300 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Pengiriman Tepat Waktu</h3>
                    <p class="text-red-100/80 text-sm">Jaminan pengiriman sesuai jadwal yang telah ditentukan</p>
                </div>
                
                <div class="bg-white/5 backdrop-blur-lg rounded-2xl p-6 transform hover:scale-105 transition-all" data-aos="fade-up" data-aos-delay="250">
                    <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="fas fa-heart text-red-300 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-white mb-2">Kepuasan Terjamin</h3>
                    <p class="text-red-100/80 text-sm">Kualitas dan pelayanan terbaik untuk kepuasan Anda</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Menu Preview Section -->
<div class="py-24 bg-gradient-to-b from-red-50 to-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl font-bold text-red-900 mb-6">Pilihan Menu Kami</h2>
            <p class="text-gray-600">Eksplorasi berbagai pilihan menu premium yang kami tawarkan untuk memenuhi selera Anda</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach(['Nusantara Hype', 'Nusantara Fit', 'Healthy Lite', 'Healthy Gourmet'] as $menu)
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-105 transition-all">
                <img src="assets\img_web\healthy_gourmet.jpg" alt="{{ $menu }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-red-900 mb-2">{{ $menu }}</h3>
                    <p class="text-gray-600 text-sm mb-4">Hidangan Nikmat Kaya Rasa Hanya di Resap Kitchen.</p>
                    <div class="flex items-center text-red-900">
                        <i class="fas fa-star mr-1"></i>
                        <span class="font-medium">4.9</span>
                        <span class="text-gray-400 text-sm ml-1">(120+ reviews)</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Form Section -->
<div class="py-24 bg-white relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Form Card -->
        <div class="bg-white rounded-3xl shadow-2xl border border-red-100 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-gradient-to-r from-red-900 to-red-800 p-8 text-white">
                <h2 class="text-3xl font-bold mb-4">Form Pemesanan</h2>
                <p class="text-red-100">Isi form di bawah ini untuk memesan katering</p>
            </div>
            
            <form id="cateringForm" method="POST" class="space-y-6 p-8" action="{{ route('catering.store') }}">
                @csrf
                
                <!-- Nama Lengkap -->
                <div class="group">
                    <label class="block text-gray-700 font-medium mb-2" for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-4 py-3 rounded-xl border border-red-100 focus:ring-2 focus:ring-red-900/20 focus:border-red-900">
                </div>

                <!-- Alamat -->
                <div class="group">
                    <label class="block text-gray-700 font-medium mb-2" for="address">Alamat Pengiriman</label>
                    <div class="space-y-3">
                        <textarea id="address" name="address" rows="3" required
                            class="w-full px-4 py-3 rounded-xl border border-red-100 focus:ring-2 focus:ring-red-900/20 focus:border-red-900"></textarea>
                        <button type="button" onclick="getLocation()" 
                            class="inline-flex items-center px-4 py-2 bg-red-100 text-red-900 rounded-lg hover:bg-red-200 transition-colors">
                            <i class="fas fa-map-marker-alt mr-2"></i>
                            Share Location
                        </button>
                    </div>
                </div>

                <!-- Email dan No. Handphone -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="group">
                        <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 rounded-xl border border-red-100 focus:ring-2 focus:ring-red-900/20 focus:border-red-900">
                    </div>
                    <div class="group">
                        <label class="block text-gray-700 font-medium mb-2" for="phone">No. Handphone</label>
                        <input type="tel" id="phone" name="phone" required pattern="[0-9]{10,13}"
                            class="w-full px-4 py-3 rounded-xl border border-red-100 focus:ring-2 focus:ring-red-900/20 focus:border-red-900">
                    </div>
                </div>

                <!-- Instagram ID -->
                <div class="group">
                    <label class="block text-gray-700 font-medium mb-2" for="instagram">Instagram ID (Opsional)</label>
                    <input type="text" id="instagram" name="instagram"
                        class="w-full px-4 py-3 rounded-xl border border-red-100 focus:ring-2 focus:ring-red-900/20 focus:border-red-900">
                </div>

                <!-- Pilihan Pesanan -->
                <div class="group">
                    <label class="block text-gray-700 font-medium mb-2">Pilihan Pesanan</label>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach(['Nusantara Hype', 'Nusantara Fit', 'Healthy Lite', 'Healthy Gourmet'] as $option)
                        <div class="flex items-center space-x-3">
                            <input type="radio" id="{{ Str::slug($option) }}" name="menu_type" value="{{ $option }}" required
                                class="w-4 h-4 text-red-900 focus:ring-red-900">
                            <label for="{{ Str::slug($option) }}" class="text-gray-700">{{ $option }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Periode Pemesanan -->
                <div class="group">
                    <label class="block text-gray-700 font-medium mb-2">Periode Pemesanan</label>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Tanggal Mulai</label>
                            <input type="date" name="start_date" required
                                class="w-full px-4 py-3 rounded-xl border border-red-100 focus:ring-2 focus:ring-red-900/20 focus:border-red-900">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Tanggal Selesai</label>
                            <input type="date" name="end_date" required
                                class="w-full px-4 py-3 rounded-xl border border-red-100 focus:ring-2 focus:ring-red-900/20 focus:border-red-900">
                        </div>
                    </div>
                </div>

                <!-- Keterangan -->
                <div class="group">
                    <label class="block text-gray-700 font-medium mb-2">Keterangan</label>
                    <div class="space-y-3">
                        @foreach(['Lunch', 'Dinner', 'Custom'] as $type)
                        <div class="flex items-center space-x-3">
                            <input type="checkbox" id="{{ Str::slug($type) }}" name="meal_types[]" value="{{ $type }}"
                                class="w-4 h-4 text-red-900 focus:ring-red-900">
                            <label for="{{ Str::slug($type) }}" class="text-gray-700">{{ $type }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Alergi -->
                <div class="group">
                    <label class="block text-gray-700 font-medium mb-2" for="allergies">Alergi</label>
                    <textarea id="allergies" name="allergies" rows="3" required
                        class="w-full px-4 py-3 rounded-xl border border-red-100 focus:ring-2 focus:ring-red-900/20 focus:border-red-900"
                        placeholder="Jelaskan jika Anda memiliki alergi terhadap makanan tertentu"></textarea>
                </div>

                <!-- Catatan -->
                <div class="group">
                    <label class="block text-gray-700 font-medium mb-2" for="notes">Catatan (Opsional)</label>
                    <textarea id="notes" name="notes" rows="3"
                        class="w-full px-4 py-3 rounded-xl border border-red-100 focus:ring-2 focus:ring-red-900/20 focus:border-red-900"
                        placeholder="Tambahkan catatan khusus jika diperlukan"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="submitBtn"
                    class="w-full bg-gradient-to-r from-red-900 to-red-800 text-white py-4 px-8 rounded-xl hover:from-red-800 hover:to-red-700 transition-all transform hover:scale-[1.02] active:scale-[0.98] text-lg font-semibold shadow-lg flex items-center justify-center space-x-2">
                    <span>Kirim Pesanan</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full">
            <h3 class="text-2xl font-bold text-red-900 mb-4">Konfirmasi Pesanan</h3>
            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin mengirim pesanan ini?</p>
            <div class="flex space-x-4">
                <button onclick="submitForm()" 
                    class="flex-1 bg-red-900 text-white py-3 rounded-xl hover:bg-red-800 transition-colors">
                    Ya, Kirim Pesanan
                </button>
                <button onclick="closeModal()" 
                    class="flex-1 bg-gray-100 text-gray-700 py-3 rounded-xl hover:bg-gray-200 transition-colors">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
 <div class="py-12 px-4 max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-rose-900 mb-4">Pertanyaan Umum</h2>
            <p class="text-gray-600">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
        </div>
        
        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="faq-item bg-white rounded-lg overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-rose-50 transition-colors" onclick="toggleFAQ(this)">
                    <span class="font-medium text-rose-900 text-lg">Bagaimana cara memesan?</span>
                    <div class="faq-arrow text-rose-600">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                <div class="faq-content px-6 bg-rose-25">
                    <div class="border-t border-rose-100">
                        <div class="pt-4 pb-2">
                            <p class="text-gray-700 mb-4">
                                Untuk memesan produk kami, Anda dapat mengikuti langkah-langkah berikut:
                            </p>
                            <ol class="list-decimal list-inside text-gray-700 space-y-2 pl-4">
                                <li>Pilih produk yang diinginkan dari katalog kami</li>
                                <li>Silakan isi formulir pemesanan yang telah tersedia</li>
                                <li>Periksa pesanan Anda</li>
                                <li>Klik "Kirim Pesanan"</li>
                                <li>Cek E-mail yang Anda isikan di formulir pemesanan untuk mengetahui detail pesanan</li>
                                <li>Anda akan menerima konfirmasi melalui WhatsApp oleh Admin</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            {{-- <div class="faq-item bg-white rounded-lg overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-rose-50 transition-colors" onclick="toggleFAQ(this)">
                    <span class="font-medium text-rose-900 text-lg">Berapa lama pengiriman?</span>
                    <div class="faq-arrow text-rose-600">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                <div class="faq-content px-6 bg-rose-25">
                    <div class="border-t border-rose-100">
                        <div class="pt-4 pb-2">
                            <p class="text-gray-700 mb-4">
                                Waktu pengiriman bervariasi tergantung lokasi dan jenis pengiriman yang dipilih:
                            </p>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-800">Jabodetabek:</span>
                                    <span class="text-gray-700">1-2 hari kerja</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-800">Jawa & Bali:</span>
                                    <span class="text-gray-700">2-3 hari kerja</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-800">Sumatra & Sulawesi:</span>
                                    <span class="text-gray-700">3-5 hari kerja</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-medium text-gray-800">Papua & NTT:</span>
                                    <span class="text-gray-700">5-7 hari kerja</span>
                                </div>
                            </div>
                            <p class="text-gray-600 mt-4 text-sm italic">
                                * Pengiriman express tersedia dengan biaya tambahan untuk pengiriman lebih cepat.
                            </p>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- FAQ Item 3 -->
            <div class="faq-item bg-white rounded-lg overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-rose-50 transition-colors" onclick="toggleFAQ(this)">
                    <span class="font-medium text-rose-900 text-lg">Metode pembayaran apa saja?</span>
                    <div class="faq-arrow text-rose-600">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                <div class="faq-content px-6 bg-rose-25">
                    <div class="border-t border-rose-100">
                        <div class="pt-4 pb-2">
                            <p class="text-gray-700 mb-4">
                                Kami menerima berbagai metode pembayaran untuk kemudahan bertransaksi:
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold text-rose-900 mb-3">Transfer Bank</h4>
                                    <div class="space-y-2">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                                            <span class="text-gray-700">BCA</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                                            <span class="text-gray-700">BNI</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                                            <span class="text-gray-700">BRI</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                                            <span class="text-gray-700">Mandiri</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white p-4 rounded-lg">
                                    <h4 class="font-bold text-rose-900 mb-3">E-Wallet & Lainnya</h4>
                                    <div class="space-y-2">
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                                            <span class="text-gray-700">GoPay</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                                            <span class="text-gray-700">OVO</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                                            <span class="text-gray-700">DANA</span>
                                        </div>
                                        <div class="flex items-center space-x-2">
                                            <div class="w-2 h-2 bg-rose-500 rounded-full"></div>
                                            <span class="text-gray-700">ShopeePay</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            {{-- <div class="faq-item bg-white rounded-lg overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-rose-50 transition-colors" onclick="toggleFAQ(this)">
                    <span class="font-medium text-rose-900 text-lg">Bagaimana kebijakan pengembalian barang?</span>
                    <div class="faq-arrow text-rose-600">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                <div class="faq-content px-6 bg-rose-25">
                    <div class="border-t border-rose-100">
                        <div class="pt-4 pb-2">
                            <p class="text-gray-700 mb-4">
                                Kami menyediakan kebijakan pengembalian yang mudah dan fleksibel:
                            </p>
                            <div class="space-y-3">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-6 h-6 bg-rose-100 rounded-full flex items-center justify-center mt-0.5">
                                        <span class="text-rose-600 font-bold text-sm">1</span>
                                    </div>
                                    <span class="text-gray-700">Pengembalian dapat dilakukan dalam 7 hari setelah barang diterima</span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-6 h-6 bg-rose-100 rounded-full flex items-center justify-center mt-0.5">
                                        <span class="text-rose-600 font-bold text-sm">2</span>
                                    </div>
                                    <span class="text-gray-700">Barang harus dalam kondisi asli dan belum digunakan</span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-6 h-6 bg-rose-100 rounded-full flex items-center justify-center mt-0.5">
                                        <span class="text-rose-600 font-bold text-sm">3</span>
                                    </div>
                                    <span class="text-gray-700">Kemasan asli dan label harus tetap utuh</span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-6 h-6 bg-rose-100 rounded-full flex items-center justify-center mt-0.5">
                                        <span class="text-rose-600 font-bold text-sm">4</span>
                                    </div>
                                    <span class="text-gray-700">Biaya pengiriman pengembalian ditanggung pembeli (kecuali barang cacat)</span>
                                </div>
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0 w-6 h-6 bg-rose-100 rounded-full flex items-center justify-center mt-0.5">
                                        <span class="text-rose-600 font-bold text-sm">5</span>
                                    </div>
                                    <span class="text-gray-700">Refund akan diproses dalam 3-5 hari kerja setelah barang kami terima</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- FAQ Item 5 -->
            {{-- <div class="faq-item bg-white rounded-lg overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-rose-50 transition-colors" onclick="toggleFAQ(this)">
                    <span class="font-medium text-rose-900 text-lg">Apakah ada garansi untuk produk?</span>
                    <div class="faq-arrow text-rose-600">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
                <div class="faq-content px-6 bg-rose-25">
                    <div class="border-t border-rose-100">
                        <div class="pt-4 pb-2">
                            <p class="text-gray-700 mb-4">
                                Ya, semua produk kami dilengkapi dengan garansi sesuai kategori:
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="bg-white p-4 rounded-lg border-l-4 border-rose-500">
                                    <h5 class="font-bold text-rose-900 mb-2">Elektronik</h5>
                                    <p class="text-gray-700 text-sm">Garansi resmi 1-2 tahun</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg border-l-4 border-rose-500">
                                    <h5 class="font-bold text-rose-900 mb-2">Fashion</h5>
                                    <p class="text-gray-700 text-sm">Garansi kualitas 30 hari</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg border-l-4 border-rose-500">
                                    <h5 class="font-bold text-rose-900 mb-2">Rumah Tangga</h5>
                                    <p class="text-gray-700 text-sm">Garansi 6 bulan - 1 tahun</p>
                                </div>
                                <div class="bg-white p-4 rounded-lg border-l-4 border-rose-500">
                                    <h5 class="font-bold text-rose-900 mb-2">Aksesoris</h5>
                                    <p class="text-gray-700 text-sm">Garansi 3-6 bulan</p>
                                </div>
                            </div>
                            <div class="mt-4 p-3 bg-rose-50 rounded-lg">
                                <p class="text-gray-600 text-sm">
                                    <strong>Catatan:</strong> Garansi berlaku untuk kerusakan normal dan tidak mencakup kerusakan akibat penyalahgunaan atau kecelakaan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cateringForm = document.getElementById('cateringForm');
    const confirmationModal = document.getElementById('confirmationModal');
    const submitBtn = document.getElementById('submitBtn');
    
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    // Form validation
    function validateForm() {
        const requiredFields = cateringForm.querySelectorAll('[required]');
        let isValid = true;

        // Reset all error states
        requiredFields.forEach(field => {
            field.classList.remove('border-red-500');
        });

        // Check required fields
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('border-red-500');
                isValid = false;
            }
        });

        // Validate email format
        const emailInput = cateringForm.querySelector('[type="email"]');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
            emailInput.classList.add('border-red-500');
            showNotification('Error', 'Format email tidak valid', 'error');
            isValid = false;
        }

        // Validate phone number
        const phoneInput = cateringForm.querySelector('[type="tel"]');
        const phoneRegex = /^[0-9]{10,13}$/;
        if (!phoneRegex.test(phoneInput.value)) {
            phoneInput.classList.add('border-red-500');
            showNotification('Error', 'Nomor telepon harus 10-13 digit', 'error');
            isValid = false;
        }

        // Validate menu type selection
        const menuTypeSelected = cateringForm.querySelector('[name="menu_type"]:checked');
        if (!menuTypeSelected) {
            showNotification('Error', 'Pilih jenis menu', 'error');
            isValid = false;
        }

        // Validate meal types selection
        const mealTypesSelected = cateringForm.querySelector('[name="meal_types[]"]:checked');
        if (!mealTypesSelected) {
            showNotification('Error', 'Pilih minimal satu jenis waktu makan', 'error');
            isValid = false;
        }

        return isValid;
    }

    // Form submission
    if (cateringForm) {
        cateringForm.addEventListener('submit', function(e) {
            e.preventDefault();
            if (validateForm()) {
                confirmationModal.classList.remove('hidden');
            }
        });
    }

    // Submit form with loading state
    window.submitForm = function() {
        if (validateForm()) {
            // Disable submit button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';

            // Submit form
            try {
                cateringForm.submit();
                showNotification('Sukses', 'Pesanan berhasil dikirim!', 'success');
            } catch (error) {
                showNotification('Error', 'Gagal mengirim pesanan', 'error');
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<span>Kirim Pesanan</span><i class="fas fa-arrow-right"></i>';
            }
            
            closeModal();
        }
    };

    // Close modal
    window.closeModal = function() {
        confirmationModal.classList.add('hidden');
    };

    // Get location
    window.getLocation = function() {
        const locationBtn = document.querySelector('button[onclick="getLocation()"]');
        const addressInput = document.getElementById('address');
        
        if (!navigator.geolocation) {
            showNotification('Error', 'Browser Anda tidak mendukung geolocation', 'error');
            return;
        }

        // Show loading state
        locationBtn.disabled = true;
        const originalText = locationBtn.innerHTML;
        locationBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mendapatkan Lokasi...';

        navigator.geolocation.getCurrentPosition(
            (position) => {
                const { latitude, longitude } = position.coords;
                addressInput.value = `Latitude: ${latitude}, Longitude: ${longitude}`;
                showNotification('Sukses', 'Lokasi berhasil didapatkan', 'success');
            },
            (error) => {
                showNotification('Error', 'Gagal mendapatkan lokasi: ' + error.message, 'error');
            }
        ).finally(() => {
            // Reset button state
            locationBtn.disabled = false;
            locationBtn.innerHTML = originalText;
        });
    };

    // Show notification
    function showNotification(title, message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 max-w-md p-6 rounded-2xl shadow-xl backdrop-blur-lg transform translate-x-full transition-all duration-500 z-50 ${
            type === 'success' 
                ? 'bg-gradient-to-r from-green-50 to-green-100 text-green-900 border border-green-200' 
                : 'bg-gradient-to-r from-red-50 to-red-100 text-red-900 border border-red-200'
        }`;

        notification.innerHTML = `
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0">
                    <i class="fas ${type === 'success' ? 'fa-check-circle text-green-600' : 'fa-exclamation-circle text-red-600'} text-2xl"></i>
                </div>
                <div class="flex-1">
                    <h4 class="font-bold text-lg mb-1">${title}</h4>
                    <p class="text-sm opacity-90">${message}</p>
                </div>
                <button onclick="this.parentElement.parentElement.remove()" class="flex-shrink-0 text-gray-500 hover:text-gray-700 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;

        document.body.appendChild(notification);

        // Animate notification
        requestAnimationFrame(() => {
            notification.style.transform = 'translateX(0)';
        });

        // Auto remove notification after 5 seconds
        setTimeout(() => {
            notification.style.transform = 'translateX(120%)';
            notification.style.opacity = '0';
            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 5000);
    }

    // Add real-time validation for email and phone
    const emailInput = cateringForm.querySelector('[type="email"]');
    const phoneInput = cateringForm.querySelector('[type="tel"]');

    emailInput.addEventListener('blur', function() {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (this.value && !emailRegex.test(this.value)) {
            this.classList.add('border-red-500');
            showNotification('Error', 'Format email tidak valid', 'error');
        } else {
            this.classList.remove('border-red-500');
        }
    });

    phoneInput.addEventListener('blur', function() {
        const phoneRegex = /^[0-9]{10,13}$/;
        if (this.value && !phoneRegex.test(this.value)) {
            this.classList.add('border-red-500');
            showNotification('Error', 'Nomor telepon harus 10-13 digit', 'error');
        } else {
            this.classList.remove('border-red-500');
        }
    });

    // Date validation
    const startDate = cateringForm.querySelector('[name="start_date"]');
    const endDate = cateringForm.querySelector('[name="end_date"]');

    function validateDates() {
        const start = new Date(startDate.value);
        const end = new Date(endDate.value);
        
        if (end < start) {
            endDate.classList.add('border-red-500');
            showNotification('Error', 'Tanggal selesai harus setelah tanggal mulai', 'error');
            return false;
        }
        
        endDate.classList.remove('border-red-500');
        return true;
    }

    startDate.addEventListener('change', validateDates);
    endDate.addEventListener('change', validateDates);
});

function toggleFAQ(button) {
            // Get the content div that follows the button
            const content = button.nextElementSibling;
            const arrow = button.querySelector('.faq-arrow');
            
            // Close all other FAQ items first
            const allContents = document.querySelectorAll('.faq-content');
            const allArrows = document.querySelectorAll('.faq-arrow');
            
            allContents.forEach((item, index) => {
                if (item !== content) {
                    item.classList.remove('active');
                    allArrows[index].classList.remove('rotated');
                }
            });
            
            // Toggle current FAQ item
            const isActive = content.classList.contains('active');
            if (isActive) {
                content.classList.remove('active');
                arrow.classList.remove('rotated');
            } else {
                content.classList.add('active');
                arrow.classList.add('rotated');
            }
        }

        // Optional: Close all FAQs when clicking outside the FAQ section
        document.addEventListener('click', function(event) {
            const faqContainer = document.querySelector('.space-y-4');
            if (!faqContainer.contains(event.target)) {
                const allContents = document.querySelectorAll('.faq-content');
                const allArrows = document.querySelectorAll('.faq-arrow');
                
                allContents.forEach((content, index) => {
                    content.classList.remove('active');
                    allArrows[index].classList.remove('rotated');
                });
            }
        });

        // Smooth scroll to expanded FAQ
        document.querySelectorAll('.faq-item button').forEach(button => {
            button.addEventListener('click', function() {
                setTimeout(() => {
                    const content = this.nextElementSibling;
                    if (content.classList.contains('active')) {
                        const rect = this.parentElement.getBoundingClientRect();
                        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                        
                        window.scrollTo({
                            top: scrollTop + rect.top - 100,
                            behavior: 'smooth'
                        });
                    }
                }, 200);
            });
        });
</script>
@endpush