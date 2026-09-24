@props([
    'title' => 'Projenizi birlikte hayata geçirelim',
    'description' => 'Ücretsiz keşif görüşmesinde ihtiyaçlarınızı dinleyelim, size en uygun çözümü birlikte belirleyelim.',
])

@php $contact = config('site.contact'); @endphp

<section class="section-y">
    <div class="container-page">
        <div class="relative overflow-hidden rounded-[2rem] bg-ink-900 px-6 py-14 text-center sm:px-10 lg:px-16 lg:py-20">
            <div class="pointer-events-none absolute inset-0 -z-0">
                <div class="absolute inset-0 bg-grid opacity-[0.07]"></div>
                <div class="absolute -left-20 -top-24 h-80 w-80 rounded-full bg-brand-600/40 blur-[100px]"></div>
                <div class="absolute -bottom-24 right-0 h-80 w-80 rounded-full bg-accent/20 blur-[100px]"></div>
            </div>

            <div class="relative mx-auto max-w-2xl">
                <span class="eyebrow justify-center text-accent">
                    <span class="h-1.5 w-1.5 rounded-full bg-accent"></span>Hazır mısınız?
                </span>
                <h2 class="mt-4 text-h2 font-extrabold tracking-tight text-white">{{ $title }}</h2>
                <p class="mt-5 text-lead text-white/70">{{ $description }}</p>

                <div class="mt-9 flex flex-wrap items-center justify-center gap-3">
                    <a href="/iletisim" class="btn btn-primary">
                        Ücretsiz Teklif Alın <x-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                    <a href="{{ $contact['whatsapp'] }}" target="_blank" rel="noopener"
                       class="btn btn-light bg-white/10 text-white backdrop-blur hover:bg-white/15">
                        <x-icon name="whatsapp" class="h-5 w-5 text-emerald-400" /> WhatsApp ile yazın
                    </a>
                </div>

                <div class="mt-8 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-sm text-white/60">
                    <a href="{{ $contact['phone_href'] }}" class="inline-flex items-center gap-2 transition hover:text-white">
                        <x-icon name="phone" class="h-4 w-4 text-accent" /> {{ $contact['phone'] }}
                    </a>
                    <a href="mailto:{{ $contact['email'] }}" class="inline-flex items-center gap-2 transition hover:text-white">
                        <x-icon name="mail" class="h-4 w-4 text-accent" /> {{ $contact['email'] }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
