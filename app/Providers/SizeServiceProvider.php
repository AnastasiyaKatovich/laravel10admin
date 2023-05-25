<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class SizeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view::composer('layouts.base','App\Providers\ViewComposers\SizeComposer');
    }
}
