<?php

use App\Http\Controllers\PackageEnquiryController;
use App\Models\BlogPost;
use App\Models\Package;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/packages', function () {
    return view('packages');
});

Route::get('/packages/{slug}', function (string $slug) {
    $package = Package::where('slug', $slug)
        ->where('is_active', true)
        ->with(['pricingTiers', 'faqs', 'preparationTips'])
        ->first();

    abort_unless($package, 404);

    return view('package-detail', ['package' => $package]);
})->name('packages.show');

Route::get('/packages/{slug}/enquire', [PackageEnquiryController::class, 'create'])->name('packages.enquire');
Route::post('/packages/{slug}/enquire', [PackageEnquiryController::class, 'store'])->name('packages.enquire.store');

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog/{slug}', function (string $slug) {
    $post = BlogPost::where('slug', $slug)
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->first();

    abort_unless($post, 404);

    return view('blog-post', ['post' => $post]);
})->name('blog.show');

Route::get('/theme-test', function () {
    return view('theme-test');
});
