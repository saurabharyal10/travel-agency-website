<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/packages', function () {
    return view('packages');
});

Route::get('/packages/{slug}', function (string $slug) {
    $package = collect(require resource_path('data/packages.php'))
        ->firstWhere('slug', $slug);

    abort_unless($package, 404);

    return view('package-detail', ['package' => $package]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/theme-test', function () {
    return view('theme-test');
});
