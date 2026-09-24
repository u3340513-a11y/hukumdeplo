<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function __invoke(): Response
    {
        $base = 'https://' . config('site.brand.domain');
        $urls = [];

        $static = [
            ['loc' => '/', 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => '/hizmetler', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => '/hakkimizda', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => '/referanslar', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => '/fiyatlar', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => '/blog', 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['loc' => '/iletisim', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        foreach ($static as $page) {
            $urls[] = $this->entry($base . $page['loc'], $page['priority'], $page['changefreq']);
        }

        foreach (config('content.services.items', []) as $service) {
            $urls[] = $this->entry(
                $base . '/hizmetler/' . $service['slug'],
                '0.8',
                'monthly'
            );
        }

        foreach (config('content.blog.items', []) as $post) {
            $urls[] = $this->entry(
                $base . '/blog/' . $post['slug'],
                '0.7',
                'monthly'
            );
        }

        foreach (array_keys(config('legal.pages', [])) as $slug) {
            $urls[] = $this->entry($base . '/' . $slug, '0.3', 'yearly');
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>'
            . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'
            . implode('', $urls)
            . '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
    }

    private function entry(string $loc, string $priority, string $changefreq): string
    {
        return '<url>'
            . '<loc>' . e($loc) . '</loc>'
            . '<changefreq>' . $changefreq . '</changefreq>'
            . '<priority>' . $priority . '</priority>'
            . '</url>';
    }
}
