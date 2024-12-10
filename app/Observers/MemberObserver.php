<?php

namespace App\Observers;

use App\Models\member;

class MemberObserver
{
    /**
     * Handle the member "created" event.
     */
    public function created(member $member): void
    {
        
    }

    /**
     * Handle the member "updated" event.
     */
    public function updated(member $member): void
    {
        //
    }

    /**
     * Handle the member "deleted" event.
     */
    public function deleted(member $member): void
    {
        //
    }

    /**
     * Handle the member "restored" event.
     */
    public function restored(member $member): void
    {
        //
    }

    /**
     * Handle the member "force deleted" event.
     */
    public function forceDeleted(member $member): void
    {
        //
    }
}
