@php
    $contact = config('site.contact');
    $brand = config('site.brand');
    $widget = config('site.whatsapp_widget');
    $waUrl = $contact['whatsapp'] . '?text=' . rawurlencode($widget['prefill'] ?? '');
@endphp

@if ($widget['enabled'] ?? true)
    <div
        x-data="whatsappWidget({ delay: {{ (int) ($widget['delay_ms'] ?? 2800) }}, soundEnabled: {{ ($widget['sound_enabled'] ?? true) ? 'true' : 'false' }} })"
        x-init="init()"
        x-cloak
        class="wa-widget fixed bottom-5 left-4 z-[45] sm:bottom-8 sm:left-6"
        aria-live="polite"
    >
        {{-- Mesaj kutusu --}}
        <div
            x-show="open"
            x-transition:enter="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-500"
            x-transition:enter-start="opacity-0 translate-y-4 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
            x-transition:leave-end="opacity-0 translate-y-3 scale-95"
            class="wa-widget-card mb-3 w-[min(calc(100vw-2rem),19rem)] overflow-hidden rounded-2xl border border-emerald-100/80 bg-white shadow-[0_24px_60px_-24px_rgba(16,185,129,0.45),0_12px_32px_-16px_rgba(15,23,42,0.18)]"
            role="complementary"
            aria-label="WhatsApp mesaj kutusu"
        >
            {{-- Üst bar --}}
            <div class="relative flex items-center gap-3 bg-gradient-to-r from-emerald-600 to-emerald-500 px-4 py-3.5 text-white">
                <div class="relative shrink-0">
                    <span class="grid h-10 w-10 place-items-center overflow-hidden rounded-full border-2 border-white/30 bg-white/15">
                        <img src="{{ asset($brand['favicon']) }}" alt="" class="h-7 w-7 object-contain" width="28" height="28">
                    </span>
                    <span class="absolute -bottom-0.5 -right-0.5 h-3 w-3 rounded-full border-2 border-emerald-600 bg-emerald-300"></span>
                </div>
                <div class="min-w-0 flex-1">
                    <p class="truncate text-sm font-semibold">{{ $widget['agent_name'] }}</p>
                    <p class="truncate text-[11px] text-emerald-50/90">{{ $widget['agent_status'] }}</p>
                </div>
                <button
                    type="button"
                    class="grid h-8 w-8 shrink-0 place-items-center rounded-full text-white/80 transition hover:bg-white/15 hover:text-white"
                    @click="close()"
                    aria-label="Mesaj kutusunu kapat"
                >
                    <x-icon name="x" class="h-4 w-4" />
                </button>
            </div>

            {{-- Mesaj alanı --}}
            <div class="space-y-3 bg-[#ece5dd] px-4 py-4">
                <div class="wa-widget-bubble relative max-w-[92%] rounded-2xl rounded-tl-md bg-white px-3.5 py-2.5 shadow-sm">
                    <div x-show="typing" class="flex items-center gap-1 py-1" aria-hidden="true">
                        <span class="wa-typing-dot"></span>
                        <span class="wa-typing-dot" style="animation-delay: 0.15s"></span>
                        <span class="wa-typing-dot" style="animation-delay: 0.3s"></span>
                    </div>
                    <p
                        x-show="!typing"
                        x-transition:enter="transition ease-out duration-400 delay-100"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        class="text-[13px] leading-relaxed text-ink-800"
                    >
                        {{ $widget['message'] }}
                    </p>
                    <span class="absolute -left-2 top-3 h-0 w-0 border-y-[6px] border-r-8 border-y-transparent border-r-white"></span>
                </div>

                <p class="text-center text-[10px] font-medium uppercase tracking-wider text-ink-400/80">Şimdi</p>

                <a
                    href="{{ $waUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="flex w-full items-center justify-center gap-2 rounded-xl bg-emerald-500 px-4 py-2.5 text-sm font-semibold text-white shadow-[0_8px_24px_-8px_rgba(16,185,129,0.65)] transition hover:bg-emerald-600 active:scale-[0.98]"
                >
                    <x-icon name="whatsapp" class="h-4 w-4" />
                    {{ $widget['cta'] }}
                </a>
            </div>
        </div>

        {{-- WhatsApp butonu --}}
        <div class="relative flex items-end">
            <span class="wa-widget-pulse pointer-events-none absolute inset-0 rounded-full" aria-hidden="true"></span>
            <span class="wa-widget-pulse wa-widget-pulse--delayed pointer-events-none absolute inset-0 rounded-full" aria-hidden="true"></span>

            <button
                type="button"
                @click="toggle()"
                class="wa-widget-fab relative grid h-14 w-14 place-items-center rounded-full bg-emerald-500 text-white shadow-[0_12px_32px_-8px_rgba(16,185,129,0.75)] transition hover:bg-emerald-600 hover:scale-105 active:scale-95 sm:h-[3.75rem] sm:w-[3.75rem]"
                :aria-expanded="open"
                aria-label="WhatsApp mesaj kutusunu aç"
            >
                <x-icon name="whatsapp" class="h-7 w-7" />
                <span
                    x-show="!open && hasUnread"
                    x-transition
                    class="absolute -right-0.5 -top-0.5 grid h-5 min-w-5 place-items-center rounded-full border-2 border-white bg-red-500 px-1 text-[10px] font-bold text-white"
                >1</span>
            </button>
        </div>
    </div>
@endif
