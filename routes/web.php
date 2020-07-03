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
// Route::get('/user/{int: id}', function ($id) {
//     return 'This is user id'.$id;
// });



// Route::get('/welcome', function () {
//     return 'Welcome User';
// });


Route::get('/', 'PagesController@index' );



Route::get('/about', 'PagesController@about');


Route::get('/services', 'PagesController@services');

// Route::put('/daily/{}/showEdit', 'PlannerController@editStatus');
Route::resource('posts','PostsController');

Route::resource('daily','PlannerController');
Route::resource('plan','PlansController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
