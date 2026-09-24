@php
    use App\Support\Seo;
    $seo = config('site.seo.pages.blog');
    $featured = $posts[0] ?? null;
    $rest     = array_slice($posts, 1);
@endphp

<x-layouts.app
    :seoTitle="$seo['title']"
    :description="$seo['description']"
    keywords="hükümdar bilişim blog, teknoloji, dijital pazarlama, seo rehberi"
    :breadcrumbs="[['label' => 'Blog']]">

    <x-page-hero
        eyebrow="Blog"
        title="Dijital dünyadan <span class='text-gradient'>içerikler</span>"
        :description="$seo['description']"
        :breadcrumbs="[['label' => 'Blog']]" />

    <section class="section-y">
        <div class="container-page">

            {{-- Kategori filtreleri --}}
            @if (!empty($categories))
                <div class="mb-10 flex flex-wrap items-center gap-2.5">
                    <a href="/blog"
                       class="chip {{ !$catName ? '!border-brand-600 !bg-brand-600 !text-white' : '' }}">
                        Tümü
                    </a>
                    @foreach ($categories as $cat)
                        <a href="/blog?cat={{ urlencode($cat['name']) }}"
                           class="chip {{ $catName === $cat['name'] ? '!border-brand-600 !bg-brand-600 !text-white' : '' }}">
                            {{ $cat['name'] }}
                        </a>
                    @endforeach
                </div>
            @endif

            {{-- Öne çıkan yazı (ilk yazı) --}}
            @if ($featured)
                <a href="/blog/{{ $featured['slug'] }}"
                   class="group grid overflow-hidden rounded-3xl border border-ink-200 bg-white shadow-card transition duration-500 hover:shadow-elevated lg:grid-cols-2">
                    <x-blog-cover :post="$featured" class="relative min-h-64">
                        @if ($featured['category'])
                            <span class="absolute left-5 top-5 z-10 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-brand-700 backdrop-blur">
                                {{ $featured['category'] }}
                            </span>
                        @endif
                    </x-blog-cover>
                    <div class="flex flex-col justify-center p-8 lg:p-10">
                        <span class="eyebrow"><span class="h-1.5 w-1.5 rounded-full bg-brand-500"></span>Öne Çıkan</span>
                        <h2 class="mt-4 text-h3 font-extrabold leading-snug text-ink-900 transition group-hover:text-brand-700">
                            {{ $featured['title'] }}
                        </h2>
                        @if ($featured['excerpt'])
                            <p class="mt-3 text-ink-500">{{ $featured['excerpt'] }}</p>
                        @endif
                        <div class="mt-5 flex items-center gap-3 text-xs text-ink-400">
                            <span class="inline-flex items-center gap-1.5">
                                <x-icon name="calendar" class="h-3.5 w-3.5" /> {{ $featured['date'] }}
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <x-icon name="clock" class="h-3.5 w-3.5" /> {{ $featured['read'] }} okuma
                            </span>
                        </div>
                        <span class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700">
                            Devamını oku <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                        </span>
                    </div>
                </a>
            @endif

            {{-- Diğer yazılar --}}
            @if (!empty($rest))
                <div class="mt-8 grid gap-5 md:grid-cols-3">
                    @foreach ($rest as $item)
                        <article
                            class="group flex flex-col overflow-hidden rounded-3xl border border-ink-200 bg-white shadow-card transition duration-500 hover:-translate-y-1 hover:shadow-elevated"
                            x-data="{ show: false }" x-intersect.once="show = true"
                            :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-6'"
                            style="transition: opacity .6s var(--ease-out-expo), transform .6s var(--ease-out-expo); transition-delay: {{ $loop->index * 90 }}ms">
                            <a href="/blog/{{ $item['slug'] }}" class="block">
                                <x-blog-cover :post="$item" class="relative h-44">
                                    @if ($item['category'])
                                        <span class="absolute left-4 top-4 z-10 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-brand-700 backdrop-blur">
                                            {{ $item['category'] }}
                                        </span>
                                    @endif
                                </x-blog-cover>
                            </a>
                            <div class="flex flex-1 flex-col p-6">
                                <div class="flex items-center gap-3 text-xs text-ink-400">
                                    <span class="inline-flex items-center gap-1.5">
                                        <x-icon name="calendar" class="h-3.5 w-3.5" /> {{ $item['date'] }}
                                    </span>
                                    <span class="inline-flex items-center gap-1.5">
                                        <x-icon name="clock" class="h-3.5 w-3.5" /> {{ $item['read'] }} okuma
                                    </span>
                                </div>
                                <h3 class="mt-3 text-lg font-bold leading-snug text-ink-900 transition group-hover:text-brand-700">
                                    <a href="/blog/{{ $item['slug'] }}">{{ $item['title'] }}</a>
                                </h3>
                                @if ($item['excerpt'])
                                    <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-ink-500">{{ $item['excerpt'] }}</p>
                                @endif
                                <a href="/blog/{{ $item['slug'] }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700">
                                    Devamını oku <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif

            {{-- Boş durum --}}
            @if (empty($posts))
                <div class="flex min-h-[40vh] flex-col items-center justify-center text-center">
                    <x-icon name="layout" class="h-16 w-16 text-ink-200" />
                    <p class="mt-4 text-ink-500">Henüz yayınlanmış blog yazısı bulunmuyor.</p>
                </div>
            @endif

            {{-- Sayfalama --}}
            @if ($totalPages > 1)
                <nav class="mt-12 flex items-center justify-center gap-2" aria-label="Blog sayfalama">
                    @if ($page > 1)
                        <a href="/blog?page={{ $page - 1 }}{{ $catName ? '&cat=' . urlencode($catName) : '' }}"
                           class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-ink-200 text-ink-500 transition hover:border-brand-300 hover:text-brand-700">
                            <x-icon name="chevron-left" class="h-4 w-4" />
                        </a>
                    @endif

                    @for ($i = max(1, $page - 2); $i <= min($totalPages, $page + 2); $i++)
                        <a href="/blog?page={{ $i }}{{ $catName ? '&cat=' . urlencode($catName) : '' }}"
                           class="inline-flex h-10 w-10 items-center justify-center rounded-full border text-sm font-medium transition
                                  {{ $i === $page ? 'border-brand-600 bg-brand-600 text-white' : 'border-ink-200 text-ink-600 hover:border-brand-300 hover:text-brand-700' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($page < $totalPages)
                        <a href="/blog?page={{ $page + 1 }}{{ $catName ? '&cat=' . urlencode($catName) : '' }}"
                           class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-ink-200 text-ink-500 transition hover:border-brand-300 hover:text-brand-700">
                            <x-icon name="chevron-right" class="h-4 w-4" />
                        </a>
                    @endif
                </nav>
            @endif

        </div>
    </section>

    <x-sections.cta-band title="Markanızı dijitalde büyütmeye hazır mısınız?" />

</x-layouts.app>
