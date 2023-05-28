<?php

namespace App\Observers;

use App\Models\Templates;
use Illuminate\Support\Facades\Auth;

class TemplatesObserver
{
    /**
     * Handle the Flows "created" event.
     *
     * @param  \App\Models\Templates  $flows
     * @return void
     */
    public function creating(Templates $flows)
    {
        $user = Auth::guard('backpack')->user();

        $flows->company_id = $user->id;
    }

    /**
     * Handle the Flows "updated" event.
     *
     * @param  \App\Models\Templates  $flows
     * @return void
     */
    public function updated(Templates $flows)
    {
        //
    }

    /**
     * Handle the Flows "deleted" event.
     *
     * @param  \App\Models\Templates  $flows
     * @return void
     */
    public function deleted(Templates $flows)
    {
        //
    }

    /**
     * Handle the Flows "restored" event.
     *
     * @param  \App\Models\Templates  $flows
     * @return void
     */
    public function restored(Templates $flows)
    {
        //
    }

    /**
     * Handle the Flows "force deleted" event.
     *
     * @param  \App\Models\Templates  $flows
     * @return void
     */
    public function forceDeleted(Templates $flows)
    {
        //
    }
}
