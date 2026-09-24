@props(['active' => ''])

@php
    $legalNav = config('legal.footer');
    $icons = [
        'gizlilik-sozlesmesi' => 'shield',
        'kvkk-aydinlatma-metni' => 'shield',
        'mesafeli-satis-sozlesmesi' => 'cart',
    ];
@endphp

<nav class="rounded-2xl border border-ink-200 bg-white p-5 shadow-card sm:p-6" aria-label="Yasal metinler">
    <p class="text-xs font-semibold uppercase tracking-wider text-ink-400">Yasal metinler</p>
    <ul class="mt-4 space-y-1">
        @foreach ($legalNav as $link)
            <li>
                <a href="/{{ $link['slug'] }}"
                   @class([
                       'flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium leading-snug transition',
                       'bg-brand-600 font-semibold text-white shadow-sm' => $link['slug'] === $active,
                       'text-ink-600 hover:bg-ink-50 hover:text-ink-900' => $link['slug'] !== $active,
                   ])>
                    <x-icon
                        :name="$icons[$link['slug']] ?? 'shield'"
                        @class([
                            'h-4 w-4 shrink-0',
                            'text-white/90' => $link['slug'] === $active,
                            'text-brand-500' => $link['slug'] !== $active,
                        ]) />
                    <span>{{ $link['label'] }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>

