<div>
    <!-- Category Filter Tabs -->
    <div class="flex flex-wrap items-center justify-center gap-2 mb-10">
        <button 
            type="button"
            wire:click="selectCategory(null)"
            class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition-all cursor-pointer {{ is_null($selectedCategory) ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-lg shadow-[#8B5CF6]/25' : 'glass-panel text-[#A1A1AA] hover:text-white hover:border-[#8B5CF6]/40' }}">
            {{ __('portfolio.portfolio.all') }}
        </button>

        @foreach ($categories as $cat)
            <button 
                type="button"
                wire:click="selectCategory('{{ $cat->slug }}')"
                class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition-all cursor-pointer {{ $selectedCategory === $cat->slug ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-lg shadow-[#8B5CF6]/25' : 'glass-panel text-[#A1A1AA] hover:text-white hover:border-[#8B5CF6]/40' }}">
                {{ $cat->name }}
            </button>
        @endforeach
    </div>

    <!-- Projects Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        @forelse ($projects as $project)
            <div class="glass-card rounded-2xl overflow-hidden group flex flex-col justify-between border border-[#8B5CF6]/20 hover:border-[#EC4899]/40">
                <!-- Cover Image & Overlay -->
                <div class="relative overflow-hidden aspect-[16/10] bg-slate-900">
                    <img 
                        src="{{ $project->cover_image ?: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80' }}" 
                        alt="{{ $project->title }}" 
                        loading="lazy"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-[#080B18] via-[#080B18]/40 to-transparent opacity-80 group-hover:opacity-60 transition-opacity"></div>
                    
                    @if ($project->category)
                        <span class="absolute top-3 left-3 px-3 py-1 rounded-full text-[11px] font-semibold bg-[#111426]/90 backdrop-blur-md text-[#EC4899] border border-[#EC4899]/30">
                            {{ $project->category->name }}
                        </span>
                    @endif

                    @if ($project->is_featured)
                        <span class="absolute top-3 right-3 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-amber-500/20 text-amber-300 border border-amber-500/40 flex items-center gap-1">
                            <i data-lucide="star" class="w-3 h-3 fill-amber-400 text-amber-400"></i> Featured
                        </span>
                    @endif
                </div>

                <!-- Content -->
                <div class="p-6 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-white group-hover:text-[#EC4899] transition-colors mb-2 line-clamp-1">
                            <a href="{{ route('project.detail', $project->slug) }}">
                                {{ $project->title }}
                            </a>
                        </h3>
                        <p class="text-xs sm:text-sm text-[#A1A1AA] line-clamp-2 mb-4 leading-relaxed">
                            {{ $project->short_description }}
                        </p>

                        <!-- Tech Stack Tags -->
                        @if ($project->technologies && is_array($project->technologies))
                            <div class="flex flex-wrap gap-1.5 mb-6">
                                @foreach (array_slice($project->technologies, 0, 4) as $tech)
                                    <span class="px-2.5 py-0.5 rounded-md text-[11px] font-medium bg-[#171B33] text-[#8B5CF6] border border-[#8B5CF6]/20">
                                        {{ $tech }}
                                    </span>
                                @endforeach
                                @if (count($project->technologies) > 4)
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-medium text-[#A1A1AA] bg-[#171B33]">
                                        +{{ count($project->technologies) - 4 }}
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-white/5">
                        <a 
                            href="{{ route('project.detail', $project->slug) }}" 
                            class="text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] flex items-center gap-1 transition">
                            <span>{{ __('portfolio.portfolio.view_details') }}</span>
                            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>

                        <div class="flex items-center gap-2">
                            @if ($project->github_url)
                                <a 
                                    href="{{ $project->github_url }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    title="{{ __('portfolio.portfolio.github') }}"
                                    class="p-2 rounded-lg bg-[#171B33] hover:bg-[#8B5CF6]/20 text-[#A1A1AA] hover:text-white border border-white/10 transition">
                                    <i data-lucide="github" class="w-4 h-4"></i>
                                </a>
                            @endif

                            @if ($project->live_url)
                                <a 
                                    href="{{ $project->live_url }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    title="{{ __('portfolio.portfolio.live_demo') }}"
                                    class="p-2 rounded-lg bg-[#8B5CF6]/20 hover:bg-[#8B5CF6]/40 text-[#8B5CF6] hover:text-white border border-[#8B5CF6]/30 transition">
                                    <i data-lucide="external-link" class="w-4 h-4"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full py-12 text-center">
                <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-[#171B33] flex items-center justify-center text-[#A1A1AA]">
                    <i data-lucide="folder-x" class="w-8 h-8"></i>
                </div>
                <p class="text-[#A1A1AA] text-sm">{{ __('portfolio.portfolio.no_projects') }}</p>
            </div>
        @endforelse
    </div>
</div>
