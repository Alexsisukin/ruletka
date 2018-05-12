<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', 'uses' => 'PagesController@index']);
Route::get('/faq', ['as' => 'faq', 'uses' => 'PagesController@faq']);
Route::get('/oplata', ['as' => 'oplata', 'uses' => 'PagesController@oplata']);
Route::get('/price', ['as' => 'price', 'uses' => 'PagesController@price']);
Route::get('/feedback', ['as' => 'feedback', 'uses' => 'PagesController@feedback']);
Route::get('/account', ['as' => 'account', 'uses' => 'PagesController@account']);
Route::get('/case/{id}', ['as' => 'cases', 'uses' => 'PagesController@cases']);
Route::get('/demo/{id}', ['as' => 'demok', 'uses' => 'PagesController@demok']);
Route::get('/success', ['as' => 'success', 'uses' => 'PagesController@success']);
Route::get('/demo', ['as' => 'demo', 'uses' => 'PagesController@demo']);
Route::get('/login', 'LoginController@vklogin');
Route::post('/bot', 'PagesController@bot');
Route::post('/delete_bot', 'PagesController@delete_bot');
Route::post('/promo', 'PagesController@promo');

Route::post('/bot', 'PagesController@bot');
Route::post('/delete_bot', 'PagesController@delete_bot');
Route::post('/buy2', ['as' => 'buy2', 'uses' => 'PagesController@buy2']);
Route::post('/buy', ['as' => 'buy', 'uses' => 'PagesController@buy']);
Route::post('/getWin', ['as' => 'getWin', 'uses' => 'PagesController@getWin']);
Route::post('/getWin2', ['as' => 'getWin2', 'uses' => 'PagesController@getWin2']);
Route::post('/update', ['as' => 'update', 'uses' => 'PagesController@update']);
Route::post('/api/stats', ['as' => 'update', 'uses' => 'PagesController@getStats']);
Route::post('/api/last', ['as' => 'last', 'uses' => 'PagesController@last']);
Route::post('/getPayment', 'PagesController@getPayment');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', 'LoginController@logout');
});


Route::group(['middleware' => 'admin', 'middleware' => 'access:admin', 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/addCase', 'AdminController@addCase');
    Route::post('/addCase', 'AdminController@addCasePost');
    Route::get('/addItem', 'AdminController@addItem');

    Route::post('/addPromo', 'AdminController@addPromoPost');
    Route::get('/addPromo', 'AdminController@addPromo');
    Route::get('/promo/{id}', ['as' => 'cases', 'uses' => 'AdminController@promo1']);
    Route::post('/promoedit', ['as' => 'case', 'uses' => 'AdminController@promoedit']);
    Route::get('/promo', 'AdminController@promo');

    Route::post('/addItem', 'AdminController@addItemPost');
    Route::get('/stock', 'AdminController@addStock');
    Route::post('/stock', 'AdminController@addStockPost');
    Route::get('/lastvvod', 'AdminController@lastvvod');
    Route::get('/lastvivod', 'AdminController@vivod');
    Route::get('/vivodgifts', 'AdminController@vivodgifts');
    Route::get('/users', 'AdminController@users');
    Route::get('/cases', 'AdminController@cases');
    Route::get('/tickets', 'AdminController@tickets');
    Route::get('/cases/{id}', ['as' => 'cases', 'uses' => 'AdminController@caseid']);
    Route::get('/ticket/{id}', ['as' => 'ticket', 'uses' => 'AdminController@ticket']);
    Route::post('/ticketsave', ['as' => 'ticket', 'uses' => 'AdminController@ticketsave']);
    Route::post('/casedit', ['as' => 'case', 'uses' => 'AdminController@casedit']);
    Route::get('/searchusers', ['as' => 'search', 'uses' => 'AdminController@search2']);
    Route::get('/searchusersname', ['as' => 'search', 'uses' => 'AdminController@searchusersname']);
    Route::get('/user/{id}', ['as' => 'users', 'uses' => 'AdminController@userid']);
    Route::post('/userdit', ['as' => 'user', 'uses' => 'AdminController@userdit']);
    Route::match(['get', 'post'], '/givemoney/{id}', ['as' => 'givemoney', 'uses' => 'AdminController@givemoney']);
    Route::get('/vivodclose/{id}', 'AdminController@close');
    Route::get('/vivodclosegift/{id}', 'AdminController@closegift');
});