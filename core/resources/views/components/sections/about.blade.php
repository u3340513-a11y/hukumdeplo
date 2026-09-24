@php
    $a = config('content.about');
    $stats = config('content.stats.items');
@endphp

<section id="hakkimizda" class="section-y relative scroll-mt-24">
    <div class="container-page">
        <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">
            {{-- Görsel taraf --}}
            <div class="relative" x-data="{ show: false }" x-intersect.once="show = true"
                 :class="show ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-6'"
                 style="transition: all .7s var(--ease-out-expo)">
                <div class="gradient-ring shadow-elevated">
                    <div class="relative overflow-hidden rounded-[calc(1.75rem-1px)] bg-ink-900 p-8">
                        <div class="absolute inset-0 bg-grid opacity-[0.08]"></div>
                        <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-brand-600/40 blur-3xl"></div>

                        <div class="relative grid grid-cols-2 gap-4">
                            @foreach ($stats as $stat)
                                <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                                    <div class="text-3xl font-extrabold text-white">
                                        {{ $stat['value'] }}<span class="text-accent">{{ $stat['suffix'] }}</span>
                                    </div>
                                    <div class="mt-1 text-sm text-white/60">{{ $stat['label'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Metin taraf --}}
            <div x-data="{ show: false }" x-intersect.once="show = true"
                 :class="show ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-6'"
                 style="transition: all .7s var(--ease-out-expo)">
                <span class="eyebrow"><span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>{{ $a['eyebrow'] }}</span>
                <h2 class="mt-4 text-h2 font-extrabold tracking-tight text-ink-900">{{ $a['title'] }}</h2>
                <p class="mt-5 text-lead text-ink-500">{{ $a['description'] }}</p>

                <ul class="mt-8 grid gap-3 sm:grid-cols-2">
                    @foreach ($a['points'] as $point)
                        <li class="flex items-center gap-3 rounded-2xl border border-ink-100 bg-surface-muted px-4 py-3.5">
                            <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full bg-brand-600 text-white">
                                <x-icon name="check" class="h-4 w-4" />
                            </span>
                            <span class="text-sm font-medium text-ink-700">{{ $point }}</span>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-9 flex flex-wrap gap-3">
                    <a href="/iletisim" class="btn btn-primary">Ücretsiz Teklif Alın <x-icon name="arrow-right" class="h-4 w-4" /></a>
                    <a href="/hakkimizda" class="btn btn-ghost">Daha Fazla Bilgi</a>
                </div>
            </div>
        </div>
    </div>
</section>
