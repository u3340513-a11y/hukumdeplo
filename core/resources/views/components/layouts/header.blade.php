@php
    $nav = config('site.nav');
    $contact = config('site.contact');
    $cta = config('site.cta');
    $isHome = request()->routeIs('home');
@endphp

<header
    x-data="{ isHome: @json($isHome) }"
    class="fixed top-0 left-0 right-0 z-[1000] transition-[background-color,box-shadow,backdrop-filter,border-color] duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] bg-white border-b border-ink-100"
    :class="$store.ui.scrolled ? 'shadow-[0_8px_30px_-12px_rgba(15,23,42,0.18)]' : ''"
    style="position: fixed !important; top: 0 !important; left: 0 !important; right: 0 !important; width: 100% !important; z-index: 1000 !important;"
>
    {{-- Üst fayda çubuğu --}}
    <div
        class="hidden overflow-hidden border-b transition-[max-height,opacity,background-color,border-color] duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] lg:block"
        :class="[
            $store.ui.scrolled ? 'max-h-0 opacity-0' : 'max-h-12 opacity-100',
            'border-ink-100/70 bg-ink-900 text-white'
        ]"
    >
        <div class="container-page flex h-10 items-center justify-between text-[0.8125rem]">
            <span class="inline-flex items-center gap-2 text-white/70">
                <span class="relative flex h-2 w-2">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-400"></span>
                </span>
                Ekibimiz şu an müsait · ortalama yanıt 2 saat
            </span>
            <div class="flex items-center gap-5">
                <a href="{{ $contact['phone_href'] }}" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/KUz5CKnUt-McEJS6_8pD');" class="inline-flex items-center gap-2 text-white/80 transition hover:text-white">
                    <x-icon name="phone" class="h-4 w-4" /> {{ $contact['phone'] }}
                </a>
                <span class="h-3.5 w-px bg-white/15"></span>
                <a href="mailto:{{ $contact['email'] }}" class="text-white/80 transition hover:text-white">
                    {{ $contact['email'] }}
                </a>
            </div>
        </div>
    </div>

    {{-- Ana navigasyon --}}
    <nav class="container-page" aria-label="Ana menü" x-data="{ open: null }">
        <div
            class="flex items-center justify-between transition-[height] duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
            :class="$store.ui.scrolled ? 'h-16' : 'h-20'"
        >
            {{-- Logo --}}
            <x-brand-logo />

            {{-- Masaüstü menü --}}
            <ul class="hidden items-center gap-1 lg:flex">
                @foreach ($nav as $item)
                    @if (!empty($item['children']))
                        <li class="relative" @mouseenter="open = '{{ $loop->index }}'" @mouseleave="open = null">
                            <button
                                type="button"
                                class="link-underline inline-flex items-center gap-1.5 rounded-full px-3.5 py-2 text-[0.9375rem] font-medium transition text-ink-700 hover:text-brand-700"
                                @if (!empty($item['match']) && request()->is(trim($item['match'], '/')))
                                    data-active="true"
                                @endif
                                @click="open = (open === '{{ $loop->index }}' ? null : '{{ $loop->index }}')"
                                :aria-expanded="open === '{{ $loop->index }}'"
                            >
                                {{ $item['label'] }}
                                <x-icon name="chevron-down" class="h-4 w-4 transition-transform duration-300"
                                        x-bind:class="open === '{{ $loop->index }}' ? 'rotate-180' : ''" />
                            </button>

                            <div
                                x-cloak
                                x-show="open === '{{ $loop->index }}'"
                                x-transition:enter="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-300"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-2"
                                class="absolute left-1/2 top-full z-50 w-[min(40rem,90vw)] -translate-x-1/2 pt-4"
                            >
                                <div class="overflow-hidden rounded-3xl border border-ink-100 bg-white p-3 shadow-elevated">
                                    <div class="grid grid-cols-2 gap-1">
                                        @foreach ($item['children'] as $child)
                                            <a href="{{ $child['href'] }}"
                                               class="group flex items-start gap-3 rounded-2xl p-3.5 transition duration-300 hover:bg-brand-50">
                                                <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-300 group-hover:bg-brand-600 group-hover:text-white group-hover:ring-brand-600">
                                                    <x-icon :name="$child['icon'] ?? 'sparkles'" class="h-5 w-5" />
                                                </span>
                                                <span class="min-w-0">
                                                    <span class="flex items-center gap-1 text-[0.9375rem] font-semibold text-ink-900">
                                                        {{ $child['label'] }}
                                                        <x-icon name="arrow-up-right" class="h-3.5 w-3.5 -translate-x-1 text-brand-500 opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
                                                    </span>
                                                    <span class="mt-0.5 block text-[0.8125rem] leading-snug text-ink-500">
                                                        {{ $child['desc'] ?? '' }}
                                                    </span>
                                                </span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div class="mt-2 flex items-center justify-between gap-3 rounded-2xl bg-ink-900 px-5 py-4">
                                        <p class="text-sm text-white/80">Projeniz için doğru paketi birlikte belirleyelim.</p>
                                        <a href="{{ $cta['primary']['href'] }}" class="btn btn-primary shrink-0 px-5 py-2.5 text-sm">
                                            {{ $cta['primary']['label'] }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li>
                            <a href="{{ $item['href'] }}"
                               class="link-underline inline-block rounded-full px-3.5 py-2 text-[0.9375rem] font-medium transition text-ink-700 hover:text-brand-700"
                               @if (!empty($item['match']) && request()->is(trim($item['match'], '/') ?: '/'))
                                   data-active="true" aria-current="page"
                               @endif>
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>

            {{-- Sağ aksiyonlar --}}
            <div class="flex items-center gap-2.5">
                <a href="{{ $cta['primary']['href'] }}" class="btn btn-primary hidden sm:inline-flex">
                    {{ $cta['primary']['label'] }}
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>

                <button
                    type="button"
                    class="grid h-11 w-11 place-items-center rounded-full border transition lg:hidden border-ink-200 bg-white/70 text-ink-800 hover:border-brand-300 hover:text-brand-700"
                    @click="$store.ui.toggleMobile()"
                    :aria-expanded="$store.ui.mobileOpen"
                    aria-controls="mobile-menu"
                    aria-label="Menüyü aç/kapat"
                >
                    <x-icon name="menu" class="h-5 w-5" x-show="!$store.ui.mobileOpen" />
                    <x-icon name="close" class="h-5 w-5" x-show="$store.ui.mobileOpen" x-cloak />
                </button>
            </div>
        </div>
    </nav>

    <x-layouts.mobile-menu />
</header>
