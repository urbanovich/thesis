<?php

namespace App\Observers;

use App\Models\Customers;
use Illuminate\Support\Facades\Auth;

class CustomersObserver
{
    /**
     * Handle the Customers "created" event.
     *
     * @param  \App\Models\Customers  $customers
     * @return void
     */
    public function creating(Customers $customers)
    {
        if ($user = Auth::user()) {
            $customers->company_id = $user->id;
        }

        if ($user = Auth::guard('backpack')->user()) {
            $customers->company_id = $user->id;
        }
    }

    /**
     * Handle the Customers "updated" event.
     *
     * @param  \App\Models\Customers  $customers
     * @return void
     */
    public function updated(Customers $customers)
    {
        //
    }

    /**
     * Handle the Customers "deleted" event.
     *
     * @param  \App\Models\Customers  $customers
     * @return void
     */
    public function deleted(Customers $customers)
    {
        //
    }

    /**
     * Handle the Customers "restored" event.
     *
     * @param  \App\Models\Customers  $customers
     * @return void
     */
    public function restored(Customers $customers)
    {
        //
    }

    /**
     * Handle the Customers "force deleted" event.
     *
     * @param  \App\Models\Customers  $customers
     * @return void
     */
    public function forceDeleted(Customers $customers)
    {
        //
    }
}
