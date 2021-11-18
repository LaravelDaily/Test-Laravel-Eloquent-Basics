<?php

namespace App\Observers;

use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Stat "created" event.
     *
     * @param  \App\Models\Stat  $Stat
     * @return void
     */
    public function created(Stat $Stat)
    {
        Stat::query()
        ->increment('projects_count');
    }

    /**
     * Handle the Stat "updated" event.
     *
     * @param  \App\Models\Stat  $Stat
     * @return void
     */
    public function updated(Stat $Stat)
    {
        //
    }

    /**
     * Handle the Stat "deleted" event.
     *
     * @param  \App\Models\Stat  $Stat
     * @return void
     */
    public function deleted(Stat $Stat)
    {
        //
    }

    /**
     * Handle the Stat "restored" event.
     *
     * @param  \App\Models\Stat  $Stat
     * @return void
     */
    public function restored(Stat $Stat)
    {
        //
    }

    /**
     * Handle the Stat "force deleted" event.
     *
     * @param  \App\Models\Stat  $Stat
     * @return void
     */
    public function forceDeleted(Stat $Stat)
    {
        //
    }
}
