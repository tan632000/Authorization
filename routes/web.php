<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@index')->name('list_posts');
Route::group(['prefix' => 'posts'], function () {
    Route::get('/drafts', 'PostController@drafts')
        ->name('list_drafts')
        ->middleware('auth');
    Route::get('/show/{id}', 'PostController@show')
        ->name('show_post');
    Route::get('/create', 'PostController@create')
        ->name('create_post')
        ->middleware('can:post.create');
    Route::post('/create', 'PostController@store')
        ->name('store_post')
        ->middleware('can:post.create');
    Route::get('/edit/{post}', 'PostController@edit')
        ->name('edit_post')
        ->middleware('can:post.update,post');
    Route::post('/edit/{post}', 'PostController@update')
        ->name('update_post')
        ->middleware('can:post.update,post');
    Route::get('/publish/{post}', 'PostController@publish')
        ->name('publish_post')
        ->middleware('can:post.publish');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
