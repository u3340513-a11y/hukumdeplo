@php
    $allServices = config('content.services.items');
    $contact = config('site.contact');

    // E-Ticaret için seçkin canlı referans projeleri
    $ecommerceProjects = [
        [
            'title' => 'Dualtron Türkiye',
            'category' => 'E-Ticaret & Satış',
            'image' => '/images/references/hukumdar-dualtron-web-sitesi-tasarimi-ve-yayina-alma-s-ureci.png',
            'url' => 'dualtron.com.tr',
        ],
        [
            'title' => 'Çiçekçi Dünyası',
            'category' => 'E-Ticaret & Mağaza',
            'image' => '/images/references/hukumdar-cicekci-sitesi-isinizi-dijitalde-b-uy-utmenin-en-renkli-yolu.png',
            'url' => 'cicekcisitesi.com',
        ],
        [
            'title' => 'Loop Bisiklet',
            'category' => 'Spor & E-Ticaret',
            'image' => '/images/references/hukumdar-loop-bisiklet-s-ur-us-keyfi-dijitale-tasindi.jpg',
            'url' => 'loopbisiklet.com',
        ],
        [
            'title' => 'Luwische Kozmetik',
            'category' => 'Kozmetik & Satış',
            'image' => '/images/references/hukumdar-luwische-bilimle-gelen-g-uzellik.jpg',
            'url' => 'luwische.com',
        ],
        [
            'title' => 'Citymate E-Mobilite',
            'category' => 'E-Ticaret & Mağaza',
            'image' => '/images/references/hukumdar-citymate-sehir-dostu-tasima-deneyimi.jpg',
            'url' => 'citymate.com.tr',
        ],
        [
            'title' => 'FRH Design',
            'category' => 'Moda & Butik Satış',
            'image' => '/images/references/hukumdar-frhdesign-el-isciliginde-dijital-dokunus.jpg',
            'url' => 'frhdesign.com',
        ],
        [
            'title' => 'Burger House',
            'category' => 'Online Sipariş',
            'image' => '/images/references/hukumdar-burger-web-sitesi.png',
            'url' => 'burgerhouse.com.tr',
        ],
        [
            'title' => 'Airled Aydınlatma',
            'category' => 'B2B / B2C Satış',
            'image' => '/images/references/hukumdar-airled-aydinlatmanin-yeni-dili.jpg',
            'url' => 'airled.com.tr',
        ],
        [
            'title' => 'Asay Yemek',
            'category' => 'Online Sipariş',
            'image' => '/images/references/hukumdar-asay-yemek-lezzetin-dijital-sunumu.jpg',
            'url' => 'asayyemek.com',
        ],
        [
            'title' => 'Erst Group',
            'category' => 'Global E-İhracat',
            'image' => '/images/references/hukumdar-erst-group-dis-ticarette-dijital-y-uz.jpg',
            'url' => 'erstgroup.com',
        ],
    ];
@endphp

<x-layouts.app
    :seoTitle="$service['seo_title'] ?? $service['title']"
    :description="$service['desc'] ?? $service['short']"
    :keywords="($service['seo_title'] ?? $service['title']) . ', hükümdar bilişim, web yazılım'"
    :breadcrumbs="[['label' => 'Hizmetlerimiz', 'href' => '/hizmetler'], ['label' => $service['title']]]">

    @if ($service['slug'] === 'e-ticaret')
        <style>
            .hk-marquee-wrap {
                overflow: hidden;
                position: relative;
                width: 100%;
                padding: 10px 0 20px 0;
                mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
                -webkit-mask-image: linear-gradient(to right, transparent 0%, black 5%, black 95%, transparent 100%);
            }
            .hk-marquee-track {
                display: flex;
                gap: 18px;
                width: max-content;
                animation: hk-marquee-anim 32s linear infinite;
            }
            .hk-marquee-wrap:hover .hk-marquee-track {
                animation-play-state: paused;
            }
            @keyframes hk-marquee-anim {
                0% { transform: translateX(0); }
                100% { transform: translateX(calc(-50% - 9px)); }
            }

            .hk-mockup-card {
                width: 270px;
                min-width: 270px;
                max-width: 270px;
                flex: 0 0 270px;
                background: #ffffff;
                border-radius: 12px;
                border: 1px solid #e2e8f0;
                overflow: hidden;
                box-shadow: 0 4px 16px rgba(15, 23, 42, 0.07);
                transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            }
            .hk-mockup-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 14px 28px -4px rgba(181, 137, 72, 0.22);
                border-color: #dfc18d;
            }
            .hk-mockup-header {
                height: 26px;
                background: #f8fafc;
                border-bottom: 1px solid #e2e8f0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 10px;
            }
            .hk-mockup-dots {
                display: flex;
                align-items: center;
                gap: 4px;
            }
            .hk-mockup-dot {
                width: 7px;
                height: 7px;
                border-radius: 50%;
                display: inline-block;
            }
            .hk-mockup-dot-red { background: #ff5f56; }
            .hk-mockup-dot-yellow { background: #ffbd2e; }
            .hk-mockup-dot-green { background: #27c93f; }

            .hk-mockup-url-bar {
                background: #ffffff;
                border: 1px solid #e2e8f0;
                border-radius: 4px;
                padding: 1px 7px;
                font-size: 10px;
                font-family: monospace;
                color: #64748b;
                display: flex;
                align-items: center;
                gap: 4px;
                max-width: 140px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .hk-mockup-body {
                height: 155px;
                width: 100%;
                overflow: hidden;
                background: #f1f5f9;
                position: relative;
            }
            .hk-mockup-body img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: top;
                transition: transform 0.5s ease;
                display: block;
            }
            .hk-mockup-card:hover .hk-mockup-body img {
                transform: scale(1.05);
            }
            .hk-mockup-footer {
                padding: 8px 12px;
                background: #ffffff;
                display: flex;
                align-items: center;
                justify-content: space-between;
                border-top: 1px solid #f1f5f9;
            }
            .hk-mockup-title {
                font-size: 12px;
                font-weight: 700;
                color: #0f172a;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 150px;
            }
            .hk-mockup-badge {
                font-size: 10px;
                font-weight: 600;
                color: #b58948;
                background: #fbf7ee;
                padding: 2px 7px;
                border-radius: 9999px;
            }
        </style>
    @endif

    <x-page-hero
        eyebrow="Hizmet Detayı"
        :title="$service['title']"
        :description="$service['short']"
        :bgImage="$service['hero_bg'] ?? null"
        :breadcrumbs="[['label' => 'Hizmetler', 'href' => '/hizmetler'], ['label' => $service['title']]]">
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="/iletisim?hizmet={{ urlencode($service['title']) }}" class="btn btn-primary">
                Bu hizmet için teklif alın <x-icon name="arrow-right" class="h-4 w-4" />
            </a>
            @if (!empty($service['hero_bg']))
                <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD');" class="btn border border-white/30 bg-white/10 text-white shadow-sm backdrop-blur-sm transition duration-300 hover:bg-white/20 hover:border-white/50">
                    <x-icon name="whatsapp" class="h-5 w-5 text-emerald-400" /> Hızlı soru sorun
                </a>
            @else
                <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD');" class="btn btn-ghost">
                    <x-icon name="whatsapp" class="h-5 w-5 text-emerald-500" /> Hızlı soru sorun
                </a>
            @endif
        </div>
    </x-page-hero>

    @if ($service['slug'] === 'e-ticaret')
        {{-- KAYAN SİTE GÖRÜNTÜLERİ (MOCKUP SLIDER) --}}
        <section class="border-b border-ink-100 bg-surface-muted/50 pt-7 pb-6 overflow-hidden">
            <div class="container-page mb-3 flex items-center justify-between text-xs font-semibold uppercase tracking-wider text-ink-400">
                <span class="flex items-center gap-2">
                    <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span> Canlı E-Ticaret Referans Çalışmalarımız
                </span>
                <span class="hidden sm:inline text-ink-400">Önizlemek için üzerine gelin</span>
            </div>

            <div class="hk-marquee-wrap">
                <div class="hk-marquee-track">
                    {{-- Kesintisiz sonsuz döngü için 2 tekrar --}}
                    @foreach (array_merge($ecommerceProjects, $ecommerceProjects) as $item)
                        <div class="hk-mockup-card">
                            {{-- Browser Başlık Çubuğu --}}
                            <div class="hk-mockup-header">
                                <div class="hk-mockup-dots">
                                    <span class="hk-mockup-dot hk-mockup-dot-red"></span>
                                    <span class="hk-mockup-dot hk-mockup-dot-yellow"></span>
                                    <span class="hk-mockup-dot hk-mockup-dot-green"></span>
                                </div>
                                <div class="hk-mockup-url-bar">
                                    <svg style="width: 10px; height: 10px; flex-shrink: 0; color: #10b981;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                    </svg>
                                    <span>{{ $item['url'] }}</span>
                                </div>
                                <div style="width: 20px;"></div>
                            </div>

                            {{-- Site Görseli (Kompakt 155px Yükseklik) --}}
                            <div class="hk-mockup-body">
                                <img
                                    src="{{ $item['image'] }}"
                                    alt="{{ $item['title'] }}"
                                    loading="lazy" />
                            </div>

                            {{-- Alt Bilgi Alanı --}}
                            <div class="hk-mockup-footer">
                                <div class="hk-mockup-title">{{ $item['title'] }}</div>
                                <div class="hk-mockup-badge">{{ $item['category'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="section-y">
        <div class="container-page">
            <div class="grid gap-12 lg:grid-cols-[1.6fr_1fr] lg:gap-16">
                {{-- Ana içerik --}}
                <div>
                    <span class="eyebrow"><span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>Genel Bakış</span>
                    <h2 class="mt-4 text-h2 font-extrabold tracking-tight text-ink-900">Neler yapıyoruz?</h2>
                    <p class="mt-5 text-lead text-ink-500">{{ $service['intro'] }}</p>

                    {{-- Kazanımlar / kapsam --}}
                    <div class="mt-10 grid gap-4 sm:grid-cols-2">
                        @foreach ($service['deliverables'] as $d)
                            <div class="group rounded-2xl border border-ink-200 bg-white p-6 transition duration-500 hover:-translate-y-1 hover:border-brand-200 hover:shadow-card"
                                 x-data="{ show: false }" x-intersect.once="show = true"
                                 :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
                                 style="transition: opacity .5s var(--ease-out-expo), transform .5s var(--ease-out-expo); transition-delay: {{ ($loop->index % 2) * 80 }}ms">
                                <span class="grid h-10 w-10 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition group-hover:bg-brand-600 group-hover:text-white">
                                    <x-icon name="check" class="h-5 w-5" />
                                </span>
                                <h3 class="mt-4 text-base font-bold text-ink-900">{{ $d['title'] }}</h3>
                                <p class="mt-2 text-sm leading-relaxed text-ink-500">{{ $d['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    {{-- Süreç mini --}}
                    <div class="mt-12 rounded-3xl border border-ink-200 bg-surface-muted p-8">
                        <h3 class="text-lg font-bold text-ink-900">Nasıl ilerliyoruz?</h3>
                        <ol class="mt-6 space-y-5">
                            @foreach (config('content.process.steps') as $step)
                                <li class="flex gap-4">
                                    <span class="grid h-9 w-9 shrink-0 place-items-center rounded-full bg-white text-sm font-extrabold text-brand-700 ring-1 ring-ink-100">{{ $step['no'] }}</span>
                                    <div>
                                        <div class="font-semibold text-ink-900">{{ $step['title'] }}</div>
                                        <p class="mt-1 text-sm text-ink-500">{{ $step['desc'] }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>

                {{-- Yan panel --}}
                <aside class="lg:sticky lg:top-28 lg:self-start">
                    {{-- Teklif kutusu --}}
                    <div class="relative overflow-hidden rounded-3xl bg-ink-900 p-7 text-white">
                        <div class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full bg-brand-600/40 blur-2xl"></div>
                        <div class="relative">
                            <span class="grid h-12 w-12 place-items-center rounded-2xl bg-white/10 text-accent ring-1 ring-white/10">
                                <x-icon :name="$service['icon']" class="h-6 w-6" />
                            </span>
                            <h3 class="mt-5 text-lg font-bold text-white" style="color: #ffffff !important;">Bu hizmete mi ihtiyacınız var?</h3>
                            <p class="mt-2 text-sm text-white/70">Ücretsiz keşif görüşmesinde projenizi konuşalım, 24 saat içinde teklifinizi sunalım.</p>
                            <a href="/iletisim?hizmet={{ urlencode($service['title']) }}" class="btn btn-primary mt-6 w-full">
                                Ücretsiz Teklif Alın <x-icon name="arrow-right" class="h-4 w-4" />
                            </a>
                            <a href="{{ $contact['phone_href'] }}" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/KUz5CKnUt-McEJS6_8pD');" class="mt-3 flex items-center justify-center gap-2 text-sm text-white/70 transition hover:text-white">
                                <x-icon name="phone" class="h-4 w-4" /> {{ $contact['phone'] }}
                            </a>
                        </div>
                    </div>

                    {{-- Diğer hizmetler --}}
                    <div class="mt-6 rounded-3xl border border-ink-200 bg-white p-6">
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-ink-400">Tüm Hizmetler</h3>
                        <ul class="mt-4 space-y-1">
                            @foreach ($allServices as $other)
                                <li>
                                    <a href="/hizmetler/{{ $other['slug'] }}"
                                       @class([
                                           'flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm transition',
                                           'bg-brand-50 font-semibold text-brand-700' => $other['slug'] === $service['slug'],
                                           'text-ink-600 hover:bg-ink-50' => $other['slug'] !== $service['slug'],
                                       ])>
                                        <x-icon :name="$other['icon']" class="h-4 w-4 text-brand-500" />
                                        {{ $other['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    {{-- İlgili hizmetler --}}
    <section class="section-y-sm bg-surface-muted">
        <div class="container-page">
            <h2 class="text-h3 font-extrabold tracking-tight text-ink-900">Diğer hizmetlerimiz</h2>
            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($related as $rel)
                    <a href="/hizmetler/{{ $rel['slug'] }}" class="card-surface group flex flex-col p-7">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition duration-500 group-hover:bg-brand-600 group-hover:text-white">
                            <x-icon :name="$rel['icon']" class="h-6 w-6" />
                        </div>
                        <h3 class="mt-5 text-lg font-bold text-ink-900">{{ $rel['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-ink-500">{{ $rel['short'] }}</p>
                        <span class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700">
                            İncele <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <x-sections.cta-band />

</x-layouts.app>
