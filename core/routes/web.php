<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/hizmetler', [PageController::class, 'services'])->name('services');
Route::get('/hazir-yazilimlar', [PageController::class, 'readySoftware'])->name('ready-software');
Route::get('/hizmetler/hazir-yazilimlar', fn () => redirect()->route('ready-software', [], 301));
Route::get('/hizmetler/hazir-yazilimlarimiz', fn () => redirect()->route('ready-software', [], 301));
Route::get('/hizmetler/{slug}', [PageController::class, 'serviceShow'])->name('services.show');

Route::get('/avukat-web-tasarimi', fn () => redirect()->route('services.show', ['slug' => 'avukat-web-tasarimi'], 301));
Route::get('/doktor-web-tasarimi', fn () => redirect()->route('services.show', ['slug' => 'doktor-web-tasarimi'], 301));
Route::get('/hazir-cicekci-sitesi', fn () => redirect()->route('services.show', ['slug' => 'hazir-cicekci-sitesi'], 301));
Route::get('/cicekci-sitesi', fn () => redirect()->route('services.show', ['slug' => 'hazir-cicekci-sitesi'], 301));
Route::get('/haber-yazilimi', fn () => redirect()->route('services.show', ['slug' => 'haber-yazilimi'], 301));
Route::get('/mugla-web-tasarim', fn () => redirect()->route('services.show', ['slug' => 'mugla-web-tasarim'], 301));
Route::get('/e-ticaret-kampanyalari', fn () => redirect()->route('services.show', ['slug' => 'e-ticaret-kampanyalari'], 301));
Route::get('/mersin-web-tasarim', fn () => redirect()->route('services.show', ['slug' => 'mersin-web-tasarim'], 301));

Route::get('/hakkimizda', [PageController::class, 'about'])->name('about');
Route::get('/referanslar', [PageController::class, 'references'])->name('references');
Route::get('/referanslar/{slug}', [PageController::class, 'referenceShow'])->name('references.show');
Route::get('/referanslarimiz/{slug}', fn (string $slug) => redirect()->route('references.show', ['slug' => $slug], 301));
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
