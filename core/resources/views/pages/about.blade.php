@php
    $a = config('content.about');
    $stats = config('content.stats.items');
@endphp

@php $seo = config('site.seo.pages.about'); @endphp

<x-layouts.app
    :seoTitle="$seo['title']"
    :description="$seo['description']"
    keywords="hükümdar bilişim hakkında, semih hükümdar, kurumsal web tasarım ve yazılım ajansı"
    :breadcrumbs="[['label' => 'Hakkımızda']]">

    <x-page-hero
        eyebrow="Hakkımızda — Kuruluş 2008"
        title="Web dünyasının <span class='text-gradient'>modern ve profesyonel</span> yüzü"
        :description="$a['description']"
        :breadcrumbs="[['label' => 'Hakkımızda']]" />

    {{-- Misyon & Vizyon --}}
    <section class="section-y">
        <div class="container-page">
            <div class="grid gap-12 lg:grid-cols-2 lg:gap-16">
                <div x-data="{ show: false }" x-intersect.once="show = true"
                     :class="show ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-6'"
                     style="transition: all .7s var(--ease-out-expo)">
                    <div class="gradient-ring shadow-elevated">
                        <div class="relative overflow-hidden rounded-[calc(1.75rem-1px)] bg-ink-900 p-8">
                            <div class="absolute inset-0 bg-grid opacity-[0.08]"></div>
                            <div class="absolute -right-16 -top-16 h-48 w-48 rounded-full bg-brand-600/40 blur-3xl"></div>
                            <div class="relative grid grid-cols-2 gap-4">
                                @foreach ($stats as $stat)
                                    <div class="rounded-2xl border border-white/10 bg-white/5 p-5 backdrop-blur">
                                        <div class="text-3xl font-extrabold text-white">{{ $stat['value'] }}<span class="text-accent">{{ $stat['suffix'] }}</span></div>
                                        <div class="mt-1 text-sm text-white/60">{{ $stat['label'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="rounded-3xl border border-ink-200 bg-white p-7">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="target" class="h-6 w-6" />
                        </span>
                        <h2 class="mt-5 text-xl font-bold text-ink-900">Misyonumuz</h2>
                        <p class="mt-3 text-sm leading-relaxed text-ink-500">{{ $a['mission'] }}</p>
                    </div>
                    <div class="mt-5 rounded-3xl border border-ink-200 bg-white p-7">
                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                            <x-icon name="rocket" class="h-6 w-6" />
                        </span>
                        <h2 class="mt-5 text-xl font-bold text-ink-900">Vizyonumuz</h2>
                        <p class="mt-3 text-sm leading-relaxed text-ink-500">{{ $a['vision'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Değerlerimiz --}}
    <section class="section-y-sm bg-surface-muted">
        <div class="container-page">
            <x-section-heading
                eyebrow="Değerlerimiz"
                title="Bizi biz yapan ilkeler"
                description="Her projeye taşıdığımız, çalışma kültürümüzün temelini oluşturan değerler." />

            <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($a['values'] as $value)
                    <div class="group rounded-3xl border border-ink-200 bg-white p-7 transition duration-500 hover:-translate-y-1 hover:shadow-elevated"
                         x-data="{ show: false }" x-intersect.once="show = true"
                         :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                         style="transition: all .6s var(--ease-out-expo); transition-delay: {{ $loop->index * 90 }}ms">
                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-600 to-brand-800 text-white shadow-brand">
                            <x-icon :name="$value['icon']" class="h-7 w-7" />
                        </div>
                        <h3 class="mt-6 text-lg font-bold text-ink-900">{{ $value['title'] }}</h3>
                        <p class="mt-2.5 text-sm leading-relaxed text-ink-500">{{ $value['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <x-sections.why />
    <x-sections.process />
    <x-sections.testimonials />
    <x-sections.cta-band />

</x-layouts.app>
