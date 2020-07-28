<?php

use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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
Route::group(['prefix' => 'admin'], function () {
     Route::get('invoices-open/close','Voyager\CloseController@close')->name('invoices-open.close');
    Route::get('invoices-closed/archive','Voyager\ArchiveController@archive')->name('invoices-closed.archive');
    Route::get('invoices-closed/cancel','Voyager\CancelController@cancel')->name('invoices-closed.cancel');
    Voyager::routes();

});

