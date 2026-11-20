@extends('layouts.app')

@section('title', (app()->getLocale() === 'bn' ? 'ব্লগ ও নিবন্ধসমূহ' : 'Articles & Insights') . ' – ASHIKA')
@section('meta_description', 'Actionable insights on digital marketing, growth hacking, modern Laravel web development, and AI video production by Ashika.')

@section('content')
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                    {{ __('portfolio.blog.badge') }}
                </span>
                <h1 class="text-3xl sm:text-5xl font-black text-white">
                    {{ __('portfolio.blog.title') }}
                </h1>
                <p class="text-sm sm:text-base text-[#A1A1AA]">
                    {{ __('portfolio.blog.subtitle') }}
                </p>
            </div>

            <!-- Search & Category Filters -->
            <div class="max-w-4xl mx-auto mb-12 space-y-6">
                <!-- Search Bar -->
                <form action="{{ route('blog') }}" method="GET" class="relative">
                    @if ($activeCategory)
                        <input type="hidden" name="category" value="{{ $activeCategory }}">
                    @endif
                    <input 
                        type="text" 
                        name="q" 
                        value="{{ $search }}" 
                        placeholder="{{ app()->getLocale() === 'bn' ? 'কীওয়ার্ড দিয়ে ব্লগ খুঁজুন...' : 'Search articles by keywords...' }}"
                        class="w-full px-5 py-3.5 pl-12 rounded-2xl glass-input text-sm focus:border-[#8B5CF6]"
                    >
                    <i data-lucide="search" class="w-5 h-5 text-[#A1A1AA] absolute left-4 top-3.5 pointer-events-none"></i>
                    @if ($search)
                        <a href="{{ route('blog', array_filter(['category' => $activeCategory])) }}" class="absolute right-4 top-3.5 text-xs text-[#A1A1AA] hover:text-white">
                            Clear
                        </a>
                    @endif
                </form>

                <!-- Category Tabs -->
                <div class="flex flex-wrap items-center justify-center gap-2">
                    <a 
                        href="{{ route('blog', array_filter(['q' => $search])) }}" 
                        class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition {{ is_null($activeCategory) ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-lg' : 'glass-panel text-[#A1A1AA] hover:text-white' }}">
                        {{ __('portfolio.portfolio.all') }}
                    </a>
                    @foreach ($categories as $cat)
                        <a 
                            href="{{ route('blog', array_filter(['category' => $cat->slug, 'q' => $search])) }}" 
                            class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition {{ $activeCategory === $cat->slug ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-lg' : 'glass-panel text-[#A1A1AA] hover:text-white' }}">
                            {{ $cat->name }} ({{ $cat->posts_count }})
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Blog Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($posts as $post)
                    <article class="glass-card rounded-2xl overflow-hidden flex flex-col justify-between group">
                        <div class="relative aspect-[16/10] overflow-hidden bg-slate-900">
                            <img 
                                src="{{ $post->featured_image ?: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80' }}" 
                                alt="{{ $post->title }}" 
                                loading="lazy"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            >
                            @if ($post->category)
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#111426] text-[#EC4899] border border-[#EC4899]/30">
                                    {{ $post->category->name }}
                                </span>
                            @endif
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex items-center gap-3 text-[11px] text-[#A1A1AA] mb-2">
                                    <span>{{ $post->published_at ? $post->published_at->format('M d, Y') : 'Recent' }}</span>
                                    <span>&bull;</span>
                                    <span>{{ $post->reading_time ?: '5 min read' }}</span>
                                </div>

                                <h2 class="text-base font-bold text-white group-hover:text-[#EC4899] transition-colors mb-2 line-clamp-2">
                                    <a href="{{ route('blog.detail', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>

                                <p class="text-xs text-[#A1A1AA] line-clamp-3 leading-relaxed mb-4">
                                    {{ $post->excerpt }}
                                </p>
                            </div>

                            <div class="pt-4 border-t border-white/5">
                                <a 
                                    href="{{ route('blog.detail', $post->slug) }}" 
                                    class="text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] flex items-center gap-1.5 transition">
                                    <span>{{ __('portfolio.blog.read_more') }}</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full py-16 text-center text-[#A1A1AA]">
                        {{ app()->getLocale() === 'bn' ? 'কোনো নিবন্ধ পাওয়া যায়নি।' : 'No articles found matching your criteria.' }}
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
@endsection
