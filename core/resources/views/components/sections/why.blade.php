@php $w = config('content.why'); @endphp

<section id="neden-biz" class="section-y relative scroll-mt-24 overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('/images/why-bg.png');">
    {{-- Arka plan hafif karartma perdesi --}}
    <div class="pointer-events-none absolute inset-0 bg-slate-950/35 backdrop-blur-[1px]"></div>

    <div class="container-page relative z-10">
        <div class="grid gap-12 lg:grid-cols-[0.95fr_1.55fr] lg:gap-16">
            {{-- Sol: başlık + öne çıkan istatistik --}}
            <div class="lg:sticky lg:top-28 lg:self-start">
                <x-section-heading align="left" tone="light" :eyebrow="$w['eyebrow']" :title="$w['title']" :description="$w['description']" />

                <div class="reveal mt-8 grid grid-cols-2 gap-3" x-intersect.once="$el.classList.add('in')">
                    <div class="rounded-2xl border border-white/20 bg-white/10 p-5 backdrop-blur-md shadow-lg">
                        <div class="text-3xl font-extrabold text-amber-300">8+</div>
                        <div class="mt-1 text-sm text-white/90">Yıllık deneyim</div>
                    </div>
                    <div class="rounded-2xl border border-white/20 bg-white/10 p-5 backdrop-blur-md shadow-lg">
                        <div class="text-3xl font-extrabold text-amber-300">250+</div>
                        <div class="mt-1 text-sm text-white/90">Mutlu müşteri</div>
                    </div>
                </div>

                <a href="/hakkimizda" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-white transition hover:text-amber-200">
                    <span class="link-underline">Bizi daha yakından tanıyın</span>
                    <x-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>

            {{-- Sağ: gerekçe kartları --}}
            <div class="grid gap-5 sm:grid-cols-2">
                @foreach ($w['items'] as $item)
                    <article
                        class="reveal spotlight group relative overflow-hidden rounded-3xl border border-white/40 bg-white/95 p-7 shadow-elevated transition duration-500 hover:-translate-y-1.5 hover:border-brand-400 hover:shadow-2xl"
                        x-intersect.once="$el.classList.add('in')"
                        @mousemove="$el.style.setProperty('--mx', $event.offsetX + 'px'); $el.style.setProperty('--my', $event.offsetY + 'px')"
                        style="transition-delay: {{ $loop->index * 90 }}ms">

                        <span class="pointer-events-none absolute -right-2 -top-4 bg-gradient-to-br from-brand-200 to-brand-100 bg-clip-text text-7xl font-extrabold text-transparent opacity-70 transition duration-500 group-hover:opacity-100">{{ $item['no'] }}</span>

                        <div class="relative flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-600 to-brand-800 text-white shadow-brand transition duration-500 group-hover:scale-110 group-hover:-rotate-6">
                            <x-icon :name="$item['icon']" class="h-7 w-7" />
                        </div>

                        <h3 class="relative mt-6 text-lg font-bold text-ink-900">{{ $item['title'] }}</h3>
                        <p class="relative mt-2.5 text-sm leading-relaxed text-ink-600">{{ $item['desc'] }}</p>

                        <span class="relative mt-5 inline-flex h-8 w-8 items-center justify-center rounded-full border border-ink-200 text-brand-600 transition duration-500 group-hover:border-brand-600 group-hover:bg-brand-600 group-hover:text-white">
                            <x-icon name="arrow-up-right" class="h-4 w-4" />
                        </span>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
