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

/* General Routes */
Route::get('/', function () {
    return view('pages.splash');
})->name('splash');

Route::get('contact', function () {
    return view('pages.contact');
})->name('contact');


/* Auth Routes */
Auth::routes();


/* Routes for blogs CRUD */
Route::prefix('blogs')->group(function () {
  Route::get('/', 'BlogsController@index')->name('blogs');
  Route::get('/create', 'BlogsController@create')->name('create-blog');
  Route::post('/create', 'BlogsController@store')->name('store-blog');
  Route::get('/{id}', 'BlogsController@show')->name('show-blog');
  Route::get('/{id}/edit', 'BlogsController@edit')->name('edit-blog');
  Route::patch('/{id}', 'BlogsController@update')->name('update-blog');
  Route::get('/delete/{id}', 'BlogsController@destroy')->name('delete-blog');
  Route::get('/like/{id}', 'BlogsController@saveLike')->name('like-blog');
});

/* Social Media Login Routes */
Route::get('/redirect/{service}', 'SocialAuthController@redirect');
Route::get('/callback/{service}', 'SocialAuthController@callback');

/* Profile Routes */
Route::get('/profile/{id}', 'ProfileController@showProfile')->name('show-profile');
Route::get('/profile/{id}/edit', 'ProfileController@editInfo')->name('edit-info');
Route::patch('/profile/{id}', 'ProfileController@updateInfo')->name('update-info');
Route::get('/profile/{id}/blogs', 'ProfileController@showBlogs')->name('user-blogs');