<?php

namespace App\Http\Controllers;

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
     */
    public function blog(): View
    {
        return view('pages.blog.index');
    }

    /**
     * Blog detay.
     */
    public function blogShow(string $slug): View
    {
        $items = config('content.blog.items');
        $post = Arr::first($items, fn ($item) => $item['slug'] === $slug);

        if (! $post) {
            throw new NotFoundHttpException('Yazı bulunamadı.');
        }

        $related = array_values(array_filter(
            $items,
            fn ($item) => $item['slug'] !== $slug && ($item['category'] ?? '') === ($post['category'] ?? '')
        ));

        if (count($related) < 2) {
            $related = array_merge(
                $related,
                array_values(array_filter(
                    $items,
                    fn ($item) => $item['slug'] !== $slug && ($item['category'] ?? '') !== ($post['category'] ?? '')
                ))
            );
        }

        return view('pages.blog.show', [
            'post' => $post,
            'related' => array_slice($related, 0, 2),
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
