<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/hizmetler', [PageController::class, 'services'])->name('services');
Route::get('/hizmetler/{slug}', [PageController::class, 'serviceShow'])->name('services.show');

Route::get('/hakkimizda', [PageController::class, 'about'])->name('about');
Route::get('/referanslar', [PageController::class, 'references'])->name('references');
Route::get('/fiyatlar', [PageController::class, 'pricing'])->name('pricing');

Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogShow'])->name('blog.show');

Route::get('/iletisim', [PageController::class, 'contact'])->name('contact');
Route::post('/iletisim', [ContactController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('contact.store');

Route::get('/sitemap.xml', SitemapController::class)->name('sitemap');

Route::get('/gizlilik-sozlesmesi', [PageController::class, 'legal'])->name('legal.privacy');
Route::get('/kvkk-aydinlatma-metni', [PageController::class, 'legal'])->name('legal.kvkk');
Route::get('/mesafeli-satis-sozlesmesi', [PageController::class, 'legal'])->name('legal.distance-sales');
