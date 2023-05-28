<?php

namespace App\Observers;

use App\Models\EventTypes;
use Illuminate\Support\Facades\Auth;

class EventTypesObserver
{
    /**
     * Handle the EventTypes "created" event.
     *
     * @param  \App\Models\EventTypes  $eventTypes
     * @return void
     */
    public function creating(EventTypes $eventTypes)
    {
        if ($user = Auth::user()) {
            $eventTypes->company_id = $user->id;
        }

        if ($user = Auth::guard('backpack')->user()) {
            $eventTypes->company_id = $user->id;
        }
    }

    /**
     * Handle the EventTypes "updated" event.
     *
     * @param  \App\Models\EventTypes  $eventTypes
     * @return void
     */
    public function updated(EventTypes $eventTypes)
    {
        //
    }

    /**
     * Handle the EventTypes "deleted" event.
     *
     * @param  \App\Models\EventTypes  $eventTypes
     * @return void
     */
    public function deleted(EventTypes $eventTypes)
    {
        //
    }

    /**
     * Handle the EventTypes "restored" event.
     *
     * @param  \App\Models\EventTypes  $eventTypes
     * @return void
     */
    public function restored(EventTypes $eventTypes)
    {
        //
    }

    /**
     * Handle the EventTypes "force deleted" event.
     *
     * @param  \App\Models\EventTypes  $eventTypes
     * @return void
     */
    public function forceDeleted(EventTypes $eventTypes)
    {
        //
    }
}
