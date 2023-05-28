<?php

namespace App\Providers;

use App\Models\Companies;
use App\Models\Customers;
use App\Models\Events;
use App\Models\EventTypes;
use App\Models\Flows;
use App\Models\Lists;
use App\Models\Templates;
use App\Models\User;
use App\Observers\CompaniesObserver;
use App\Observers\CustomersObserver;
use App\Observers\EventsObserver;
use App\Observers\EventTypesObserver;
use App\Observers\FlowsObserver;
use App\Observers\ListsObserver;
use App\Observers\TemplatesObserver;
use App\Observers\UserObserver;
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
        EventTypes::observe(EventTypesObserver::class);
        Flows::observe(FlowsObserver::class);
        Templates::observe(TemplatesObserver::class);
        Customers::observe(CustomersObserver::class);
        Companies::observe(CompaniesObserver::class);
        Lists::observe(ListsObserver::class);
        User::observe(UserObserver::class);
    }
}
