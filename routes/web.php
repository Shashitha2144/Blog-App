<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
    Route::put('/post/{post}', [PostController::class, 'update'])
        ->name('posts.update')
        ->middleware('auth');
    Route::post('/blogs/publish', [PostController::class, 'store'])->name('blogs.store');
    Route::get('/author/{id}', [PostController::class, 'author'])->name('author.profile');
    Route::Delete('/post/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::middleware('auth')->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comment/{id}', [CommentController::class, 'show'])->name('comment.show');
});

Route::get('/author/{id?}', [PostController::class, 'author'])
    ->name('author.profile');

    // admin tasks
Route::middleware(['auth', 'verified', 'can:access-admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\UserController::class, 'index'])->name('admin.dashboard');
    Route::put('/admin/user/{user}',[App\Http\Controllers\UserController::class, 'update'])->name('admin.update');
    Route::post('/admin/user',[App\Http\Controllers\UserController::class, 'store'])->name('admin.store');
    Route::delete('/admin/{user}',[App\Http\Controllers\UserController::class, 'destroy'])->name('admin.destroy');
});


Route::get('/author', function () {
    return Inertia::render('Author'); // swap to a dedicated author page later
})->middleware(['auth', 'verified', 'can:access-author'])->name('author.dashboard');

// Route::get('/author', function () {
//     return Inertia::render('Author'); // swap to a dedicated author page later
// })->middleware(['auth', 'verified', 'can:access-author'])->name('author.dashboard');



require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
