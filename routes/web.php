<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Photo\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Photo', 'prefix' => 'photos'], function () {
    Route::get('/', 'IndexController')->name('photo.index');
    Route::get('/photos', 'PhotoController')->name('photo.photos');
    Route::get('/user', 'UserController')->name('photo.user');

    Route::get('/contact', 'ContactController')->name('photo.contact');
    Route::post('/contact', 'ContactStoreController')->name('photo.send');

    Route::get('/create', 'CreateController')->name('photo.create');
    Route::post('/create', 'StoreController')->name('photo.store');

    Route::get('/{photo}', 'ShowController')->name('photo.show');
    Route::delete('/{photo}', 'DeleteController')->name('photo.delete');

    Route::group(['namespace' => 'Comment', 'prefix' => '{photo}/comments'], function () {
        Route::post('/', 'StoreController')->name('photo.comment.store');
    });

    Route::group(['namespace' => 'Like', 'prefix' => '{photo}/likes'], function () {
        Route::post('/', 'StoreController')->name('photo.like.store');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Personal', 'prefix' => 'personal', 'middleware' => ['auth']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function () {
        Route::get('/', 'IndexController')->name('personal.liked.index');
        Route::delete('/{photo}', 'DeleteController')->name('personal.liked.delete');
    });
    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DeleteController')->name('personal.comment.delete');
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DeleteController')->name('admin.category.delete');

    });

    Route::group(['namespace' => 'Photo', 'prefix' => 'photos'], function () {
        Route::get('/', 'IndexController')->name('admin.photo.index');
        Route::get('/create', 'CreateController')->name('admin.photo.create');
        Route::post('/', 'StoreController')->name('admin.photo.store');
        Route::get('/{photo}', 'ShowController')->name('admin.photo.show');
        Route::get('/{photo}/edit', 'EditController')->name('admin.photo.edit');
        Route::patch('/{photo}', 'UpdateController')->name('admin.photo.update');
        Route::delete('/{photo}', 'DeleteController')->name('admin.photo.delete');

    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');

    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
