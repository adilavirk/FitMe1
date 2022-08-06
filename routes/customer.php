<?php


Route::group(['prefix'=>'customer','namespace' => 'Customer\Auth'],function(){
    Route::get('cregister','RegisterController@showRegistrationForm')->name('customer.register');
    Route::post('cregister','RegisterController@register')->name('customer.submit.register');
    Route::get('clogin','LoginController@showLoginForm')->name('customer.login');
    Route::post('clogin','LoginController@login')->name('customer.submit.login');
    Route::post('clogout','LoginController@logout')->name('customer.logout');
});

Route::group(['prefix'=>'customer','namespace'=>'Customer','middleware'=>'auth:customer'],function(){
    Route::get('cindex','CustomerController@cindex')->name('customer.cindex');
});
