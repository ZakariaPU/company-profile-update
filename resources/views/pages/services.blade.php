@extends('layouts.app')

@section('title', 'Our Menu')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-24 bg-red-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center text-white">
            <h1 class="text-5xl font-bold mb-6" data-aos="fade-up">Our Delicious Menu</h1>
            <p class="text-xl max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Exquisite catering solutions for your special occasions
            </p>
        </div>
    </div>
</div>

<!-- Menu Categories -->
<div class="py-16 bg-red-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
        $categories = [
            [
                'name' => 'Starter Packages',
                'items' => [
                    ['name' => 'Classic Package', 'price' => '150', 'description' => 'Perfect for intimate gatherings (10-15 people)', 'dishes' => ['Mixed Garden Salad', 'Grilled Chicken', 'Steamed Rice', 'Fresh Fruit Platter']],
                    ['name' => 'Premium Package', 'price' => '250', 'description' => 'Ideal for medium events (20-25 people)', 'dishes' => ['Caesar Salad', 'Beef Rendang', 'Nasi Kuning', 'Assorted Desserts']]
                ]
            ],
            [
                'name' => 'Special Occasions',
                'items' => [
                    ['name' => 'Wedding Package', 'price' => '500', 'description' => 'For your perfect day (50+ people)', 'dishes' => ['International Buffet', 'Premium Main Course', 'Custom Wedding Cake', 'Beverage Station']],
                    ['name' => 'Corporate Package', 'price' => '350', 'description' => 'Professional catering for business events', 'dishes' => ['Business Lunch Setup', 'Premium Coffee/Tea', 'Gourmet Sandwiches', 'Executive Desserts']]
                ]
            ]
        ];
        @endphp

        @foreach ($categories as $category)
        <div class="mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-red-900 mb-8">{{ $category['name'] }}</h2>
            <div class="grid md:grid-cols-2 gap-8">
                @foreach ($category['items'] as $item)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:scale-105">
                    <div class="p-8">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-bold text-red-900">{{ $item['name'] }}</h3>
                            <span class="text-2xl font-bold text-red-700">${{ $item['price'] }}</span>
                        </div>
                        <p class="text-gray-600 mb-6">{{ $item['description'] }}</p>
                        <div class="space-y-2">
                            @foreach ($item['dishes'] as $dish)
                            <div class="flex items-center text-gray-600">
                                <i class="fas fa-utensils text-red-500 mr-2"></i>
                                {{ $dish }}
                            </div>
                            @endforeach
                        </div>
                        <a href="/contact" class="mt-6 inline-flex items-center px-6 py-3 bg-red-900 text-white rounded-lg hover:bg-red-800 transition-colors">
                            Book Now <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- FAQ Section -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-red-900 mb-4" data-aos="fade-up">Frequently Asked Questions</h2>
            <p class="text-xl text-gray-600" data-aos="fade-up" data-aos-delay="100">Everything you need to know about our catering services</p>
        </div>

        @php
        $faqs = [
            [
                'question' => 'How far in advance should I book?',
                'answer' => 'We recommend booking at least 2-3 weeks in advance for regular events, and 2-3 months for weddings or large corporate events.'
            ],
            [
                'question' => 'Do you accommodate dietary restrictions?',
                'answer' => 'Yes, we can accommodate various dietary requirements including vegetarian, vegan, gluten-free, and halal options. Please inform us when booking.'
            ],
            [
                'question' => 'What is included in the package price?',
                'answer' => 'Our packages include food preparation, serving equipment, setup, service staff, and cleanup. Additional services like decorations can be arranged.'
            ],
            [
                'question' => 'Do you provide tasting sessions?',
                'answer' => 'Yes, we offer tasting sessions for wedding and large event packages. These can be arranged after your initial consultation.'
            ]
        ];
        @endphp

        <div class="grid md:grid-cols-2 gap-8">
            @foreach ($faqs as $index => $faq)
            <div class="bg-red-50 p-8 rounded-xl" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <h3 class="text-xl font-bold text-red-900 mb-4">{{ $faq['question'] }}</h3>
                <p class="text-gray-600">{{ $faq['answer'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="bg-red-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">Ready to Create Your Perfect Event?</h2>
        <p class="text-xl text-red-100 mb-8" data-aos="fade-up" data-aos-delay="100">Contact us now to discuss your catering needs</p>
        <a href="/contact" class="inline-flex items-center px-8 py-4 bg-white text-red-900 rounded-lg hover:bg-red-50 transition-colors font-bold">
            Get in Touch <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</div>

<a href="https://wa.me/your_whatsapp_number" target="_blank" class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.4 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2Z" />
    </svg>
</a>
@endsection