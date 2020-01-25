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

Route::get('/', ['as' => 'home', 'uses' => 'IndexController@show']);

Route::get('/single/{id}', ['as' => 'single', 'uses' => 'SingleController@show']);
Route::post('/single/{id}', ['uses' => 'SingleController@comment']);

Route::get('/addDeal', ['as' => 'addDeal', 'uses' => 'AddController@showForm']);
Route::post('/addDeal', ['uses' => 'AddController@addDeal']);

Route::get('/customerInfo/{id}', ['as' => 'customerInfo', 'uses' => 'CustomerInfoController@index', ]);
Route::post('/customerInfo/{id}', ['uses' => 'CustomerInfoController@addMessage']);

Route::get('/dialogs/', ['as' => 'dialogs', 'uses' => 'DialogsController@allDialogs', ]);
Route::get('/dialogs/{id}', ['as' => 'dialog', 'uses' => 'DialogsController@showDialog', ])
    ->where('id', '[0-9]+');
Route::post('/dialogs/{id}', ['uses' => 'DialogsController@addMessage', ])
    ->where('id', '[0-9]+');


Auth::routes(); // эта штука запускает все маршруты, связанные с авторизацией. Смотри тему Аторизация.
