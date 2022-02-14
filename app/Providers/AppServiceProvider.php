<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Product\ProductRepository;
use App\Repository\Product\ProductInterface;
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
    public function boot()
    {
        $this->app->bind(ProductInterface::class , ProductRepository::class);
    }
}
