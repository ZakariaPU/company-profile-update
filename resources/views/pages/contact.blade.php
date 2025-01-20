@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-24 bg-gray-900">
    <div class="absolute inset-0">
        <img src="/api/placeholder/1920/600" alt="Contact Us" class="w-full h-full object-cover opacity-30">
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center text-white">
            <h1 class="text-5xl font-bold mb-6" data-aos="fade-up">Get In Touch</h1>
            <p class="text-xl max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Have a project in mind? Let's discuss how we can help you achieve your goals.
            </p>
        </div>
    </div>
</div>

<!-- Contact Form Section -->
<div class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold mb-8">Contact Information</h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Visit Us</h3>
                            <p class="text-gray-600">Jl. Amerta VII No.10, Jombor Lor<br>Sinduadi, Kec. Mlati,<br>Kab. Sleman, DI Yogyakarta 55284</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-phone text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Call Us</h3>
                            <p class="text-gray-600">+62 811 2658 048<br>Mon-Fri 10AM-7PM</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-envelope text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Email Us</h3>
                            <p class="text-gray-600">info@company.com<br>support@company.com</p>
                        </div>
                    </div>
                </div>

                <div class="mt-12">
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-xl shadow-lg" data-aos="fade-left">
                <h2 class="text-3xl font-bold mb-8">Send Us a Message</h2>
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6" id="contactForm">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 mb-2" for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="email">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="subject">Subject</label>
                        <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2" for="message">Message</label>
                        <textarea id="message" name="message" rows="6" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden" data-aos="fade-up">
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
            submitButton.innerHTML = 'Sending...';

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
                showNotification('Success!', 'Thank you for your message. We will get back to you soon!', 'success');

            } catch (error) {
                showNotification('Error', error.message || 'An error occurred. Please try again later.', 'error');
                console.error('Form submission error:', error);
            } finally {
                // Re-enable submit button
                submitButton.disabled = false;
                submitButton.innerHTML = 'Send Message';
            }
        });
    }

    // Notification helper
    function showNotification(title, message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 max-w-sm p-4 rounded-lg shadow-lg ${
            type === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'
        } transition-all duration-300 transform translate-x-full z-50`;

        notification.innerHTML = `
            <h4 class="font-bold mb-1">${title}</h4>
            <p>${message}</p>
        `;

        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 100);


        // Remove after delay
        setTimeout(() => {
            notification.style.transform = 'translateX(100%)'; // Perbaikan di sini
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 5000);
    }
});
</script>
@endpush