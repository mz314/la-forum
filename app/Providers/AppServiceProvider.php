<?php

namespace LaForum\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      // $this->app->bind('LaForum\Repositories\BoardRepository', 'LaForum\Repositories\BoardRepository');
    }
}
