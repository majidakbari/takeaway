<?php

## --------------------------------------------------
## | Restaurant Routes
## --------------------------------------------------
Route::group(['namespace' => 'Restaurant', 'as' => 'restaurant.', 'prefix' => 'restaurant'], function (){
    Route::get('/', 'ListRestaurantsAction')->name('index');
    Route::post('/{name}/favorite', 'FavoriteRestaurantAction')->name('favorite');
    Route::delete('/{name}/favorite', 'UnfavoriteRestaurantAction')->name('unfavorite');
});
