@extends('layouts.app')

@section('title', 'Curriculum Vitae – Ashika | Digital Marketer & Developer')

@section('content')
    <div class="py-12 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6 flex items-center justify-between">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 text-xs font-semibold text-[#8B5CF6] hover:text-[#EC4899] transition">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                <span>{{ app()->getLocale() === 'bn' ? 'হোমে ফিরে যান' : 'Back to Portfolio' }}</span>
            </a>
            <button onclick="window.print()" class="px-4 py-2 rounded-xl gradient-btn text-xs font-bold text-white flex items-center gap-1.5 cursor-pointer">
                <i data-lucide="printer" class="w-4 h-4"></i>
                <span>{{ app()->getLocale() === 'bn' ? 'সিভি প্রিন্ট / সংরক্ষণ' : 'Print / Save as PDF' }}</span>
            </button>
        </div>

        <div class="glass-card rounded-3xl p-8 sm:p-12 space-y-8 bg-[#111426]/90 text-white border border-[#8B5CF6]/20 shadow-2xl">
            <!-- Header -->
            <div class="border-b border-white/10 pb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-black text-white">ASHIKA</h1>
                    <p class="text-base text-[#8B5CF6] font-semibold">{{ $profile->title }}</p>
                    <p class="text-xs text-[#A1A1AA] mt-1">{{ $profile->location }} &bull; {{ $profile->phone }} &bull; {{ $profile->email }}</p>
                </div>
                <div class="text-right">
                    <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">
                        {{ __('portfolio.about.verified_pro') }}
                    </span>
                </div>
            </div>

            <!-- Summary -->
            <div class="space-y-2">
                <h2 class="text-sm font-bold uppercase tracking-widest text-[#EC4899]">Executive Summary</h2>
                <p class="text-xs sm:text-sm leading-relaxed text-[#A1A1AA]">{{ $profile->bio }}</p>
            </div>

            <!-- Core Competencies -->
            <div class="space-y-3">
                <h2 class="text-sm font-bold uppercase tracking-widest text-[#EC4899]">Core Competencies</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 text-xs">
                    <div class="p-3 rounded-xl bg-[#171B33]/60 border border-white/5">
                        <strong class="text-white block mb-1">Development</strong>
                        PHP, Laravel 13, MySQL, Livewire, Tailwind CSS, JavaScript, REST APIs
                    </div>
                    <div class="p-3 rounded-xl bg-[#171B33]/60 border border-white/5">
                        <strong class="text-white block mb-1">Digital Marketing</strong>
                        SEO, Meta Ads (Facebook & IG), Google Ads, Google Analytics 4, Pixel/CAPI
                    </div>
                    <div class="p-3 rounded-xl bg-[#171B33]/60 border border-white/5">
                        <strong class="text-white block mb-1">Creative & AI</strong>
                        Video Editing, AI Video Creation, Graphic Design, Brand Architecture
                    </div>
                </div>
            </div>

            <!-- Contact & Social -->
            <div class="border-t border-white/10 pt-6 flex flex-wrap items-center justify-between text-xs text-[#A1A1AA] gap-2">
                <span>WhatsApp: {{ $profile->whatsapp_number }}</span>
                <span>Email: {{ $profile->email }}</span>
                <span>Portfolio: {{ url('/') }}</span>
            </div>
        </div>
    </div>
@endsection
