<?php

namespace App\Providers;

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
    }
}
