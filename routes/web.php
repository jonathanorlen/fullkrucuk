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

// Auth::routes(['verify' => true]);
Auth::routes();


Route::get('/', 'Web\KrucukController@index')->name('index');
Route::get('/test/{slug}', 'Web\test@index')->name('test');
Route::get('/detail/{id}', 'Web\KrucukController@detail')->name('detail');
Route::get('/search', 'Web\KrucukController@search')->name('search');
Route::get('/category/{slug}', 'Web\KrucukController@category')->name('category');
Route::post('/rate', 'Web\KrucukController@rateMerchant')->name('rate');
Route::get('/login', 'Web\KrucukController@login')->name('login');
Route::get('/register', 'Web\KrucukController@register')->name('register');
Route::post('/register/create', 'Web\KrucukController@registerCreate');
Route::get('/login-merchant', 'Web\KrucukController@loginMerchant')->name('login-merchant');
Route::get('/register-merchant', 'Web\KrucukController@registerMerchant')->name('register-merchant');
Route::post('/register-merchant/create', 'Web\KrucukController@registerMerchantCreate')->name('register-merchant-create');

Route::prefix('merchant')
     ->namespace('Web')
     ->middleware(['auth'])
     ->group(function(){
          Route::get('/setting','MerchantController@setting')->name('merchant-setting');
          Route::post('/setting-update','MerchantController@settingUpdate')->name('merchant-setting-update');
          Route::get('/operational','MerchantController@operational')->name('merchant-operational');
          Route::post('/operational-update','MerchantController@operationalUpdate')->name('merchant-operational-update');
          Route::get('/information','MerchantController@information')->name('merchant-information');
          Route::post('/information-update','MerchantController@informationUpdate')->name('merchant-information-update');
          Route::get('/gallery','MerchantController@gallery')->name('merchant-gallery');
          Route::post('/gallery-update','MerchantController@galleryUpdate')->name('merchant-gallery-update');
          Route::get('/gallery-delete/{id}','MerchantController@galleryDelete')->name('merchant-gallery-delete');
          Route::get('/menu','MerchantController@menu')->name('merchant-menu');
          Route::post('/menu-update','MerchantController@menuUpdate')->name('merchant-menu-update');
     });

Route::prefix('user')
     ->namespace('Web')
     ->middleware(['auth'])
     ->group(function(){
          Route::get('/comment','UserController@comment')->name('user-comment');
          // Route::post('/comment-update','UserController@commentUpdate')->name('merchant-setting-update');
     });

Route::prefix('admin')
     ->namespace('Admin')
     ->group(function(){
          Route::get('/','Dashboard@index');
          Route::resource('category','CategoryController');
          Route::resource('admin','AdminController');
          Route::resource('user','UserController');
          Route::resource('merchant','MerchantController')->names([
               'update' => 'merchant.update',
          ]);
          Route::resource('banner','BannerController');
     });


