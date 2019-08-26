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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/tickets', 'TicketController@index')->name('ticket_list')->middleware('auth');

Route::group(['prefix' => 'tickets','middleware' => 'auth'], function () {
    Route::get('/show/{ticket}', 'TicketController@show_ticket')->name('show_ticket');
    Route::get('/create', 'TicketController@create')->name('create_ticket')->middleware('can:create-ticket');
    Route::post('/create', 'TicketController@store')->name('store_ticket')->middleware('can:create-ticket');
    Route::get('/edit/{ticket}', 'TicketController@edit')->name('edit_ticket')->middleware('can:edit-ticket');
    Route::post('/edit/{ticket}', 'TicketController@update')->name('update_ticket')->middleware('can:edit-ticket');
    Route::get('/status/{ticket}', 'TicketController@status')->name('status_ticket')->middleware('can:status_ticket');
    Route::post('/delete/{ticket}', 'TicketController@delete')->name('delete_ticket')->middleware('can:delete-ticket');
});
