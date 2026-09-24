@props([
    'eyebrow' => null,
    'title' => null,
    'description' => null,
    'align' => 'center',
    'tone' => 'dark',
])

@php
    $alignClass = $align === 'center' ? 'mx-auto text-center items-center' : 'text-left items-start';
    $titleColor = $tone === 'light' ? 'text-white' : 'text-ink-900';
    $descColor = $tone === 'light' ? 'text-white/70' : 'text-ink-500';
    $eyebrowColor = $tone === 'light' ? 'text-brand-300' : '';
    $dotColor = $tone === 'light' ? 'bg-brand-400' : 'bg-brand-500';
@endphp

<div {{ $attributes->merge(['class' => "flex max-w-2xl flex-col $alignClass"]) }}>
    @if ($eyebrow)
        <span class="eyebrow {{ $eyebrowColor }}"
              x-data="{ show: false }" x-intersect.once="show = true"
              :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-2'"
              style="transition: all .6s cubic-bezier(.16,1,.3,1)">
            <span class="h-1.5 w-1.5 rounded-full {{ $dotColor }}"></span>
            {{ $eyebrow }}
        </span>
    @endif

    @if ($title)
        <h2 class="mt-4 text-h2 font-extrabold tracking-tight {{ $titleColor }}">{!! $title !!}</h2>
    @endif

    @if ($description)
        <p class="mt-4 text-lead {{ $descColor }}">{{ $description }}</p>
    @endif

    {{ $slot }}
</div>
