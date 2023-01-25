<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param Project $project
     * @return void
     */
    public function created(Project $project)
    {
        Stat::first()->increment('projects_count');

        /*$stat = Stat::first();
        $stat->projects_count = $stat->projects_count + 1;
        $stat->save();*/
    }
}
