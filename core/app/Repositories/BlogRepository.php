<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * BlogRepository
 *
 * Admin panelinin MySQL veritabanındaki blog_posts ve blog_categories
 * tablolarından veri çeker. Tüm DB sorguları tek yerden yönetilir.
 */
class BlogRepository
{
    private const PER_PAGE_LIST = 9;
    private const PER_PAGE_RELATED = 3;
    private const PER_PAGE_RECENT = 5;

    /**
     * Yayınlanmış blog yazılarını sayfalı döndürür.
     *
     * @return array{posts: array<int, array<string, mixed>>, total: int, perPage: int}
     */
    public function paginate(int $page = 1, ?int $categoryId = null): array
    {
        try {
            $query = DB::table('blog_posts as p')
                ->select(
                    'p.id',
                    'p.title',
                    'p.slug',
                    'p.excerpt',
                    'p.featured_image',
                    'p.created_at',
                    'c.name as category'
                )
                ->leftJoin('blog_categories as c', 'c.id', '=', 'p.category_id')
                ->where('p.status', 'published');

            if ($categoryId) {
                $query->where('p.category_id', $categoryId);
            }

            $total = (clone $query)->count();

            $posts = $query
                ->orderByDesc('p.created_at')
                ->offset(($page - 1) * self::PER_PAGE_LIST)
                ->limit(self::PER_PAGE_LIST)
                ->get()
                ->map(fn ($row) => $this->normalizePost((array) $row))
                ->all();

            return [
                'posts'   => $posts,
                'total'   => $total,
                'perPage' => self::PER_PAGE_LIST,
            ];
        } catch (\Throwable $e) {
            Log::error('BlogRepository::paginate failed', ['error' => $e->getMessage()]);
            return ['posts' => [], 'total' => 0, 'perPage' => self::PER_PAGE_LIST];
        }
    }

    /**
     * Slug veya ID ile tek bir yayınlanmış yazıyı getirir.
     *
     * @return array<string, mixed>|null
     */
    public function findBySlug(string $slug): ?array
    {
        try {
            $row = DB::table('blog_posts as p')
                ->select('p.*', 'c.name as category')
                ->leftJoin('blog_categories as c', 'c.id', '=', 'p.category_id')
                ->where('p.status', 'published')
                ->where(function ($q) use ($slug) {
                    $q->where('p.slug', $slug)
                      ->orWhere('p.id', is_numeric($slug) ? (int) $slug : 0);
                })
                ->first();

            return $row ? $this->normalizePost((array) $row) : null;
        } catch (\Throwable $e) {
            Log::error('BlogRepository::findBySlug failed', ['slug' => $slug, 'error' => $e->getMessage()]);
            return null;
        }
    }

    /**
     * Aynı kategorideki diğer yayınlanmış yazılar (ilgili yazılar).
     *
     * @return array<int, array<string, mixed>>
     */
    public function related(int $postId, ?int $categoryId): array
    {
        if (!$categoryId) {
            return [];
        }

        try {
            return DB::table('blog_posts as p')
                ->select('p.id', 'p.title', 'p.slug', 'p.featured_image', 'p.created_at', 'c.name as category')
                ->leftJoin('blog_categories as c', 'c.id', '=', 'p.category_id')
                ->where('p.status', 'published')
                ->where('p.category_id', $categoryId)
                ->where('p.id', '!=', $postId)
                ->orderByDesc('p.created_at')
                ->limit(self::PER_PAGE_RELATED)
                ->get()
                ->map(fn ($row) => $this->normalizePost((array) $row))
                ->all();
        } catch (\Throwable $e) {
            Log::error('BlogRepository::related failed', ['error' => $e->getMessage()]);
            return [];
        }
    }

    /**
     * Tüm kategorileri döndürür.
     *
     * @return array<int, array{id: int, name: string}>
     */
    public function categories(): array
    {
        try {
            return DB::table('blog_categories')
                ->select('id', 'name')
                ->orderBy('name')
                ->get()
                ->map(fn ($row) => (array) $row)
                ->all();
        } catch (\Throwable $e) {
            Log::error('BlogRepository::categories failed', ['error' => $e->getMessage()]);
            return [];
        }
    }

    /**
     * Kategori adından ID'sini döndürür.
     */
    public function categoryIdByName(string $name): ?int
    {
        try {
            $row = DB::table('blog_categories')
                ->where('name', $name)
                ->value('id');

            return $row ? (int) $row : null;
        } catch (\Throwable $e) {
            return null;
        }
    }

    /**
     * Ham DB satırını view'ın beklediği normalize array'e dönüştürür.
     * blog-cover, blog-body, show.blade bileşenlerinin beklediği key'leri sağlar.
     *
     * @param array<string, mixed> $row
     * @return array<string, mixed>
     */
    private function normalizePost(array $row): array
    {
        $createdAt = $row['created_at'] ?? null;
        $dateFormatted = $createdAt
            ? \Carbon\Carbon::parse($createdAt)->locale('tr')->isoFormat('D MMMM YYYY')
            : '';

        // Tahmini okuma süresi (ortalama 200 kelime/dk)
        $wordCount = str_word_count(strip_tags($row['content'] ?? ''));
        $readMinutes = max(1, (int) ceil($wordCount / 200));

        return [
            // DB alanları
            'id'             => $row['id'],
            'slug'           => $row['slug'] ?: (string) $row['id'],
            'title'          => $row['title'] ?? '',
            'excerpt'        => $row['excerpt'] ?? '',
            'content'        => $row['content'] ?? '',
            'category'       => $row['category'] ?? '',
            'category_id'    => $row['category_id'] ?? null,
            'featured_image' => $row['featured_image'] ?? null,
            'created_at'     => $createdAt,
            'status'         => $row['status'] ?? 'published',
            'meta_title'     => $row['meta_title'] ?? null,
            'meta_description' => $row['meta_description'] ?? null,

            // View uyumu için normalize alanlar
            // blog-cover.blade bileşeni 'image' key'i bekler
            'image'          => $row['featured_image']
                ? '/admin/uploads/' . $row['featured_image']
                : null,

            // show.blade ve index.blade date/read key'leri bekler
            'date'           => $dateFormatted,
            'read'           => $readMinutes . ' dk',

            // show.blade body key'i bekler (HTML içerik doğrudan geçiriliyor)
            'body'           => $row['content'] ?? '',

            // SEO
            'seo_title'      => $row['meta_title'] ?? ($row['title'] ?? ''),
        ];
    }
}
