<?php

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

Auth::routes();

Route::middleware(['admin'])->prefix('admin')->group(function() {
    Route::get('/', 'UserController@index')->name('users.index');

    Route::get('/users', 'UserController@index')->name('users.index');

    Route::get('/tags', 'TagController@index')->name('tags.index');
    Route::post('/tags', 'TagController@store')->name('tags.store');
    Route::post('/tags/{tag}', 'TagController@update')->name('tags.update');
    Route::get('/tags/{tag}/delete', 'TagController@delete')->name('tags.delete');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/posts/create', 'PostController@create')->name('posts.create');
    Route::post('/posts', 'PostController@store')->name('posts.store');
    Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

    Route::post('/posts/{post}/comments', 'CommentController@store')->name('comments.store');
    Route::delete('/posts/{post}/comments/{comment}', 'CommentController@delete')->name('comments.delete');
});

Route::middleware(['adminOrOwner'])->group(function() {
    Route::get('/users/{user}', 'UserController@edit')->name('users.edit');
    Route::post('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('/users/{user}', 'UserController@delete')->name('users.delete');
});

Route::get('/{tag?}', 'PostController@index')->name('posts.index');