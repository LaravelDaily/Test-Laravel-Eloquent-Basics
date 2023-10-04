<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project)
    {
        $stat = Stat::first();
        $stat->projects_count = $stat->projects_count++;
        $stat->save();
    }
}
