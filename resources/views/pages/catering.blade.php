@extends('layouts.app')

@section('title', 'Pesan Katering Premium')

@section('content')
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
                <img src="/api/placeholder/400/300" alt="{{ $menu }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-red-900 mb-2">{{ $menu }}</h3>
                    <p class="text-gray-600 text-sm mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
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
<div class="py-24 bg-red-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-red-900 mb-6">Pertanyaan Umum</h2>
            <p class="text-gray-600">Temukan jawaban untuk pertanyaan yang sering diajukan</p>
        </div>
        
        <div class="space-y-6">
            @foreach(['Bagaimana cara memesan?', 'Berapa lama pengiriman?', 'Metode pembayaran apa saja?'] as $question)
            <div class="bg-white rounded-xl shadow-md overflow-hidden">
                <button class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-red-50 transition-colors">
                    <span class="font-medium text-red-900">{{ $question }}</span>
                    <i class="fas fa-chevron-down text-red-900"></i>
                </button>
                <div class="px-6 py-4 border-t border-red-100 hidden">
                    <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
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
</script>
@endpush