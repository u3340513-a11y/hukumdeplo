<?php

namespace App\Http\Controllers;

use App\Repositories\BlogRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    /**
     * Ana sayfa.
     */
    public function home(): View
    {
        return view('pages.home');
    }

    /**
     * Hizmetler — liste.
     */
    public function services(): View
    {
        return view('pages.services.index');
    }

    /**
     * Hizmet detay.
     */
    public function serviceShow(string $slug): View
    {
        $items = config('content.services.items');
        $service = Arr::first($items, fn ($item) => $item['slug'] === $slug);

        if (! $service) {
            throw new NotFoundHttpException('Hizmet bulunamadı.');
        }

        $related = array_values(array_filter($items, fn ($item) => $item['slug'] !== $slug));

        $viewName = view()->exists("pages.services.{$slug}") ? "pages.services.{$slug}" : 'pages.services.show';

        return view($viewName, [
            'service' => $service,
            'related' => array_slice($related, 0, 3),
        ]);
    }

    /**
     * Hakkımızda.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Referanslar.
     */
    public function references(): View
    {
        return view('pages.references');
    }

    /**
     * Fiyatlar.
     */
    public function pricing(): View
    {
        return view('pages.pricing');
    }

    /**
     * Blog — liste.
     * Admin DB'sinden yayınlanmış yazıları çeker, sayfalama ve kategori filtresi uygular.
     */
    public function blog(): View
    {
        $repo = new BlogRepository();

        $page       = max(1, (int) request()->query('page', 1));
        $catName    = trim((string) request()->query('cat', ''));
        $categoryId = $catName ? $repo->categoryIdByName($catName) : null;

        $result     = $repo->paginate($page, $categoryId);
        $categories = $repo->categories();

        $totalPages = $result['total'] > 0
            ? (int) ceil($result['total'] / $result['perPage'])
            : 1;

        return view('pages.blog.index', [
            'posts'      => $result['posts'],
            'total'      => $result['total'],
            'page'       => $page,
            'totalPages' => $totalPages,
            'categories' => $categories,
            'catName'    => $catName,
        ]);
    }

    /**
     * Blog detay.
     * Slug veya ID ile admin DB'sinden yazıyı çeker.
     */
    public function blogShow(string $slug): View
    {
        $repo = new BlogRepository();
        $post = $repo->findBySlug($slug);

        if (! $post) {
            throw new NotFoundHttpException('Yazı bulunamadı.');
        }

        $related = $repo->related($post['id'], $post['category_id'] ?? null);

        return view('pages.blog.show', [
            'post'    => $post,
            'related' => $related,
        ]);
    }

    /**
     * İletişim.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }

    /**
     * Yasal metin detay.
     */
    public function legal(): View
    {
        $slug = trim(request()->path(), '/');
        $pages = config('legal.pages');
        $page = $pages[$slug] ?? null;

        if (! $page) {
            throw new NotFoundHttpException('Sayfa bulunamadı.');
        }

        return view('pages.legal.show', [
            'page' => $page,
            'slug' => $slug,
        ]);
    }
}
