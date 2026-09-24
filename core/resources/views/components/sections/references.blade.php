@php $r = config('content.references'); @endphp



<section id="referanslar" class="section-y relative scroll-mt-24">

    <div class="container-page">

        <div class="flex flex-col items-start justify-between gap-6 lg:flex-row lg:items-end">

            <x-section-heading align="left" :eyebrow="$r['eyebrow']" :title="$r['title']" :description="$r['description']" />

            <a href="/referanslar" class="btn btn-ghost shrink-0">Tüm projeler <x-icon name="arrow-right" class="h-4 w-4" /></a>

        </div>



        <div class="ref-grid mt-14 gap-5">

            @foreach (array_slice($r['items'], 0, 6) as $item)

                <x-reference-card :item="$item" :delay="($loop->index % 3) * 90" />

            @endforeach

        </div>

    </div>

</section>

