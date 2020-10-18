<?php

namespace App\Providers;

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
//        config(['logging.channels.single.path' => \Phar::running()
//            ? dirname(\Phar::running(false)) . '/desired-path/your-app.log'
//            : storage_path('logs/your-app.log')
//        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
