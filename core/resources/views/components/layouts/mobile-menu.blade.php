@php
    $nav = config('site.nav');
    $contact = config('site.contact');
    $cta = config('site.cta');
    $social = config('site.social');
@endphp

{{-- ====================== MOBİL MENÜ (lg altı) ====================== --}}
<div class="lg:hidden" x-cloak>

    {{-- Karartma katmanı --}}
    <div
        x-show="$store.ui.mobileOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="$store.ui.closeMobile()"
        class="fixed inset-0 z-[1040] bg-ink-950/40 backdrop-blur-sm"
        aria-hidden="true"
    ></div>

    {{-- Kayan panel --}}
    <div
        id="mobile-menu"
        x-show="$store.ui.mobileOpen"
        x-transition:enter="transition transform ease-[cubic-bezier(0.16,1,0.3,1)] duration-400"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition transform ease-in duration-250"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        x-trap="$store.ui.mobileOpen"
        @keydown.escape.window="$store.ui.closeMobile()"
        class="fixed inset-y-0 right-0 z-[1050] flex h-[100dvh] w-[min(22rem,92vw)] flex-col bg-white shadow-elevated"
        role="dialog"
        aria-modal="true"
        aria-label="Mobil menü"
    >
        {{-- Panel başlığı --}}
        <div class="flex items-center justify-between border-b border-ink-100 px-5 py-4">
            <x-brand-logo variant="mobile" />
            <button
                type="button"
                class="grid h-10 w-10 place-items-center rounded-full border border-ink-200 text-ink-700 transition hover:border-brand-300 hover:text-brand-700"
                @click="$store.ui.closeMobile()"
                aria-label="Menüyü kapat"
            >
                <x-icon name="close" class="h-5 w-5" />
            </button>
        </div>

        {{-- Kaydırılabilir menü gövdesi --}}
        <div class="flex-1 overflow-y-auto overscroll-contain px-3 py-4">
            <ul class="space-y-0.5">
                @foreach ($nav as $item)
                    @if (!empty($item['children']))
                        <li x-data="{ expanded: false }">
                            <button
                                type="button"
                                class="flex w-full items-center justify-between rounded-2xl px-4 py-3.5 text-left text-base font-semibold text-ink-900 transition hover:bg-ink-50"
                                @click="expanded = !expanded"
                                :aria-expanded="expanded"
                            >
                                {{ $item['label'] }}
                                <x-icon name="chevron-down" class="h-5 w-5 text-ink-400 transition-transform duration-300"
                                        x-bind:class="expanded ? 'rotate-180' : ''" />
                            </button>
                            <div x-show="expanded" x-collapse x-cloak>
                                <ul class="space-y-0.5 pb-2 pl-3">
                                    @foreach ($item['children'] as $child)
                                        <li>
                                            <a href="{{ $child['href'] }}"
                                               @click="$store.ui.closeMobile()"
                                               class="flex items-center gap-3 rounded-xl px-4 py-2.5 text-[0.9375rem] text-ink-600 transition hover:bg-brand-50 hover:text-brand-700">
                                                <span class="grid h-8 w-8 shrink-0 place-items-center rounded-lg bg-brand-50 text-brand-600">
                                                    <x-icon :name="$child['icon'] ?? 'sparkles'" class="h-4 w-4" />
                                                </span>
                                                {{ $child['label'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ $item['href'] }}"
                               @click="$store.ui.closeMobile()"
                               @class([
                                   'block rounded-2xl px-4 py-3.5 text-base font-semibold text-ink-900 transition hover:bg-ink-50',
                                   'text-brand-700 bg-brand-50' => !empty($item['match']) && request()->is(trim($item['match'], '/') ?: '/'),
                               ])>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

        {{-- Alt aksiyon bölümü --}}
        <div class="space-y-4 border-t border-ink-100 px-5 py-5">
            <div class="grid gap-2.5">
                <a href="{{ $cta['primary']['href'] }}" @click="$store.ui.closeMobile()" class="btn btn-primary w-full">
                    {{ $cta['primary']['label'] }}
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
                <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener"
                   class="btn btn-ghost w-full">
                    <x-icon name="whatsapp" class="h-5 w-5 text-emerald-500" />
                    WhatsApp ile yazın
                </a>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ $contact['phone_href'] }}" class="inline-flex items-center gap-2 text-sm font-medium text-ink-600 transition hover:text-brand-700">
                    <x-icon name="phone" class="h-4 w-4" /> {{ $contact['phone'] }}
                </a>
                <div class="flex items-center gap-1.5">
                    @foreach ($social as $item)
                        <a href="{{ $item['href'] }}" target="_blank" rel="noopener"
                           aria-label="{{ $item['label'] }}"
                           class="grid h-9 w-9 place-items-center rounded-full border border-ink-200 text-ink-500 transition hover:border-brand-300 hover:text-brand-700">
                            <x-icon :name="$item['icon']" class="h-4 w-4" />
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
