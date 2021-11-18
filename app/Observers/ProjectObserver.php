<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        $stat = Stat::find(1);
        $stat->update(['projects_count' => $stat->projects_count + 1]);
    }
    
}
