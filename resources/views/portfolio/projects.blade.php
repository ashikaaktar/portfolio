@extends('layouts.app')

@section('title', (app()->getLocale() === 'bn' ? 'পোর্টফোলিও ও প্রজেক্টসমূহ' : 'Projects & Case Studies') . ' – ASHIKA')
@section('meta_description', 'Explore selected software development, full-stack applications, and high-growth digital marketing projects by Ashika.')

@section('content')
    <section class="py-16 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                    {{ __('portfolio.portfolio.badge') }}
                </span>
                <h1 class="text-3xl sm:text-5xl font-black text-white">
                    {{ __('portfolio.portfolio.title') }}
                </h1>
                <p class="text-sm sm:text-base text-[#A1A1AA]">
                    {{ __('portfolio.portfolio.subtitle') }}
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex flex-wrap items-center justify-center gap-2 mb-10">
                <a 
                    href="{{ route('projects') }}" 
                    class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition {{ is_null($activeCategory) ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-lg' : 'glass-panel text-[#A1A1AA] hover:text-white' }}">
                    {{ __('portfolio.portfolio.all') }}
                </a>
                @foreach ($categories as $cat)
                    <a 
                        href="{{ route('projects', ['category' => $cat->slug]) }}" 
                        class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition {{ $activeCategory === $cat->slug ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-lg' : 'glass-panel text-[#A1A1AA] hover:text-white' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($projects as $project)
                    <div class="glass-card rounded-2xl overflow-hidden group flex flex-col justify-between">
                        <div class="relative overflow-hidden aspect-[16/10] bg-slate-900">
                            <img 
                                src="{{ $project->cover_image ?: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80' }}" 
                                alt="{{ $project->title }}" 
                                loading="lazy"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            >
                            @if ($project->category)
                                <span class="absolute top-3 left-3 px-2.5 py-1 rounded-full text-[10px] font-semibold bg-[#111426] text-[#EC4899] border border-[#EC4899]/30">
                                    {{ $project->category->name }}
                                </span>
                            @endif
                        </div>

                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-base font-bold text-white group-hover:text-[#EC4899] transition-colors mb-2 line-clamp-1">
                                    <a href="{{ route('project.detail', $project->slug) }}">
                                        {{ $project->title }}
                                    </a>
                                </h3>
                                <p class="text-xs text-[#A1A1AA] line-clamp-3 mb-4 leading-relaxed">
                                    {{ $project->short_description }}
                                </p>

                                @if ($project->technologies && is_array($project->technologies))
                                    <div class="flex flex-wrap gap-1.5 mb-4">
                                        @foreach (array_slice($project->technologies, 0, 4) as $tech)
                                            <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-[#171B33] text-[#8B5CF6]">
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <div class="flex items-center justify-between pt-4 border-t border-white/5">
                                <a href="{{ route('project.detail', $project->slug) }}" class="text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] flex items-center gap-1 transition">
                                    <span>{{ __('portfolio.portfolio.view_details') }}</span>
                                    <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                                </a>

                                <div class="flex items-center gap-2">
                                    @if ($project->github_url)
                                        <a href="{{ $project->github_url }}" target="_blank" rel="noopener noreferrer" class="p-1.5 rounded-lg glass-panel hover:text-white transition">
                                            <i data-lucide="github" class="w-4 h-4"></i>
                                        </a>
                                    @endif
                                    @if ($project->live_url)
                                        <a href="{{ $project->live_url }}" target="_blank" rel="noopener noreferrer" class="p-1.5 rounded-lg bg-[#8B5CF6]/20 text-[#8B5CF6] hover:text-white transition">
                                            <i data-lucide="external-link" class="w-4 h-4"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center text-[#A1A1AA]">
                        {{ __('portfolio.portfolio.no_projects') }}
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                {{ $projects->links() }}
            </div>
        </div>
    </section>
@endsection
