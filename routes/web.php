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

Route::get('/', 'BlogController@index');
Route::get('test', function() {
    Storage::disk('google')->put('tet.txt', 'Hello World');
});
Route::get('/isi-post/{slug}', 'BlogController@isi_post')->name('blog.isi');
Route::get('/list-post', 'BlogController@list_post')->name('blog.list');
Route::get('/list-category/{post_category}', 'BlogController@list_category')->name('blog.category');
Route::get('/search', 'BlogController@search')->name('blog.search');
Route::get('/list-tag/{post_tag}', 'BlogController@list_tag')->name('blog.tag');



Route::group(['middleware' => ['auth']], function () {
    Route::resource('/category', 'CategoryController');
    Route::resource('/tag', 'TagController');

    Route::get('/post/tampil_hapus', 'PostController@tampil_hapus')->name('post.tampil_hapus');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');

    Route::resource('/post', 'PostController');
    Route::resource('/user', 'UserController');

    Route::get('/home', 'HomeController@index')->name('home');
});


