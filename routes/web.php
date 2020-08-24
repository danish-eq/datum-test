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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Frontend
//Route::get('/', 'WebsiteController@index')->name('websitehome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard' , 'HomeController@dashboard')->name('dashboard');

//News
Route::get('news/listing','NewsController@index')->name('newslisting');
Route::get('news/detail/{id}','NewsController@detail')->name('newsdetail');
Route::get('news/add','NewsController@add')->name('newsadd');
Route::post('news/save','NewsController@save')->name('newssave');
Route::get('news/edit/{id}','NewsController@edit')->name('newsedit');
Route::post('news/update/{id}','NewsController@update')->name('newsupdate');
Route::delete('news/delete/{id}','NewsController@delete')->name('newsdelete');

//CMS
Route::get('cms/listing','CmsController@index')->name('cmslisting');
Route::get('cms/detail/{id}','CmsController@detail')->name('cmsdetail');
Route::get('cms/add','CmsController@add')->name('cmsadd');
Route::post('cms/save','CmsController@save')->name('cmssave');
Route::get('cms/edit/{id}','CmsController@edit')->name('cmsedit');
Route::post('cms/update/{id}','CmsController@update')->name('cmsupdate');
Route::delete('cms/delete/{id}','CmsController@delete')->name('cmsdelete');

//Services
Route::get('services/listing','ServiceController@index')->name('servicelisting');
Route::get('services/detail/{id}','ServiceController@detail')->name('servicedetail');
Route::get('services/add','ServiceController@add')->name('serviceadd');
Route::post('services/save','ServiceController@save')->name('servicesave');
Route::get('services/edit/{id}','ServiceController@edit')->name('serviceedit');
Route::post('services/update/{id}','ServiceController@update')->name('serviceupdate');
Route::delete('services/delete/{id}','ServiceController@delete')->name('servicedelete');

//Subscription
Route::get('subscription/listing','SubscribeController@index')->name('subscriptionlist');
Route::delete('subscription/delete/{id}','SubscribeController@delete')->name('subscriptiondelete');
