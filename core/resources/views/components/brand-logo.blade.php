{{-- variant: header | footer | mobile --}}
@props([
    'class' => '',
    'variant' => 'header',
])

@php
    $brand = config('site.brand');

    $imgClass = match ($variant) {
        'footer' => 'h-14 w-auto max-w-[320px] sm:h-16 sm:max-w-[360px]',
        'mobile' => 'h-12 w-auto max-w-[280px]',
        'popup' => 'h-14 w-auto max-w-[300px] sm:h-16 sm:max-w-[340px]',
        default => 'h-14 w-auto max-w-[300px] sm:h-16 sm:max-w-[340px] lg:h-[4.25rem] lg:max-w-[380px]',
    };
@endphp

<a href="{{ url('/') }}"
   {{ $attributes->merge(['class' => 'group inline-flex shrink-0 items-center self-center ' . $class]) }}
   aria-label="{{ $brand['name'] }} — Anasayfa">
    <img
        src="{{ asset($brand['logo']) }}"
        alt="{{ $brand['name'] }}"
        class="{{ $imgClass }} block object-contain object-left transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:scale-[1.02]"
        decoding="async"
        fetchpriority="high"
    />
</a>
