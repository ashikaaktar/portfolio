@extends('layouts.app')

@section('title', 'ASHIKA – Digital Marketer & Developer | Personal Portfolio')
@section('meta_description', $profile->tagline ?: 'I Build Digital Experiences & Grow Businesses. Full-Stack Web Development, Data-Driven SEO, Meta Ads, and AI Video solutions.')

@section('content')
    <!-- 4.1 HERO SECTION -->
    <section id="home" class="relative pt-12 pb-24 lg:pt-20 lg:pb-32 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
                <!-- Hero Left: Text & CTAs -->
                <div class="lg:col-span-7 text-center lg:text-left space-y-6">
                    <!-- Status Badge -->
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-panel border border-[#8B5CF6]/30 text-xs font-semibold text-[#8B5CF6]">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                        <span>{{ __('portfolio.hero.badge') }}</span>
                    </div>

                    <!-- Main Headline -->
                    <div class="space-y-2">
                        <p class="text-sm sm:text-base font-semibold tracking-wider uppercase text-[#EC4899]">
                            {{ __('portfolio.hero.greeting') }} <span class="text-white font-bold">Ashika</span>
                        </p>
                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black tracking-tight text-white leading-[1.15]">
                            <span class="gradient-text">{{ $profile->headline }}</span>
                        </h1>
                    </div>

                    <!-- Tagline / Intro -->
                    <p class="text-sm sm:text-base lg:text-lg text-[#A1A1AA] max-w-2xl mx-auto lg:mx-0 leading-relaxed">
                        {{ $profile->tagline }}
                    </p>

                    <!-- CTAs & WhatsApp -->
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 pt-2">
                        <a href="#portfolio" class="px-7 py-3.5 rounded-xl gradient-btn font-bold text-sm text-white shadow-lg shadow-[#8B5CF6]/30 hover:scale-105 active:scale-95 transition-all flex items-center gap-2">
                            <span>{{ __('portfolio.hero.view_work') }}</span>
                            <i data-lucide="arrow-down-right" class="w-4 h-4"></i>
                        </a>

                        <a href="#contact" class="px-7 py-3.5 rounded-xl glass-panel font-bold text-sm text-[#A1A1AA] hover:text-white hover:border-[#8B5CF6]/50 hover:bg-[#8B5CF6]/10 active:scale-95 transition-all flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4 text-[#8B5CF6]"></i>
                            <span>{{ __('portfolio.hero.contact_me') }}</span>
                        </a>

                        <a href="{{ $profile->whatsapp_link ?: 'https://wa.me/8801938267920' }}" target="_blank" rel="noopener noreferrer" class="px-5 py-3.5 rounded-xl bg-emerald-600/20 border border-emerald-500/30 hover:bg-emerald-600/30 font-semibold text-sm text-emerald-300 flex items-center gap-2 transition">
                            <i data-lucide="message-circle" class="w-4 h-4 text-emerald-400"></i>
                            <span>WhatsApp</span>
                        </a>
                    </div>

                    <!-- Social Icons Strip -->
                    <div class="pt-4 flex items-center justify-center lg:justify-start gap-3">
                        <span class="text-xs font-semibold uppercase tracking-wider text-[#A1A1AA]">
                            {{ app()->getLocale() === 'bn' ? 'কানেক্ট:' : 'Connect:' }}
                        </span>
                        @foreach ($socialLinks as $link)
                            <a 
                                href="{{ $link->url }}" 
                                target="_blank" 
                                rel="noopener noreferrer"
                                title="{{ $link->platform }}"
                                class="w-9 h-9 rounded-xl glass-panel flex items-center justify-center text-[#A1A1AA] hover:text-white hover:border-[#8B5CF6]/50 hover:bg-[#8B5CF6]/10 transition">
                                <i data-lucide="{{ $link->icon ?: 'external-link' }}" class="w-4 h-4"></i>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Hero Right: Futuristic Glassmorphism Profile Avatar Card -->
                <div class="lg:col-span-5 flex justify-center relative">
                    <!-- Rotating Glowing Neon Rings Behind -->
                    <div class="absolute inset-0 rounded-full bg-gradient-to-tr from-[#8B5CF6]/30 to-[#EC4899]/25 blur-2xl transform scale-110"></div>
                    
                    <div class="relative w-full max-w-sm sm:max-w-md rounded-3xl p-1 bg-gradient-to-b from-[#8B5CF6]/40 via-[#EC4899]/15 to-transparent shadow-2xl">
                        <div class="rounded-[22px] glass-panel p-6 sm:p-8 backdrop-blur-2xl relative overflow-hidden">
                            <!-- Top Card Header -->
                            <div class="flex items-center justify-between pb-4 border-b border-white/10 mb-6">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                                    <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                                    <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                                </div>
                                <span class="text-[11px] font-mono text-[#EC4899] bg-[#111426] px-2.5 py-1 rounded-md border border-[#8B5CF6]/30">
                                    ashika.dev
                                </span>
                            </div>

                            <!-- Visual Avatar / Badge -->
                            <div class="relative mx-auto w-44 h-44 sm:w-52 sm:h-52 rounded-2xl overflow-hidden mb-6 p-1 bg-gradient-to-tr from-[#8B5CF6] to-[#EC4899] shadow-xl group">
                                <div class="w-full h-full rounded-[14px] overflow-hidden bg-slate-900 relative flex items-center justify-center">
                                    @if ($profile->profile_image)
                                        <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Ashika" class="w-full h-full object-cover">
                                    @else
                                        <!-- High-Tech Futuristic Graphic Avatar -->
                                        <div class="w-full h-full bg-gradient-to-b from-[#171B33] to-[#080B18] flex flex-col items-center justify-center text-center p-4">
                                            <div class="w-20 h-20 rounded-full gradient-btn flex items-center justify-center text-3xl font-extrabold text-white mb-2 shadow-lg shadow-[#8B5CF6]/40">
                                                A
                                            </div>
                                            <span class="text-sm font-bold text-white">ASHIKA</span>
                                            <span class="text-[11px] text-[#A1A1AA]">{{ $profile->title }}</span>
                                        </div>
                                    @endif
                                    
                                    <div class="absolute bottom-2 left-2 right-2 px-3 py-1.5 rounded-lg bg-black/60 backdrop-blur-md border border-white/10 flex items-center justify-between text-[11px] text-white">
                                        <span class="flex items-center gap-1.5 text-emerald-400 font-semibold">
                                            <span class="w-2 h-2 rounded-full bg-emerald-400 animate-ping"></span>
                                            Online
                                        </span>
                                        <span class="text-[#A1A1AA]">Dhaka, BD</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Bio Pill -->
                            <div class="space-y-3 text-center">
                                <h3 class="text-lg font-bold text-white">Ashika</h3>
                                <p class="text-xs text-[#A1A1AA] font-medium">
                                    {{ $profile->title }}
                                </p>
                                <div class="flex items-center justify-center gap-2 pt-2">
                                    <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                                        Laravel 13
                                    </span>
                                    <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-[#111426] text-[#EC4899] border border-[#EC4899]/30">
                                        Meta Ads
                                    </span>
                                    <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-[#111426] text-[#06D4F4] border border-[#06D4F4]/30">
                                        SEO
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Ticker Bar -->
            <div class="mt-16 pt-8 border-t border-[#8B5CF6]/15 grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="glass-card p-5 rounded-2xl">
                    <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">
                        <span class="gradient-accent-text">{{ $profile->years_of_experience }}+</span>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#A1A1AA]">
                        {{ __('portfolio.hero.years_exp') }}
                    </div>
                </div>

                <div class="glass-card p-5 rounded-2xl">
                    <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">
                        <span class="gradient-accent-text">{{ $profile->completed_projects }}+</span>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#A1A1AA]">
                        {{ __('portfolio.hero.projects_done') }}
                    </div>
                </div>

                <div class="glass-card p-5 rounded-2xl">
                    <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">
                        <span class="gradient-accent-text">{{ $profile->happy_clients }}+</span>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#A1A1AA]">
                        {{ __('portfolio.hero.happy_clients') }}
                    </div>
                </div>

                <div class="glass-card p-5 rounded-2xl">
                    <div class="text-3xl sm:text-4xl font-extrabold text-white mb-1">
                        <span class="gradient-accent-text">{{ $profile->satisfaction_rate }}%</span>
                    </div>
                    <div class="text-xs font-semibold uppercase tracking-wider text-[#A1A1AA]">
                        {{ __('portfolio.hero.satisfaction') }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4.2 ABOUT ME SECTION -->
    <section id="about" class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                    {{ __('portfolio.about.badge') }}
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-white">
                    {{ __('portfolio.about.title') }}
                </h2>
                <p class="text-sm sm:text-base text-[#A1A1AA]">
                    {{ __('portfolio.about.subtitle') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                <!-- Left: Visual & Quick Details -->
                <div class="lg:col-span-5">
                    <div class="glass-card rounded-3xl p-6 sm:p-8 space-y-6 border border-[#8B5CF6]/20">
                        <div class="aspect-square rounded-2xl overflow-hidden bg-slate-900/80 relative">
                            <img 
                                src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=80" 
                                alt="Ashika Developer" 
                                class="w-full h-full object-cover"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-[#080B18] via-transparent to-transparent opacity-80"></div>
                            <div class="absolute bottom-4 left-4 right-4 p-4 rounded-xl glass-panel border border-white/10">
                                <p class="text-xs font-bold text-white flex items-center gap-1.5">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-400"></i>
                                    {{ __('portfolio.about.verified_pro') }}
                                </p>
                                <p class="text-[11px] text-[#A1A1AA] mt-0.5">
                                    {{ $profile->title }} &bull; {{ $profile->location }}
                                </p>
                            </div>
                        </div>

                        <!-- Download CV & Hire Buttons -->
                        <div class="grid grid-cols-2 gap-3 pt-2">
                            <a 
                                href="{{ route('download.cv') }}" 
                                class="py-3 px-4 rounded-xl gradient-btn font-semibold text-xs text-white text-center flex items-center justify-center gap-1.5 transition">
                                <i data-lucide="download" class="w-4 h-4"></i>
                                <span>{{ __('portfolio.about.download_cv') }}</span>
                            </a>
                            <a 
                                href="#contact" 
                                class="py-3 px-4 rounded-xl glass-panel border border-[#8B5CF6]/30 hover:border-[#8B5CF6]/60 font-semibold text-xs text-[#A1A1AA] hover:text-white text-center flex items-center justify-center gap-1.5 transition">
                                <i data-lucide="send" class="w-4 h-4 text-[#8B5CF6]"></i>
                                <span>{{ __('portfolio.about.hire_me') }}</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Right: Bio & Career Goals -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="glass-card rounded-3xl p-6 sm:p-8 space-y-4">
                        <h3 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                            <i data-lucide="sparkles" class="w-5 h-5 text-[#8B5CF6]"></i>
                            <span>{{ app()->getLocale() === 'bn' ? 'আমার পরিচিতি ও উদ্দেশ্য' : 'My Background & Purpose' }}</span>
                        </h3>
                        <p class="text-sm sm:text-base text-[#A1A1AA] leading-relaxed">
                            {{ $profile->bio }}
                        </p>
                        <p class="text-sm sm:text-base text-[#A1A1AA] leading-relaxed">
                            {{ $profile->about }}
                        </p>
                    </div>

                    <!-- Career Goals Card -->
                    <div class="glass-card rounded-3xl p-6 sm:p-8 space-y-3 border-l-4 border-l-[#8B5CF6]">
                        <h4 class="text-base sm:text-lg font-bold text-white flex items-center gap-2">
                            <i data-lucide="target" class="w-5 h-5 text-[#EC4899]"></i>
                            <span>{{ __('portfolio.about.career_goals_title') }}</span>
                        </h4>
                        <p class="text-xs sm:text-sm text-[#A1A1AA] leading-relaxed">
                            {{ $profile->career_goals }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4.3 SKILLS SECTION -->
    <section id="skills" class="py-20 relative bg-[#111426]/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                    {{ __('portfolio.skills.badge') }}
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-white">
                    {{ __('portfolio.skills.title') }}
                </h2>
                <p class="text-sm sm:text-base text-[#A1A1AA]">
                    {{ __('portfolio.skills.subtitle') }}
                </p>
            </div>

            <!-- Categories Tabs / Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- 1. Digital Marketing Skills -->
                <div class="glass-card rounded-3xl p-6 sm:p-8 space-y-6">
                    <div class="flex items-center gap-3 pb-4 border-b border-white/5">
                        <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/20 border border-[#8B5CF6]/30 flex items-center justify-center text-[#8B5CF6]">
                            <i data-lucide="trending-up" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">{{ __('portfolio.skills.digital_marketing') }}</h3>
                            <span class="text-xs text-[#A1A1AA] font-medium">Growth & Traffic</span>
                        </div>
                    </div>

                    <div class="space-y-5">
                        @if (isset($skills['Digital Marketing']))
                            @foreach ($skills['Digital Marketing'] as $skill)
                                <div class="space-y-1.5">
                                    <div class="flex items-center justify-between text-xs font-semibold">
                                        <span class="text-white flex items-center gap-1.5">
                                            <i data-lucide="{{ $skill->icon ?: 'target' }}" class="w-3.5 h-3.5 text-[#8B5CF6]"></i>
                                            {{ $skill->name }}
                                        </span>
                                        <span class="text-[#8B5CF6] font-mono">{{ $skill->proficiency_percent }}%</span>
                                    </div>
                                    <div class="w-full h-2 rounded-full bg-slate-800/80 overflow-hidden">
                                        <div 
                                            class="h-full rounded-full bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] transition-all duration-1000"
                                            style="width: {{ $skill->proficiency_percent }}%;">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- 2. Development Skills -->
                <div class="glass-card rounded-3xl p-6 sm:p-8 space-y-6">
                    <div class="flex items-center gap-3 pb-4 border-b border-white/5">
                        <div class="w-10 h-10 rounded-xl bg-[#EC4899]/20 border border-[#EC4899]/30 flex items-center justify-center text-[#EC4899]">
                            <i data-lucide="code" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">{{ __('portfolio.skills.development') }}</h3>
                            <span class="text-xs text-[#A1A1AA] font-medium">Full-Stack Tech</span>
                        </div>
                    </div>

                    <div class="space-y-5">
                        @if (isset($skills['Development']))
                            @foreach ($skills['Development'] as $skill)
                                <div class="space-y-1.5">
                                    <div class="flex items-center justify-between text-xs font-semibold">
                                        <span class="text-white flex items-center gap-1.5">
                                            <i data-lucide="{{ $skill->icon ?: 'layers' }}" class="w-3.5 h-3.5 text-[#EC4899]"></i>
                                            {{ $skill->name }}
                                        </span>
                                        <span class="text-[#EC4899] font-mono">{{ $skill->proficiency_percent }}%</span>
                                    </div>
                                    <div class="w-full h-2 rounded-full bg-slate-800/80 overflow-hidden">
                                        <div 
                                            class="h-full rounded-full bg-gradient-to-r from-[#EC4899] to-[#8B5CF6] transition-all duration-1000"
                                            style="width: {{ $skill->proficiency_percent }}%;">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- 3. Creative Skills -->
                <div class="glass-card rounded-3xl p-6 sm:p-8 space-y-6">
                    <div class="flex items-center gap-3 pb-4 border-b border-white/5">
                        <div class="w-10 h-10 rounded-xl bg-[#06D4F4]/20 border border-[#06D4F4]/30 flex items-center justify-center text-[#06D4F4]">
                            <i data-lucide="palette" class="w-5 h-5"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">{{ __('portfolio.skills.creative_skills') }}</h3>
                            <span class="text-xs text-[#A1A1AA] font-medium">Media & Visuals</span>
                        </div>
                    </div>

                    <div class="space-y-5">
                        @if (isset($skills['Creative Skills']))
                            @foreach ($skills['Creative Skills'] as $skill)
                                <div class="space-y-1.5">
                                    <div class="flex items-center justify-between text-xs font-semibold">
                                        <span class="text-white flex items-center gap-1.5">
                                            <i data-lucide="{{ $skill->icon ?: 'sparkles' }}" class="w-3.5 h-3.5 text-[#06D4F4]"></i>
                                            {{ $skill->name }}
                                        </span>
                                        <span class="text-[#06D4F4] font-mono">{{ $skill->proficiency_percent }}%</span>
                                    </div>
                                    <div class="w-full h-2 rounded-full bg-slate-800/80 overflow-hidden">
                                        <div 
                                            class="h-full rounded-full bg-gradient-to-r from-[#8B5CF6] via-[#EC4899] to-[#06D4F4] transition-all duration-1000"
                                            style="width: {{ $skill->proficiency_percent }}%;">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4.4 SERVICES SECTION -->
    <section id="services" class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                    {{ __('portfolio.services.badge') }}
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-white">
                    {{ __('portfolio.services.title') }}
                </h2>
                <p class="text-sm sm:text-base text-[#A1A1AA]">
                    {{ __('portfolio.services.subtitle') }}
                </p>
            </div>

            <!-- The 8 Service Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($services as $srv)
                    <div class="glass-card rounded-2xl p-6 flex flex-col justify-between group hover:border-[#8B5CF6]/50">
                        <div>
                            <!-- Icon & Tag -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 rounded-xl gradient-btn flex items-center justify-center text-white shadow-md shadow-[#8B5CF6]/30 group-hover:scale-110 transition-transform">
                                    <i data-lucide="{{ $srv->icon ?: 'sparkles' }}" class="w-6 h-6"></i>
                                </div>
                                @if ($srv->tag)
                                    <span class="text-[10px] uppercase font-bold tracking-wider px-2.5 py-0.5 rounded-full bg-[#111426] text-[#EC4899] border border-[#EC4899]/30">
                                        {{ $srv->tag }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="text-base font-bold text-white group-hover:text-[#EC4899] transition-colors mb-2">
                                {{ $srv->title }}
                            </h3>

                            <p class="text-xs text-[#A1A1AA] leading-relaxed mb-4">
                                {{ $srv->description }}
                            </p>

                            <!-- Features List -->
                            @if ($srv->features && is_array($srv->features))
                                <ul class="space-y-1.5 mb-6">
                                    @foreach (array_slice($srv->features, 0, 3) as $feat)
                                        <li class="text-[11px] text-[#A1A1AA] flex items-start gap-1.5">
                                            <i data-lucide="check" class="w-3.5 h-3.5 text-[#8B5CF6] shrink-0 mt-0.5"></i>
                                            <span>{{ $feat }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- CTA Contact Link -->
                        <div class="pt-4 border-t border-white/5">
                            <a 
                                href="#contact" 
                                class="text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] flex items-center gap-1.5 transition">
                                <span>{{ __('portfolio.services.request_service') }}</span>
                                <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4.5 PORTFOLIO / PROJECTS SECTION -->
    <section id="portfolio" class="py-20 relative bg-[#111426]/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                    {{ __('portfolio.portfolio.badge') }}
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-white">
                    {{ __('portfolio.portfolio.title') }}
                </h2>
                <p class="text-sm sm:text-base text-[#A1A1AA]">
                    {{ __('portfolio.portfolio.subtitle') }}
                </p>
            </div>

            <!-- Livewire Project Filter Component -->
            <livewire:project-filter />

            <!-- View All Projects Button -->
            <div class="text-center mt-12">
                <a 
                    href="{{ route('projects') }}" 
                    class="inline-flex items-center gap-2 px-8 py-3.5 rounded-xl glass-panel border border-[#8B5CF6]/30 hover:border-[#8B5CF6]/60 text-sm font-bold text-white hover:bg-[#8B5CF6]/10 transition shadow-lg">
                    <span>{{ app()->getLocale() === 'bn' ? 'সকল প্রজেক্ট দেখুন' : 'Explore Full Project Archive' }}</span>
                    <i data-lucide="arrow-right" class="w-4 h-4 text-[#8B5CF6]"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- 4.6 EXPERIENCE & ACHIEVEMENTS SECTION -->
    <section id="experience" class="py-20 relative" x-data="{ tab: 'work' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 space-y-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                    {{ __('portfolio.experience.badge') }}
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-white">
                    {{ __('portfolio.experience.title') }}
                </h2>
                <p class="text-sm sm:text-base text-[#A1A1AA]">
                    {{ __('portfolio.experience.subtitle') }}
                </p>
            </div>

            <!-- Tabs Switcher -->
            <div class="flex items-center justify-center gap-2 mb-12">
                <button 
                    @click="tab = 'work'" 
                    type="button" 
                    :class="{ 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-lg': tab === 'work', 'glass-panel text-[#A1A1AA] hover:text-white': tab !== 'work' }"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition cursor-pointer">
                    <i data-lucide="briefcase" class="w-4 h-4 inline-block mr-1.5"></i>
                    {{ __('portfolio.experience.work_tab') }}
                </button>

                <button 
                    @click="tab = 'education'" 
                    type="button" 
                    :class="{ 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-lg': tab === 'education', 'glass-panel text-[#A1A1AA] hover:text-white': tab !== 'education' }"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition cursor-pointer">
                    <i data-lucide="graduation-cap" class="w-4 h-4 inline-block mr-1.5"></i>
                    {{ __('portfolio.experience.edu_tab') }}
                </button>

                <button 
                    @click="tab = 'certs'" 
                    type="button" 
                    :class="{ 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-lg': tab === 'certs', 'glass-panel text-[#A1A1AA] hover:text-white': tab !== 'certs' }"
                    class="px-5 py-2.5 rounded-full text-xs sm:text-sm font-semibold transition cursor-pointer">
                    <i data-lucide="award" class="w-4 h-4 inline-block mr-1.5"></i>
                    {{ __('portfolio.experience.cert_tab') }}
                </button>
            </div>

            <!-- Tab 1: Work Experience -->
            <div x-show="tab === 'work'" class="max-w-4xl mx-auto space-y-6">
                @foreach ($experiences as $exp)
                    <div class="glass-card rounded-2xl p-6 sm:p-8 relative">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                            <div>
                                <h3 class="text-lg sm:text-xl font-bold text-white">{{ $exp->role }}</h3>
                                <p class="text-sm font-semibold text-[#8B5CF6]">{{ $exp->company }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="px-3 py-1 rounded-full text-xs font-mono font-medium bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                                    {{ $exp->period ?: ($exp->is_current ? __('portfolio.experience.present') : '') }}
                                </span>
                                <span class="px-2.5 py-0.5 rounded-md text-[11px] font-semibold bg-[#171B33] text-[#A1A1AA]">
                                    {{ $exp->type }}
                                </span>
                            </div>
                        </div>

                        <p class="text-xs sm:text-sm text-[#A1A1AA] leading-relaxed mb-4">
                            {{ $exp->description }}
                        </p>

                        @if ($exp->achievements && is_array($exp->achievements))
                            <ul class="space-y-1.5 pt-2 border-t border-white/5">
                                @foreach ($exp->achievements as $ach)
                                    <li class="text-xs text-[#A1A1AA] flex items-start gap-2">
                                        <i data-lucide="chevron-right" class="w-3.5 h-3.5 text-[#EC4899] shrink-0 mt-0.5"></i>
                                        <span>{{ $ach }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Tab 2: Education -->
            <div x-show="tab === 'education'" style="display: none;" class="max-w-4xl mx-auto space-y-6">
                @foreach ($educations as $edu)
                    <div class="glass-card rounded-2xl p-6 sm:p-8">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3">
                            <div>
                                <h3 class="text-lg sm:text-xl font-bold text-white">{{ $edu->degree }}</h3>
                                <p class="text-sm font-semibold text-[#8B5CF6]">{{ $edu->institution }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-mono font-medium bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30 self-start sm:self-auto">
                                {{ $edu->period }}
                            </span>
                        </div>

                        @if ($edu->field_of_study)
                            <p class="text-xs text-[#EC4899] font-medium mb-2">
                                {{ $edu->field_of_study }}
                                @if ($edu->grade)
                                    &bull; <span class="text-emerald-400">{{ $edu->grade }}</span>
                                @endif
                            </p>
                        @endif

                        <p class="text-xs sm:text-sm text-[#A1A1AA] leading-relaxed">
                            {{ $edu->description }}
                        </p>
                    </div>
                @endforeach
            </div>

            <!-- Tab 3: Certifications -->
            <div x-show="tab === 'certs'" style="display: none;" class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($certifications as $cert)
                    <div class="glass-card rounded-2xl p-6 flex flex-col justify-between">
                        <div>
                            <div class="w-10 h-10 rounded-xl bg-[#8B5CF6]/20 border border-[#8B5CF6]/30 flex items-center justify-center text-[#8B5CF6] mb-4">
                                <i data-lucide="award" class="w-5 h-5"></i>
                            </div>
                            <h3 class="text-base font-bold text-white mb-1">{{ $cert->title }}</h3>
                            <p class="text-xs font-semibold text-[#EC4899] mb-3">{{ $cert->issuer }}</p>
                            @if ($cert->credential_id)
                                <p class="text-[11px] font-mono text-[#A1A1AA]">
                                    {{ __('portfolio.experience.id') }}: {{ $cert->credential_id }}
                                </p>
                            @endif
                        </div>

                        @if ($cert->credential_url)
                            <div class="pt-4 mt-4 border-t border-white/5">
                                <a 
                                    href="{{ $cert->credential_url }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer" 
                                    class="text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] flex items-center gap-1 transition">
                                    <span>{{ __('portfolio.experience.credential_link') }}</span>
                                    <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 4.7 BLOG SECTION -->
    <section id="blog" class="py-20 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-14 space-y-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                    {{ __('portfolio.blog.badge') }}
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-white">
                    {{ __('portfolio.blog.title') }}
                </h2>
                <p class="text-sm sm:text-base text-[#A1A1AA]">
                    {{ __('portfolio.blog.subtitle') }}
                </p>
            </div>

            <!-- 3 Latest Posts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($latestPosts as $post)
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

                                <h3 class="text-base font-bold text-white group-hover:text-[#EC4899] transition-colors mb-2 line-clamp-2">
                                    <a href="{{ route('blog.detail', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>

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
                @endforeach
            </div>

            <!-- View All Blogs Link -->
            <div class="text-center mt-12">
                <a 
                    href="{{ route('blog') }}" 
                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl glass-panel border border-[#8B5CF6]/30 text-xs font-bold text-white hover:border-[#8B5CF6]/60 hover:bg-[#8B5CF6]/10 transition">
                    <span>{{ app()->getLocale() === 'bn' ? 'সকল ব্লগ নিবন্ধ পড়ুন' : 'Browse All Articles' }}</span>
                    <i data-lucide="arrow-right" class="w-4 h-4 text-[#8B5CF6]"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- 4.8 CONTACT SECTION (PRD WhatsApp, Email, Form, Rate Limiting) -->
    <section id="contact" class="py-20 relative bg-[#111426]/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <span class="px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest bg-[#111426] text-[#8B5CF6] border border-[#8B5CF6]/30">
                    {{ __('portfolio.contact.badge') }}
                </span>
                <h2 class="text-2xl sm:text-4xl font-black text-white">
                    {{ __('portfolio.contact.title') }}
                </h2>
                <p class="text-sm sm:text-base text-[#A1A1AA]">
                    {{ __('portfolio.contact.subtitle') }}
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                <!-- Left: Quick Contact Info & Direct Links -->
                <div class="lg:col-span-5 space-y-6">
                    <!-- WhatsApp Highlight Box -->
                    <div class="p-6 rounded-2xl glass-card border border-emerald-500/30 bg-emerald-950/10">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 rounded-xl bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                                <i data-lucide="message-circle" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-white">WhatsApp</h4>
                                <p class="text-xs text-emerald-400 font-mono">{{ $profile->whatsapp_number ?: '+8801938267920' }}</p>
                            </div>
                        </div>
                        <p class="text-xs text-[#A1A1AA] mb-4">
                            {{ __('portfolio.contact.whatsapp_note') }}
                        </p>
                        <a 
                            href="{{ $profile->whatsapp_link ?: 'https://wa.me/8801938267920' }}" 
                            target="_blank" 
                            rel="noopener noreferrer" 
                            class="w-full py-3 px-4 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-white font-bold text-xs flex items-center justify-center gap-2 shadow-lg shadow-emerald-500/25 transition">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            <span>{{ __('portfolio.contact.chat_whatsapp') }}</span>
                        </a>
                    </div>

                    <!-- Direct Email Box (with Mailto button, Mail icon, and Copy Email button) -->
                    <div class="p-6 rounded-2xl glass-card" x-data="{ copied: false }">
                        <div class="flex items-center gap-4 mb-3">
                            <div class="w-12 h-12 rounded-xl bg-[#8B5CF6]/20 flex items-center justify-center text-[#8B5CF6] shrink-0">
                                <i data-lucide="mail" class="w-6 h-6"></i>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h4 class="text-base font-bold text-white">{{ __('portfolio.contact.send_email') }}</h4>
                                <a href="mailto:ashikaaktar99@gmail.com" class="text-xs sm:text-sm font-semibold text-[#8B5CF6] hover:text-[#EC4899] transition block truncate">
                                    ashikaaktar99@gmail.com
                                </a>
                            </div>
                        </div>
                        <p class="text-xs text-[#A1A1AA] mb-4">
                            {{ app()->getLocale() === 'bn' ? 'সাধারণত ১২ ঘণ্টার মধ্যে উত্তর দেওয়া হয়।' : 'Usually replied within 12 hours.' }}
                        </p>

                        <!-- Action Buttons: Clickable Mailto Button & Copy Email Button -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2.5 pt-3 border-t border-white/5">
                            <a 
                                href="mailto:ashikaaktar99@gmail.com" 
                                class="w-full py-2.5 px-3 rounded-xl gradient-btn text-white font-semibold text-xs flex items-center justify-center gap-1.5 transition shadow-sm hover:scale-[1.02] active:scale-95">
                                <i data-lucide="mail" class="w-3.5 h-3.5"></i>
                                <span>{{ app()->getLocale() === 'bn' ? 'ইমেইল পাঠান' : 'Send Email' }}</span>
                            </a>
                            <button 
                                type="button" 
                                @click="navigator.clipboard.writeText('ashikaaktar99@gmail.com'); copied = true; setTimeout(() => copied = false, 2500)"
                                class="w-full py-2.5 px-3 rounded-xl glass-panel border border-[#8B5CF6]/30 hover:border-[#8B5CF6]/60 text-white font-semibold text-xs flex items-center justify-center gap-1.5 transition cursor-pointer hover:scale-[1.02] active:scale-95">
                                <span x-show="!copied" class="inline-flex items-center gap-1.5">
                                    <i data-lucide="copy" class="w-3.5 h-3.5 text-[#8B5CF6]"></i>
                                    <span>{{ app()->getLocale() === 'bn' ? 'ইমেইল কপি' : 'Copy Email' }}</span>
                                </span>
                                <span x-show="copied" style="display: none;" class="inline-flex items-center gap-1.5 text-emerald-400">
                                    <i data-lucide="check" class="w-3.5 h-3.5"></i>
                                    <span>{{ app()->getLocale() === 'bn' ? 'কপি হয়েছে!' : 'Copied!' }}</span>
                                </span>
                            </button>
                        </div>
                    </div>

                    <!-- Location & Availability -->
                    <div class="p-6 rounded-2xl glass-card">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-xl bg-[#EC4899]/20 flex items-center justify-center text-[#EC4899]">
                                <i data-lucide="map-pin" class="w-6 h-6"></i>
                            </div>
                            <div>
                                <h4 class="text-base font-bold text-white">
                                    {{ app()->getLocale() === 'bn' ? 'অবস্থান' : 'Location' }}
                                </h4>
                                <p class="text-xs text-[#A1A1AA]">
                                    {{ $profile->location }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Livewire Contact Form -->
                <div class="lg:col-span-7">
                    <div class="glass-card rounded-3xl p-6 sm:p-8">
                        <h3 class="text-xl font-bold text-white mb-2">
                            {{ __('portfolio.contact.form_title') }}
                        </h3>
                        <p class="text-xs text-[#A1A1AA] mb-6">
                            {{ app()->getLocale() === 'bn' ? 'ফর্মটি পূরণ করুন এবং আপনার প্রজেক্ট সম্পর্কে জানান।' : 'Fill out the form below and I will get back to you promptly.' }}
                        </p>

                        <!-- Livewire Component -->
                        <livewire:contact-form />
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
