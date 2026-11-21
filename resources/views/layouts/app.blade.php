<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden w-full max-w-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ASHIKA – Digital Marketer & Developer')</title>
    <meta name="description" content="@yield('meta_description', 'Official portfolio of Ashika – Digital Marketer & Developer. Custom Laravel web applications, SEO, Facebook & Google Ads, and AI Video solutions.')">
    <meta name="keywords" content="Ashika, Digital Marketer, Laravel Developer, SEO, Meta Ads, Google Ads, Full-Stack, Bangladesh">
    <meta name="author" content="Ashika">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', 'ASHIKA – Digital Marketer & Developer')">
    <meta property="og:description" content="@yield('og_description', 'I Build Digital Experiences & Grow Businesses.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-cover.jpg'))">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'ASHIKA – Digital Marketer & Developer')">
    <meta name="twitter:description" content="@yield('og_description', 'I Build Digital Experiences & Grow Businesses.')">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>✨</text></svg>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        html, body {
            overflow-x: hidden !important;
            max-width: 100vw !important;
            width: 100% !important;
            position: relative;
        }
        body {
            font-family: 'Plus Jakarta Sans', {{ app()->getLocale() === 'bn' ? "'Hind Siliguri'," : "" }} system-ui, sans-serif;
        }
        a {
            color: inherit;
            text-decoration: none;
        }
    </style>

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Person",
        "name": "Ashika",
        "jobTitle": "Digital Marketer & Developer",
        "url": "{{ url('/') }}",
        "sameAs": [
            "https://linkedin.com/in/ashika",
            "https://github.com/ashika",
            "https://facebook.com/ashika.digital"
        ],
        "knowsAbout": ["Digital Marketing", "Web Development", "Laravel", "SEO", "Meta Ads", "Google Ads"]
    }
    </script>
</head>
<body class="bg-[#080B18] text-[#FFFFFF] antialiased overflow-x-hidden w-full max-w-full selection:bg-[#8B5CF6] selection:text-white relative min-h-screen">

    <!-- Decorative Background FX Layer (Strictly contained to prevent horizontal scroll / cut-off) -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0 w-full h-full">
        <!-- Floating Particles Canvas -->
        <canvas id="particles-canvas" class="w-full h-full"></canvas>

        <!-- Animated Flying Birds -->
        <div class="bird-container bird-container-1">
            <div class="bird"></div>
        </div>
        <div class="bird-container bird-container-2">
            <div class="bird"></div>
        </div>
        <div class="bird-container bird-container-3">
            <div class="bird"></div>
        </div>

        <!-- Ambient Glowing Orbs -->
        <div class="ambient-glow-1 top-10 left-[-80px]"></div>
        <div class="ambient-glow-2 top-[35%] right-[-80px]"></div>
        <div class="ambient-glow-1 bottom-[15%] left-[5%]"></div>
    </div>

    <!-- Navigation Header -->
    <header x-data="{ mobileOpen: false, scrolled: false }" 
            x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
            :class="{ 'bg-[#080B18]/90 backdrop-blur-xl border-b border-[#8B5CF6]/20 py-3 shadow-lg shadow-black/40': scrolled, 'bg-transparent py-5': !scrolled }"
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 rounded-xl gradient-btn flex items-center justify-center font-extrabold text-lg text-white shadow-md shadow-[#8B5CF6]/30 group-hover:scale-105 transition-transform">
                        A
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-black tracking-wider text-white flex items-center gap-1">
                            ASHIKA
                            <span class="w-1.5 h-1.5 rounded-full bg-[#EC4899] animate-pulse"></span>
                        </span>
                        <span class="text-[10px] uppercase font-bold tracking-widest text-[#EC4899] -mt-1">
                            {{ app()->getLocale() === 'bn' ? 'মার্কেটার ও ডেভেলপার' : 'Marketer & Dev' }}
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden md:flex items-center gap-1 lg:gap-2 px-3 py-1.5 rounded-full glass-panel border border-white/10 shadow-inner">
                    <a href="{{ route('home') }}#home" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#A1A1AA] hover:text-white hover:bg-white/10 transition">
                        {{ __('portfolio.nav.home') }}
                    </a>
                    <a href="{{ route('home') }}#about" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#A1A1AA] hover:text-white hover:bg-white/10 transition">
                        {{ __('portfolio.nav.about') }}
                    </a>
                    <a href="{{ route('home') }}#skills" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#A1A1AA] hover:text-white hover:bg-white/10 transition">
                        {{ __('portfolio.nav.skills') }}
                    </a>
                    <a href="{{ route('home') }}#services" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#A1A1AA] hover:text-white hover:bg-white/10 transition">
                        {{ __('portfolio.nav.services') }}
                    </a>
                    <a href="{{ route('home') }}#portfolio" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#A1A1AA] hover:text-white hover:bg-white/10 transition">
                        {{ __('portfolio.nav.portfolio') }}
                    </a>
                    <a href="{{ route('home') }}#experience" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#A1A1AA] hover:text-white hover:bg-white/10 transition">
                        {{ __('portfolio.nav.experience') }}
                    </a>
                    <a href="{{ route('home') }}#blog" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#A1A1AA] hover:text-white hover:bg-white/10 transition">
                        {{ __('portfolio.nav.blog') }}
                    </a>
                    <a href="{{ route('home') }}#contact" class="px-3.5 py-1.5 rounded-full text-xs font-semibold text-[#A1A1AA] hover:text-white hover:bg-white/10 transition">
                        {{ __('portfolio.nav.contact') }}
                    </a>
                </nav>

                <!-- Actions: Language Switcher & Let's Talk Button -->
                <div class="hidden md:flex items-center gap-3">
                    <!-- Language Switcher -->
                    <div class="flex items-center p-1 rounded-xl glass-panel border border-white/10">
                        <a 
                            href="{{ route('locale.switch', 'en') }}" 
                            class="px-2.5 py-1 rounded-lg text-xs font-bold transition {{ app()->getLocale() === 'en' ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-sm' : 'text-[#A1A1AA] hover:text-white' }}">
                            EN
                        </a>
                        <a 
                            href="{{ route('locale.switch', 'bn') }}" 
                            class="px-2.5 py-1 rounded-lg text-xs font-bold transition {{ app()->getLocale() === 'bn' ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white shadow-sm' : 'text-[#A1A1AA] hover:text-white' }}">
                            বাং
                        </a>
                    </div>

                    <!-- Let's Talk CTA -->
                    <a href="{{ route('home') }}#contact" class="px-5 py-2.5 rounded-xl gradient-btn text-xs font-bold text-white flex items-center gap-1.5 transition">
                        <i data-lucide="message-square" class="w-3.5 h-3.5"></i>
                        <span>{{ __('portfolio.nav.lets_talk') }}</span>
                    </a>
                </div>

                <!-- Mobile Hamburger Button -->
                <div class="flex md:hidden items-center gap-2">
                    <!-- Mobile Language Switcher -->
                    <div class="flex items-center p-0.5 rounded-lg glass-panel border border-white/10">
                        <a 
                            href="{{ route('locale.switch', 'en') }}" 
                            class="px-2 py-0.5 rounded text-[11px] font-bold {{ app()->getLocale() === 'en' ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white' : 'text-[#A1A1AA]' }}">
                            EN
                        </a>
                        <a 
                            href="{{ route('locale.switch', 'bn') }}" 
                            class="px-2 py-0.5 rounded text-[11px] font-bold {{ app()->getLocale() === 'bn' ? 'bg-gradient-to-r from-[#8B5CF6] to-[#EC4899] text-white' : 'text-[#A1A1AA]' }}">
                            বাং
                        </a>
                    </div>

                    <button 
                        @click="mobileOpen = !mobileOpen" 
                        type="button" 
                        class="p-2.5 rounded-xl glass-panel text-[#A1A1AA] hover:text-white border border-white/10 focus:outline-none"
                        aria-label="Toggle navigation menu">
                        <i x-show="!mobileOpen" data-lucide="menu" class="w-5 h-5"></i>
                        <i x-show="mobileOpen" data-lucide="x" class="w-5 h-5" style="display: none;"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div 
            x-show="mobileOpen" 
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-4"
            @click.away="mobileOpen = false" 
            class="md:hidden glass-panel border-b border-[#8B5CF6]/20 px-6 py-6 mt-3 space-y-3 shadow-2xl"
            style="display: none;">
            <a @click="mobileOpen = false" href="{{ route('home') }}#home" class="block py-2 text-sm font-semibold text-[#A1A1AA] hover:text-[#EC4899] border-b border-white/5">
                {{ __('portfolio.nav.home') }}
            </a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#about" class="block py-2 text-sm font-semibold text-[#A1A1AA] hover:text-[#EC4899] border-b border-white/5">
                {{ __('portfolio.nav.about') }}
            </a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#skills" class="block py-2 text-sm font-semibold text-[#A1A1AA] hover:text-[#EC4899] border-b border-white/5">
                {{ __('portfolio.nav.skills') }}
            </a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#services" class="block py-2 text-sm font-semibold text-[#A1A1AA] hover:text-[#EC4899] border-b border-white/5">
                {{ __('portfolio.nav.services') }}
            </a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#portfolio" class="block py-2 text-sm font-semibold text-[#A1A1AA] hover:text-[#EC4899] border-b border-white/5">
                {{ __('portfolio.nav.portfolio') }}
            </a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#experience" class="block py-2 text-sm font-semibold text-[#A1A1AA] hover:text-[#EC4899] border-b border-white/5">
                {{ __('portfolio.nav.experience') }}
            </a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#blog" class="block py-2 text-sm font-semibold text-[#A1A1AA] hover:text-[#EC4899] border-b border-white/5">
                {{ __('portfolio.nav.blog') }}
            </a>
            <a @click="mobileOpen = false" href="{{ route('home') }}#contact" class="block py-2 text-sm font-semibold text-[#A1A1AA] hover:text-[#EC4899] border-b border-white/5">
                {{ __('portfolio.nav.contact') }}
            </a>

            <div class="pt-2">
                <a @click="mobileOpen = false" href="{{ route('home') }}#contact" class="w-full py-3 rounded-xl gradient-btn text-center text-sm font-bold text-white flex items-center justify-center gap-2">
                    <i data-lucide="message-square" class="w-4 h-4"></i>
                    <span>{{ __('portfolio.nav.lets_talk') }}</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="relative z-10 pt-20">
        @yield('content')
    </main>

    <!-- WhatsApp Floating Action Button (PRD Requirement) -->
    <aside aria-label="WhatsApp Contact" class="fixed bottom-6 right-6 z-40 group">
        <a 
            href="https://wa.me/8801938267920" 
            target="_blank" 
            rel="noopener noreferrer" 
            title="Chat with Ashika on WhatsApp (+8801938267920)"
            class="w-14 h-14 rounded-full bg-emerald-500 hover:bg-emerald-400 text-white flex items-center justify-center shadow-xl shadow-emerald-500/30 hover:scale-110 active:scale-95 transition-all">
            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.634.06-1.579-.311-.994-.39-1.928-1.282-2.39-1.897-.061-.082-.472-.631-.472-1.203 0-.572.299-.854.405-.97.106-.116.233-.146.311-.146.078 0 .156 0 .224.004.072.004.168-.027.263.201.099.239.336.822.366.883.03.061.05.132.01.212-.041.08-.061.13-.121.2-.061.07-.128.156-.183.21-.061.061-.125.127-.054.249.071.122.316.52.678.842.466.415.859.544.981.605.122.061.194.053.266-.03.072-.084.311-.362.394-.486.083-.124.167-.104.281-.062.114.042.724.341.849.403.125.062.208.093.239.146.03.053.03.309-.114.714z"/>
            </svg>
            <span class="absolute right-16 top-2.5 px-3 py-1 rounded-lg bg-slate-900/90 text-emerald-400 text-xs font-semibold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none border border-emerald-500/20 shadow-lg">
                WhatsApp: +8801938267920
            </span>
        </a>
    </aside>

    <!-- Footer -->
    <footer class="mt-28 border-t border-[#8B5CF6]/15 bg-[#080B18] relative z-10 pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <!-- Col 1: Brand Info -->
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-9 h-9 rounded-xl gradient-btn flex items-center justify-center font-extrabold text-base text-white">
                            A
                        </div>
                        <span class="text-xl font-black tracking-wider text-white">
                            ASHIKA
                        </span>
                    </div>
                    <p class="text-[#A1A1AA] text-sm max-w-md leading-relaxed mb-6">
                        {{ __('portfolio.footer.tagline') }}
                    </p>
                    <div class="flex items-center gap-3">
                        <a href="https://wa.me/8801938267920" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg glass-panel flex items-center justify-center text-[#A1A1AA] hover:text-emerald-400 hover:border-emerald-500/40 transition">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                        </a>
                        <a href="https://linkedin.com/in/ashika" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg glass-panel flex items-center justify-center text-[#A1A1AA] hover:text-[#06D4F4] hover:border-[#06D4F4]/40 transition">
                            <i data-lucide="linkedin" class="w-4 h-4"></i>
                        </a>
                        <a href="https://github.com/ashika" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg glass-panel flex items-center justify-center text-[#A1A1AA] hover:text-white hover:border-[#8B5CF6]/40 transition">
                            <i data-lucide="github" class="w-4 h-4"></i>
                        </a>
                        <a href="https://facebook.com/ashika.digital" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-lg glass-panel flex items-center justify-center text-[#A1A1AA] hover:text-[#EC4899] hover:border-[#EC4899]/40 transition">
                            <i data-lucide="facebook" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-[#EC4899] mb-4">
                        {{ __('portfolio.footer.quick_links') }}
                    </h4>
                    <ul class="space-y-2 text-sm text-[#A1A1AA]">
                        <li><a href="{{ route('home') }}#about" class="hover:text-white transition">{{ __('portfolio.nav.about') }}</a></li>
                        <li><a href="{{ route('home') }}#skills" class="hover:text-white transition">{{ __('portfolio.nav.skills') }}</a></li>
                        <li><a href="{{ route('home') }}#services" class="hover:text-white transition">{{ __('portfolio.nav.services') }}</a></li>
                        <li><a href="{{ route('projects') }}" class="hover:text-white transition">{{ __('portfolio.nav.portfolio') }}</a></li>
                        <li><a href="{{ route('blog') }}" class="hover:text-white transition">{{ __('portfolio.nav.blog') }}</a></li>
                    </ul>
                </div>

                <!-- Col 3: Contact Info -->
                <div>
                    <h4 class="text-xs font-bold uppercase tracking-widest text-[#EC4899] mb-4">
                        {{ __('portfolio.footer.contact_info') }}
                    </h4>
                    <ul class="space-y-3 text-sm text-[#A1A1AA]">
                        <li class="flex items-center gap-2">
                            <i data-lucide="phone" class="w-4 h-4 text-[#8B5CF6]"></i>
                            <a href="tel:+8801938267920" class="hover:text-white transition">+8801938267920</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="mail" class="w-4 h-4 text-[#8B5CF6]"></i>
                            <a href="mailto:ashikaaktar99@gmail.com" class="hover:text-white transition">ashikaaktar99@gmail.com</a>
                        </li>
                        <li class="flex items-center gap-2">
                            <i data-lucide="map-pin" class="w-4 h-4 text-[#8B5CF6]"></i>
                            <span>{{ app()->getLocale() === 'bn' ? 'ঢাকা, বাংলাদেশ' : 'Dhaka, Bangladesh' }}</span>
                        </li>
                        <li class="pt-2">
                            <a href="/admin" class="text-xs text-[#71717A] hover:text-[#8B5CF6] transition flex items-center gap-1">
                                <i data-lucide="lock" class="w-3 h-3"></i> Admin Control Panel
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between text-xs text-[#71717A] gap-4">
                <p>&copy; {{ date('Y') }} ASHIKA. {{ __('portfolio.footer.rights') }}</p>
                <p>{{ __('portfolio.footer.built_with') }}</p>
            </div>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
