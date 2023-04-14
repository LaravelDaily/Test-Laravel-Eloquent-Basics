<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Project;
use App\Observers\ProjectObserver;

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
        //
        Project::observe(ProjectObserver::class);
    }
}
