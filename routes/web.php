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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'PageController@home')->name('home');
    Route::get('/about', 'PageController@about')->name('about');
    Route::get('/contact', 'PageController@contact')->name('contact');
    Route::get('/services', 'PageController@services')->name('services');
    Route::get('/blog', 'PageController@blog')->name('blog');
    Route::get('/products', 'PageController@products')->name('products');
    Route::get('/galary', 'PageController@galary')->name('galary');
    Route::get('/student/adm', 'PageController@student')->name('student');
    Route::get('/grade/marks', 'PageController@grade')->name('grades');

    });