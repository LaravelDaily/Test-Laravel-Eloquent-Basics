<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param  \App\Models\Project $project
     * @return void
     */
    public function created(Project $project)
    {
        $stat = Stat::first();
        $stat->projects_count+=1;
        $stat->save();
    }
}
