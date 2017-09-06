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
    return view('pages.home');
});


Route::group(['prefix' => 'user'], function(){

Route::group(['middleware'=> 'guest'],function(){

Route::get('/signup', 'UserController@getSignup');
Route::post('/signup', 'UserController@postSignup');
Route::get('/signin', 'UserController@getSignin');
Route::post('/signin', 'UserController@postSignin');

});
Route::group(['middleware' => 'auth'],function(){
Route::get('/profile', 'UserController@profile');
Route::get('/logout', 'UserController@getLogout');
});


});



Route::get('/', 'Admin\SliderCrudController@slidershow');
Route::get('drinks-categories', 'Admin\DrinksCategoryCrudController@indexfront');

Route::get('drinks-categories/{slug}', 'Admin\DrinkCrudController@drinkfront');
Route::get('drinks-categories/{name}/{slug}','Admin\DrinkCrudController@showspecific');
Route::get('home/{slug}','Admin\SliderCrudController@showspecific');

//Route::get('cart/{id}','CartController@addItem');

// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
  // Backpack\CRUD: Define the resources for the entities you want to CRUD.
    CRUD::resource('tag', 'Admin\TagCrudController');
    CRUD::resource('drinkscategory', 'Admin\DrinksCategoryCrudController');
    CRUD::resource('drink', 'Admin\DrinkCrudController');
    CRUD::resource('slider', 'Admin\SliderCrudController');

   });


Route::get('{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);




 