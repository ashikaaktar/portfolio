@extends('layouts.app')

@section('title', $project->title . ' – ASHIKA Portfolio')
@section('meta_description', $project->short_description)

@section('content')
    <article class="py-12 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Breadcrumbs / Back button -->
            <div class="mb-8">
                <a href="{{ route('projects') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] transition">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    <span>{{ app()->getLocale() === 'bn' ? 'সকল প্রজেক্টে ফিরে যান' : 'Back to Projects Archive' }}</span>
                </a>
            </div>

            <!-- Title & Category Header -->
            <div class="space-y-4 mb-10 max-w-4xl">
                @if ($project->category)
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-[#111426] text-[#EC4899] border border-[#EC4899]/30">
                        {{ $project->category->name }}
                    </span>
                @endif
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white leading-tight">
                    {{ $project->title }}
                </h1>
                <p class="text-sm sm:text-base text-[#A1A1AA] leading-relaxed">
                    {{ $project->short_description }}
                </p>
            </div>

            <!-- Cover Showcase Image -->
            <div class="rounded-3xl overflow-hidden glass-card p-2 mb-12 shadow-2xl">
                <div class="aspect-[16/9] w-full rounded-2xl overflow-hidden bg-slate-900 relative">
                    <img 
                        src="{{ $project->cover_image ?: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1600&q=80' }}" 
                        alt="{{ $project->title }}"
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>

            <!-- Main Content & Sidebar Info -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Left: Full Description -->
                <div class="lg:col-span-8 space-y-6">
                    <div class="glass-card rounded-3xl p-6 sm:p-10 space-y-6">
                        <h2 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                            <i data-lucide="file-text" class="w-5 h-5 text-[#8B5CF6]"></i>
                            <span>{{ app()->getLocale() === 'bn' ? 'প্রজেক্টের বিবরণ ও সমাধান' : 'Project Overview & Execution' }}</span>
                        </h2>

                        <div class="text-[#A1A1AA] text-sm sm:text-base leading-relaxed space-y-4 whitespace-pre-line">
                            {{ $project->description ?: $project->short_description }}
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar: Project Meta Details & Links -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="glass-card rounded-3xl p-6 sm:p-8 space-y-6">
                        <h3 class="text-base font-bold text-white uppercase tracking-wider pb-3 border-b border-white/5">
                            {{ app()->getLocale() === 'bn' ? 'প্রজেক্টের তথ্য' : 'Project Details' }}
                        </h3>

                        @if ($project->client)
                            <div>
                                <span class="text-xs uppercase font-semibold text-[#A1A1AA] block mb-1">
                                    {{ __('portfolio.portfolio.client') }}
                                </span>
                                <span class="text-sm font-bold text-white">{{ $project->client }}</span>
                            </div>
                        @endif

                        @if ($project->completion_date)
                            <div>
                                <span class="text-xs uppercase font-semibold text-[#A1A1AA] block mb-1">
                                    {{ __('portfolio.portfolio.completion') }}
                                </span>
                                <span class="text-sm font-bold text-white">{{ $project->completion_date->format('F Y') }}</span>
                            </div>
                        @endif

                        @if ($project->technologies && is_array($project->technologies))
                            <div>
                                <span class="text-xs uppercase font-semibold text-[#A1A1AA] block mb-2">
                                    {{ __('portfolio.portfolio.technologies') }}
                                </span>
                                <div class="flex flex-wrap gap-1.5">
                                    @foreach ($project->technologies as $tech)
                                        <span class="px-2.5 py-1 rounded-md text-xs font-semibold bg-[#171B33] text-[#8B5CF6] border border-[#8B5CF6]/30">
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="space-y-3 pt-4 border-t border-white/5">
                            @if ($project->live_url)
                                <a 
                                    href="{{ $project->live_url }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer" 
                                    class="w-full py-3 px-4 rounded-xl gradient-btn font-semibold text-xs text-white flex items-center justify-center gap-2 transition">
                                    <i data-lucide="external-link" class="w-4 h-4"></i>
                                    <span>{{ __('portfolio.portfolio.live_demo') }}</span>
                                </a>
                            @endif

                            @if ($project->github_url)
                                <a 
                                    href="{{ $project->github_url }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer" 
                                    class="w-full py-3 px-4 rounded-xl glass-panel border border-slate-700/60 font-semibold text-xs text-[#A1A1AA] hover:text-white flex items-center justify-center gap-2 transition">
                                    <i data-lucide="github" class="w-4 h-4"></i>
                                    <span>{{ __('portfolio.portfolio.github') }}</span>
                                </a>
                            @endif

                            <a 
                                href="{{ route('home') }}#contact" 
                                class="w-full py-3 px-4 rounded-xl bg-[#8B5CF6]/10 hover:bg-[#8B5CF6]/20 border border-[#8B5CF6]/30 font-semibold text-xs text-[#8B5CF6] flex items-center justify-center gap-2 transition">
                                <i data-lucide="message-square" class="w-4 h-4"></i>
                                <span>{{ app()->getLocale() === 'bn' ? 'অনুরূপ প্রজেক্টের জন্য যোগাযোগ করুন' : 'Discuss Similar Project' }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Projects -->
            @if ($relatedProjects->count() > 0)
                <div class="mt-20 pt-12 border-t border-white/5">
                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-8">
                        {{ app()->getLocale() === 'bn' ? 'সম্পর্কিত অন্যান্য প্রজেক্ট' : 'Related Projects' }}
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($relatedProjects as $rel)
                            <div class="glass-card rounded-2xl p-5 flex flex-col justify-between group">
                                <h4 class="text-base font-bold text-white group-hover:text-[#EC4899] transition-colors mb-2">
                                    <a href="{{ route('project.detail', $rel->slug) }}">{{ $rel->title }}</a>
                                </h4>
                                <p class="text-xs text-[#A1A1AA] line-clamp-2 mb-4 leading-relaxed">
                                    {{ $rel->short_description }}
                                </p>
                                <a href="{{ route('project.detail', $rel->slug) }}" class="text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] flex items-center gap-1 transition">
                                    <span>{{ __('portfolio.portfolio.view_details') }}</span>
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
