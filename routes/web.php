<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\PDFController;

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

//Route::redirect('/admin/login', '/admin/login/de');

Route::get('/', function () {
  return view('welcome');

});
Route::group(['prefix' => 'admin'], function () {
     Route::get('invoices-open/close','Voyager\CloseController@close')->name('invoices-open.close');
    Route::get('invoices-closed/archive','Voyager\ArchiveController@archive')->name('invoices-closed.archive');
    Route::get('invoices-closed/cancel','Voyager\CancelController@cancel')->name('invoices-closed.cancel');
    Route::get('invoice-closed/print','Voyager\PDFController@print')->name('invoices-closed.print');
    Voyager::routes();
});

/*Route::group(['prefix' => '{language}'], function () {
    Route::get('/admin/login', function () {

    });
})->middleware(\App\Http\Middleware\SetLanguage::class);
*/


Route::get('set-locale/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();

})->middleware(\App\Http\Middleware\SetLanguage::class)->name('locale.setting');

//Route::get('create-pdf-file', [PDFController::class, 'index']);



