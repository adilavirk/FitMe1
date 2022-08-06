<?php  


Route::group(['prefix'=>'admin','namespace' => 'Admin\Auth'],function(){
    Route::get('adminregister','RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('adminregister','RegisterController@register')->name('admin.submit.register');
    Route::get('adminlogin','LoginController@showLoginForm')->name('admin.login');
    Route::post('adminlogin','LoginController@login')->name('admin.submit.login');
    Route::post('adminlogout','LoginController@logout')->name('admin.logout');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth:admin'],function(){
    Route::get('admindashboard','AdminController@dashboard')->name('admin.dashboard');
    Route::get('adminindex','AdminController@index')->name('admin.index');
    Route::group(['prefix'=>'category','namespace'=>'Category'],function(){
        Route::resource('category','CategoryController');
    
    });

   // ......................Category routes...........//
    Route::group(['prefix'=>'category','namespace'=>'Category'],function(){
        Route::resource('category','CategoryController');
       
     });
    //...................Course Routes.......//


    Route::group(['prefix'=>'course','namespace' => 'Course'],function(){
        Route::get('courseindex','CourseController@index')->name('course.index');
        Route::get('coursecreate','CourseController@create')->name('course.create');
        Route::get('courseedit/{course}','CourseController@edit')->name('course.edit');
        Route::post('coursestore','CourseController@store')->name('course.store');
        Route::put('courseupdate/{course}','CourseController@update')->name('course.update');
        Route::delete('coursedestroy/{course}','CourseController@destroy')->name('course.destroy');
    });
    //...................Content routes..............//

    Route::group(['prefix'=>'content','namespace' => 'Content'],function(){
        Route::get('contentindex','ContentController@index')->name('content.index');
        Route::get('contentcreate','ContentController@create')->name('content.create');
        Route::get('contentedit/{content}','ContentController@edit')->name('content.edit');
        Route::post('contentstore','ContentController@store')->name('content.store');
        Route::put('contentupdate/{content}','ContentController@update')->name('content.update');
        Route::delete('contentdestroy/{content}','ContentController@destroy')->name('content.destroy');
        Route::delete('deleteImage/{image_id}','ContentController@deleteImage')->name('content.deleteImage');
       //Route::delete('deleteContentIcon{content}','ContentController@deleteContentIcon')->name('content.deleteContentIcon');
        Route::get('weeks','ContentController@getAllWeeksOfSingleCourse')->name('content.getAllWeeksOfSingleCourse');
        Route::get('editweeks','ContentController@editAllWeeksOfSingleCourse')->name('content.editAllWeeksOfSingleCourse');
    });
});

// Route::get('/',[PostController::class,'index']);

// Route::get('/create',function(){
// return view('create');
// });

// Route::post('/post',[PostController::class,'store']);
// Route::delete('/delete/{id}',[PostController::class,'destroy']);
// Route::get('/edit/{id}',[PostController::class,'edit']);

// Route::delete('/deleteimage/{id}',[PostController::class,'deleteimage']);
// Route::delete('/deletecover/{id}',[PostController::class,'deletecover']);

// Route::put('/update/{id}',[PostController::class,'update']);
