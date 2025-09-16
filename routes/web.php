<?php

use App\Http\Controllers\CommentController;
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
    Route::get('/blogs', [PostController::class, 'index'])->name('blogs');
    Route::get('/blogs/{id}', [PostController::class, 'show'])->name('blogs.show');
    Route::post('/blogs/publish', [PostController::class, 'store'])->name('blogs.store');
    Route::get('/author/{id}', [PostController::class, 'author'])->name('author.profile');
});

Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comment/{id}', [CommentController::class, 'show'])->name('comment.show');
});

Route::get('/author/{id?}', [PostController::class, 'author'])
    ->name('author.profile');



// Role dashboards
Route::get('/admin', function () {
    return Inertia::render('Admin'); // swap to a dedicated admin page later
})->middleware(['auth', 'verified', 'can:access-admin'])->name('admin.dashboard');

Route::get('/author', function () {
    return Inertia::render('Author'); // swap to a dedicated author page later
})->middleware(['auth', 'verified', 'can:access-author'])->name('author.dashboard');

// Route::get('/author', function () {
//     return Inertia::render('Author'); // swap to a dedicated author page later
// })->middleware(['auth', 'verified', 'can:access-author'])->name('author.dashboard');



require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
