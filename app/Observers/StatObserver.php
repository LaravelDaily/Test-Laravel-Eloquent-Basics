<?php

namespace App\Observers;

use App\Models\Stat;

class StatObserver
{
    /**
     * Handle the Stat "created" event.
     *
     * @param  \App\Models\Stat  $stat
     * @return void
     */
    public function created(Stat $stat)
    {
        // $stat = $stat->update([
        //     'projects_count' => ($stat->projects_count)+1
        // ]);
    }

    /**
     * Handle the Stat "updated" event.
     *
     * @param  \App\Models\Stat  $stat
     * @return void
     */
    public function updated(Stat $stat)
    {
        //
    }

    /**
     * Handle the Stat "deleted" event.
     *
     * @param  \App\Models\Stat  $stat
     * @return void
     */
    public function deleted(Stat $stat)
    {
        //
    }

    /**
     * Handle the Stat "restored" event.
     *
     * @param  \App\Models\Stat  $stat
     * @return void
     */
    public function restored(Stat $stat)
    {
        //
    }

    /**
     * Handle the Stat "force deleted" event.
     *
     * @param  \App\Models\Stat  $stat
     * @return void
     */
    public function forceDeleted(Stat $stat)
    {
        //
    }
}
