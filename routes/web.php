<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('blog.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Blog', 'prefix' => 'blog'], function(){
    Route::get('/', IndexController::class)->name('blog.index');
    Route::get('/{post}', ShowController::class)->name('blog.show');

    Route::group(['namespace' => 'Comment', 'prefix' => '{post}/comment'], function(){
        Route::post('/', StoreController::class)->name('blog.comment.store');
    });

    Route::group(['namespace' => 'Liked', 'prefix' => '{post}/liked'], function(){
        Route::post('/', StoreController::class)->name('blog.liked.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Category', 'prefix' => 'categories'], function(){
    Route::get('/', IndexController::class)->name('category.index');

    Route::group(['namespace' => 'Post', 'prefix' => '{category}/post'], function(){
        Route::get('/', IndexController::class)->name('category.post.index');
    });
});


Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth', 'verified']], function(){
    Route::get('/', IndexController::class)->name('personal.index');

    Route::group(['namespace' => 'Comment', 'prefix' => 'comment'], function (){
        Route::get('/', IndexController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', EditController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', UpdateController::class)->name('personal.comment.update');
        Route::delete('/{comment}', DeleteController::class)->name('personal.comment.delete');
    });

    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function (){
        Route::get('/', IndexController::class)->name('personal.liked.index');
        Route::delete('/{post}', DeleteController::class)->name('personal.liked.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth','admin','verified']], function(){
    Route::get('/', IndexController::class)->name('admin.index');

    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function (){
        Route::get('/', IndexController::class)->name('admin.category.index');
        Route::get('/create', CreateController::class)->name('admin.category.create');
        Route::post('/', StoreController::class)->name('admin.category.store');
        Route::get('/{category}', ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', DeleteController::class)->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], function (){
        Route::get('/', IndexController::class)->name('admin.tag.index');
        Route::get('/create', CreateController::class)->name('admin.tag.create');
        Route::post('/', StoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', ShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', EditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', UpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', DeleteController::class)->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function (){
        Route::get('/', IndexController::class)->name('admin.post.index');
        Route::get('/create', CreateController::class)->name('admin.post.create');
        Route::post('/', StoreController::class)->name('admin.post.store');
        Route::get('/{post}', ShowController::class)->name('admin.post.show');
        Route::get('/{post}/edit', EditController::class)->name('admin.post.edit');
        Route::patch('/{post}', UpdateController::class)->name('admin.post.update');
        Route::delete('/{post}', DeleteController::class)->name('admin.post.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'user'], function (){
        Route::get('/', IndexController::class)->name('admin.user.index');
        Route::get('/create', CreateController::class)->name('admin.user.create');
        Route::post('/', StoreController::class)->name('admin.user.store');
        Route::get('/{user}', ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', DeleteController::class)->name('admin.user.delete');
    });

});

Auth::routes(['verify'=>'true']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
