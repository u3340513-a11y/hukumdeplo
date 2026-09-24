@php

    $st = config('content.stats');

    $featured = $st['items'][2];

    $supporting = collect($st['items'])->except(2)->values();

    $items = collect([$featured])->concat($supporting);

@endphp



<section id="istatistikler" class="stats-section section-y relative scroll-mt-24 overflow-hidden">

    <div class="pointer-events-none absolute inset-0 -z-10">

        <div class="absolute inset-0 stats-section-bg"></div>

        <div class="absolute inset-0 bg-grid opacity-[0.06]"></div>

        <div class="absolute -left-24 top-1/4 h-96 w-96 rounded-full bg-brand-600/25 blur-[120px]"></div>

        <div class="absolute -right-16 bottom-0 h-80 w-80 rounded-full bg-brand-400/20 blur-[100px]"></div>

        <div class="absolute left-1/2 top-0 h-64 w-[40rem] -translate-x-1/2 rounded-full bg-brand-500/10 blur-[80px]"></div>

    </div>



    <div class="container-page relative">

        <x-section-heading

            align="center"

            tone="light"

            class="mx-auto"

            :eyebrow="$st['eyebrow']"

            :title="$st['title']"

            :description="$st['description']"

        />



        <div class="stats-grid reveal mt-12 grid gap-4 sm:mt-14 sm:grid-cols-2 sm:gap-5 xl:grid-cols-4 xl:gap-6"

             x-intersect.once="$el.classList.add('in')">

            @foreach ($items as $item)

                @php $isFeatured = $loop->first; @endphp

                <article

                    @class([

                        'stats-card group relative overflow-hidden rounded-2xl p-6 transition duration-500 sm:p-7',

                        'stats-card--featured text-white' => $isFeatured,

                        'stats-card--default' => ! $isFeatured,

                    ])

                    style="transition-delay: {{ $loop->index * 80 }}ms"

                >

                    @if ($isFeatured)

                        <div class="pointer-events-none absolute inset-0 stats-card-featured-bg"></div>

                        <div class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-white/10 blur-2xl"></div>

                    @endif



                    <div class="relative">

                        <span @class([

                            'grid h-11 w-11 place-items-center rounded-xl ring-1 transition duration-500',

                            'bg-white/15 text-white ring-white/20 group-hover:bg-white/20' => $isFeatured,

                            'bg-brand-50 text-brand-600 ring-brand-100 group-hover:bg-brand-600 group-hover:text-white group-hover:ring-transparent' => ! $isFeatured,

                        ])>

                            <x-icon :name="$item['icon']" class="h-5 w-5" />

                        </span>



                        <div

                            class="mt-5 text-[clamp(2.5rem,1.8rem+2.5vw,3.25rem)] font-extrabold leading-none tracking-tight tabular-nums"

                            x-data="counter({{ $item['value'] }})"

                            x-intersect.once="start()"

                        >

                            <span x-text="display">0</span><span @class([

                                'text-brand-300' => $isFeatured,

                                'text-brand-600' => ! $isFeatured,

                            ])>{{ $item['suffix'] }}</span>

                        </div>



                        <p @class([

                            'mt-2.5 text-sm font-semibold',

                            'text-white/85' => $isFeatured,

                            'text-ink-600' => ! $isFeatured,

                        ])>{{ $item['label'] }}</p>



                        @if ($isFeatured)

                            <p class="mt-3 text-xs leading-relaxed text-white/55">

                                Kurumsal web ve e-ticaret projelerinden oluşan referans portföyümüz.

                            </p>

                        @else

                            <span class="mt-5 block h-0.5 w-8 rounded-full bg-brand-100 transition-all duration-500 group-hover:w-full group-hover:bg-gradient-to-r group-hover:from-brand-500 group-hover:to-brand-400"></span>

                        @endif

                    </div>

                </article>

            @endforeach

        </div>



        <p class="reveal mx-auto mt-10 max-w-xl text-center text-sm leading-relaxed text-white/50 sm:mt-12"

           x-intersect.once="$el.classList.add('in')">

            Her yıl <strong class="font-semibold text-white/75">yüzlerce proje</strong> teslim ediyor,

            müşteri memnuniyetini ölçülebilir sonuçlarla takip ediyoruz.

        </p>

    </div>

</section>

