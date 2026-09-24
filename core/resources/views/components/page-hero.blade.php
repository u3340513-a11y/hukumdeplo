@props([
    'eyebrow' => null,
    'title' => null,
    'description' => null,
    'breadcrumbs' => [],
    'bgImage' => null,
])

<section class="relative overflow-hidden {{ $bgImage ? 'bg-cover bg-right lg:bg-center bg-no-repeat' : 'bg-aurora' }}"
    @if ($bgImage) style="background-image: url('{{ $bgImage }}');" @endif>

    @if (! $bgImage)
        {{-- Dekor --}}
        <div class="pointer-events-none absolute inset-0 -z-0">
            <div class="absolute inset-0 bg-grid opacity-[0.5] mask-fade-y"></div>
            <div class="absolute -right-24 -top-24 h-72 w-72 rounded-full bg-brand-300/30 blur-[100px]"></div>
        </div>
    @else
        {{-- Arka plan karartma / degrade perdesi (Metinlerin arkasında net okunabilirlik) --}}
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-[#0d1e56]/90 via-[#122870]/60 to-transparent lg:from-[#0d1e56]/80 lg:via-[#122870]/30 lg:to-transparent"></div>
    @endif

    <div class="container-page relative z-10 pt-28 pb-14 lg:pt-36 lg:pb-20">
        {{-- Breadcrumb --}}
        <nav aria-label="breadcrumb" class="animate-fade-up">
            <ol class="flex flex-wrap items-center gap-1.5 text-sm {{ $bgImage ? 'text-white/75' : 'text-ink-500' }}">
                <li><a href="/" class="transition {{ $bgImage ? 'hover:text-white' : 'hover:text-brand-700' }}">Anasayfa</a></li>
                @foreach ($breadcrumbs as $crumb)
                    <li class="flex items-center gap-1.5">
                        <x-icon name="chevron-right" class="h-3.5 w-3.5 {{ $bgImage ? 'text-white/40' : 'text-ink-300' }}" />
                        @if (!empty($crumb['href']))
                            <a href="{{ $crumb['href'] }}" class="transition {{ $bgImage ? 'hover:text-white' : 'hover:text-brand-700' }}">{{ $crumb['label'] }}</a>
                        @else
                            <span class="font-medium {{ $bgImage ? 'text-white' : 'text-ink-700' }}">{{ $crumb['label'] }}</span>
                        @endif
                    </li>
                @endforeach
            </ol>
        </nav>

        <div class="mt-7 max-w-2xl lg:max-w-xl xl:max-w-2xl">
            @if ($eyebrow)
                @if ($bgImage)
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/10 px-3 py-1 text-xs font-semibold text-amber-300 border border-white/20 backdrop-blur-sm animate-fade-up anim-delay-100">
                        <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>{{ $eyebrow }}
                    </span>
                @else
                    <span class="eyebrow animate-fade-up anim-delay-100">
                        <span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>{{ $eyebrow }}
                    </span>
                @endif
            @endif

            @if ($title)
                <h1 class="animate-fade-up anim-delay-200 mt-4 text-h1 font-extrabold tracking-tight {{ $bgImage ? 'text-white' : 'text-ink-900' }}">
                    {!! $title !!}
                </h1>
            @endif

            @if ($description)
                <p class="animate-fade-up anim-delay-300 mt-5 text-lead {{ $bgImage ? 'text-white/90' : 'text-ink-500' }}">{{ $description }}</p>
            @endif

            {{ $slot }}
        </div>
    </div>
</section>
