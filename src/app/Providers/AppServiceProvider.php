<?php

namespace App\Providers;

use App\Entities\Restaurant;
use App\Entities\UserFavoriteRestaurant;
use App\Repositories\File\FileRestaurantRepository;
use App\Repositories\File\FileUserFavoriteRestaurantRepository;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;
use App\Repositories\Interfaces\UserFavoriteRestaurantRepositoryInterface;
use Illuminate\Support\ServiceProvider;

/**
 * Creating containers, this provider is not deferred ;)
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->bindImplementations();
    }


    /**
     * This function will bind interfaces to their implementations
     * @return void
     */
    private function bindImplementations(): void
    {
        $this->app->bind(RestaurantRepositoryInterface::class, function () {
            return new FileRestaurantRepository(
                storage_path('data/restaurants.json'), Restaurant::class
            );
        });

        $this->app->bind(UserFavoriteRestaurantRepositoryInterface::class, function () {
            return new FileUserFavoriteRestaurantRepository(
                storage_path('data/user_favorite_restaurants.json'), UserFavoriteRestaurant::class
            );
        });
    }
}
