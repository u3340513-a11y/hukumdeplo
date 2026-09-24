@php
    $s = config('content.services');
    $why = config('content.why');
@endphp

@php $seo = config('site.seo.pages.services'); @endphp

<x-layouts.app
    :seoTitle="$seo['title']"
    :description="$seo['description']"
    keywords="hükümdar bilişim hizmetler, web tasarım, e-ticaret paketleri, özel yazılım, seo hizmeti"
    :breadcrumbs="[['label' => 'Hizmetlerimiz']]">

    <x-page-hero
        eyebrow="Hizmetlerimiz"
        title="Markanızı büyüten <span class='text-gradient'>dijital çözümler</span>"
        description="Tasarımdan yazılıma, pazarlamadan satışa kadar dijitaldeki tüm ihtiyaçlarınız için uçtan uca çözümler sunuyoruz."
        :breadcrumbs="[['label' => 'Hizmetler']]">
        <div class="mt-8 flex flex-wrap gap-2.5">
            @foreach ($s['items'] as $item)
                <a href="#{{ $item['slug'] }}" class="chip transition hover:border-brand-300 hover:text-brand-700">
                    <x-icon :name="$item['icon']" class="h-4 w-4 text-brand-500" /> {{ $item['title'] }}
                </a>
            @endforeach
        </div>
    </x-page-hero>

    {{-- Hizmet kartları --}}
    <section class="section-y">
        <div class="container-page">
            <div class="grid gap-6 lg:grid-cols-2">
                @foreach ($s['items'] as $item)
                    <article id="{{ $item['slug'] }}"
                        class="group relative flex scroll-mt-28 flex-col overflow-hidden rounded-3xl border border-ink-200 bg-white p-8 shadow-card transition duration-500 hover:-translate-y-1 hover:shadow-elevated lg:flex-row lg:gap-8"
                        x-data="{ show: false }" x-intersect.once="show = true"
                        :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                        style="transition: opacity .6s var(--ease-out-expo), transform .6s var(--ease-out-expo); transition-delay: {{ ($loop->index % 2) * 90 }}ms">

                        <div class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-brand-50 opacity-0 blur-2xl transition duration-500 group-hover:opacity-100"></div>

                        <div class="relative shrink-0">
                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-600 to-brand-800 text-white shadow-brand">
                                <x-icon :name="$item['icon']" class="h-8 w-8" />
                            </div>
                        </div>

                        <div class="relative mt-6 flex flex-1 flex-col lg:mt-0">
                            <h2 class="text-xl font-bold text-ink-900">{{ $item['title'] }}</h2>
                            <p class="mt-3 text-sm leading-relaxed text-ink-500">{{ $item['desc'] }}</p>

                            <ul class="mt-5 grid gap-2 sm:grid-cols-2">
                                @foreach ($item['features'] as $feature)
                                    <li class="flex items-center gap-2.5 text-sm text-ink-600">
                                        <span class="grid h-5 w-5 shrink-0 place-items-center rounded-full bg-brand-50 text-brand-600">
                                            <x-icon name="check" class="h-3.5 w-3.5" />
                                        </span>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>

                            <a href="/hizmetler/{{ $item['slug'] }}" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700">
                                <span class="link-underline">Hizmet detayını inceleyin</span>
                                <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Neden biz şeridi --}}
    <section class="section-y-sm bg-surface-muted">
        <div class="container-page">
            <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($why['items'] as $item)
                    <div class="rounded-3xl border border-ink-200 bg-white p-6">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon :name="$item['icon']" class="h-6 w-6" />
                        </div>
                        <h3 class="mt-4 text-base font-bold text-ink-900">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-500">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-sections.process />
    <x-sections.cta-band />

</x-layouts.app>
