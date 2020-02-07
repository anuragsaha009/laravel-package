<?php 

Route::group(['namespace' => 'MyVendor\tags\Http\Controllers', 'middleware' => ['web']], function(){
    Route::get('tags', 'TagController@list')->name('tagList');
    Route::get('create', 'TagController@createInit')->name('createTag_GET');
    Route::post('create', 'TagController@create')->name('createTag_POST');
})
?>