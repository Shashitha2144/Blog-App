<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/blogs', [PostController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/{id}', [PostController::class, 'show'])->name('blogs.show');
});




require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
