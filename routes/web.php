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
	return view('welcome');
});

Route::prefix('admin')->group(function(){
	Route::get('/login', ['as'=>'admin.login', 'uses'=>'Admin\AuthController@login']);
	Route::get('/dashboard', ['as'=>'admin.dashboard', 'uses'=>'Admin\HomeController@dashboard']);
	// Route::get('/user/index', ['as'=>'admin.userlist', 'uses'=>'Admin\UserController@index']);
    // Route::get('/user/create', ['as'=>'admin.user', 'uses'=>'Admin\UserController@create']);
    // Route::get('/user/edit/{id}', ['as'=>'admin.edit', 'uses'=>'Admin\UserController@edit']);
	// Route::post('/user/store', ['as'=>'save.user', 'uses'=>'Admin\UserController@store']);
	// Route::post('/user/update/{sid}', ['as'=>'update.user', 'uses'=>'Admin\UserController@update']);
});
Auth::routes();

//post
Route::group(['middleware'=>['language']],function(){
	
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('/home', 'HomeController@store')->name('home.post');//action home.post
	Route::get('/allPost','HomeController@allPost')->name('home.allPost');
	Route::get('/deletePost/{id}','HomeController@destroy')->name('home.destroy');
	Route::get('/editPost/{id}','HomeController@edit')->name('home.edit');
	Route::post('/update/{id}','HomeController@update')->name('home.update');
	//Product
	Route::get('/product', 'ProductController@index')->name('product');
	Route::post('/product', 'ProductController@store')->name('save_product');
	Route::get('/product/all', 'ProductController@create')->name('product.allProduct');

	//Route::resource('/product', 'ProductController');
	Route::post('/addCart', 'ProductController@storeCart')->name('addToCart');
	Route::get('/viewCart','ProductController@showCart')->name('viewCart');
	Route::post('/updateCart','ProductController@updateCart')->name('updateCartProduct');
	Route::get('/delete/{id}','ProductController@destroy')->name('destroy');
	Route::post('/language', array('before' =>'csrf', 'as' =>'language-chooser','uses' =>'LanguageController@chooseLanguage'));

});
