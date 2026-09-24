@php $f = config('content.faq'); @endphp

<section id="sss" class="section-y relative scroll-mt-24">
    <div class="container-page">
        <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">
            {{-- Sol başlık --}}
            <div class="lg:sticky lg:top-28 lg:self-start">
                <x-section-heading align="left" :eyebrow="$f['eyebrow']" :title="$f['title']" :description="$f['description']" />
                <a href="/iletisim" class="btn btn-primary mt-8">Tüm sorularınız için yazın <x-icon name="arrow-right" class="h-4 w-4" /></a>
            </div>

            {{-- Akordeon --}}
            <div class="divide-y divide-ink-100 rounded-3xl border border-ink-200 bg-white px-2 shadow-card">
                @foreach ($f['items'] as $item)
                    <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="px-4">
                        <button
                            type="button"
                            class="flex w-full items-center justify-between gap-4 py-5 text-left"
                            @click="open = !open"
                            :aria-expanded="open">
                            <span class="text-base font-semibold text-ink-900">{{ $item['q'] }}</span>
                            <span class="grid h-8 w-8 shrink-0 place-items-center rounded-full border border-ink-200 text-brand-600 transition-transform duration-300"
                                  :class="open ? 'rotate-45 bg-brand-600 text-white border-brand-600' : ''">
                                <x-icon name="plus" class="h-4 w-4" />
                            </span>
                        </button>
                        <div x-show="open" x-collapse x-cloak>
                            <p class="pb-5 pr-12 text-sm leading-relaxed text-ink-500">{{ $item['a'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
