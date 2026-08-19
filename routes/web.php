<?php

use App\Http\Controllers\ContactMessageController;
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
    $featuredPost = BlogPost::published()->where('is_featured', true)->orderByDesc('published_at')->first()
        ?? BlogPost::published()->orderByDesc('published_at')->first();

    $otherPosts = BlogPost::published()
        ->when($featuredPost, fn ($query) => $query->where('id', '!=', $featuredPost->id))
        ->orderByDesc('published_at')
        ->get();

    return view('blog', [
        'featuredPost' => $featuredPost,
        'stories' => $otherPosts->take(6),
        'archive' => $otherPosts->slice(6, 4),
    ]);
});

Route::get('/blog/{slug}', function (string $slug) {
    $post = BlogPost::published()->where('slug', $slug)->first();

    abort_unless($post, 404);

    return view('blog-post', ['post' => $post]);
})->name('blog.show');

Route::get('/contact', [ContactMessageController::class, 'create'])->name('contact');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::get('/theme-test', function () {
    return view('theme-test');
});
