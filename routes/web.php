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

Route::get('/home', 'HomeController@index')->name('index');
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/test', function () {
    return view ('/photos/test');
});

Auth::routes();

Route::get('/users/{user}','UsersController@show');
Route::get('/users/{user}/edit','UsersController@edit');
Route::PATCH('/users/{user}','UsersController@update')->Name('users.update');



Route::post('/watching/{house}','WatchingController@store');


Route::get('/photos/{house}','PhotosController@show');


Route::post('/photos/{photo}','PhotosController@delete');
Route::post('/photoes/{photo}','PhotosController@update');
Route::post('/photos','PhotosController@addMorePhotos');

Route::get('/schools/{house}/edit','SchoolsController@edit');
Route::post('/schools','SchoolsController@store');
Route::post('/schools/{school}','SchoolsController@delete');


Route::get('/houses/myHouses','HousesController@myHouses');
Route::get('/houses/watching','HousesController@watching');


Route::get('/houses','HousesController@index');

Route::get('/houses/create','HousesController@create')->middleware('auth');
Route::post('/houses','HousesController@store')->Name('houses.store');
Route::get('/houses/{house}','HousesController@show')->Name('houses.show');
Route::get('/houses/{house}/edit','HousesController@edit')->Name('houses.edit')->middleware('can:update,house');
Route::PATCH('/houses/{house}','HousesController@update')->Name('houses.update')->middleware('can:update,house');


Route::get('/post/admin','PostController@admin');

Route::resource('post', 'PostController');







