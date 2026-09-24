@php $pr = config('content.pricing'); @endphp

@php $seo = config('site.seo.pages.pricing'); @endphp

<x-layouts.app
    :seoTitle="$seo['title']"
    :description="$seo['description']"
    keywords="e-ticaret paketleri, web tasarım paketleri, hükümdar bilişim paketler"
    :breadcrumbs="[['label' => 'Paketler']]">

    <x-page-hero
        eyebrow="Paketlerimiz"
        title="Yıllık E-Ticaret ve <span class='text-gradient'>Hazır Web Site Paketlerimiz</span>"
        :description="$pr['description']"
        :breadcrumbs="[['label' => 'Paketler']]" />

    {{-- Tüm paketlere dahil --}}
    <section class="relative -mt-4 pb-2 sm:-mt-6">
        <div class="container-page">
            <div class="overflow-hidden rounded-[1.75rem] border border-ink-200/80 bg-white shadow-[0_20px_50px_-24px_rgba(15,23,42,0.16)] ring-1 ring-ink-900/[0.04]">
                <div class="grid divide-y divide-ink-100 sm:grid-cols-3 sm:divide-x sm:divide-y-0">
                    @foreach ([
                        ['globe', '1 Yıl Hosting & Domain', 'Tüm paketlerde ücretsiz'],
                        ['shield', 'SSL Sertifikası', 'Güvenli bağlantı dahil'],
                        ['headset', 'Ömür Boyu Destek', 'Ücretsiz teknik destek'],
                    ] as $perk)
                        <div class="group flex items-center gap-4 px-6 py-5 transition duration-300 hover:bg-brand-50/55 sm:px-7 sm:py-6">
                            <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-gradient-to-br from-brand-50 to-brand-100/80 text-brand-600 ring-1 ring-brand-100/80 transition duration-300 group-hover:from-brand-600 group-hover:to-brand-700 group-hover:text-white group-hover:ring-transparent group-hover:shadow-brand">
                                <x-icon :name="$perk[0]" class="h-5 w-5" />
                            </span>
                            <div class="min-w-0">
                                <div class="text-sm font-bold tracking-tight text-ink-900">{{ $perk[1] }}</div>
                                <div class="mt-0.5 text-xs leading-relaxed text-ink-500">{{ $perk[2] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <x-sections.pricing />

    {{-- Özel teklif bandı --}}
    <section class="section-y-sm">
        <div class="container-page">
            <div class="flex flex-col items-center justify-between gap-6 rounded-3xl border border-brand-100 bg-brand-50 px-8 py-10 text-center lg:flex-row lg:text-left">
                <div class="flex items-start gap-4">
                    <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-brand-600 text-white shadow-brand">
                        <x-icon name="lightbulb" class="h-6 w-6" />
                    </span>
                    <div>
                        <h3 class="text-lg font-bold text-ink-900">İhtiyacınıza özel bir paket mi gerekiyor?</h3>
                        <p class="mt-1.5 text-sm text-ink-600">E-ticaret, özel yazılım veya kapsamlı projeler için size özel teklif hazırlayalım.</p>
                    </div>
                </div>
                <a href="/iletisim" class="btn btn-primary shrink-0">Özel Teklif Alın <x-icon name="arrow-right" class="h-4 w-4" /></a>
            </div>
        </div>
    </section>

    <x-sections.faq />
    <x-sections.cta-band />

</x-layouts.app>
