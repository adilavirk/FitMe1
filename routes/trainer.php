<?php



Route::group(['prefix'=>'trainer','namespace' => 'Trainer\Auth'],function(){
    Route::get('tregister','RegisterController@showRegistrationForm')->name('trainer.register');
    Route::post('tregister','RegisterController@register')->name('trainer.submit.register');
    Route::get('tlogin','LoginController@showLoginForm')->name('trainer.login');
    Route::post('tlogin','LoginController@login')->name('trainer.submit.login');
    Route::post('tlogout','LoginController@logout')->name('trainer.logout');
});

Route::group(['prefix'=>'trainer','namespace'=>'Trainer','middleware'=>'auth:trainer'],function(){
    Route::get('tindex','TrainerController@tindex')->name('trainer.tindex');
});
