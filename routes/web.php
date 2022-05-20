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

Route::get('/', 'App\Http\Controllers\LoginController@loginView')->name('login');
Route::get('all-user-blogs', 'App\Http\Controllers\LoginController@allBlogs');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/register', 'App\Http\Controllers\LoginController@registerView')->name('register');
Route::post('/register', 'App\Http\Controllers\LoginController@registerStore');

// home route
Route::group(['middleware' => 'auth'],function(){
    Route::get('/admin', 'App\Http\Controllers\AdminController@adminView');
    Route::get('/user', 'App\Http\Controllers\UserController@userView');
});

//blog route
Route::get('create-blog', 'App\Http\Controllers\AdminController@createView');
Route::post('create-blog', 'App\Http\Controllers\AdminController@blogStore');

Route::get('edit-blog/{id}', 'App\Http\Controllers\AdminController@editView');
Route::post('update-blog/{id}', 'App\Http\Controllers\AdminController@editStore');

Route::get('delete/{id}', 'App\Http\Controllers\AdminController@delete');

Route::get('/logout' ,'App\Http\Controllers\AdminController@logout');
Route::get('/user-logout', 'App\Http\Controllers\UserController@userLogout');

// user route
Route::get('create-blog', 'App\Http\Controllers\UserController@createUserView');
Route::post('create-blog', 'App\Http\Controllers\UserController@blogUserStore');

Route::get('edit-user-blog/{id}', 'App\Http\Controllers\UserController@editUserView');
Route::post('update-user-blog/{id}', 'App\Http\Controllers\UserController@editUserStore');

Route::get('user-delete/{id}', 'App\Http\Controllers\AdminController@userDelete');




