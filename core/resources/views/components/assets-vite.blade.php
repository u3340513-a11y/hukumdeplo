@php
    $entries = ['resources/css/app.css', 'resources/js/app.js'];
    $manifest = null;

    foreach ([
        public_path('build/manifest.json'),
        base_path('public/build/manifest.json'),
        dirname(base_path()).DIRECTORY_SEPARATOR.'build'.DIRECTORY_SEPARATOR.'manifest.json',
    ] as $candidate) {
        if (is_file($candidate)) {
            $manifest = json_decode((string) file_get_contents($candidate), true);
            break;
        }
    }

    $buildUrl = rtrim((string) config('app.url'), '/').'/build';
@endphp

@if (is_array($manifest))
    @foreach ($entries as $entry)
        @if ($chunk = ($manifest[$entry] ?? null))
            @if (str_ends_with($chunk['file'], '.css'))
                <link rel="stylesheet" href="{{ $buildUrl }}/{{ $chunk['file }}" />
            @else
                <script type="module" src="{{ $buildUrl }}/{{ $chunk['file'] }}"></script>
            @endif
        @endif
    @endforeach
@else
    @vite($entries)
@endif
