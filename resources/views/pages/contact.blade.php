@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<!-- Hero Section -->
<div class="relative pt-40 pb-32 bg-gradient-to-br from-red-900 via-red-800 to-red-700">
    <div class="absolute inset-0">
        <img src="/api/placeholder/1920/600" alt="Contact Us" class="w-full h-full object-cover opacity-10">
        <div class="absolute inset-0 bg-red-900/50 mix-blend-multiply"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center text-white">
            <span class="inline-block px-4 py-1 bg-red-500/20 rounded-full text-red-100 text-sm mb-4" data-aos="fade-down">Professional Catering Services</span>
            <h1 class="text-7xl font-bold mb-6 tracking-tight" data-aos="fade-up">
                Elevate Your Events
            </h1>
            <p class="text-2xl max-w-3xl mx-auto font-light leading-relaxed text-red-50" data-aos="fade-up" data-aos-delay="100">
                From intimate gatherings to grand celebrations, let us create an unforgettable culinary experience for your special moments.
            </p>
            <div class="mt-8 flex justify-center space-x-4" data-aos="fade-up" data-aos-delay="200">
                <div class="px-6 py-4 bg-white/10 backdrop-blur-lg rounded-xl">
                    <i class="fas fa-star text-2xl text-yellow-400 mb-2"></i>
                    <p class="text-sm text-red-50">5-Star Service</p>
                </div>
                <div class="px-6 py-4 bg-white/10 backdrop-blur-lg rounded-xl">
                    <i class="fas fa-users text-2xl text-yellow-400 mb-2"></i>
                    <p class="text-sm text-red-50">1000+ Events</p>
                </div>
                <div class="px-6 py-4 bg-white/10 backdrop-blur-lg rounded-xl">
                    <i class="fas fa-utensils text-2xl text-yellow-400 mb-2"></i>
                    <p class="text-sm text-red-50">Custom Menus</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form Section -->
<div class="py-24 bg-gradient-to-b from-red-50 to-white relative">
    <div class="absolute inset-0 bg-[url('/api/placeholder/20/20')] opacity-5"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div data-aos="fade-right" class="bg-white p-10 rounded-3xl shadow-2xl border border-red-100">
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-red-100 rounded-full opacity-50"></div>
                <h2 class="text-4xl font-bold mb-8 text-red-900 relative">Let's Connect</h2>
                <div class="space-y-8">
                    <div class="flex items-start space-x-6 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-red-50 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-map-marker-alt text-2xl text-red-900"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2 text-red-900">Visit Our Kitchen</h3>
                            <p class="text-gray-600 leading-relaxed">Jl. Amerta VII No.10, Jombor Lor<br>Sinduadi, Kec. Mlati,<br>Kab. Sleman, DI Yogyakarta 55284</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-6 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-red-50 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-phone text-2xl text-red-900"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2 text-red-900">Call Us</h3>
                            <p class="text-gray-600 leading-relaxed">+62 811 2658 048<br>
                                <span class="text-sm text-red-600">Available Mon-Fri 10AM-7PM</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-6 group">
                        <div class="w-14 h-14 bg-gradient-to-br from-red-100 to-red-50 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform">
                            <i class="fas fa-envelope text-2xl text-red-900"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2 text-red-900">Email Us</h3>
                            <p class="text-gray-600 leading-relaxed">info@company.com<br>support@company.com</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12 pt-8 border-t border-red-100">
                    <h3 class="text-2xl font-semibold mb-6 text-red-900">Follow Our Culinary Journey</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-50 rounded-2xl flex items-center justify-center text-red-900 hover:scale-110 hover:shadow-lg transition-all">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-50 rounded-2xl flex items-center justify-center text-red-900 hover:scale-110 hover:shadow-lg transition-all">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-50 rounded-2xl flex items-center justify-center text-red-900 hover:scale-110 hover:shadow-lg transition-all">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-gradient-to-br from-red-100 to-red-50 rounded-2xl flex items-center justify-center text-red-900 hover:scale-110 hover:shadow-lg transition-all">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-10 rounded-3xl shadow-2xl border border-red-100" data-aos="fade-left">
                <div class="absolute -top-4 -right-4 w-24 h-24 bg-red-100 rounded-full opacity-50"></div>
                <h2 class="text-4xl font-bold mb-8 text-red-900">Plan Your Event</h2>
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6" id="contactForm">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="group">
                            <label class="block text-gray-700 mb-2 group-hover:text-red-900 transition-colors" for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 border border-red-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-all" required>
                        </div>
                        <div class="group">
                            <label class="block text-gray-700 mb-2 group-hover:text-red-900 transition-colors" for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-3 border border-red-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-all" required>
                        </div>
                    </div>
                    <div class="group">
                        <label class="block text-gray-700 mb-2 group-hover:text-red-900 transition-colors" for="subject">Event Type</label>
                        <input type="text" id="subject" name="subject" class="w-full px-4 py-3 border border-red-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-all" required>
                    </div>
                    <div class="group">
                        <label class="block text-gray-700 mb-2 group-hover:text-red-900 transition-colors" for="message">Tell Us About Your Event</label>
                        <textarea id="message" name="message" rows="6" class="w-full px-4 py-3 border border-red-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-all resize-none" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-red-900 to-red-800 text-white py-4 px-8 rounded-xl hover:from-red-800 hover:to-red-700 transition-all transform hover:scale-[1.02] active:scale-[0.98] text-lg font-semibold shadow-lg flex items-center justify-center space-x-2">
                        <span>Start Planning Your Event</span>
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-red-900 text-center mb-12" data-aos="fade-up">Find Our Location</h2>
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-red-100" data-aos="fade-up">
            <div class="aspect-w-16 aspect-h-9">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d231665.83400040475!2d108.721495!3d-6.997536!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a592e3ab4bbf9%3A0x41bba62baf528d1f!2sLembvr%20Creative%20Media!5e1!3m2!1sen!2sus!4v1737397269356!5m2!1sen!2sus" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    class="w-full h-96 object-cover">
                </iframe>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        offset: 100
    });

    // Form handling
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Disable submit button
            const submitButton = contactForm.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Sending...';

            try {
                // Validate form
                const formData = new FormData(contactForm);
                const formEntries = Object.fromEntries(formData.entries());
                
                // Check required fields
                for (const [key, value] of Object.entries(formEntries)) {
                    const input = contactForm.querySelector(`[name="${key}"]`);
                    if (!value.trim()) {
                        input.classList.add('border-red-500');
                        throw new Error(`${key.charAt(0).toUpperCase() + key.slice(1)} is required`);
                    } else {
                        input.classList.remove('border-red-500');
                    }
                }

                // Validate email
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(formEntries.email)) {
                    contactForm.querySelector('[name="email"]').classList.add('border-red-500');
                    throw new Error('Please enter a valid email address');
                }

                // Submit form
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    credentials: 'same-origin'
                });

                const data = await response.json();

                if (!response.ok) {
                    throw new Error(data.message || 'Server error occurred');
                }

                // Success handling
                contactForm.reset();
                showNotification('Thank You!', 'We\'ll contact you within 24 hours to discuss your event details.', 'success');

            } catch (error) {
                showNotification('Error', error.message || 'An error occurred. Please try again later.', 'error');
                console.error('Form submission error:', error);
            } finally {
                // Re-enable submit button
                submitButton.disabled = false;
                submitButton.innerHTML = '<span>Start Planning Your Event</span><i class="fas fa-arrow-right ml-2"></i>';
            }
        });
    }

    // Enhanced notification helper with animations
    function showNotification(title, message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 max-w-md p-6 rounded-2xl shadow-2xl backdrop-blur-lg transform translate-x-full transition-all duration-500 z-50 ${
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
            <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r ${
                type === 'success' 
                    ? 'from-green-500 to-green-600' 
                    : 'from-red-500 to-red-600'
            } rounded-full notification-progress"></div>
        `;

        document.body.appendChild(notification);

        // Add progress bar animation
        const progressBar = notification.querySelector('.notification-progress');
        progressBar.style.animation = 'notification-progress 5s linear';

        // Custom animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes notification-progress {
                0% { width: 100%; }
                100% { width: 0%; }
            }
        `;
        document.head.appendChild(style);

        // Animate in
        requestAnimationFrame(() => {
            notification.style.transform = 'translateX(0)';
        });

        // Remove after delay
        setTimeout(() => {
            notification.style.transform = 'translateX(120%)';
            notification.style.opacity = '0';
            setTimeout(() => {
                notification.remove();
                style.remove();
            }, 500);
        }, 5000);
    }
});
</script>
@endpush