<div>
    @if ($isSubmitted)
        <div class="p-6 rounded-2xl glass-card border border-emerald-500/40 bg-emerald-950/20 text-center animate-fade-in">
            <div class="w-14 h-14 mx-auto mb-4 rounded-full bg-emerald-500/20 flex items-center justify-center text-emerald-400">
                <i data-lucide="check-circle" class="w-8 h-8"></i>
            </div>
            <h4 class="text-xl font-bold text-white mb-2">
                {{ app()->getLocale() === 'bn' ? 'বার্তা সফলভাবে পাঠানো হয়েছে!' : 'Message Sent Successfully!' }}
            </h4>
            <p class="text-[#A1A1AA] text-sm max-w-md mx-auto mb-6">
                {{ __('portfolio.contact.success') }}
            </p>
            <button 
                type="button" 
                wire:click="$set('isSubmitted', false)" 
                class="px-5 py-2.5 rounded-xl text-xs font-semibold uppercase tracking-wider text-[#8B5CF6] bg-[#8B5CF6]/10 hover:bg-[#8B5CF6]/20 border border-[#8B5CF6]/30 transition">
                {{ app()->getLocale() === 'bn' ? 'আরেকটি বার্তা পাঠান' : 'Send Another Message' }}
            </button>
        </div>
    @else
        <form wire:submit="submit" class="space-y-4">
            @if ($errors->has('rate_limit'))
                <div class="p-4 rounded-xl bg-rose-950/40 border border-rose-500/40 text-rose-300 text-sm">
                    {{ $errors->first('rate_limit') }}
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-[#A1A1AA] uppercase tracking-wider mb-1.5">
                        {{ __('portfolio.contact.name') }} <span class="text-[#EC4899]">*</span>
                    </label>
                    <input 
                        type="text" 
                        wire:model="name"
                        placeholder="{{ __('portfolio.contact.name_placeholder') }}" 
                        class="w-full px-4 py-3 rounded-xl glass-input text-sm @error('name') border-rose-500/60 @enderror"
                        required
                    >
                    @error('name')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-xs font-semibold text-[#A1A1AA] uppercase tracking-wider mb-1.5">
                        {{ __('portfolio.contact.email') }} <span class="text-[#EC4899]">*</span>
                    </label>
                    <input 
                        type="email" 
                        wire:model="email"
                        placeholder="{{ __('portfolio.contact.email_placeholder') }}" 
                        class="w-full px-4 py-3 rounded-xl glass-input text-sm @error('email') border-rose-500/60 @enderror"
                        required
                    >
                    @error('email')
                        <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#A1A1AA] uppercase tracking-wider mb-1.5">
                    {{ __('portfolio.contact.subject') }} <span class="text-[#EC4899]">*</span>
                </label>
                <input 
                    type="text" 
                    wire:model="subject"
                    placeholder="{{ __('portfolio.contact.subject_placeholder') }}" 
                    class="w-full px-4 py-3 rounded-xl glass-input text-sm @error('subject') border-rose-500/60 @enderror"
                    required
                >
                @error('subject')
                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#A1A1AA] uppercase tracking-wider mb-1.5">
                    {{ __('portfolio.contact.message') }} <span class="text-[#EC4899]">*</span>
                </label>
                <textarea 
                    wire:model="message"
                    rows="4"
                    placeholder="{{ __('portfolio.contact.message_placeholder') }}" 
                    class="w-full px-4 py-3 rounded-xl glass-input text-sm @error('message') border-rose-500/60 @enderror"
                    required
                ></textarea>
                @error('message')
                    <p class="text-xs text-rose-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button 
                type="submit" 
                wire:loading.attr="disabled"
                class="w-full py-3.5 px-6 rounded-xl gradient-btn font-semibold text-sm text-white flex items-center justify-center gap-2 group cursor-pointer transition">
                <span wire:loading.remove>
                    <i data-lucide="send" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                    {{ __('portfolio.contact.send_button') }}
                </span>
                <span wire:loading class="flex items-center gap-2">
                    <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ __('portfolio.contact.sending') }}
                </span>
            </button>
        </form>
    @endif
</div>
