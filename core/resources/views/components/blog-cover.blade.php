@props([
    'post',
    'fallbackClass' => 'relative flex items-center justify-center overflow-hidden bg-gradient-to-br from-brand-500 to-brand-800',
    'iconClass' => 'relative h-12 w-12 text-white/80',
])

@if (! empty($post['image']))
    <div {{ $attributes->merge(['class' => 'relative overflow-hidden']) }}>
        <img
            src="{{ asset($post['image']) }}"
            alt="{{ $post['title'] }}"
            width="800"
            height="450"
            loading="lazy"
            decoding="async"
            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
        />
        {{ $slot }}
    </div>
@else
    <div {{ $attributes->merge(['class' => $fallbackClass]) }}>
        <div class="absolute inset-0 bg-dots opacity-20"></div>
        <x-icon name="layout" :class="$iconClass" />
        {{ $slot }}
    </div>
@endif
