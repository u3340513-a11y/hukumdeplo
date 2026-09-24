@php $brands = config('content.brands'); @endphp



<div class="relative border-b border-ink-100 bg-white">
    <div class="container-page py-8 sm:py-9">
        <p class="text-center text-[0.7rem] font-semibold uppercase tracking-[0.3em] text-ink-400">
            250+ markanın güvendiği dijital çözüm ortağı
        </p>

        <div class="marquee-pause mask-fade-x mt-7 overflow-hidden">
            <div class="marquee-track gap-0">
                @foreach (array_merge($brands, $brands) as $brand)
                    <span class="brand-logo-item group inline-flex shrink-0 items-center border-l border-ink-100 px-8 sm:px-10">

                        <img
                            src="{{ asset($brand['logo']) }}"
                            alt="{{ $brand['name'] }}"
                            width="140"
                            height="40"
                            loading="lazy"
                            decoding="async"
                            class="brand-logo-img h-8 w-auto max-w-[8.5rem] object-contain object-center sm:h-10 sm:max-w-[9.5rem]"
                        />

                    </span>

                @endforeach

            </div>

        </div>

    </div>

</div>

