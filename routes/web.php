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

use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin','middleware' => ['auth']], function() {
    Route::resource('users','UserController');
    Route::resource('members', 'MemberController');
    Route::resource('books', 'BookController');
    Route::resource('transaction', 'TransactionController');
    Route::get('/history', 'TransactionController@history')->name('history');

    Route::get('print-books', 'BookController@printBooks')->name('books.print');
    Route::get('print-transaction', 'TransactionController@printTransaction')->name('transaction.print');
    Route::get('cetak-member', 'MemberController@cetakMember')->name('members.print');
});
