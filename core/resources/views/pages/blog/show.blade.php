@php
    use App\Support\Seo;

    $contact = config('site.contact');
    $articleSchema = [Seo::articleSchema($post, url()->current())];
@endphp

<x-layouts.app
    :seoTitle="$post['seo_title'] ?? $post['title']"
    :description="$post['excerpt']"
    :image="$post['image'] ?? null"
    type="article"
    :keywords="($post['seo_title'] ?? $post['title']) . ', hükümdar bilişim, dijital pazarlama'"
    :schema="$articleSchema"
    :breadcrumbs="[['label' => 'Blog', 'href' => '/blog'], ['label' => $post['title']]]">

    <x-page-hero
        :eyebrow="$post['category']"
        :title="$post['title']"
        :breadcrumbs="[['label' => 'Blog', 'href' => '/blog'], ['label' => $post['title']]]">
        <div class="mt-6 flex items-center gap-4 text-sm text-ink-500">
            <span class="inline-flex items-center gap-1.5"><x-icon name="calendar" class="h-4 w-4 text-brand-500" /> {{ $post['date'] }}</span>
            <span class="inline-flex items-center gap-1.5"><x-icon name="clock" class="h-4 w-4 text-brand-500" /> {{ $post['read'] }} okuma</span>
        </div>
    </x-page-hero>

    <article class="section-y">
        <div class="container-page">
            <div class="grid gap-12 lg:grid-cols-[1.7fr_1fr] lg:gap-16">
                {{-- Gövde --}}
                <div>
                    <x-blog-cover :post="$post" class="relative mb-10 h-64 rounded-3xl" icon-class="relative h-16 w-16 text-white/80" />

                    <x-blog-body :body="$post['body']" />

                    {{-- Paylaş --}}
                    <div class="mt-10 flex items-center justify-between border-t border-ink-100 pt-6">
                        <a href="/blog" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-700">
                            <x-icon name="arrow-left" class="h-4 w-4" /> Tüm yazılar
                        </a>
                        <div class="flex items-center gap-2">
                            <span class="text-sm text-ink-400">Paylaş:</span>
                            @foreach (config('site.social') as $soc)
                                <a href="{{ $soc['href'] }}" target="_blank" rel="noopener" aria-label="{{ $soc['label'] }}"
                                   class="grid h-9 w-9 place-items-center rounded-full border border-ink-200 text-ink-500 transition hover:border-brand-300 hover:text-brand-700">
                                    <x-icon :name="$soc['icon']" class="h-4 w-4" />
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Yan panel --}}
                <aside class="lg:sticky lg:top-28 lg:self-start">
                    <div class="relative overflow-hidden rounded-3xl bg-ink-900 p-7 text-white">
                        <div class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full bg-brand-600/40 blur-2xl"></div>
                        <div class="relative">
                            <h3 class="text-lg font-bold">Projeniz için konuşalım</h3>
                            <p class="mt-2 text-sm text-white/70">Dijitalde büyümek için doğru adımı atın. Ücretsiz danışmanlık alın.</p>
                            <a href="/iletisim" class="btn btn-primary mt-6 w-full">Ücretsiz Teklif Alın <x-icon name="arrow-right" class="h-4 w-4" /></a>
                        </div>
                    </div>

                    @if (!empty($related))
                        <div class="mt-6 rounded-3xl border border-ink-200 bg-white p-6">
                            <h3 class="text-sm font-semibold uppercase tracking-wider text-ink-400">İlgili Yazılar</h3>
                            <ul class="mt-4 space-y-4">
                                @foreach ($related as $rel)
                                    <li>
                                        <a href="/blog/{{ $rel['slug'] }}" class="group flex gap-3">
                                            <x-blog-cover :post="$rel" class="h-14 w-14 shrink-0 rounded-xl" icon-class="relative h-5 w-5 text-white/80" />
                                            <span>
                                                <span class="block text-sm font-semibold leading-snug text-ink-900 transition group-hover:text-brand-700">{{ $rel['title'] }}</span>
                                                <span class="mt-1 block text-xs text-ink-400">{{ $rel['date'] }}</span>
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </article>

    <x-sections.cta-band />

</x-layouts.app>
