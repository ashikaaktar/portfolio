@extends('layouts.app')

@section('title', ($post->meta_title ?: $post->title) . ' – ASHIKA Blog')
@section('meta_description', $post->meta_description ?: $post->excerpt)
@section('og_title', $post->title)
@section('og_description', $post->excerpt)
@section('og_image', $post->featured_image)

@section('content')
    <article class="py-12 relative">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Back to Blog Link -->
            <div class="mb-8">
                <a href="{{ route('blog') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] transition">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    <span>{{ __('portfolio.blog.back_to_blog') }}</span>
                </a>
            </div>

            <!-- Post Header -->
            <header class="space-y-4 mb-8">
                @if ($post->category)
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#111426] text-[#EC4899] border border-[#EC4899]/30">
                        {{ $post->category->name }}
                    </span>
                @endif
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white leading-tight">
                    {{ $post->title }}
                </h1>
                <div class="flex items-center gap-4 text-xs text-[#A1A1AA] pt-2 border-b border-white/5 pb-4">
                    <span>{{ __('portfolio.blog.published_on') }}: {{ $post->published_at ? $post->published_at->format('F d, Y') : 'Recently' }}</span>
                    <span>&bull;</span>
                    <span>{{ $post->reading_time ?: '5 min read' }}</span>
                    <span>&bull;</span>
                    <span class="text-[#EC4899] font-semibold">By Ashika</span>
                </div>
            </header>

            <!-- Featured Image -->
            @if ($post->featured_image)
                <div class="rounded-3xl overflow-hidden glass-card p-2 mb-10 shadow-2xl">
                    <div class="aspect-[16/9] w-full rounded-2xl overflow-hidden bg-slate-900">
                        <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                </div>
            @endif

            <!-- Post Content Body -->
            <div class="glass-card rounded-3xl p-6 sm:p-10 mb-12">
                <div class="prose prose-invert max-w-none text-white text-sm sm:text-base leading-relaxed space-y-4 whitespace-pre-line">
                    {{ $post->content }}
                </div>
            </div>

            <!-- Author Card & Social Share -->
            <div class="glass-card rounded-2xl p-6 sm:p-8 mb-12 flex flex-col sm:flex-row items-center justify-between gap-6">
                <div class="flex items-center gap-4">
                    <div class="w-14 h-14 rounded-2xl gradient-btn flex items-center justify-center font-bold text-xl text-white shadow-md">
                        A
                    </div>
                    <div>
                        <h4 class="text-base font-bold text-white">Ashika</h4>
                        <p class="text-xs text-[#A1A1AA]">{{ $profile->title ?? 'Digital Marketer & Developer' }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-2">
                    <span class="text-xs font-semibold text-[#A1A1AA] mr-2">{{ __('portfolio.blog.share') }}:</span>
                    <a 
                        href="https://wa.me/?text={{ urlencode($post->title . ' ' . url()->current()) }}" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        class="p-2 rounded-xl bg-emerald-600/20 text-emerald-300 hover:text-white transition">
                        <i data-lucide="message-circle" class="w-4 h-4"></i>
                    </a>
                    <a 
                        href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        class="p-2 rounded-xl bg-sky-600/20 text-sky-300 hover:text-white transition">
                        <i data-lucide="linkedin" class="w-4 h-4"></i>
                    </a>
                    <a 
                        href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url()->current()) }}" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        class="p-2 rounded-xl bg-[#8B5CF6]/20 text-[#8B5CF6] hover:text-white transition">
                        <i data-lucide="twitter" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Related Posts -->
            @if ($relatedPosts->count() > 0)
                <div class="pt-8 border-t border-white/5">
                    <h3 class="text-xl font-bold text-white mb-6">
                        {{ __('portfolio.blog.related_posts') }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($relatedPosts as $rel)
                            <div class="glass-card rounded-2xl p-5 flex flex-col justify-between group">
                                <h4 class="text-sm font-bold text-white group-hover:text-[#EC4899] transition-colors mb-2 line-clamp-2">
                                    <a href="{{ route('blog.detail', $rel->slug) }}">{{ $rel->title }}</a>
                                </h4>
                                <a href="{{ route('blog.detail', $rel->slug) }}" class="text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] flex items-center gap-1 transition">
                                    <span>{{ __('portfolio.blog.read_more') }}</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </article>
@endsection
