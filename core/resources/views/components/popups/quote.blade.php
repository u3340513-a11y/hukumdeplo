@php
    $brand = config('site.brand');
    $contact = config('site.contact');
    $popup = config('site.popup');
@endphp

@if ($popup['enabled'] ?? true)
    <div
        x-data="quotePopup({ delay: {{ (int) ($popup['delay_ms'] ?? 1200) }} })"
        x-init="init()"
        x-cloak
        @keydown.escape.window="open && close()"
    >
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="quote-popup-overlay"
            role="dialog"
            aria-modal="true"
            aria-labelledby="quote-popup-title"
        >
            <div class="quote-popup-backdrop" @click="close()" aria-hidden="true"></div>

            <div
                x-show="open"
                x-transition:enter="transition ease-[cubic-bezier(0.16,1,0.3,1)] duration-400"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="quote-popup-dialog"
                x-trap="open"
            >
                <div class="quote-popup-head">
                    <button type="button" class="quote-popup-close" @click="close()" aria-label="Popup'u kapat">
                        <x-icon name="close" class="h-3.5 w-3.5" />
                    </button>

                    <img
                        src="{{ asset($brand['logo']) }}"
                        alt="{{ $brand['name'] }}"
                        class="quote-popup-logo"
                        decoding="async"
                    />
                </div>

                <div class="quote-popup-body">
                    <div class="quote-popup-panel">
                        <span class="quote-popup-badge">
                            <span class="quote-popup-badge-dot"></span>
                            {{ $popup['badge'] }}
                        </span>

                        <h2 id="quote-popup-title" class="quote-popup-title">
                            {{ $popup['title'] }}
                            <span class="text-gradient">{{ $popup['title_highlight'] }}</span>
                        </h2>

                        <p class="quote-popup-desc">{{ $popup['description'] }}</p>

                        <div class="quote-popup-stats">
                            @foreach ($popup['stats'] as $stat)
                                <div class="quote-popup-stat">
                                    <span class="quote-popup-stat-value">{{ $stat['value'] }}</span>
                                    <span class="quote-popup-stat-label">{{ $stat['label'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        <ul class="quote-popup-benefits">
                            @foreach ($popup['benefits'] as $benefit)
                                <li class="quote-popup-benefit">
                                    <span class="quote-popup-benefit-icon">
                                        <x-icon :name="$benefit['icon']" class="h-3 w-3" />
                                    </span>
                                    {{ $benefit['text'] }}
                                </li>
                            @endforeach
                        </ul>

                        <div class="quote-popup-actions">
                            <a
                                href="{{ url($popup['cta']['href']) }}"
                                class="btn btn-primary w-full justify-center py-2.5 text-sm shadow-brand"
                                @click="close()"
                            >
                                {{ $popup['cta']['label'] }}
                                <x-icon name="arrow-right" class="h-3.5 w-3.5" />
                            </a>

                            <div class="quote-popup-footer">
                                <a
                                    href="{{ $contact['whatsapp'] }}"
                                    target="_blank"
                                    rel="noopener"
                                    class="quote-popup-wa"
                                    @click="close()"
                                >
                                    <x-icon name="whatsapp" class="h-3.5 w-3.5" />
                                    WhatsApp
                                </a>

                                <button type="button" class="quote-popup-dismiss" @click="close()">
                                    {{ $popup['dismiss'] }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
