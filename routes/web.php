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

 Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::group(['middleware' => 'auth'], function(){
        /* CATEGORY ROUTE*/ 
        Route::get('category/statusActive', 'CategoryController@statusActive')->name('category.active');
        Route::get('category/statusDeactive', 'CategoryController@statusDeactive')->name('category.deactive');
        Route::get('category/delete', 'CategoryController@deleteAll')->name('category.delete');
        Route::put('category/{category}/status', 'CategoryController@status');
        Route::resource('category', 'CategoryController');
        Route::resource('/', 'CategoryController');
 
        /* AUTHOR ROUTE*/
        Route::get('author/delete', 'AuthorController@deleteAll')->name('author.deleteAll');
        Route::get('author/statusDeactive', 'AuthorController@statusDeactive')->name('author.deactive');
        Route::get('author/statusActive', 'AuthorController@statusActive')->name('author.active');
        Route::put('author/{author}/status', 'AuthorController@status');
        Route::resource('author', 'AuthorController');
        

        /* Media ROUTE*/
        Route::get('media/statusActive', 'MediaController@statusActive')->name('media.activeAll');
        Route::get('media/statusDeactive', 'MediaController@statusDeactive')->name('media.deactiveAll');
        Route::get('media/deleteAll', 'MediaController@deleteAll')->name('media.deleteAll');
        Route::put('media/{media}/status', 'MediaController@status');
        Route::resource('media', 'MediaController');
 
        /* Book ROUTE*/
        Route::put('book/{book}/status', 'BookController@status');
        Route::resource('book', 'BookController');

        /* Team ROUTE*/
        Route::put('team/{team}/status', 'TeamController@status');
        Route::resource('team', 'TeamController');

        /* User ROUTE*/
        Route::put('user/{user}/status', 'UserController@status');
        Route::resource('user', 'UserController');

        Route::post('/updatepassword', 'HomeController@updatepassword')->name('updatepassword');
        Route::get('/profile', 'HomeController@profile');
        Route::post('/profile', 'HomeController@profile_update')->name('profile.update');

    });    
        /* Home ROUTE*/
        // Route::get('/profile', 'HomeController@profile');
        // Route::get('/forgot_password', 'HomeController@forgot_password');
        // Route::post('/login', 'HomeController@store');
        // Route::get('/', 'HomeController@index');
        // Auth::routes();
 
    });


    Route::group(['prefix' => 'admin'], function(){
        Auth::routes(['verify' => true]);
        Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'Auth\LoginController@login')->name('login.attempt');
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
        // Social Login
        Route::get('login/{driver}', 'Auth\LoginController@redirect')->name('login.social');
        Route::get('login/{driver}/callback', 'Auth\LoginController@callback');

        Route::group(['middleware' => 'verified'], function() {
            Route::get('/category', 'Admin\CategoryController@index');
        });
    });

Route::get('/contact', 'ContactFormController@create');
Route::post('/contact', 'ContactFormController@store')->name('contact');

Route::get('/author_detail/{slug}', 'HomeController@author_detail');
Route::get('/author', 'HomeController@author');
Route::get('/gallery', 'HomeController@gallery');
Route::get('/blog', 'HomeController@blog');
Route::get('/about', 'HomeController@about');

Route::get('category/{slug}', 'CategoryController@show')->name('front.category');
Route::get('book/{slug}', 'BookController@show')->name('front.book');
Route::get('/', 'HomeController@index');


//* Shopping Cart *//

Route::post('/cart_add', 'CartController@addToCart')->name('add.to.cart');




