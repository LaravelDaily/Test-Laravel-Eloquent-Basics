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
        $stat->increment('projects_count');
    }

  
}
