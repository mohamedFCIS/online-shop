<?php

namespace App\Providers;
use App\Models\Site;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $site = Site::all();
        View::share('sites', $site);
        // View::share('site', 'value');
        Schema::defaultStringLength(191);

    }
}
