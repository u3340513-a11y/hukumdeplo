@php
    $t = config('content.testimonials');
    $hero = config('content.hero');
    $featured = $t['items'][0];
    $rest = array_slice($t['items'], 1);
    $avatars = [
        'from-brand-500 to-brand-700',
        'from-rose-500 to-pink-600',
        'from-amber-500 to-orange-600',
        'from-emerald-500 to-teal-600',
    ];
@endphp

<section id="yorumlar" class="section-y relative scroll-mt-24 overflow-hidden">
    {{-- Dekor --}}
    <div class="pointer-events-none absolute inset-0 -z-10">
        <div class="absolute inset-0 bg-dots opacity-[0.35] mask-fade-y"></div>
        <div class="absolute -left-24 top-1/4 h-72 w-72 rounded-full bg-brand-100/70 blur-[100px]"></div>
        <div class="absolute -right-24 bottom-0 h-80 w-80 rounded-full bg-brand-200/40 blur-[120px]"></div>
    </div>

    <div class="container-page">
        {{-- Başlık + güven rozeti --}}
        <div class="flex flex-col gap-8 lg:flex-row lg:items-end lg:justify-between">
            <x-section-heading
                align="left"
                class="max-w-xl"
                :eyebrow="$t['eyebrow']"
                :title="$t['title']"
                :description="$t['description']"
            />

            <div class="reveal shrink-0 rounded-2xl border border-ink-200 bg-white p-5 shadow-card sm:p-6"
                 x-intersect.once="$el.classList.add('in')">
                <div class="flex items-center gap-4">
                    <span class="grid h-14 w-14 place-items-center rounded-2xl bg-gradient-to-br from-brand-600 to-brand-800 text-white shadow-brand">
                        <svg viewBox="0 0 24 24" class="h-7 w-7" aria-hidden="true">
                            <path fill="currentColor" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 0 1-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z"/>
                            <path fill="currentColor" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="currentColor" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="currentColor" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                    </span>
                    <div>
                        <div class="flex items-center gap-1.5">
                            @for ($i = 0; $i < 5; $i++)
                                <x-icon name="star" class="h-4 w-4 text-amber-400" />
                            @endfor
                            <span class="ml-1 text-lg font-extrabold text-ink-900">{{ $hero['rating'] }}</span>
                        </div>
                        <p class="mt-1 text-sm text-ink-500">{{ $hero['rating_count'] }} doğrulanmış müşteri yorumu</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Yorum kartları --}}
        <div class="mt-12 grid items-start gap-5 lg:mt-14 lg:grid-cols-[1.15fr_1fr] lg:gap-6">
            {{-- Öne çıkan yorum --}}
            <figure class="testimonial-featured reveal-left relative flex min-h-[22rem] flex-col justify-between overflow-hidden rounded-[1.75rem] p-7 text-white sm:p-8 lg:self-stretch lg:p-10"
                    x-intersect.once="$el.classList.add('in')">
                <div class="pointer-events-none absolute inset-0 -z-0">
                    <div class="absolute inset-0 bg-grid opacity-[0.07]"></div>
                    <div class="absolute -right-20 -top-20 h-56 w-56 rounded-full bg-brand-500/35 blur-3xl"></div>
                    <div class="absolute -bottom-24 -left-16 h-48 w-48 rounded-full bg-indigo-600/25 blur-3xl"></div>
                    <div class="absolute inset-0 bg-gradient-to-br from-white/[0.06] via-transparent to-transparent"></div>
                </div>

                <div class="relative">
                    <div class="flex items-start justify-between gap-4">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-2xl bg-brand-500/20 text-brand-300 ring-1 ring-white/10">
                            <x-icon name="quote" class="h-6 w-6" />
                        </span>
                        <span class="inline-flex items-center gap-1.5 rounded-full border border-white/10 bg-white/10 px-3 py-1 text-[0.6875rem] font-semibold uppercase tracking-wider text-white/80 backdrop-blur">
                            <x-icon name="check-circle" class="h-3.5 w-3.5 text-emerald-400" />
                            Doğrulanmış
                        </span>
                    </div>

                    <div class="mt-5 flex">
                        @for ($i = 0; $i < 5; $i++)
                            <x-icon name="star" class="h-5 w-5 text-amber-400" />
                        @endfor
                    </div>

                    <blockquote class="mt-5 text-[clamp(1.25rem,1rem+0.8vw,1.75rem)] font-semibold leading-snug tracking-tight text-white">
                        “{{ $featured['quote'] }}”
                    </blockquote>
                </div>

                <figcaption class="relative mt-8 flex items-center gap-4 border-t border-white/10 pt-6">
                    <span class="grid h-12 w-12 shrink-0 place-items-center rounded-full bg-gradient-to-br {{ $avatars[0] }} text-base font-bold text-white ring-2 ring-white/15">
                        {{ mb_substr($featured['name'], 0, 1) }}
                    </span>
                    <span class="min-w-0">
                        <span class="block font-bold text-white">{{ $featured['name'] }}</span>
                        <span class="block text-sm text-white/60">{{ $featured['role'] }}</span>
                    </span>
                </figcaption>
            </figure>

            {{-- Diğer yorumlar --}}
            <div class="flex flex-col gap-4 sm:gap-5">
                @foreach ($rest as $item)
                    <figure class="testimonial-card reveal-right group relative flex flex-col rounded-[1.375rem] border border-ink-200/90 bg-white p-5 shadow-card transition duration-500 hover:-translate-y-1 hover:border-brand-200/80 hover:shadow-elevated sm:p-6"
                            x-intersect.once="$el.classList.add('in')"
                            style="transition-delay: {{ $loop->index * 90 }}ms">
                        <div class="flex items-center justify-between gap-3">
                            <div class="flex">
                                @for ($i = 0; $i < 5; $i++)
                                    <x-icon name="star" class="h-4 w-4 text-amber-400" />
                                @endfor
                            </div>
                            <x-icon name="quote" class="h-6 w-6 shrink-0 text-brand-100 transition duration-300 group-hover:text-brand-200" />
                        </div>

                        <blockquote class="mt-3 text-[0.9375rem] leading-relaxed text-ink-700">
                            “{{ $item['quote'] }}”
                        </blockquote>

                        <figcaption class="mt-5 flex items-center gap-3 border-t border-ink-100 pt-4">
                            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-full bg-gradient-to-br {{ $avatars[($loop->index + 1) % count($avatars)] }} text-sm font-bold text-white ring-2 ring-white shadow-sm">
                                {{ mb_substr($item['name'], 0, 1) }}
                            </span>
                            <span class="min-w-0">
                                <span class="block text-sm font-bold text-ink-900">{{ $item['name'] }}</span>
                                <span class="block truncate text-xs text-ink-500">{{ $item['role'] }}</span>
                            </span>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>

        {{-- Alt güven şeridi --}}
        <div class="reveal mt-10 flex flex-col items-center justify-between gap-4 rounded-2xl border border-ink-200/80 bg-white/80 px-5 py-4 shadow-card backdrop-blur sm:flex-row sm:px-6"
             x-intersect.once="$el.classList.add('in')">
            <div class="flex items-center gap-3">
                <div class="flex -space-x-2">
                    @foreach ($t['items'] as $item)
                        <span class="grid h-9 w-9 place-items-center rounded-full border-2 border-white bg-gradient-to-br {{ $avatars[$loop->index % count($avatars)] }} text-xs font-bold text-white">
                            {{ mb_substr($item['name'], 0, 1) }}
                        </span>
                    @endforeach
                </div>
                <p class="text-sm text-ink-600">
                    <strong class="font-semibold text-ink-900">{{ $hero['rating_count'] }} marka</strong> dijital dönüşümünü bizimle tamamladı
                </p>
            </div>
            <a href="/iletisim" class="btn btn-ghost shrink-0 text-sm">
                Siz de deneyiminizi paylaşın
                <x-icon name="arrow-right" class="h-4 w-4" />
            </a>
        </div>
    </div>
</section>
