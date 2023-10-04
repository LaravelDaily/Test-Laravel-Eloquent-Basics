<?php

namespace App\Observers;

use App\Models\Stat;

class StatObserver
{
    /**
     * Handle the Stat "created" event.
     */
    public function created(Stat $stat): void
    {
        //
    }

    /**
     * Handle the Stat "updated" event.
     */
    public function updated(Stat $stat): void
    {
        Stat::query()->where('projects_count', $stat->projects_count)->update(['projects_count' => $stat++]);
    }

    /**
     * Handle the Stat "deleted" event.
     */
    public function deleted(Stat $stat): void
    {
        //
    }

    /**
     * Handle the Stat "restored" event.
     */
    public function restored(Stat $stat): void
    {
        //
    }

    /**
     * Handle the Stat "force deleted" event.
     */
    public function forceDeleted(Stat $stat): void
    {
        //
    }
}
