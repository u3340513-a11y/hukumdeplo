@php $contact = config('site.contact'); @endphp

<div class="rounded-2xl border border-brand-100 bg-brand-50/60 p-5 sm:p-6">
    <div class="flex items-start gap-3">
        <span class="grid h-10 w-10 shrink-0 place-items-center rounded-xl bg-brand-100 text-brand-600">
            <x-icon name="headset" class="h-5 w-5" />
        </span>
        <div>
            <p class="text-sm font-semibold text-ink-900">Sorularınız mı var?</p>
            <p class="mt-1 text-sm leading-relaxed text-ink-500">Yasal metinler hakkında bizimle iletişime geçin.</p>
        </div>
    </div>
    <div class="mt-4 space-y-2">
        <a href="mailto:{{ $contact['email'] }}" class="flex items-center gap-2 text-sm font-semibold text-brand-700 transition hover:text-brand-800">
            <x-icon name="mail" class="h-4 w-4 shrink-0" />
            {{ $contact['email'] }}
        </a>
        <a href="{{ $contact['phone_href'] }}" class="flex items-center gap-2 text-sm font-semibold text-brand-700 transition hover:text-brand-800">
            <x-icon name="phone" class="h-4 w-4 shrink-0" />
            {{ $contact['phone'] }}
        </a>
    </div>
</div>

