@php
    $contact = config('site.contact');
    $social = config('site.social');
    $services = config('content.services.items');
    $budgets = ['10.000 ₺ altı', '10.000 - 25.000 ₺', '25.000 - 50.000 ₺', '50.000 ₺ ve üzeri'];
    $timelines = ['Acil (1-2 hafta)', '1 ay içinde', '1-3 ay', 'Henüz net değil'];
@endphp

@php $seo = config('site.seo.pages.contact'); @endphp

<x-layouts.app
    :seoTitle="$seo['title']"
    :description="$seo['description']"
    keywords="hükümdar bilişim iletişim, bahçelievler web tasarım, ücretsiz web sitesi teklifi, yazılım ajansı telefon"
    :breadcrumbs="[['label' => 'İletişim']]">

    <x-page-hero
        eyebrow="İletişim"
        title="Hadi birlikte <span class='text-gradient'>çalışalım</span>"
        description="Destek ve sorularınız için bizimle iletişime geçebilirsiniz. Aşağıdaki formu doldurup bize ulaşabilirsiniz."
        :breadcrumbs="[['label' => 'İletişim']]" />

    <section class="section-y">
        <div class="container-page">
            <div class="grid gap-8 lg:grid-cols-[1fr_1.6fr] lg:gap-12">

                {{-- =================== SOL: İletişim bilgileri =================== --}}
                <div class="space-y-5">
                    {{-- Bilgi kartları --}}
                    <div class="space-y-3">
                        <a href="{{ $contact['phone_href'] }}" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/KUz5CKnUt-McEJS6_8pD');" class="group flex items-center gap-4 rounded-2xl border border-ink-200 bg-white p-5 transition hover:-translate-y-0.5 hover:border-brand-200 hover:shadow-card">
                            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition group-hover:bg-brand-600 group-hover:text-white">
                                <x-icon name="phone" class="h-5 w-5" />
                            </span>
                            <span>
                                <span class="block text-xs uppercase tracking-wide text-ink-400">Telefon</span>
                                <span class="block font-semibold text-ink-900">{{ $contact['phone'] }}</span>
                            </span>
                        </a>
                        <a href="mailto:{{ $contact['email'] }}" class="group flex items-center gap-4 rounded-2xl border border-ink-200 bg-white p-5 transition hover:-translate-y-0.5 hover:border-brand-200 hover:shadow-card">
                            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition group-hover:bg-brand-600 group-hover:text-white">
                                <x-icon name="mail" class="h-5 w-5" />
                            </span>
                            <span>
                                <span class="block text-xs uppercase tracking-wide text-ink-400">E-posta</span>
                                <span class="block font-semibold text-ink-900">{{ $contact['email'] }}</span>
                            </span>
                        </a>
                        <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/dMz2CKO6pOMcEJS6_8pD');" class="group flex items-center gap-4 rounded-2xl border border-ink-200 bg-white p-5 transition hover:-translate-y-0.5 hover:border-emerald-200 hover:shadow-card">
                            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-emerald-50 text-emerald-600 ring-1 ring-emerald-100 transition group-hover:bg-emerald-500 group-hover:text-white">
                                <x-icon name="whatsapp" class="h-5 w-5" />
                            </span>
                            <span>
                                <span class="block text-xs uppercase tracking-wide text-ink-400">WhatsApp</span>
                                <span class="block font-semibold text-ink-900">Satış öncesi destek & detaylı bilgi</span>
                            </span>
                        </a>
                    </div>

                    {{-- Çalışma saatleri --}}
                    <div class="rounded-2xl border border-ink-200 bg-white p-6">
                        <div class="flex items-center gap-2.5">
                            <x-icon name="clock" class="h-5 w-5 text-brand-600" />
                            <h3 class="font-bold text-ink-900">Çalışma Saatleri</h3>
                        </div>
                        <ul class="mt-4 space-y-2.5 text-sm">
                            <li class="flex items-center justify-between text-ink-600"><span>Pazartesi - Cuma</span><span class="font-medium text-ink-900">09:00 - 19:00</span></li>
                            <li class="flex items-center justify-between text-ink-600"><span>Cumartesi - Pazar</span><span class="font-medium text-ink-900">09:00 - 19:00</span></li>
                        </ul>
                        <div class="mt-4 flex items-center gap-2 rounded-xl bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                            <span class="relative flex h-2 w-2">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                                <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                            </span>
                            Şu an çevrimiçiyiz · ortalama yanıt 2 saat
                        </div>
                    </div>

                    {{-- Konum / harita --}}
                    <div class="overflow-hidden rounded-2xl border border-ink-200 bg-white">
                        <div class="relative flex h-44 items-center justify-center overflow-hidden bg-gradient-to-br from-ink-800 to-ink-950">
                            <div class="absolute inset-0 bg-grid opacity-[0.12]"></div>
                            <div class="relative flex flex-col items-center text-center text-white">
                                <span class="grid h-12 w-12 place-items-center rounded-full bg-brand-600 shadow-brand">
                                    <x-icon name="location" class="h-6 w-6" />
                                </span>
                                <span class="mt-3 font-semibold">{{ $contact['address'] }}</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between p-5">
                            <span class="text-sm text-ink-500">Tüm Türkiye’ye hizmet veriyoruz.</span>
                            <div class="flex items-center gap-1.5">
                                @foreach ($social as $soc)
                                    <a href="{{ $soc['href'] }}" target="_blank" rel="noopener" aria-label="{{ $soc['label'] }}"
                                       class="grid h-9 w-9 place-items-center rounded-full border border-ink-200 text-ink-500 transition hover:border-brand-300 hover:text-brand-700">
                                        <x-icon :name="$soc['icon']" class="h-4 w-4" />
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- =================== SAĞ: Gelişmiş çok adımlı form =================== --}}
                <div class="rounded-3xl border border-ink-200 bg-white p-6 shadow-elevated sm:p-8 lg:p-10"
                     x-data="contactForm()"
                     x-init="init()">

                    {{-- Form başlığı + ilerleme --}}
                    <div x-show="!sent">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <h2 class="text-xl font-bold text-ink-900">Proje Talep Formu</h2>
                                <p class="mt-1.5 text-sm text-ink-500">Birkaç adımda projenizi anlatın.</p>
                            </div>
                            <span class="chip shrink-0"><span x-text="step"></span> / <span x-text="total"></span> adım</span>
                        </div>

                        {{-- İlerleme çubuğu --}}
                        <div class="mt-6 h-1.5 w-full overflow-hidden rounded-full bg-ink-100">
                            <div class="h-full rounded-full bg-gradient-to-r from-brand-600 to-brand-400 transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
                                 :style="`width: ${progress}%`"></div>
                        </div>

                        {{-- Adım etiketleri --}}
                        <div class="mt-4 grid grid-cols-3 gap-2 text-center text-xs font-medium">
                            <template x-for="(label, i) in stepLabels" :key="i">
                                <span :class="step >= i + 1 ? 'text-brand-700' : 'text-ink-400'" x-text="label"></span>
                            </template>
                        </div>

                        <form @submit.prevent="submit()" class="mt-8">
                            {{-- ---------- ADIM 1: Hizmet & Bütçe ---------- --}}
                            <div x-show="step === 1" x-transition.opacity>
                                <label class="field-label">Hangi hizmet(ler)le ilgileniyorsunuz? <span class="text-ink-400">(birden fazla seçebilirsiniz)</span></label>
                                <div class="grid gap-3 sm:grid-cols-2">
                                    @foreach ($services as $service)
                                        <label class="choice-card" :data-checked="form.services.includes('{{ $service['title'] }}')">
                                            <input type="checkbox" class="peer sr-only" value="{{ $service['title'] }}" x-model="form.services">
                                            <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">
                                                <x-icon :name="$service['icon']" class="h-5 w-5" />
                                            </span>
                                            <span class="min-w-0">
                                                <span class="block text-sm font-semibold text-ink-900">{{ $service['title'] }}</span>
                                                <span class="mt-0.5 block text-xs leading-snug text-ink-500">{{ $service['short'] }}</span>
                                            </span>
                                            <span class="absolute right-3 top-3 grid h-5 w-5 place-items-center rounded-full border border-ink-200 text-white transition"
                                                  :class="form.services.includes('{{ $service['title'] }}') ? 'border-brand-600 bg-brand-600' : ''">
                                                <x-icon name="check" class="h-3 w-3" x-show="form.services.includes('{{ $service['title'] }}')" />
                                            </span>
                                        </label>
                                    @endforeach
                                </div>

                                <label class="field-label mt-7">Tahmini bütçeniz</label>
                                <div class="grid gap-3 sm:grid-cols-2">
                                    @foreach ($budgets as $budget)
                                        <label class="choice-card items-center" :data-checked="form.budget === '{{ $budget }}'">
                                            <input type="radio" name="budget" class="sr-only" value="{{ $budget }}" x-model="form.budget">
                                            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-brand-50 text-brand-600">
                                                <x-icon name="wallet" class="h-5 w-5" />
                                            </span>
                                            <span class="text-sm font-semibold text-ink-900">{{ $budget }}</span>
                                        </label>
                                    @endforeach
                                </div>

                                <div class="mt-8 flex justify-end">
                                    <button type="button" class="btn btn-primary" @click="next()">
                                        Devam et <x-icon name="arrow-right" class="h-4 w-4" />
                                    </button>
                                </div>
                            </div>

                            {{-- ---------- ADIM 2: Proje detayları ---------- --}}
                            <div x-show="step === 2" x-transition.opacity x-cloak>
                                <label class="field-label">Proje zaman planınız</label>
                                <div class="grid gap-3 sm:grid-cols-2">
                                    @foreach ($timelines as $timeline)
                                        <label class="choice-card items-center" :data-checked="form.timeline === '{{ $timeline }}'">
                                            <input type="radio" name="timeline" class="sr-only" value="{{ $timeline }}" x-model="form.timeline">
                                            <span class="grid h-9 w-9 shrink-0 place-items-center rounded-lg bg-brand-50 text-brand-600">
                                                <x-icon name="calendar" class="h-5 w-5" />
                                            </span>
                                            <span class="text-sm font-semibold text-ink-900">{{ $timeline }}</span>
                                        </label>
                                    @endforeach
                                </div>

                                <div class="mt-7">
                                    <label for="website" class="field-label">Mevcut web siteniz <span class="text-ink-400">(varsa)</span></label>
                                    <div class="relative">
                                        <span class="pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-ink-400"><x-icon name="globe" class="h-5 w-5" /></span>
                                        <input id="website" type="text" x-model="form.website" placeholder="https://siteniz.com" class="field-input has-icon">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <label for="message" class="field-label">Projenizden bahsedin</label>
                                    <textarea id="message" rows="5" x-model="form.message" placeholder="Hedefleriniz, beklentileriniz ve aklınızdaki detaylar..." class="field-input"></textarea>
                                </div>

                                <div class="mt-8 flex items-center justify-between">
                                    <button type="button" class="btn btn-ghost" @click="prev()">
                                        <x-icon name="arrow-left" class="h-4 w-4" /> Geri
                                    </button>
                                    <button type="button" class="btn btn-primary" @click="next()">
                                        Devam et <x-icon name="arrow-right" class="h-4 w-4" />
                                    </button>
                                </div>
                            </div>

                            {{-- ---------- ADIM 3: İletişim bilgileri ---------- --}}
                            <div x-show="step === 3" x-transition.opacity x-cloak>
                                <div class="grid gap-5 sm:grid-cols-2">
                                    <div>
                                        <label for="name" class="field-label">Ad Soyad *</label>
                                        <input id="name" type="text" x-model="form.name" required placeholder="Adınız Soyadınız" class="field-input" :class="errors.name ? '!border-danger' : ''">
                                        <p x-show="errors.name" x-cloak class="mt-1.5 text-xs text-danger">Lütfen adınızı girin.</p>
                                    </div>
                                    <div>
                                        <label for="company" class="field-label">Şirket / Marka</label>
                                        <input id="company" type="text" x-model="form.company" placeholder="Şirket adınız" class="field-input">
                                    </div>
                                    <div>
                                        <label for="email" class="field-label">E-posta *</label>
                                        <input id="email" type="email" x-model="form.email" required placeholder="ornek@eposta.com" class="field-input" :class="errors.email ? '!border-danger' : ''">
                                        <p x-show="errors.email" x-cloak class="mt-1.5 text-xs text-danger">Geçerli bir e-posta girin.</p>
                                    </div>
                                    <div>
                                        <label for="phone" class="field-label">Telefon *</label>
                                        <input id="phone" type="tel" x-model="form.phone" required placeholder="05XX XXX XX XX" class="field-input" :class="errors.phone ? '!border-danger' : ''">
                                        <p x-show="errors.phone" x-cloak class="mt-1.5 text-xs text-danger">Lütfen telefonunuzu girin.</p>
                                    </div>
                                </div>

                                {{-- Özet --}}
                                <div class="mt-6 rounded-2xl border border-ink-100 bg-surface-muted p-5">
                                    <h4 class="text-sm font-semibold text-ink-900">Talep özeti</h4>
                                    <dl class="mt-3 space-y-2 text-sm">
                                        <div class="flex gap-2" x-show="form.services.length">
                                            <dt class="shrink-0 text-ink-400">Hizmetler:</dt>
                                            <dd class="font-medium text-ink-700" x-text="form.services.join(', ')"></dd>
                                        </div>
                                        <div class="flex gap-2" x-show="form.budget">
                                            <dt class="shrink-0 text-ink-400">Bütçe:</dt>
                                            <dd class="font-medium text-ink-700" x-text="form.budget"></dd>
                                        </div>
                                        <div class="flex gap-2" x-show="form.timeline">
                                            <dt class="shrink-0 text-ink-400">Zaman:</dt>
                                            <dd class="font-medium text-ink-700" x-text="form.timeline"></dd>
                                        </div>
                                        <p class="text-ink-400" x-show="!form.services.length && !form.budget && !form.timeline">Önceki adımlardaki seçimleriniz burada görünür.</p>
                                    </dl>
                                </div>

                                <label class="mt-5 flex items-start gap-3 text-sm text-ink-600">
                                    <input type="checkbox" x-model="form.kvkk" class="mt-0.5 h-4 w-4 rounded border-ink-300 text-brand-600 focus:ring-brand-500">
                                    <span>Kişisel verilerimin <a href="/kvkk-aydinlatma-metni" class="font-medium text-brand-700 underline">KVKK Aydınlatma Metni</a> kapsamında işlenmesini onaylıyorum.</span>
                                </label>
                                <p x-show="errors.kvkk" x-cloak class="mt-1.5 text-xs text-danger">Devam etmek için onay vermelisiniz.</p>

                                <p x-show="submitError" x-cloak class="mt-4 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700" x-text="submitError"></p>

                                <div class="mt-8 flex items-center justify-between">
                                    <button type="button" class="btn btn-ghost" @click="prev()" :disabled="sending">
                                        <x-icon name="arrow-left" class="h-4 w-4" /> Geri
                                    </button>
                                    <button type="submit" class="btn btn-primary" :disabled="sending">
                                        <span x-show="!sending">Talebi Gönder <x-icon name="send" class="h-4 w-4" /></span>
                                        <span x-show="sending" x-cloak class="inline-flex items-center gap-2">
                                            <span class="h-4 w-4 animate-spin rounded-full border-2 border-white/30 border-t-white"></span>
                                            Gönderiliyor...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- ---------- Başarı durumu ---------- --}}
                    <div x-show="sent" x-cloak x-transition class="flex flex-col items-center justify-center py-16 text-center">
                        <span class="grid h-20 w-20 place-items-center rounded-full bg-emerald-100 text-emerald-600">
                            <x-icon name="check-circle" class="h-11 w-11" />
                        </span>
                        <h3 class="mt-6 text-2xl font-extrabold text-ink-900">Talebiniz alındı! 🎉</h3>
                        <p class="mt-3 max-w-md text-ink-500">Teşekkürler <span class="font-semibold text-ink-700" x-text="form.name"></span>. Ekibimiz talebinizi inceledi; <strong>24 saat içinde</strong> size dönüş yapacağız.</p>
                        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
                            <a href="/" class="btn btn-ghost"><x-icon name="arrow-left" class="h-4 w-4" /> Anasayfaya dön</a>
                            <a href="/referanslar" class="btn btn-primary">Çalışmalarımızı görün</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-sections.faq />

</x-layouts.app>
