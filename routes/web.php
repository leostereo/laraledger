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


// Authentication routes
Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});



Route::group(['middleware' => 'auth'], function(){

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    #CREDENTIALS
    Route::get('/{agent}/credential/remove/{id}', 'CredentialController@remove')->name('credential.remove');
    Route::get('/credential/{id}/store', 'CredentialController@store')->name('credential.store');
    Route::post('/credential/issue', 'CredentialController@issue')->name('credential.issue');

    Route::get('/{agent}/connection/remove/{id}', 'ConnectionController@remove')->name('connection.remove');
    Route::post('/connection/invitation_create', 'ConnectionController@invitation_create')->name('connection.invitation_create');
    Route::post('/connection/invitation_receive', 'ConnectionController@invitation_receive')->name('connection.invitation_receive');
    Route::post('/connection/invitation_accept', 'ConnectionController@invitation_accept')->name('connection.invitation_accept');
    Route::post('/connection/request_accept', 'ConnectionController@request_accept')->name('connection.request_accept');

    #MESSAGES
    Route::post('/message/send', 'MessageController@send')->name('message.send');

   

});

// Include Wave Routes
Wave::routes();
