<?php

use App\Http\Controllers\AdopsiPostController;
use App\Http\Controllers\CommentController;
use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserBlogController;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (auth()->check()) {
        return app(CatController::class)->index(request());
    }
    return view('index');
})->name('home');

Route::view('/coming-soon', 'coming-soon')->name('comingsoon');

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');
    Route::get('/profile/settings', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/edit', [UserController::class, 'update']);
    Route::delete('/profile/delete', [UserController::class, 'destroy'])->name('profile.delete');

    Route::get('/profile/posts/{id}/edit', [BlogController::class, 'edit'])->name('posts.edit');
    Route::put('/profile/posts/{id}', [BlogController::class, 'update'])->name('posts.update');
    Route::delete('/profile/posts/{id}', [BlogController::class, 'destroy'])->name('posts.destroy');
    Route::get('/create-blog', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');

    Route::get('/create-adopt', [CatController::class, 'create'])->name('adopt.create');
    Route::post('/adopts', [CatController::class, 'store'])->name('adopt.store');

    Route::get('/profile/posts', [UserBlogController::class, 'index'])->name('user.posts');
    Route::get('/user/posts/{id}/edit', [UserBlogController::class, 'edit'])->name('user.posts.edit');
    Route::put('/user/posts/{id}', [UserBlogController::class, 'update'])->name('user.posts.update');
    Route::delete('/user/posts/{id}', [UserBlogController::class, 'destroy'])->name('user.posts.destroy');

    Route::get('/adopt', [CatController::class, 'index'])->name('adopt.index');
    Route::get('/adopt/{id}', [CatController::class, 'show'])->name('adopt.show');
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
    Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blog.details');

    Route::get('/adopt/{id}/edit', [AdopsiPostController::class, 'edit'])->name('adopt.edit');
    Route::put('/adopt/{id}', [AdopsiPostController::class, 'update'])->name('adopt.update');
    Route::delete('/adopt/{id}', [AdopsiPostController::class, 'destroy'])->name('adopt.destroy');
    Route::put('/adopt/{id}/update-status', [AdopsiPostController::class, 'updateStatus'])->name('adopt.updateStatus');

    Route::get('/adopt/whatsapp/{id}', [AdopsiPostController::class, 'sendtoWhatsapp'])->name('adopt.wa');

    Route::prefix('comments')->group(function () {
        Route::post('/', [CommentController::class, 'store'])->name('comments.store');
        Route::get('{id}', [CommentController::class, 'edit'])->name('comments.edit');
        Route::patch('{id}', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    });

    Route::put('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect('login');
    })->name('logout');
});
