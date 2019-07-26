<?php

namespace App\Providers;

use App\Entities\Restaurant;
use App\Repositories\File\FileRestaurantRepository;
use App\Repositories\Interfaces\RestaurantRepositoryInterface;
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
                json_decode(file_get_contents(storage_path('data/restaurants.json')), true),
                Restaurant::class
            );
        });
    }
}
