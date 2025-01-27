@extends('layouts.app')

@section('title', 'Culinary Blog')

@section('content')
<!-- Hero Section -->
<div class="relative pt-32 pb-24 bg-gradient-to-r from-red-800 to-red-900">
    <div class="absolute inset-0 opacity-10">
        <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
            <pattern id="pattern-circles" x="0" y="0" width="10" height="10" patternUnits="userSpaceOnUse">
                <circle cx="2" cy="2" r="1" fill="currentColor" class="text-white"/>
            </pattern>
            <rect x="0" y="0" width="100%" height="100%" fill="url(#pattern-circles)"></rect>
        </svg>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center text-white">
            <h1 class="text-5xl font-bold mb-6" data-aos="fade-up">Culinary Stories</h1>
            <p class="text-xl max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Discover recipes, cooking tips, event planning ideas, and catering insights
            </p>
        </div>
    </div>
</div>

<!-- Category Filters -->
<div class="bg-white shadow-md sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex overflow-x-auto py-4 space-x-4" id="blog-filters">
            <button class="px-6 py-2 rounded-full bg-red-900 text-white" data-filter="all">All Posts</button>
            <button class="px-6 py-2 rounded-full bg-red-50 text-red-900 hover:bg-red-900 hover:text-white transition-colors" data-filter="recipes">Recipes</button>
            <button class="px-6 py-2 rounded-full bg-red-50 text-red-900 hover:bg-red-900 hover:text-white transition-colors" data-filter="events">Event Tips</button>
            <button class="px-6 py-2 rounded-full bg-red-50 text-red-900 hover:bg-red-900 hover:text-white transition-colors" data-filter="catering">Catering</button>
        </div>
    </div>
</div>

<!-- Featured Post -->
<div class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-2xl overflow-hidden" data-aos="fade-up">
            <img src="/api/placeholder/1200/600" alt="Featured Post" class="w-full h-[600px] object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-red-900/90 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                <div class="max-w-3xl">
                    <span class="inline-block px-4 py-1 bg-red-700 rounded-full text-sm mb-4">Featured</span>
                    <h2 class="text-4xl font-bold mb-4">Mastering the Art of Wedding Menu Planning</h2>
                    <p class="text-lg text-red-100 mb-6">Expert tips for creating an unforgettable wedding feast that caters to all your guests' preferences.</p>
                    <div class="flex items-center space-x-6">
                        <div class="flex items-center space-x-2">
                            <img src="/api/placeholder/40/40" alt="Author" class="w-10 h-10 rounded-full">
                            <span>By Chef Maria Rodriguez</span>
                        </div>
                        <span>|</span>
                        <span>10 min read</span>
                        <span>|</span>
                        <span>Published: March 15, 2025</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Latest Posts Grid -->
<div class="py-16 bg-red-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-red-900 mb-12" data-aos="fade-up">Latest Articles</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
            $posts = [
                [
                    'title' => 'Essential Tips for Summer Outdoor Catering',
                    'category' => 'catering',
                    'excerpt' => 'Keep your outdoor events fresh and delightful with these professional catering tips.',
                    'author' => 'John Smith',
                    'readTime' => '5 min',
                    'date' => 'March 10, 2025'
                ],
                [
                    'title' => 'Signature Cocktails for Corporate Events',
                    'category' => 'recipes',
                    'excerpt' => 'Elevate your corporate gathering with these sophisticated drink recipes.',
                    'author' => 'Emma Davis',
                    'readTime' => '7 min',
                    'date' => 'March 8, 2025'
                ],
                [
                    'title' => 'Planning the Perfect Wedding Menu',
                    'category' => 'events',
                    'excerpt' => 'Create a memorable dining experience for your special day.',
                    'author' => 'Sarah Wilson',
                    'readTime' => '8 min',
                    'date' => 'March 5, 2025'
                ],
                // Add more posts as needed
            ];
            @endphp

            @foreach ($posts as $index => $post)
            <div class="group blog-card bg-white rounded-xl shadow-lg overflow-hidden" data-category="{{ $post['category'] }}" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="relative h-64">
                    <img src="/api/placeholder/600/400" alt="{{ $post['title'] }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-1 bg-red-900 text-white rounded-full text-sm">{{ ucfirst($post['category']) }}</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-red-900 mb-3 group-hover:text-red-700">{{ $post['title'] }}</h3>
                    <p class="text-gray-600 mb-4">{{ $post['excerpt'] }}</p>
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>By {{ $post['author'] }}</span>
                        <span>{{ $post['readTime'] }} read</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<a href="https://wa.me/your_whatsapp_number" target="_blank" class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="currentColor">
        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.4 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2Z" />
    </svg>
</a>

@endsection

@push('scripts')
<script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

    // Blog filtering functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filters = document.querySelectorAll('#blog-filters button');
        const cards = document.querySelectorAll('.blog-card');

        filters.forEach(filter => {
            filter.addEventListener('click', function() {
                const category = this.dataset.filter;
                
                // Update active filter styling
                filters.forEach(f => f.classList.remove('bg-red-900', 'text-white'));
                this.classList.add('bg-red-900', 'text-white');

                // Filter cards
                cards.forEach(card => {
                    if (category === 'all' || card.dataset.category === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush