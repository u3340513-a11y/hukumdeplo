@php
    $r = config('content.references');
    $tags = collect($r['items'])->pluck('tag')->unique()->sort()->values()->all();
    $seo = config('site.seo.pages.references');
@endphp

<x-layouts.app
    :seoTitle="$seo['title']"
    :description="$seo['description']"
    keywords="hükümdar bilişim referanslar, web tasarım referansları, e-ticaret projeleri"
    :breadcrumbs="[['label' => 'Referanslarımız']]">



    <x-page-hero

        eyebrow="Referanslarımız"

        title="Birlikte büyüdüğümüz <span class='text-gradient'>markalar</span>"

        :description="$r['description']"

        :breadcrumbs="[['label' => 'Referanslar']]" />



    <section class="section-y" x-data="{ filter: 'Tümü' }">

        <div class="container-page">

            <div class="flex flex-col gap-6 sm:flex-row sm:items-end sm:justify-between">

                {{-- Filtre çubuğu --}}

                <div class="flex flex-wrap items-center gap-2.5">

                    <button type="button" @click="filter = 'Tümü'"

                            class="chip transition"

                            :class="filter === 'Tümü' ? '!border-brand-600 !bg-brand-600 !text-white' : 'hover:border-brand-300'">

                        Tümü

                        <span class="ml-1 opacity-70">({{ count($r['items']) }})</span>

                    </button>

                    @foreach ($tags as $tag)

                        <button type="button" @click="filter = '{{ $tag }}'"

                                class="chip transition"

                                :class="filter === '{{ $tag }}' ? '!border-brand-600 !bg-brand-600 !text-white' : 'hover:border-brand-300'">

                            {{ $tag }}

                        </button>

                    @endforeach

                </div>



                <p class="text-sm text-ink-500">{{ count($r['items']) }} tamamlanmış proje · görseller canlı sitelerden</p>

            </div>



            {{-- Proje grid --}}

            <div class="ref-grid mt-10 gap-5">

                @foreach ($r['items'] as $item)

                    <div x-show="filter === 'Tümü' || filter === '{{ $item['tag'] }}'" x-transition.opacity.duration.400ms>

                        <x-reference-card :item="$item" reveal="" />

                    </div>

                @endforeach

            </div>

        </div>

    </section>



    <x-sections.stats />

    <x-sections.testimonials />

    <x-sections.cta-band title="Sıradaki başarı hikâyesi sizin olsun" />



</x-layouts.app>

