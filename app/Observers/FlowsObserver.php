<?php

namespace App\Observers;

use App\Models\Flows;
use Illuminate\Support\Facades\Auth;

class FlowsObserver
{
    /**
     * Handle the Flows "created" event.
     *
     * @param  \App\Models\Flows  $flows
     * @return void
     */
    public function creating(Flows $flows)
    {
        $user = Auth::guard('backpack')->user();

        $flows->company_id = $user->id;
    }

    /**
     * Handle the Flows "updated" event.
     *
     * @param  \App\Models\Flows  $flows
     * @return void
     */
    public function updated(Flows $flows)
    {
        //
    }

    /**
     * Handle the Flows "deleted" event.
     *
     * @param  \App\Models\Flows  $flows
     * @return void
     */
    public function deleted(Flows $flows)
    {
        //
    }

    /**
     * Handle the Flows "restored" event.
     *
     * @param  \App\Models\Flows  $flows
     * @return void
     */
    public function restored(Flows $flows)
    {
        //
    }

    /**
     * Handle the Flows "force deleted" event.
     *
     * @param  \App\Models\Flows  $flows
     * @return void
     */
    public function forceDeleted(Flows $flows)
    {
        //
    }
}
