<?php

namespace App\Providers;

use App\Repositories\Implementation\UserRepositry;
use App\Repositories\IUserRepositry;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserRepositry::class,UserRepositry::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
