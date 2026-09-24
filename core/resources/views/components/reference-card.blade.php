@props([
    'item',
    'delay' => 0,
    'reveal' => 'reveal',
])

<a href="{{ $item['url'] }}"
   target="_blank"
   rel="noopener noreferrer"
   {{ $attributes->merge(['class' => "$reveal ref-card-anchor group relative block overflow-hidden rounded-2xl sm:rounded-3xl border border-ink-200 bg-white shadow-card transition duration-500 hover:-translate-y-1.5 hover:shadow-elevated w-full"]) }}
   @if ($reveal === 'reveal')
       x-intersect.once="$el.classList.add('in')"
   @endif
   @if ($delay)
       style="transition-delay: {{ $delay }}ms"
   @endif
   aria-label="{{ $item['name'] }} projesini yeni sekmede aç">

    <div class="relative aspect-[16/10] overflow-hidden bg-ink-100">
        <img
            src="{{ asset($item['image']) }}"
            alt="{{ $item['name'] }} — {{ $item['category'] }}"
            class="h-full w-full object-cover object-top transition duration-700 group-hover:scale-[1.03]"
            loading="lazy"
            decoding="async"
        />
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink-950/25 via-transparent to-transparent opacity-0 transition duration-500 group-hover:opacity-100"></div>

        <span class="absolute left-3 top-3 sm:left-4 sm:top-4 rounded-full border border-white/20 bg-white/15 px-2.5 py-0.5 sm:px-3 sm:py-1 text-[0.7rem] sm:text-xs font-semibold text-white backdrop-blur">
            {{ $item['tag'] }}
        </span>

        <span class="absolute right-3 top-3 sm:right-4 sm:top-4 grid h-8 w-8 sm:h-9 sm:w-9 place-items-center rounded-full border border-white/20 bg-white/15 text-white opacity-0 backdrop-blur transition duration-500 group-hover:opacity-100">
            <x-icon name="arrow-up-right" class="h-3.5 w-3.5 sm:h-4 sm:w-4" />
        </span>

        {{-- Hover overlay --}}
        <div class="absolute inset-0 flex items-center justify-center bg-ink-950/45 opacity-0 backdrop-blur-[1px] transition duration-500 group-hover:opacity-100">
            <span class="inline-flex items-center gap-1.5 sm:gap-2 rounded-full bg-white px-4 py-2 sm:px-5 sm:py-2.5 text-xs sm:text-sm font-semibold text-ink-900 shadow-elevated">
                Siteyi ziyaret et
                <x-icon name="arrow-up-right" class="h-3.5 w-3.5 sm:h-4 sm:w-4 text-brand-600" />
            </span>
        </div>
    </div>

    <div class="flex items-center justify-between p-3.5 sm:p-5 gap-3">
        <div class="min-w-0 flex-1">
            <div class="truncate text-sm sm:text-base font-bold text-ink-900 transition group-hover:text-brand-700">{{ $item['name'] }}</div>
            <div class="mt-0.5 text-xs sm:text-sm text-ink-500 truncate">{{ $item['category'] }}</div>
        </div>
        <span class="grid h-8 w-8 sm:h-9 sm:w-9 shrink-0 place-items-center rounded-full border border-ink-200 text-brand-600 transition duration-500 group-hover:border-brand-600 group-hover:bg-brand-600 group-hover:text-white">
            <x-icon name="arrow-up-right" class="h-3.5 w-3.5 sm:h-4 sm:w-4" />
        </span>
    </div>
</a>
