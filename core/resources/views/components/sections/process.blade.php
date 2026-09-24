@php
    $p = config('content.process');
    $icons = ['search', 'layout', 'code', 'check-circle', 'rocket'];
@endphp

<section id="surec" class="section-y relative scroll-mt-24 overflow-hidden">
    <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-72 bg-gradient-to-b from-brand-50/60 to-transparent"></div>

    <div class="container-page">
        <x-section-heading :eyebrow="$p['eyebrow']" :title="$p['title']" :description="$p['description']" />

        <div class="relative mt-12 lg:mt-16">
            {{-- Masaüstü bağlantı çizgisi --}}
            <div class="absolute inset-x-0 top-7 hidden lg:block">
                <div class="h-0.5 w-full origin-left bg-gradient-to-r from-brand-500 via-brand-400 to-accent"
                     x-intersect.once="$el.style.transform='scaleX(1)'"
                     style="transform:scaleX(0); transition: transform 1.6s var(--ease-out-expo) .15s"></div>
            </div>

            {{-- Mobil / tablet dikey çizgi --}}
            <div class="process-timeline-line absolute left-7 top-7 w-0.5 origin-top bg-gradient-to-b from-brand-500 via-brand-400 to-accent lg:hidden"
                 style="bottom:3.5rem; transform:scaleY(0); transition: transform 1.4s var(--ease-out-expo) .1s"
                 x-intersect.once="$el.style.transform='scaleY(1)'"></div>

            <ol class="relative flex flex-col gap-8 sm:gap-10 lg:grid lg:grid-cols-5 lg:gap-5">
                @foreach ($p['steps'] as $item)
                    <li class="reveal process-step group relative flex gap-4 sm:gap-5 lg:block"
                        x-intersect.once="$el.classList.add('in')"
                        style="transition-delay: {{ $loop->index * 120 }}ms">

                        <div class="relative z-10 shrink-0">
                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white text-brand-600 shadow-card ring-1 ring-ink-100 transition duration-500 group-hover:-translate-y-1 group-hover:bg-gradient-to-br group-hover:from-brand-600 group-hover:to-brand-800 group-hover:text-white group-hover:ring-transparent group-hover:shadow-brand">
                                <x-icon :name="$icons[$loop->index % count($icons)]" class="h-6 w-6" />
                                <span class="absolute -right-2 -top-2 grid h-6 w-6 place-items-center rounded-full bg-brand-600 text-[0.7rem] font-bold text-white ring-2 ring-white">{{ $item['no'] }}</span>
                            </div>
                        </div>

                        <div class="min-w-0 flex-1 pt-0.5 lg:mt-5 lg:pt-0">
                            <h3 class="text-base font-bold text-ink-900 sm:text-lg">{{ $item['title'] }}</h3>
                            <p class="mt-1.5 text-sm leading-relaxed text-ink-500 sm:mt-2">{{ $item['desc'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>

        <div class="mt-10 flex justify-center sm:mt-14">
            <a href="/iletisim" class="btn btn-primary group relative w-full overflow-hidden sm:w-auto">
                <span class="relative z-10">Ücretsiz keşif görüşmesi başlatın</span>
                <x-icon name="arrow-right" class="relative z-10 h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                <span class="absolute inset-0 -z-0 w-1/3 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-sheen"></span>
            </a>
        </div>
    </div>
</section>
