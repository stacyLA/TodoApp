<?php

use Illuminate\Support\Facades\Route;
// use Symfony\Component\Routing\Route as RoutingRoute;

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('/', 'PageController@home')->name('home');
    Route::get( '/about',  'PageController@about')->name(  'about');
    Route::get( '/contact',  'PageController@contact')->name(  'contact');
    Route::get( '/address',  'PageController@address')->name(  'address');
    Route::get( '/blog',  'PageController@blog')->name(  'blog');
    Route::get( '/services',  'PageController@services')->name(  'services');
    Route::get( '/products',  'PageController@products')->name(  'products');
    Route::get( '/gallery',  'PageController@gallery')->name(  'gallery');

});
