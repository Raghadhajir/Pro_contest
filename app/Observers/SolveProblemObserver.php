<?php

namespace App\Observers;

use App\Models\Solve;

class SolveProblemObserver
{
    /**
     * Handle the Solve "created" event.
     */
    public function created(Solve $solve): void
    {
        if($solve->status == 'accepted')
        {
            $user = $solve->user;
            $user->score += 1;
            $user->save();
        }

    }

    /**
     * Handle the Solve "updated" event.
     */
    public function updated(Solve $solve): void
    {
        //
    }

    /**
     * Handle the Solve "deleted" event.
     */
    public function deleted(Solve $solve): void
    {
        //
    }

    /**
     * Handle the Solve "restored" event.
     */
    public function restored(Solve $solve): void
    {
        //
    }

    /**
     * Handle the Solve "force deleted" event.
     */
    public function forceDeleted(Solve $solve): void
    {
        //
    }
}
