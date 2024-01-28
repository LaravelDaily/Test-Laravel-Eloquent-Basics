<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Stat "created" event.
     */
    public function created(Project $project): void
    {
        //// Stat: on creating a new Stat, create an Observer event to run SQL
        //   update stat set Stats_count = Stats_count + 1
        Stat::first()->increment('projects_count');
    }
}
