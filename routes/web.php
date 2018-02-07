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
Route::group(['middleware'=>['web']],function()   {
   Route::get('/author/{author?}', [
    'uses'=> 'QuoteController@getIndex',
    'as'=>'index'

    ]);

   Route::post('/new',[
       'uses'=>'QuoteController@postQuote',
       'as'=>'create'

   ]);

   Route::get('/delete/{quote_id}',[
      'uses'=>'QuoteController@getDeleteQuote',
       'as'=>'delete'
   ]);

   Route::get('/gotemail/{author_name}',[
       'uses'=>'QuoteController@getMailCallback',
       'as'=>'mail_callback'
   ]);

   Route::get('/admin/login',[
        'uses'=>'AdminController@getLogin',
        'as'=>'login'
    ]);


    Route::post('/admin/login',[
        'uses'=>'AdminController@postLogin',
        'as'=>'admin.login'
    ]);

    Route::group(['middleware'=>'auth'],function (){

            Route::get('/admin/dashboard',[
                'uses'=>'AdminController@getDashboard',
                'as'=>'admin.dashboard'
            ]);

            Route::get('/admin/listQuotes',function (){

                return view('admin.listQuotes');
            });
    });



    Route::get('/admin/logout',[
        'uses'=>'AdminController@getLogout',
        'as'=>'admin.logout'
    ]);
});

//Auth::routes(); -> auth menggunakan make auth

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
