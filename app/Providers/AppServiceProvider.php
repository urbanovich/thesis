<?php

namespace App\Providers;

use App\Models\Events;
use App\Models\Flows;
use App\Models\Templates;
use App\Observers\EventsObserver;
use App\Observers\FlowsObserver;
use App\Observers\TemplatesObserver;
use Illuminate\Support\ServiceProvider;

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
        Events::observe(EventsObserver::class);
        Flows::observe(FlowsObserver::class);
        Templates::observe(TemplatesObserver::class);
    }
}
