<?php

namespace App\Observers;

use App\Models\Stat;
use Illuminate\Support\Facades\DB;

class StatObserver
{
    /**
     * Handle the Stat "created" event.
     */
    public function created(Stat $stat): void
    {
        //
        DB::table('stats')->increment('projects_count');
    }

    /**
     * Handle the Stat "updated" event.
     */
    public function updated(Stat $stat): void
    {
        //
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
