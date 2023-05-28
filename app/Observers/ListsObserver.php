<?php

namespace App\Observers;

use App\Models\Lists;
use Illuminate\Support\Facades\Auth;

class ListsObserver
{
    /**
     * Handle the Lists "created" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function creating(Lists $lists)
    {
        $user = Auth::guard('backpack')->user();

        $lists->company_id = $user->id;
    }

    /**
     * Handle the Lists "updated" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function updated(Lists $lists)
    {
        //
    }

    /**
     * Handle the Lists "deleted" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function deleted(Lists $lists)
    {
        //
    }

    /**
     * Handle the Lists "restored" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function restored(Lists $lists)
    {
        //
    }

    /**
     * Handle the Lists "force deleted" event.
     *
     * @param  \App\Models\Lists  $lists
     * @return void
     */
    public function forceDeleted(Lists $lists)
    {
        //
    }
}
