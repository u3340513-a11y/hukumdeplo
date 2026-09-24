@props([
    'name',
    'class' => 'w-5 h-5',
])

@php
    $stroke = 'fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"';
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex shrink-0 items-center justify-center']) }} aria-hidden="true">
    @switch($name)
        @case('chevron-down')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="m6 9 6 6 6-6"/></svg>
            @break

        @case('arrow-right')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M5 12h14"/><path d="m13 5 7 7-7 7"/></svg>
            @break

        @case('arrow-up-right')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M7 17 17 7"/><path d="M7 7h10v10"/></svg>
            @break

        @case('menu')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M4 7h16"/><path d="M4 12h16"/><path d="M4 17h16"/></svg>
            @break

        @case('close')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            @break

        @case('phone')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92Z"/></svg>
            @break

        @case('whatsapp')
            <svg viewBox="0 0 24 24" class="{{ $class }}" fill="currentColor"><path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38a9.86 9.86 0 0 0 4.79 1.22h.01c5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.82 9.82 0 0 0 12.04 2Zm5.8 14.03c-.25.69-1.45 1.32-1.99 1.36-.53.05-.53.43-3.34-.7-2.8-1.13-4.55-3.99-4.69-4.18-.14-.19-1.13-1.5-1.13-2.86 0-1.36.71-2.03.97-2.31.25-.28.55-.35.73-.35l.53.01c.17 0 .4-.06.62.48.25.6.85 2.08.92 2.23.07.14.12.31.02.5-.09.19-.14.31-.28.48-.14.16-.29.37-.42.49-.14.14-.28.29-.12.57.16.28.71 1.17 1.53 1.9 1.05.94 1.94 1.23 2.22 1.37.28.14.44.12.6-.07.16-.19.69-.81.88-1.09.18-.28.37-.23.62-.14.25.09 1.6.76 1.87.9.28.14.46.21.53.32.07.12.07.65-.18 1.34Z"/></svg>
            @break

        @case('layout')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>
            @break

        @case('cart')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><circle cx="8" cy="21" r="1"/><circle cx="19" cy="21" r="1"/><path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12"/></svg>
            @break

        @case('search')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            @break

        @case('target')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
            @break

        @case('share')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><path d="m8.59 13.51 6.83 3.98"/><path d="m15.41 6.51-6.82 3.98"/></svg>
            @break

        @case('mobile')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg>
            @break

        @case('code')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="m16 18 6-6-6-6"/><path d="m8 6-6 6 6 6"/></svg>
            @break

        @case('instagram')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><rect x="2" y="2" width="20" height="20" rx="5"/><circle cx="12" cy="12" r="4"/><path d="M17.5 6.5h.01"/></svg>
            @break

        @case('linkedin')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-4 0v7h-4v-7a6 6 0 0 1 6-6Z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
            @break

        @case('x')
            <svg viewBox="0 0 24 24" class="{{ $class }}" fill="currentColor"><path d="M18.9 2H22l-7.6 8.7L23.3 22h-7l-5.5-7.2L4.5 22H1.4l8.1-9.3L.9 2h7.2l5 6.6L18.9 2Zm-1.2 18h1.9L7.1 4H5.1l12.6 16Z"/></svg>
            @break

        @case('youtube')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M22.5 6.5a2.8 2.8 0 0 0-2-2C18.7 4 12 4 12 4s-6.7 0-8.5.5a2.8 2.8 0 0 0-2 2A29 29 0 0 0 1 12a29 29 0 0 0 .5 5.5 2.8 2.8 0 0 0 2 2C5.3 20 12 20 12 20s6.7 0 8.5-.5a2.8 2.8 0 0 0 2-2A29 29 0 0 0 23 12a29 29 0 0 0-.5-5.5Z"/><path d="m10 15 5-3-5-3v6Z"/></svg>
            @break

        @case('sparkles')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M12 3v4M12 17v4M3 12h4M17 12h4M5.6 5.6l2.8 2.8M15.6 15.6l2.8 2.8M18.4 5.6l-2.8 2.8M8.4 15.6l-2.8 2.8"/></svg>
            @break

        @case('check')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M20 6 9 17l-5-5"/></svg>
            @break

        @case('check-circle')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><circle cx="12" cy="12" r="9"/><path d="m8.5 12 2.5 2.5 4.5-5"/></svg>
            @break

        @case('star')
            <svg viewBox="0 0 24 24" class="{{ $class }}" fill="currentColor"><path d="M12 2.5l2.9 5.9 6.5.95-4.7 4.58 1.1 6.47L12 17.9l-5.8 3.05 1.1-6.47-4.7-4.58 6.5-.95z"/></svg>
            @break

        @case('quote')
            <svg viewBox="0 0 24 24" class="{{ $class }}" fill="currentColor"><path d="M9.5 6C6.46 6 4 8.46 4 11.5V18h6.5v-6.5H7.5C7.5 9.84 8.34 9 9.5 9V6Zm10 0C16.46 6 14 8.46 14 11.5V18h6.5v-6.5h-3C17.5 9.84 18.34 9 19.5 9V6Z"/></svg>
            @break

        @case('rocket')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M4.5 16.5c-1.5 1.3-2 5-2 5s3.7-.5 5-2c.7-.8.7-2 0-2.8a2 2 0 0 0-3-.2Z"/><path d="M12 15 9 12a13 13 0 0 1 9-9 13 13 0 0 1-3 12Z"/><path d="M9 12H4s.5-2.8 2-4 5 0 5 0M12 15v5s2.8-.5 4-2 0-5 0-5"/></svg>
            @break

        @case('wallet')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M3 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v0H5a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7H7"/><circle cx="16.5" cy="13" r="1.2" fill="currentColor" stroke="none"/></svg>
            @break

        @case('users')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            @break

        @case('shield')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-4"/></svg>
            @break

        @case('clock')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>
            @break

        @case('calendar')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
            @break

        @case('mail')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m2 7 10 6 10-6"/></svg>
            @break

        @case('location')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
            @break

        @case('bolt')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"/></svg>
            @break

        @case('plus')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M12 5v14M5 12h14"/></svg>
            @break

        @case('chevron-right')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="m9 6 6 6-6 6"/></svg>
            @break

        @case('arrow-left')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M19 12H5"/><path d="m11 19-7-7 7-7"/></svg>
            @break

        @case('send')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
            @break

        @case('message')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5Z"/></svg>
            @break

        @case('building')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4M8 6h.01M16 6h.01M8 10h.01M16 10h.01M8 14h.01M16 14h.01"/></svg>
            @break

        @case('headset')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M3 14v-2a9 9 0 0 1 18 0v2"/><path d="M21 16a2 2 0 0 1-2 2h-1v-6h1a2 2 0 0 1 2 2v2ZM3 16a2 2 0 0 0 2 2h1v-6H5a2 2 0 0 0-2 2v2Z"/><path d="M21 14v3a4 4 0 0 1-4 4h-5"/></svg>
            @break

        @case('lightbulb')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7c.6.5 1 1.3 1 2.1h6c0-.8.4-1.6 1-2.1A7 7 0 0 0 12 2Z"/></svg>
            @break

        @case('globe')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18 14 14 0 0 1 0-18Z"/></svg>
            @break

        @case('heart')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="M19 5.5c-1.7-1.6-4.3-1.6-6 0L12 6.5l-1-1c-1.7-1.6-4.3-1.6-6 0a4.3 4.3 0 0 0 0 6.2L12 19l7-7.3a4.3 4.3 0 0 0 0-6.2Z"/></svg>
            @break

        @case('trending-up')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><path d="m3 17 6-6 4 4 8-8"/><path d="M17 7h4v4"/></svg>
            @break

        @case('award')
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><circle cx="12" cy="8" r="6"/><path d="m8.5 13-1.5 8 5-3 5 3-1.5-8"/></svg>
            @break

        @default
            <svg viewBox="0 0 24 24" class="{{ $class }}" {!! $stroke !!}><circle cx="12" cy="12" r="9"/></svg>
    @endswitch
</span>
