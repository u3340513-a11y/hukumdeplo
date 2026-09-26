@php $pr = config('content.pricing'); @endphp

<section id="fiyatlar" class="section-y relative scroll-mt-24">
    <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-96 bg-gradient-to-b from-brand-50/60 to-transparent"></div>

    <div class="container-page">
        <x-section-heading :eyebrow="$pr['eyebrow']" :title="$pr['title']" :description="$pr['description']" />

        <div class="mx-auto mt-6 flex max-w-2xl justify-center px-4">
            <a href="https://wa.me/905326962120?text={{ urlencode('Merhaba, web tasarım ve e-ticaret paketleriniz hakkında bilgi almak istiyorum.') }}" target="_blank" rel="noopener noreferrer" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD');" class="inline-flex items-center gap-2 rounded-full border border-brand-200/80 bg-brand-50/90 px-4 py-2 text-center text-xs sm:text-sm font-medium text-brand-800 transition hover:bg-brand-100 hover:border-brand-300">
                <x-icon name="bolt" class="h-4 w-4 shrink-0 text-brand-600" />
                <span>{{ $pr['note'] }}</span>
            </a>
        </div>

        <div class="mt-14 grid items-stretch gap-6 lg:grid-cols-3">
            @foreach ($pr['plans'] as $plan)
                <article
                    @class([
                        'relative flex flex-col rounded-3xl p-8 transition duration-500',
                        'border-2 border-brand-600 bg-white shadow-elevated lg:-mt-4 lg:mb-4' => $plan['popular'],
                        'border border-ink-200 bg-white shadow-card hover:-translate-y-1 hover:shadow-elevated' => ! $plan['popular'],
                    ])
                    x-data="{ show: false }" x-intersect.once="show = true"
                    :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                    style="transition: opacity .6s var(--ease-out-expo), transform .6s var(--ease-out-expo); transition-delay: {{ $loop->index * 100 }}ms">

                    @if ($plan['popular'])
                        <span class="absolute -top-3.5 left-1/2 -translate-x-1/2 rounded-full bg-gradient-to-r from-brand-600 to-brand-800 px-4 py-1.5 text-xs font-bold uppercase tracking-wide text-white shadow-brand">
                            En Popüler
                        </span>
                    @endif

                    <h3 class="text-lg font-bold text-ink-900">{{ $plan['name'] }} Paket</h3>
                    <p class="mt-2 text-sm text-ink-500">{{ $plan['desc'] }}</p>

                    <div class="mt-6 flex items-end gap-1.5">
                        <span class="text-4xl font-extrabold tracking-tight text-ink-900">{{ $plan['price'] }}₺</span>
                        <span class="mb-1 text-sm font-medium text-ink-400">/ {{ $plan['period'] }}</span>
                    </div>
                    <p class="mt-2 inline-flex items-center gap-1.5 text-sm text-ink-500">
                        <x-icon name="clock" class="h-4 w-4 text-brand-500" /> {{ $plan['delivery'] }}
                    </p>

                    <a href="/iletisim?paket={{ urlencode($plan['name']) }}"
                       @class([
                           'btn mt-7 w-full',
                           'btn-primary' => $plan['popular'],
                           'btn-ghost' => ! $plan['popular'],
                       ])>
                        Bu Paketi Seçin
                    </a>

                    <ul class="mt-8 space-y-3 border-t border-ink-100 pt-7">
                        @foreach ($plan['features'] as $feature)
                            <li class="flex items-start gap-3 text-sm text-ink-600">
                                <span class="mt-0.5 grid h-5 w-5 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-600">
                                    <x-icon name="check" class="h-3.5 w-3.5" />
                                </span>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>
