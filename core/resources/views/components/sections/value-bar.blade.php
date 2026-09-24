@php
    $items = [
        ['icon' => 'bolt', 'title' => '3 İş Gününde Teslim', 'desc' => 'Hızlı ve zamanında'],
        ['icon' => 'wallet', 'title' => 'Şeffaf Fiyatlandırma', 'desc' => 'Gizli ücret yok'],
        ['icon' => 'headset', 'title' => 'Ömür Boyu Destek', 'desc' => 'Ücretsiz teknik destek'],
        ['icon' => 'shield', 'title' => '%100 Garantili Sonuç', 'desc' => 'Memnuniyet odaklı'],
    ];
@endphp

<section class="value-bar-bridge relative z-20 -mt-10 mb-8 sm:-mt-12 sm:mb-10 lg:-mt-14 lg:mb-12" aria-label="Öne çıkan avantajlar">
    <div class="container-page">
        <div class="value-bar-card overflow-hidden rounded-[1.75rem] border border-white/90 bg-white/95 shadow-[0_24px_60px_-28px_rgba(15,23,42,0.35)] ring-1 ring-ink-900/[0.05] backdrop-blur-xl">
            <div class="grid divide-y divide-ink-100/90 sm:grid-cols-2 sm:divide-x sm:divide-y-0 lg:grid-cols-4">
                @foreach ($items as $item)
                    <div class="group flex items-center gap-4 px-6 py-5 transition duration-300 hover:bg-brand-50/60 sm:px-5 sm:py-6 lg:px-6"
                         x-data="{ show: false }" x-intersect.once="show = true"
                         :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-3'"
                         style="transition: opacity .55s var(--ease-out-expo), transform .55s var(--ease-out-expo), background-color .3s; transition-delay: {{ $loop->index * 70 }}ms">
                        <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-gradient-to-br from-brand-50 to-brand-100/80 text-brand-600 ring-1 ring-brand-100/80 transition duration-300 group-hover:from-brand-600 group-hover:to-brand-700 group-hover:text-white group-hover:ring-transparent group-hover:shadow-brand">
                            <x-icon :name="$item['icon']" class="h-5 w-5" />
                        </span>
                        <div class="min-w-0">
                            <div class="text-sm font-bold tracking-tight text-ink-900">{{ $item['title'] }}</div>
                            <div class="mt-0.5 text-xs text-ink-500">{{ $item['desc'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
