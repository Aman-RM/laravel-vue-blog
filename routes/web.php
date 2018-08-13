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

Route::get('/', function () {
    return view('myblog');
});

Route::post('/register','HomeController@signup');

Route::post('/signin', 'HomeController@signin');

Route::post('/addpost', 'PostsController@addpost');

Route::get('/post', 'PostsController@post');

Route::post('/addcategory', 'CategoryController@addcategory');

Route::get('/category', 'CategoryController@category');

Route::delete('/post/{id}', 'PostsController@destroy');

Route::put('/editpost/{id}', 'PostsController@editpost');

Route::delete('/category/{id}', 'PostsController@destroy');

Route::get('/post/{id}', 'PostsController@show');



