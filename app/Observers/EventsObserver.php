<?php

namespace App\Observers;

use App\Models\Events;
use Illuminate\Support\Facades\Auth;

class EventsObserver
{
    /**
     * Handle the Events "created" event.
     *
     * @param  \App\Models\Events  $events
     * @return void
     */
    public function creating(Events $events)
    {
        $user = Auth::guard('backpack')->user();

        $events->company_id = $user->id;
    }

    /**
     * Handle the Events "updated" event.
     *
     * @param  \App\Models\Events  $events
     * @return void
     */
    public function updated(Events $events)
    {
        //
    }

    /**
     * Handle the Events "deleted" event.
     *
     * @param  \App\Models\Events  $events
     * @return void
     */
    public function deleted(Events $events)
    {
        //
    }

    /**
     * Handle the Events "restored" event.
     *
     * @param  \App\Models\Events  $events
     * @return void
     */
    public function restored(Events $events)
    {
        //
    }

    /**
     * Handle the Events "force deleted" event.
     *
     * @param  \App\Models\Events  $events
     * @return void
     */
    public function forceDeleted(Events $events)
    {
        //
    }
}
