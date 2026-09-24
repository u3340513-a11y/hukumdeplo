<?php

namespace App\Support;

class Seo
{
    public static function title(?string $suffix = null): string
    {
        if ($suffix === null || $suffix === '') {
            return config('site.seo.default_title');
        }

        return config('site.brand.name')
            . config('site.seo.title_separator')
            . $suffix;
    }

    public static function description(?string $description = null): string
    {
        return $description
            ?? config('site.seo.default_description')
            ?? config('site.brand.description');
    }

    public static function canonical(): string
    {
        return url()->current();
    }

    public static function ogImage(?string $path = null): string
    {
        return asset($path ?? config('site.seo.og_image'));
    }

    public static function keywords(?string $extra = null): string
    {
        $base = config('site.seo.keywords', '');

        if ($extra) {
            return trim($base . ', ' . $extra, ', ');
        }

        return $base;
    }

    /** @return array<int, array<string, mixed>> */
    public static function baseSchemas(): array
    {
        $brand = config('site.brand');
        $contact = config('site.contact');
        $seo = config('site.seo');
        $baseUrl = 'https://' . $brand['domain'];

        return [
            [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                '@id' => $baseUrl . '/#organization',
                'name' => $brand['name'],
                'url' => $baseUrl,
                'logo' => asset($brand['logo']),
                'description' => $brand['description'],
                'email' => $contact['email'],
                'telephone' => $contact['phone'],
                'sameAs' => collect(config('site.social'))->pluck('href')->values()->all(),
            ],
            [
                '@context' => 'https://schema.org',
                '@type' => 'ProfessionalService',
                '@id' => $baseUrl . '/#localbusiness',
                'name' => $brand['name'],
                'url' => $baseUrl,
                'image' => self::ogImage(),
                'telephone' => $contact['phone'],
                'email' => $contact['email'],
                'priceRange' => '₺₺',
                'areaServed' => $seo['area_served'] ?? 'Bahçelievler, İstanbul ve Tüm Türkiye',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => $seo['geo']['street'] ?? 'Yenibosna Kuyumcukent A.V.M. Blogu Kat:1 No: 403',
                    'addressLocality' => $seo['geo']['locality'] ?? 'Bahçelievler',
                    'addressRegion' => $seo['geo']['region'] ?? 'İstanbul',
                    'postalCode' => $seo['geo']['postal_code'] ?? '34197',
                    'addressCountry' => 'TR',
                ],
            ],
            [
                '@context' => 'https://schema.org',
                '@type' => 'WebSite',
                '@id' => $baseUrl . '/#website',
                'name' => $brand['name'],
                'url' => $baseUrl,
                'publisher' => ['@id' => $baseUrl . '/#organization'],
                'inLanguage' => 'tr-TR',
            ],
        ];
    }

    /** @return array<string, mixed> */
    public static function articleSchema(array $post, string $url): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $post['title'],
            'description' => $post['excerpt'] ?? self::description(),
            'image' => self::ogImage($post['image'] ?? null),
            'datePublished' => self::normalizeDate($post['date'] ?? ''),
            'author' => [
                '@type' => 'Organization',
                'name' => config('site.brand.name'),
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => config('site.brand.name'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset(config('site.brand.logo')),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $url,
            ],
        ];
    }

    /** @param array<int, array{label: string, href?: string}> $items */
    public static function breadcrumbSchema(array $items, string $baseUrl): array
    {
        $list = [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Anasayfa',
                'item' => $baseUrl,
            ],
        ];

        foreach ($items as $index => $item) {
            $entry = [
                '@type' => 'ListItem',
                'position' => $index + 2,
                'name' => $item['label'],
            ];

            if (! empty($item['href'])) {
                $entry['item'] = str_starts_with($item['href'], 'http')
                    ? $item['href']
                    : $baseUrl . $item['href'];
            }

            $list[] = $entry;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $list,
        ];
    }

    private static function normalizeDate(string $date): string
    {
        $map = [
            'Ocak' => '01', 'Şubat' => '02', 'Mart' => '03', 'Nisan' => '04',
            'Mayıs' => '05', 'Haziran' => '06', 'Temmuz' => '07', 'Ağustos' => '08',
            'Eylül' => '09', 'Ekim' => '10', 'Kasım' => '11', 'Aralık' => '12',
        ];

        foreach ($map as $month => $num) {
            if (str_contains($date, $month)) {
                if (preg_match('/(\d{1,2})\s+' . preg_quote($month, '/') . '\s+(\d{4})/u', $date, $matches)) {
                    return sprintf('%s-%s-%02d', $matches[2], $num, (int) $matches[1]);
                }
            }
        }

        return now()->toDateString();
    }
}
