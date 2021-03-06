<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        /* Route::get('/home', 'HomeController@index')->name('customers.home'); */
        Route::resource('/customers', 'CustomerController');
        Route::resource('/offers', 'OfferController');
        Route::resource('/quotations', 'QuotationController');
        Route::get('/{any}', function () {
            abort(404);
        })->where('any', '.*');
    });

Route::get('{any?}', function () {
    return view('guest.home');
})->where('any', '.*');
