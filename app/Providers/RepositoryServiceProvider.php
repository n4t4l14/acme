<?php

namespace App\Providers;

use App\Repositories\Contracts\PersonRepositoryInterface;
use App\Repositories\Eloquent\PersonRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * @var string[]
     */
    public $bindings = [
        PersonRepositoryInterface::class => PersonRepositoryEloquent::class,
    ];


    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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
