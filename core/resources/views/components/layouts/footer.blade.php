@php
    $brand = config('site.brand');
    $contact = config('site.contact');
    $social = config('site.social');
    $legal = config('legal.footer');
    $services = config('content.services.items');
    $year = date('Y');

    // AI motorlarına gönderilecek soru
    $aiQuery = urlencode('Hükümdar Bilişim (hukumdar.com.tr) hakkında kısa bilgi verir misin? Web tasarım, e-ticaret, özel yazılım, mobil uygulama ve SEO hizmetleriyle markaları dijital dünyada nasıl öne çıkarıyor? Öne çıkan hizmetlerini ve güçlü yönlerini özetle.');

    $aiEngines = [
        ['name' => 'ChatGPT', 'icon' => '/images/tools/chatgpt.png', 'url' => "https://chat.openai.com/?q={$aiQuery}"],
        ['name' => 'Claude', 'icon' => '/images/tools/claude.svg', 'url' => "https://claude.ai/new?q={$aiQuery}"],
        ['name' => 'Gemini', 'icon' => '/images/tools/googlegemini.svg', 'url' => "https://aistudio.google.com/prompts/new_chat?prompt={$aiQuery}"],
        ['name' => 'Perplexity', 'icon' => '/images/tools/perplexity.svg', 'url' => "https://www.perplexity.ai/?q={$aiQuery}"],
        ['name' => 'Grok', 'icon' => '/images/tools/grok.png', 'url' => "https://x.com/i/grok?text={$aiQuery}"],
    ];

    $partners = [
        ['name' => 'Google Partner', 'icon' => '/images/tools/google.svg'],
        ['name' => 'Semrush', 'icon' => '/images/tools/semrush.svg'],
        ['name' => 'Yandex', 'icon' => '/images/tools/yandex.png'],
        ['name' => 'Meta', 'icon' => '/images/tools/meta.svg'],
    ];
@endphp

{{-- Footer Stiller --}}
<style>
    .hk-footer{position:relative;overflow:hidden;background:#0a0a0f;color:#fff;font-family:inherit}
    .hk-footer *{box-sizing:border-box}
    .hk-footer a{color:rgba(255,255,255,.65);text-decoration:none;transition:color .2s}
    .hk-footer a:hover{color:#fff}
    .hk-f-glow{position:absolute;top:-80px;left:25%;width:300px;height:300px;border-radius:50%;background:rgba(var(--c-brand-rgb,181,137,72),.15);filter:blur(120px);pointer-events:none}
    .hk-f-wrap{max-width:1240px;margin:0 auto;padding:0 24px}

    /* ── Üst ana bölüm ── */
    .hk-f-main{display:grid;grid-template-columns:1.3fr 2fr;gap:48px;padding:56px 0 40px;border-bottom:1px solid rgba(255,255,255,.08)}
    .hk-f-logo{height:44px;width:auto;display:block;margin-bottom:18px}
    .hk-f-desc{font-size:13.5px;line-height:1.7;color:rgba(255,255,255,.55);max-width:360px;margin:0 0 24px}

    /* Ofis bilgisi */
    .hk-f-office{margin-top:0}
    .hk-f-off-l{font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:var(--c-brand,#b58948);margin-bottom:6px}
    .hk-f-off-a{font-size:13px;color:rgba(255,255,255,.55);line-height:1.6;margin-bottom:8px}
    .hk-f-off-c{display:inline-flex;align-items:center;gap:6px;font-size:13px;color:rgba(255,255,255,.65)}
    .hk-f-off-c svg{flex-shrink:0}

    /* Menü sütunları */
    .hk-f-menus{display:grid;grid-template-columns:repeat(4,1fr);gap:32px}
    .hk-f-menu{display:flex;flex-direction:column;gap:10px}
    .hk-f-menu-t{font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:1px;color:rgba(255,255,255,.35);margin:0 0 6px}
    .hk-f-menu a{font-size:13px;color:rgba(255,255,255,.6);line-height:1.4}
    .hk-f-menu a:hover{color:#fff}

    /* ── İş Ortaklıkları + AI bandı ── */
    .hk-f-band{display:grid;grid-template-columns:1fr 1fr;gap:0;border-top:1px solid rgba(255,255,255,.08);padding:28px 0}
    .hk-f-band-col{padding:0 32px}
    .hk-f-band-col:first-child{padding-left:0;border-right:1px solid rgba(255,255,255,.08)}
    .hk-f-band-col:last-child{padding-right:0}

    .hk-f-ai-tx{margin-bottom:14px}
    .hk-f-ai-t{display:flex;align-items:center;gap:7px;font-size:14px;font-weight:700;color:#fff}
    .hk-f-ai-t svg{opacity:.7}
    .hk-f-ai-d{display:block;font-size:12.5px;color:rgba(255,255,255,.45);margin-top:3px}

    /* Partner badge'leri */
    .hk-f-partners{display:flex;flex-wrap:wrap;gap:10px}
    .hk-f-partner{display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border:1px solid rgba(255,255,255,.12);border-radius:999px;font-size:13px;font-weight:600;color:rgba(255,255,255,.8);background:rgba(255,255,255,.04);white-space:nowrap}
    .hk-f-partner-ic{width:24px;height:24px;object-fit:contain;flex-shrink:0}

    /* AI butonları */
    .hk-f-ai-btns{display:flex;flex-wrap:wrap;gap:10px}
    .hk-f-ai-btn{display:inline-flex;align-items:center;gap:7px;padding:8px 16px;border:1px solid rgba(255,255,255,.12);border-radius:999px;font-size:13px;font-weight:600;color:rgba(255,255,255,.8);background:rgba(255,255,255,.04);white-space:nowrap;transition:border-color .2s,background .2s}
    .hk-f-ai-btn:hover{border-color:rgba(255,255,255,.3);background:rgba(255,255,255,.08);color:#fff}
    .hk-f-ai-ic{width:18px;height:18px;object-fit:contain;flex-shrink:0;border-radius:4px}

    /* ── Alt bar ── */
    .hk-f-bottom{display:flex;align-items:flex-start;justify-content:space-between;gap:24px;padding:24px 0;border-top:1px solid rgba(255,255,255,.08)}
    .hk-f-copy{font-size:12.5px;color:rgba(255,255,255,.4);line-height:1.6}
    .hk-f-bottom-r{display:flex;align-items:center;gap:16px;flex-shrink:0}

    /* Ödeme */
    .hk-f-pay{display:flex;align-items:center;flex-wrap:wrap;gap:7px;margin-top:8px}
    .hk-f-pay-chip{display:inline-flex;line-height:0;border-radius:4px;box-shadow:0 0 0 1px rgba(255,255,255,.14)}

    /* Sosyal medya */
    .hk-f-social{display:flex;align-items:center;gap:10px}
    .hk-f-soc{display:grid;place-items:center;width:44px;height:44px;border-radius:50%;border:1px solid rgba(255,255,255,.1);background:rgba(255,255,255,.04);color:rgba(255,255,255,.6);transition:all .2s}
    .hk-f-soc:hover{border-color:var(--c-brand,#b58948);background:var(--c-brand,#b58948);color:#fff}
    .hk-f-soc svg{width:20px;height:20px;fill:currentColor}

    /* llms.txt badge */
    .hk-f-llms{display:inline-flex;align-items:center;gap:6px;font-size:12.5px;font-weight:600;color:rgba(255,255,255,.6);border:1px solid rgba(255,255,255,.1);border-radius:999px;padding:6px 12px;white-space:nowrap}
    .hk-f-llms:hover{color:#fff;border-color:rgba(255,255,255,.25)}
    .hk-f-llms .tag{font-size:10px;font-weight:700;background:var(--c-brand,#b58948);color:#fff;padding:2px 7px;border-radius:999px;margin-left:2px}

    /* ── Responsive ── */
    @media(max-width:1024px){
        .hk-f-main{grid-template-columns:1fr;gap:36px}
        .hk-f-menus{grid-template-columns:repeat(2,1fr);gap:28px}
        .hk-f-band{grid-template-columns:1fr;gap:28px}
        .hk-f-band-col{padding:0!important;border-right:none!important}
        .hk-f-band-col:first-child{padding-bottom:24px!important;border-bottom:1px solid rgba(255,255,255,.08)}
    }
    @media(max-width:640px){
        .hk-f-menus{grid-template-columns:1fr 1fr;gap:24px}
        .hk-f-bottom{flex-direction:column;align-items:flex-start;gap:16px}
        .hk-f-bottom-r{flex-wrap:wrap}
        .hk-f-partners,.hk-f-ai-btns{gap:8px}
        .hk-f-partner,.hk-f-ai-btn{padding:7px 12px;font-size:12px}
    }
</style>

<footer class="hk-footer" data-screen-label="Footer">
    <div class="hk-f-glow"></div>
    <div class="hk-f-wrap">

        {{-- ════════ ÜST: Logo + Açıklama + Ofis  |  4 Menü Sütunu ════════ --}}
        <div class="hk-f-main">
            <div>
                <x-brand-logo variant="footer" />
                <p class="hk-f-desc">{{ $brand['footer_description'] }}</p>

                {{-- Ofis bilgisi --}}
                <div class="hk-f-office">
                    <div class="hk-f-off-l">İstanbul Ofisi</div>
                    <div class="hk-f-off-a">{!! nl2br(e($contact['address'])) !!}</div>
                    <a class="hk-f-off-c" href="{{ $contact['phone_href'] }}" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/KUz5CKnUt-McEJS6_8pD');">
                        <x-icon name="phone" class="h-3.5 w-3.5" />
                        {{ $contact['phone'] }}
                    </a>
                    &nbsp;&nbsp;
                    <a class="hk-f-off-c" href="mailto:{{ $contact['email'] }}">
                        <x-icon name="mail" class="h-3.5 w-3.5" />
                        {{ $contact['email'] }}
                    </a>
                </div>
            </div>

            {{-- Menü sütunları --}}
            <div class="hk-f-menus">
                {{-- Hizmetler --}}
                <div class="hk-f-menu">
                    <p class="hk-f-menu-t">Hizmetler</p>
                    @foreach (array_slice($services, 0, 6) as $service)
                        <a href="/hizmetler/{{ $service['slug'] }}">{{ $service['title'] }}</a>
                    @endforeach
                </div>

                {{-- Yazılım Ürünleri --}}
                <div class="hk-f-menu">
                    <p class="hk-f-menu-t">Yazılım Ürünleri</p>
                    @foreach (array_slice($services, 6) as $service)
                        <a href="/hizmetler/{{ $service['slug'] }}">{{ $service['title'] }}</a>
                    @endforeach
                    <a href="/hizmetler">Tüm Hizmetler</a>
                </div>

                {{-- Kurumsal --}}
                <div class="hk-f-menu">
                    <p class="hk-f-menu-t">Kurumsal</p>
                    <a href="/hakkimizda">Hakkımızda</a>
                    <a href="/referanslar">Referanslarımız</a>
                    <a href="/fiyatlar">Paketler & Fiyatlar</a>
                    <a href="/blog">Blog</a>
                    <a href="/iletisim">İletişim</a>
                    @foreach ($legal as $link)
                        <a href="/{{ $link['slug'] }}">{{ $link['label'] }}</a>
                    @endforeach
                </div>

                {{-- İletişim --}}
                <div class="hk-f-menu">
                    <p class="hk-f-menu-t">İletişim</p>
                    <a href="{{ $contact['phone_href'] }}" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/KUz5CKnUt-McEJS6_8pD');">{{ $contact['phone'] }}</a>
                    <a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a>
                    <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD');">WhatsApp İletişim</a>
                    <span style="font-size:13px;color:rgba(255,255,255,.5);line-height:1.5;margin-top:4px">{{ $contact['address'] }}</span>
                    <a href="/iletisim" style="display:inline-flex;align-items:center;justify-content:center;margin-top:10px;padding:10px 20px;background:var(--c-brand,#b58948);color:#fff;font-weight:700;font-size:13px;border-radius:8px;white-space:nowrap">Ücretsiz Teklif Alın</a>
                </div>
            </div>
        </div>

        {{-- ════════ İŞ ORTAKLIKLARI + AI ÖZETİ İSTEYİN ════════ --}}
        <div class="hk-f-band">
            {{-- İş Ortaklıkları --}}
            <div class="hk-f-band-col">
                <div class="hk-f-ai-tx">
                    <span class="hk-f-ai-t">
                        <x-icon name="shield" class="h-4 w-4" />
                        İş Ortaklıkları
                    </span>
                    <span class="hk-f-ai-d">Sektörün lider platformlarıyla resmi iş ortaklıkları.</span>
                </div>
                <div class="hk-f-partners">
                    @foreach ($partners as $partner)
                        <span class="hk-f-partner">
                            <img class="hk-f-partner-ic" src="{{ $partner['icon'] }}" alt="{{ $partner['name'] }}" loading="lazy">
                            {{ $partner['name'] }}
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- AI Özeti İsteyin --}}
            <div class="hk-f-band-col">
                <div class="hk-f-ai-tx">
                    <span class="hk-f-ai-t">
                        <x-icon name="sparkles" class="h-4 w-4" />
                        AI özeti isteyin
                    </span>
                    <span class="hk-f-ai-d">Tek tıkla sevdiğiniz motora Hükümdar Bilişim'i sorun.</span>
                </div>
                <div class="hk-f-ai-btns">
                    @foreach ($aiEngines as $engine)
                        <a class="hk-f-ai-btn" href="{{ $engine['url'] }}" target="_blank" rel="noopener nofollow" aria-label="{{ $engine['name'] }}'a sor">
                            <img class="hk-f-ai-ic" src="{{ $engine['icon'] }}" alt="{{ $engine['name'] }}" loading="lazy">
                            {{ $engine['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- ════════ ALT BAR ════════ --}}
        <div class="hk-f-bottom">
            <span class="hk-f-copy">
                © 2008 – {{ $year }} {{ $brand['name'] }} · Tüm Hakları Saklıdır.

                {{-- Ödeme ikonları --}}
                <span class="hk-f-pay">
                    <span class="hk-f-pay-chip" role="img" aria-label="Visa ile ödeme kabul edilir">
                        <svg viewBox="0 0 44 26" width="44" height="26" aria-hidden="true" focusable="false">
                            <rect width="44" height="26" rx="4" fill="#fff"/>
                            <text x="22" y="18" text-anchor="middle" font-family="Helvetica,Arial,sans-serif"
                                  font-size="13" font-weight="700" font-style="italic" letter-spacing="0.5" fill="#1434CB">VISA</text>
                        </svg>
                    </span>
                    <span class="hk-f-pay-chip" role="img" aria-label="Mastercard ile ödeme kabul edilir">
                        <svg viewBox="0 0 44 26" width="44" height="26" aria-hidden="true" focusable="false">
                            <rect width="44" height="26" rx="4" fill="#fff"/>
                            <circle cx="18" cy="13" r="7" fill="#EB001B"/>
                            <circle cx="26" cy="13" r="7" fill="#F79E1B"/>
                            <path d="M22 7.26A7 7 0 0 1 22 18.74A7 7 0 0 1 22 7.26Z" fill="#FF5F00"/>
                        </svg>
                    </span>
                </span>
            </span>

            <div class="hk-f-bottom-r">
                {{-- Sosyal medya ve llms.txt --}}
                <div class="hk-f-social">
                    <a class="hk-f-soc" href="#" target="_blank" rel="noopener" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24"><path d="M20.4 20.4h-3.5v-5.6c0-1.3 0-3-1.9-3s-2.1 1.4-2.1 2.9v5.7H9.4V9h3.3v1.6h.1c.5-.9 1.6-1.9 3.4-1.9 3.6 0 4.3 2.4 4.3 5.5v6.2zM5.3 7.4a2.1 2.1 0 1 1 0-4.1 2.1 2.1 0 0 1 0 4.1zM7.1 20.4H3.6V9h3.5v11.4z"/></svg>
                    </a>
                    <a class="hk-f-soc" href="#" target="_blank" rel="noopener" aria-label="Instagram">
                        <svg viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.9.1 3.3.1 4.8 1.7 4.9 4.9.1 1.3.1 1.6.1 4.8s0 3.6-.1 4.8c-.1 3.2-1.7 4.8-4.9 4.9-1.3.1-1.6.1-4.9.1s-3.6 0-4.8-.1c-3.3-.1-4.8-1.7-4.9-4.9C2.2 15.6 2.2 15.3 2.2 12s0-3.6.1-4.8C2.4 4 4 2.4 7.2 2.3 8.4 2.2 8.8 2.2 12 2.2zM12 5.8a6.2 6.2 0 1 0 0 12.4 6.2 6.2 0 0 0 0-12.4zm0 10.2a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.4-11.8a1.4 1.4 0 1 0 0 2.9 1.4 1.4 0 0 0 0-2.9z"/></svg>
                    </a>
                    <a class="hk-f-soc" href="#" target="_blank" rel="noopener" aria-label="Facebook">
                        <svg viewBox="0 0 24 24"><path d="M24 12c0-6.6-5.4-12-12-12S0 5.4 0 12c0 6 4.4 11 10.1 11.9v-8.4H7.1V12h3V9.4c0-3 1.8-4.7 4.5-4.7 1.3 0 2.7.2 2.7.2v3H15.8c-1.5 0-2 .9-2 1.9V12h3.3l-.5 3.5h-2.8v8.4C19.6 23 24 18 24 12z"/></svg>
                    </a>
                    <a class="hk-f-soc" href="#" target="_blank" rel="noopener" aria-label="X">
                        <svg viewBox="0 0 24 24"><path d="M18.2 2.2h3.3l-7.2 8.3 8.5 11.2h-6.6l-5.2-6.8-6 6.8H1.7l7.7-8.8L1.2 2.2H8l4.7 6.2 5.5-6.2zm-1.2 17.6h1.8L7 4.1H5.1z"/></svg>
                    </a>
                </div>

                <a href="/llms.txt" class="hk-f-llms" aria-label="LLMs (AI) Ready">
                    <x-icon name="sparkles" class="h-3.5 w-3.5" />
                    llms.txt
                    <span class="tag">AI Ready</span>
                </a>
            </div>
        </div>

    </div>
</footer>

{{-- Yukarı çık butonu --}}
<button type="button"
        x-data
        x-show="$store.ui.scrolled"
        x-transition
        @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-6 right-6 z-40 grid h-12 w-12 place-items-center rounded-full bg-brand-600 text-white shadow-brand-lg transition hover:bg-brand-700 max-lg:bottom-24"
        aria-label="Yukarı çık">
    <x-icon name="chevron-down" class="h-5 w-5 rotate-180" />
</button>
