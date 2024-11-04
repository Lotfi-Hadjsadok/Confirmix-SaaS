<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        View::share('agent', new Agent());
    }
}
