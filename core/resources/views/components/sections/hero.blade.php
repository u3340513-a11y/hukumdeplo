@php
    $hero = config('content.hero');
    $slides = $hero['slides'] ?? [];
    $rating = $hero['rating'] ?? '4.9';
    $ratingCount = $hero['rating_count'] ?? '300+';
@endphp

<section
    x-data="heroModernSlider()"
    x-init="init()"
    @mouseenter="pause()"
    @mouseleave="resume()"
    @touchstart="touchStart($event)"
    @touchend="touchEnd($event)"
    class="relative flex min-h-screen lg:min-h-[100vh] flex-col justify-between overflow-hidden bg-ink-950 text-white select-none"
    aria-label="Hükümdar Bilişim Öne Çıkan Hizmetler"
>
    {{-- ════════ Slayt Arka Plan Görselleri & Sinematik Degrade ════════ --}}
    <div class="absolute inset-0 z-0">
        @foreach ($slides as $index => $slide)
            <div
                class="absolute inset-0 overflow-hidden transition-opacity duration-[1500ms] ease-in-out"
                :class="current === {{ $index }} ? 'opacity-100 z-10' : 'opacity-0 z-0'"
            >
                <img
                    src="{{ asset($slide['image']) }}"
                    alt="{{ strip_tags($slide['title']) }}"
                    class="h-full w-full object-cover object-center"
                    loading="{{ $index === 0 ? 'eager' : 'lazy' }}"
                    fetchpriority="{{ $index === 0 ? 'high' : 'low' }}"
                />
            </div>
        @endforeach

        {{-- Lüks Sinematik Koyu Katmanlar (Yazıların ve sektör görselinin mükemmel dengesi) --}}
        <div class="pointer-events-none absolute inset-0 bg-ink-950/70"></div>
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-r from-ink-950/95 via-ink-950/80 to-transparent"></div>
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-ink-950/95 via-transparent to-ink-950/50"></div>
    </div>

    {{-- Yan Yönlendirme Okları (Masaüstü) --}}
    <button
        type="button"
        @click="prev()"
        class="hidden lg:grid absolute left-6 top-1/2 -translate-y-1/2 z-20 h-14 w-14 place-items-center rounded-full border border-white/20 bg-ink-950/60 text-white/90 backdrop-blur-md transition hover:scale-110 hover:border-brand-400 hover:bg-brand-600 hover:text-white shadow-xl"
        aria-label="Önceki Slayt"
    >
        <x-icon name="arrow-left" class="h-5 w-5" />
    </button>
    <button
        type="button"
        @click="next()"
        class="hidden lg:grid absolute right-6 top-1/2 -translate-y-1/2 z-20 h-14 w-14 place-items-center rounded-full border border-white/20 bg-ink-950/60 text-white/90 backdrop-blur-md transition hover:scale-110 hover:border-brand-400 hover:bg-brand-600 hover:text-white shadow-xl"
        aria-label="Sonraki Slayt"
    >
        <x-icon name="arrow-right" class="h-5 w-5" />
    </button>

    {{-- ════════ Slayt Ana İçeriği ════════ --}}
    <div class="container-page relative z-10 flex flex-1 flex-col justify-center pt-32 pb-12 sm:pt-36 sm:pb-14 lg:pt-40 lg:pb-16">
        <div class="max-w-3xl grid" style="grid-template-columns: 1fr; grid-template-rows: 1fr;">
            @foreach ($slides as $index => $slide)
                <div
                    class="space-y-5 transition-all duration-1000 ease-in-out"
                    :class="current === {{ $index }} ? 'opacity-100 translate-y-0 pointer-events-auto z-10' : 'opacity-0 translate-y-4 pointer-events-none z-0'"
                    style="grid-column: 1 / 2; grid-row: 1 / 2;"
                >
                    {{-- Slayt Sıra Numarası & Rozet --}}
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/50 bg-brand-500/20 px-4 py-1.5 text-xs sm:text-sm font-bold uppercase tracking-wider text-brand-300 backdrop-blur-md shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-brand-400 animate-pulse"></span>
                            {{ $slide['kicker'] }}
                        </span>
                        <span class="text-xs sm:text-sm font-semibold text-white/60 tracking-wider">
                            0{{ $index + 1 }} / 0{{ count($slides) }}
                        </span>
                    </div>

                    {{-- Büyütülmüş ve Etkileyici Başlık --}}
                    <h1 class="hero-title text-3xl sm:text-5xl lg:text-[3.25rem] font-extrabold leading-[1.12] tracking-tight text-white drop-shadow-lg min-h-[4rem] sm:min-h-[7rem] flex items-center">
                        <div>{!! $slide['title'] !!}</div>
                    </h1>

                    {{-- Açıklama --}}
                    <p class="max-w-2xl text-base sm:text-lg sm:leading-relaxed text-white/90 drop-shadow-sm font-normal min-h-[4.5rem] sm:min-h-[3.5rem]">
                        {{ $slide['description'] }}
                    </p>

                    {{-- Butonlar --}}
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="{{ $slide['cta_primary']['href'] }}" class="btn btn-primary px-8 py-3.5 text-base font-bold shadow-xl shadow-brand-900/50 group">
                            {{ $slide['cta_primary']['label'] }}
                            <x-icon name="arrow-right" class="h-4 w-4 transition-transform group-hover:translate-x-1" />
                        </a>
                        <a href="{{ $slide['cta_secondary']['href'] }}" class="btn border border-white/30 bg-white/10 px-8 py-3.5 text-base font-semibold text-white backdrop-blur-md transition hover:border-brand-400 hover:bg-white/20">
                            {{ $slide['cta_secondary']['label'] }}
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- Güven Şeridi --}}
            <div class="mt-9 flex flex-wrap items-center text-xs sm:text-sm text-white/75 border-t border-white/15 pt-5">
                <div class="flex items-center" style="margin-right: 24px; margin-bottom: 8px;">
                    <span class="flex text-amber-400" style="margin-right: 8px;">
                        @for ($i = 0; $i < 5; $i++)
                            <x-icon name="star" class="h-3.5 w-3.5" />
                        @endfor
                    </span>
                    <span><strong class="font-bold text-white">{{ $rating }}</strong> Google Puanı</span>
                </div>
                
                <span class="hidden sm:inline-block w-px bg-white/30" style="height: 16px; margin-right: 24px; margin-bottom: 8px;"></span>
                
                <div class="flex items-center" style="margin-right: 24px; margin-bottom: 8px;">
                    <x-icon name="shield" class="h-4 w-4 text-brand-300" style="margin-right: 8px;" />
                    <span><strong class="font-bold text-white">16+ Yıl</strong> Deneyim</span>
                </div>
                
                <span class="hidden sm:inline-block w-px bg-white/30" style="height: 16px; margin-right: 24px; margin-bottom: 8px;"></span>
                
                <div class="flex items-center" style="margin-bottom: 8px;">
                    <x-icon name="users" class="h-4 w-4 text-brand-300" style="margin-right: 8px;" />
                    <span><strong class="font-bold text-white">{{ $ratingCount }}</strong> Mutlu Müşteri</span>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-10 container-page pb-12 sm:pb-16">
        <div class="grid grid-cols-3 items-center gap-2.5 sm:gap-8 border-t border-white/20 pt-4 sm:pt-6">
            @foreach ($slides as $index => $slide)
                <button
                    type="button"
                    @click="goTo({{ $index }})"
                    class="relative flex flex-col items-start gap-1.5 sm:gap-3 text-left group transition-all w-full min-w-0"
                    aria-label="Slayt {{ $index + 1 }}: {{ $slide['kicker'] }}"
                >
                    <div class="flex items-center gap-1.5 sm:gap-3 text-xs sm:text-[1.05rem] font-semibold tracking-wide transition-colors w-full min-w-0" :class="current === {{ $index }} ? 'text-white' : 'text-white/50 group-hover:text-white/80'">
                        <span class="font-bold shrink-0 text-xs sm:text-base" :class="current === {{ $index }} ? 'text-brand-400' : ''">0{{ $index + 1 }}</span>
                        <span class="truncate text-[0.72rem] sm:text-base">{{ $slide['kicker'] }}</span>
                    </div>

                    {{-- Aktif slayt için animasyonlu dolum çubuğu (progress line) --}}
                    <div class="h-[2px] sm:h-[3px] w-full bg-white/15 relative overflow-hidden rounded-full">
                        <div
                            class="absolute top-0 left-0 h-full bg-brand-400 transition-all duration-100 ease-linear rounded-full"
                            :style="current === {{ $index }} ? `width: ${progress}%` : 'width: 0%'"
                        ></div>
                    </div>
                </button>
            @endforeach
        </div>
    </div>

    {{-- Sayfa Zeminine Geçiş Eğrisi --}}
    <div class="relative z-10 w-full leading-[0]" aria-hidden="true">
        <svg class="hero-curve block w-full" viewBox="0 0 1440 72" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
            <path fill="#ffffff" d="M0,42 C360,72 720,18 1080,42 C1260,54 1380,48 1440,42 L1440,72 L0,72 Z"/>
        </svg>
    </div>

</section>

<script>
function heroModernSlider() {
    return {
        current: 0,
        total: {{ count($slides) }},
        progress: 0,
        intervalMs: 6500,
        tickMs: 60,
        timer: null,
        isPaused: false,
        touchStartX: 0,
        touchEndX: 0,

        init() {
            this.start();
        },

        start() {
            this.stop();
            this.progress = 0;
            const step = (this.tickMs / this.intervalMs) * 100;
            this.timer = setInterval(() => {
                if (!this.isPaused) {
                    this.progress += step;
                    if (this.progress >= 100) {
                        this.next();
                    }
                }
            }, this.tickMs);
        },

        stop() {
            if (this.timer) {
                clearInterval(this.timer);
                this.timer = null;
            }
        },

        pause() {
            this.isPaused = true;
        },

        resume() {
            this.isPaused = false;
        },

        next() {
            this.current = (this.current + 1) % this.total;
            this.progress = 0;
        },

        prev() {
            this.current = (this.current - 1 + this.total) % this.total;
            this.progress = 0;
        },

        goTo(index) {
            this.current = index;
            this.progress = 0;
        },

        touchStartX: 0,
        touchEndX: 0,
        touchStartY: 0,
        touchEndY: 0,

        touchStart(e) {
            if (!e.changedTouches || !e.changedTouches[0]) return;
            this.touchStartX = e.changedTouches[0].screenX;
            this.touchStartY = e.changedTouches[0].screenY;
        },

        touchEnd(e) {
            if (!e.changedTouches || !e.changedTouches[0]) return;
            this.touchEndX = e.changedTouches[0].screenX;
            this.touchEndY = e.changedTouches[0].screenY;
            const diffX = this.touchStartX - this.touchEndX;
            const diffY = this.touchStartY - this.touchEndY;

            // Yalnızca net yatay kaydırmalarda slayt geçişi yap, dikey scroll hareketinde asla tetikleme!
            if (Math.abs(diffX) > 65 && Math.abs(diffX) > Math.abs(diffY) * 1.6) {
                if (diffX > 0) {
                    this.next();
                } else {
                    this.prev();
                }
            }
        }
    };
}
</script>
