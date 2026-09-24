@php $b = config('content.blog'); @endphp

<section id="blog" class="section-y relative scroll-mt-24 bg-surface-muted">
    <div class="container-page">
        <div class="flex flex-col items-start justify-between gap-6 sm:flex-row sm:items-end">
            <x-section-heading align="left" :eyebrow="$b['eyebrow']" :title="$b['title']" :description="$b['description']" />
            <a href="/blog" class="btn btn-ghost shrink-0">Tüm yazılar <x-icon name="arrow-right" class="h-4 w-4" /></a>
        </div>

        <div class="mt-14 grid gap-5 md:grid-cols-3">
            @foreach (array_slice($b['items'], 0, 3) as $item)
                <article
                    class="reveal group flex flex-col overflow-hidden rounded-3xl border border-ink-200 bg-white shadow-card transition duration-500 hover:-translate-y-1.5 hover:shadow-elevated"
                    x-intersect.once="$el.classList.add('in')"
                    style="transition-delay: {{ $loop->index * 90 }}ms">

                    <a href="/blog/{{ $item['slug'] }}" class="block">
                        <x-blog-cover :post="$item" class="relative h-44">
                            <span class="absolute left-4 top-4 z-10 rounded-full bg-white/90 px-3 py-1 text-xs font-semibold text-brand-700 backdrop-blur">{{ $item['category'] }}</span>
                        </x-blog-cover>
                    </a>

                    <div class="flex flex-1 flex-col p-6">
                        <div class="flex items-center gap-3 text-xs text-ink-400">
                            <span class="inline-flex items-center gap-1.5"><x-icon name="calendar" class="h-3.5 w-3.5" /> {{ $item['date'] }}</span>
                            <span class="inline-flex items-center gap-1.5"><x-icon name="clock" class="h-3.5 w-3.5" /> {{ $item['read'] }} okuma</span>
                        </div>
                        <h3 class="mt-3 text-lg font-bold leading-snug text-ink-900 transition group-hover:text-brand-700">
                            <a href="/blog/{{ $item['slug'] }}">{{ $item['title'] }}</a>
                        </h3>
                        <p class="mt-2 line-clamp-2 text-sm leading-relaxed text-ink-500">{{ $item['excerpt'] }}</p>
                        <a href="/blog/{{ $item['slug'] }}" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-brand-700">
                            Devamını oku <x-icon name="arrow-right" class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1" />
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
