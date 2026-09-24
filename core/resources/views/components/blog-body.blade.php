@props(['body'])

<div {{ $attributes->merge(['class' => 'space-y-5 text-[1.0625rem] leading-relaxed text-ink-700']) }}>
    @foreach ($body as $block)
        @if (is_string($block))
            <p>{{ $block }}</p>
        @elseif (($block['type'] ?? '') === 'h2')
            <h2 class="!mt-10 text-xl font-bold tracking-tight text-ink-900 sm:text-2xl">{{ $block['text'] }}</h2>
        @elseif (($block['type'] ?? '') === 'h3')
            <h3 class="!mt-8 text-lg font-bold text-ink-900">{{ $block['text'] }}</h3>
        @elseif (($block['type'] ?? '') === 'ul')
            <ul class="list-disc space-y-2 pl-5 marker:text-brand-600">
                @foreach ($block['items'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        @elseif (($block['type'] ?? '') === 'p')
            <p>{{ $block['text'] }}</p>
        @endif
    @endforeach
</div>
