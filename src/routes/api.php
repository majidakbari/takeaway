<?php

## --------------------------------------------------
## | Restaurant Routes
## --------------------------------------------------
Route::group(['namespace' => 'Restaurant', 'as' => 'restaurant.', 'prefix' => 'restaurant'], function (){
    Route::get('/', 'ListRestaurantsAction')->name('index');
});
