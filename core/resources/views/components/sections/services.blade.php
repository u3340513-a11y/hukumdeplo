@php
    $s = config('content.services');
    $serviceImages = [
        'web-tasarim' => 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=600&h=400&fit=crop',
        'e-ticaret' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=600&h=400&fit=crop',
        'mobil-uygulama' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=600&h=400&fit=crop',
        'ozel-yazilim' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&h=400&fit=crop',
        'seo' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop',
        'sosyal-medya' => 'https://images.unsplash.com/photo-1611926653458-09294b3142bf?w=600&h=400&fit=crop',
        'google-ads' => 'https://images.unsplash.com/photo-1533750349088-cd871a92f312?w=600&h=400&fit=crop',
        'bilisim-danismanligi' => 'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=600&h=400&fit=crop',
        'urunlerimiz' => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=600&h=400&fit=crop',
    ];
@endphp
<section id="hizmetler" class="section-y relative scroll-mt-24 overflow-hidden">
    {{-- Üst yumuşak ışıma — value-bar köprüsüyle hizalı --}}
    <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[28rem] bg-gradient-to-b from-brand-50/50 via-brand-50/20 to-transparent"></div>

    <div class="container-page">
        {{-- Başlık + yan CTA --}}
        <div class="flex flex-col items-start justify-between gap-6 lg:flex-row lg:items-end">
            <x-section-heading align="left" :eyebrow="$s['eyebrow']" :title="$s['title']" :description="$s['description']" />
            <a href="/hizmetler" class="btn btn-ghost shrink-0">Tüm hizmetler <x-icon name="arrow-right" class="h-4 w-4" /></a>
        </div>

        <div class="services-grid mt-14 gap-5">
            @foreach ($s['items'] as $item)
                <article
                    class="group relative flex flex-col overflow-hidden rounded-2xl sm:rounded-3xl border border-ink-200 bg-white transition duration-500 hover:-translate-y-1.5 hover:border-transparent hover:shadow-elevated"
                    x-data="{ show: false }" x-intersect.once="show = true"
                    :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-8'"
                    style="transition: opacity .6s var(--ease-out-expo), transform .6s var(--ease-out-expo); transition-delay: {{ ($loop->index % 3) * 90 }}ms">

                    {{-- Üst Görsel Alanı --}}
                    <div class="relative h-40 sm:h-48 w-full overflow-hidden shrink-0">
                        <img 
                            src="{{ $serviceImages[$item['slug']] ?? 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop' }}" 
                            alt="{{ $item['title'] }}"
                            class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105"
                            loading="lazy"
                        />
                        <div class="absolute inset-0 bg-ink-950/20 transition-colors duration-500 group-hover:bg-ink-950/10"></div>
                        
                        {{-- Hover gradient zemin --}}
                        <div class="pointer-events-none absolute inset-0 -z-0 bg-gradient-to-t from-ink-950/80 to-transparent opacity-0 transition duration-500 group-hover:opacity-100"></div>
                        {{-- Üst aksan çizgisi --}}
                        <span class="absolute inset-x-0 top-0 h-1 origin-left scale-x-0 bg-gradient-to-r from-brand-600 to-accent transition-transform duration-500 group-hover:scale-x-100 z-10"></span>
                    </div>

                    {{-- İçerik Alanı --}}
                    <div class="p-5 sm:p-7 flex flex-col flex-1 relative bg-white transition-colors duration-500 group-hover:bg-brand-50/10">
                        <div class="relative flex h-12 w-12 sm:h-14 sm:w-14 items-center justify-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-500 group-hover:scale-105 group-hover:bg-gradient-to-br group-hover:from-brand-600 group-hover:to-brand-800 group-hover:text-white group-hover:ring-transparent group-hover:shadow-brand -mt-11 sm:-mt-14 mb-2 shadow-lg ring-offset-2 ring-offset-white z-10">
                            <x-icon :name="$item['icon']" class="h-6 w-6 sm:h-7 sm:w-7" />
                        </div>

                        <h3 class="relative mt-2 text-lg sm:text-xl font-bold text-ink-900">{{ $item['title'] }}</h3>
                        <p class="relative mt-2 sm:mt-3 text-xs sm:text-sm leading-relaxed text-ink-500">{{ $item['desc'] }}</p>

                        <ul class="relative mt-5 space-y-2 border-t border-ink-100 pt-5 flex-1">
                            @foreach ($item['features'] as $feature)
                                <li class="flex items-center gap-2.5 text-sm text-ink-600">
                                    <span class="grid h-5 w-5 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-600">
                                        <x-icon name="check" class="h-3.5 w-3.5" />
                                    </span>
                                    {{ $feature }}
                                </li>
                            @endforeach
                        </ul>

                        <a href="/hizmetler/{{ $item['slug'] }}" class="relative mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700">
                            <span class="link-underline">Detaylı bilgi alın</span>
                            <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
