<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BiblioCore | Library Management System</title>
    
    <!-- Font yang berbeda -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&family=Outfit:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        /* Animasi custom */
        @keyframes slide-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-slide-up {
            animation: slide-up 0.6s ease-out;
        }
        
        /* Glass effect tanpa blur di body */
        .glass-panel {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 to-gray-100 text-gray-800 font-['Source_Sans_Pro']">
    
    <!-- Header BARU - Clean & Modern -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-16">
                <!-- Logo kiri - SIMPLE -->
                <a href="{{ route('landing') }}" class="flex items-center space-x-3">
                    <div class="w-9 h-9 bg-slate-800 rounded-md flex items-center justify-center">
                        <span class="text-white font-bold">B</span>
                    </div>
                    <div>
                        <span class="text-lg font-bold text-slate-800 font-['Outfit']">BiblioCore</span>
                        <span class="block text-xs text-slate-500">Digital Library</span>
                    </div>
                </a>

                <!-- Navigation TENGAH - Horizontal -->
                <nav class="hidden md:flex items-center space-x-1">
                    <a href="#discover" class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 transition-colors">
                        Home
                    </a>
                    <span class="text-slate-300">•</span>
                    <a href="#collection" class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 transition-colors">
                        Collection
                    </a>
                    <span class="text-slate-300">•</span>
                    <a href="#features" class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 transition-colors">
                        Features
                    </a>
                </nav>

                <!-- Auth buttons KANAN - Clean -->
                <div class="flex items-center space-x-3">
                    @auth
                        <a href="{{ auth()->user()->isAdmin() ? route('admin.dashboard') : route('student.books.index') }}" 
                           class="px-4 py-2 bg-slate-800 text-white text-sm font-medium rounded hover:bg-slate-700 transition-colors">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="px-4 py-2 text-sm font-medium text-slate-700 hover:text-slate-900 transition-colors">
                            Sign In
                        </a>
                        <a href="{{ route('register') }}" 
                           class="px-4 py-2 bg-slate-800 text-white text-sm font-medium rounded hover:bg-slate-700 transition-colors">
                            Get Started
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content - Layout VERTICAL Stack -->
    <main class="container mx-auto px-4 py-12">
        <!-- Hero Section - Stacked -->
        <section id="discover" class="mb-20">
            <div class="max-w-4xl mx-auto text-center">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 bg-slate-100 rounded-full mb-8">
                    <span class="material-symbols-outlined text-slate-600 text-sm mr-2">library_books</span>
                    <span class="text-sm font-medium text-slate-700">Digital Library Management</span>
                </div>
                
                <!-- Headline -->
                <h1 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6 leading-tight font-['Outfit']">
                    Manage Your School's<br>Digital Library with Ease
                </h1>
                
                <!-- Description -->
                <p class="text-lg text-slate-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                    BiblioCore simplifies library management with an intuitive platform for tracking books, 
                    managing loans, and providing digital access to your entire collection.
                </p>
                
                <!-- Search Box - Centered -->
                <div class="max-w-2xl mx-auto mb-12">
                    <form method="GET" class="bg-white rounded-lg border border-slate-200 shadow-sm p-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">
                                    Find books in our collection
                                </label>
                                <div class="relative">
                                    <input type="text" name="q" value="{{ $search }}"
                                           placeholder="Search by title, author, or keyword"
                                           class="w-full pl-12 pr-4 py-3 border border-slate-300 rounded-md text-slate-900 placeholder:text-slate-400 focus:border-slate-400 focus:ring-2 focus:ring-slate-200 focus:outline-none transition">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 material-symbols-outlined text-slate-400">search</span>
                                </div>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-4">
                                <div class="flex-1">
                                    <select name="category"
                                            class="w-full px-4 py-3 border border-slate-300 rounded-md text-slate-900 focus:border-slate-400 focus:ring-2 focus:ring-slate-200 focus:outline-none transition bg-white">
                                        <option value="">All Categories</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item }}" @selected($item === $activeCategory)>
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="submit"
                                        class="px-6 py-3 bg-slate-800 text-white font-medium rounded-md hover:bg-slate-700 transition-colors flex items-center justify-center gap-2">
                                    <span class="material-symbols-outlined">search</span>
                                    Search Books
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Stats - Horizontal Row -->
                <div class="grid grid-cols-3 gap-8 max-w-md mx-auto">
                    <div class="text-center">
                        <div class="text-2xl font-bold text-slate-900">{{ $books->total() }}+</div>
                        <div class="text-sm text-slate-600 mt-1">Digital Books</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-slate-900">{{ $categories->count() }}+</div>
                        <div class="text-sm text-slate-600 mt-1">Categories</div>
                    </div>
                    <div class="text-center">
                        <div class="text-2xl font-bold text-slate-900">24/7</div>
                        <div class="text-sm text-slate-600 mt-1">Online Access</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Collection Section - Card Grid -->
        <section id="collection" class="mb-20">
            <div class="mb-10">
                <h2 class="text-3xl font-bold text-slate-900 mb-4 font-['Outfit']">Featured Collection</h2>
                <p class="text-slate-600">Browse through our curated selection of books</p>
            </div>
            
            <!-- Books Grid - 2 columns -->
            <div class="grid md:grid-cols-2 gap-6">
                @forelse ($books as $book)
                <div class="bg-white rounded-lg border border-slate-200 overflow-hidden hover:shadow-md transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-start space-x-5">
                            <!-- Book Cover - Square -->
                            <div class="w-20 h-24 bg-slate-100 rounded overflow-hidden flex-shrink-0">
                                @if ($book->cover_image_path)
                                    <img src="{{ asset('storage/' . $book->cover_image_path) }}" 
                                         alt="{{ $book->title }}" 
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <span class="material-symbols-outlined text-slate-300">auto_stories</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Book Info -->
                            <div class="flex-1">
                                <div class="mb-3">
                                    <span class="inline-block px-3 py-1 bg-slate-100 text-slate-700 text-xs font-medium rounded">
                                        {{ $book->category }}
                                    </span>
                                </div>
                                
                                <h3 class="text-lg font-semibold text-slate-900 mb-2">{{ $book->title }}</h3>
                                <p class="text-sm text-slate-600 mb-3">{{ $book->author ?? 'Author not specified' }}</p>
                                
                                <p class="text-sm text-slate-500 mb-5 line-clamp-2">
                                    {{ $book->description }}
                                </p>
                                
                                <!-- Actions -->
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('landing.books.show', $book) }}"
                                       class="text-sm font-medium text-slate-700 hover:text-slate-900 transition-colors">
                                        View Details →
                                    </a>
                                    @auth
                                        @if (auth()->user()->isStudent())
                                            <a href="{{ route('student.books.show', $book) }}"
                                               class="text-sm font-medium text-slate-800 hover:text-slate-900 transition-colors">
                                                Read Now
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center py-12">
                    <div class="w-16 h-16 mx-auto mb-4 bg-slate-100 rounded-full flex items-center justify-center">
                        <span class="material-symbols-outlined text-slate-300">book_2</span>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">No books available</h3>
                    <p class="text-slate-600">Please check back later for updates.</p>
                </div>
                @endforelse
            </div>
            
            <!-- Pagination - Minimal -->
            @if($books->hasPages())
            <div class="mt-12">
                <div class="flex items-center justify-center space-x-2">
                    @if ($books->onFirstPage())
                        <span class="w-9 h-9 flex items-center justify-center rounded border border-slate-300 text-slate-400">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </span>
                    @else
                        <a href="{{ $books->previousPageUrl() }}"
                           class="w-9 h-9 flex items-center justify-center rounded border border-slate-300 text-slate-700 hover:bg-slate-50 transition-colors">
                            <span class="material-symbols-outlined text-sm">chevron_left</span>
                        </a>
                    @endif
                    
                    @foreach ($books->getUrlRange(1, $books->lastPage()) as $page => $url)
                        @if ($page == $books->currentPage())
                            <span class="w-9 h-9 flex items-center justify-center rounded bg-slate-800 text-white text-sm font-medium">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="w-9 h-9 flex items-center justify-center rounded border border-slate-300 text-slate-700 hover:bg-slate-50 transition-colors text-sm">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                    
                    @if ($books->hasMorePages())
                        <a href="{{ $books->nextPageUrl() }}"
                           class="w-9 h-9 flex items-center justify-center rounded border border-slate-300 text-slate-700 hover:bg-slate-50 transition-colors">
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </a>
                    @else
                        <span class="w-9 h-9 flex items-center justify-center rounded border border-slate-300 text-slate-400">
                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                        </span>
                    @endif
                </div>
            </div>
            @endif
        </section>

        <!-- Features - Vertical List -->
        <section id="features" class="bg-white rounded-xl border border-slate-200 p-8">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-2xl font-bold text-slate-900 mb-8 text-center font-['Outfit']">
                    Why Choose BiblioCore
                </h2>
                
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-slate-600">manage_search</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-2">Easy Book Management</h3>
                            <p class="text-slate-600">Add, edit, and organize your library collection with an intuitive interface.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-slate-600">groups</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-2">Student Access</h3>
                            <p class="text-slate-600">Students can browse and request books online from any device.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="w-10 h-10 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-outlined text-slate-600">analytics</span>
                        </div>
                        <div>
                            <h3 class="font-semibold text-slate-900 mb-2">Usage Analytics</h3>
                            <p class="text-slate-600">Track borrowing patterns and popular titles with detailed reports.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer - Simple -->
    <footer class="mt-20 border-t border-slate-200 py-8">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p class="text-sm text-slate-600">
                    © {{ now()->year }} BiblioCore Library Management System
                </p>
                <p class="text-xs text-slate-500 mt-2">
                    Designed for modern educational institutions
                </p>
            </div>
        </div>
    </footer>
</body>
</html>