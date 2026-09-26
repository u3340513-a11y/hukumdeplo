@php

    $contact = config('site.contact');

    $pageIcon = match ($slug) {

        'gizlilik-sozlesmesi' => 'shield',

        'kvkk-aydinlatma-metni' => 'shield',

        'mesafeli-satis-sozlesmesi' => 'cart',

        default => 'shield',

    };

@endphp



<x-layouts.app
    :seoTitle="$page['title']"
    :description="$page['description']"
    :breadcrumbs="[['label' => $page['title']]]">



    <x-page-hero

        :eyebrow="'Yasal'"

        :title="$page['title']"

        :description="$page['description']"

        :breadcrumbs="[['label' => $page['title']]]" />



    <section class="section-y bg-surface-muted">

        <div class="container-page">

            <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:gap-8">

                <aside class="shrink-0 lg:sticky lg:top-28 lg:w-72 xl:w-80">

                    <x-legal.nav :active="$slug" />

                    <div class="mt-4 hidden lg:block">

                        <x-legal.help-card />

                    </div>

                </aside>



                <article class="min-w-0 flex-1 overflow-hidden rounded-3xl border border-ink-200 bg-white shadow-card">

                    <div class="border-b border-ink-100 px-6 py-7 sm:px-8 sm:py-8 lg:px-10 lg:py-10">

                        <div class="flex flex-col gap-6 sm:flex-row sm:items-start sm:justify-between">

                            <div class="flex items-start gap-4 sm:gap-5">

                                <span class="mt-0.5 grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-brand-50 text-brand-600 ring-1 ring-brand-100">

                                    <x-icon :name="$pageIcon" class="h-6 w-6" />

                                </span>

                                <div class="legal-card-meta min-w-0">

                                    <p class="text-xs font-semibold uppercase tracking-wider text-ink-400">Yasal metin</p>

                                    <p class="text-lg font-bold leading-normal text-ink-900 sm:text-xl">{{ $page['title'] }}</p>

                                </div>

                            </div>

                            <span class="inline-flex w-fit items-center gap-2 rounded-full bg-ink-50 px-4 py-2.5 text-xs font-medium leading-relaxed text-ink-500 ring-1 ring-ink-100">

                                <x-icon name="calendar" class="h-3.5 w-3.5 shrink-0 text-brand-500" />

                                Son güncelleme: {{ $page['updated_at'] }}

                            </span>

                        </div>

                    </div>



                    <div class="legal-prose sm:px-8 lg:px-10">

                        @foreach ($page['sections'] as $section)

                            <section>

                                <h2>{{ $section['heading'] }}</h2>



                                @if (! empty($section['body']))

                                    <div class="legal-body">

                                        @foreach ($section['body'] as $paragraph)

                                            <p>{{ $paragraph }}</p>

                                        @endforeach

                                    </div>

                                @endif



                                @if (! empty($section['list']))

                                    <ul class="legal-list">

                                        @foreach ($section['list'] as $item)

                                            <li>

                                                <span class="mt-1 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-brand-50 text-brand-600">

                                                    <x-icon name="check" class="h-3 w-3" />

                                                </span>

                                                <span class="pt-0.5">{{ $item }}</span>

                                            </li>

                                        @endforeach

                                    </ul>

                                @endif

                            </section>

                        @endforeach

                    </div>



                    <div class="border-t border-ink-100 bg-ink-50/40 px-6 py-7 sm:px-8 sm:py-9 lg:px-10 lg:py-10">

                        <div class="grid gap-4 sm:grid-cols-2">

                            <a href="mailto:{{ $contact['email'] }}" class="group flex items-center gap-4 rounded-2xl border border-ink-200 bg-white p-5 transition hover:-translate-y-0.5 hover:border-brand-200 hover:shadow-card">

                                <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition group-hover:bg-brand-600 group-hover:text-white">

                                    <x-icon name="mail" class="h-5 w-5" />

                                </span>

                                <span>

                                    <span class="block text-xs uppercase tracking-wide text-ink-400">E-posta</span>

                                    <span class="mt-1.5 block text-sm font-semibold leading-normal text-ink-900">{{ $contact['email'] }}</span>

                                </span>

                            </a>

                            <a href="{{ $contact['phone_href'] }}" onclick="return gtag_report_conversion(this.href, 'AW-18142453012/KUz5CKnUt-McEJS6_8pD');" class="group flex items-center gap-4 rounded-2xl border border-ink-200 bg-white p-5 transition hover:-translate-y-0.5 hover:border-brand-200 hover:shadow-card">

                                <span class="grid h-11 w-11 shrink-0 place-items-center rounded-xl bg-brand-50 text-brand-600 ring-1 ring-brand-100 transition group-hover:bg-brand-600 group-hover:text-white">

                                    <x-icon name="phone" class="h-5 w-5" />

                                </span>

                                <span>

                                    <span class="block text-xs uppercase tracking-wide text-ink-400">Telefon</span>

                                    <span class="mt-1.5 block text-sm font-semibold leading-normal text-ink-900">{{ $contact['phone'] }}</span>

                                </span>

                            </a>

                        </div>



                        <div class="mt-5 lg:hidden">

                            <x-legal.help-card />

                        </div>

                    </div>

                </article>

            </div>

        </div>

    </section>



</x-layouts.app>


