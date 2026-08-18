<?php

use App\Http\Controllers\PackageEnquiryController;
use App\Models\Package;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/packages', function () {
    return view('packages');
});

Route::get('/packages/{slug}', function (string $slug) {
    $package = Package::where('slug', $slug)->where('is_active', true)->first();

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

Route::get('/theme-test', function () {
    return view('theme-test');
});
