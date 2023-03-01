<?php

namespace App\Observers;

use App\Models\Stat;
use App\Models\Project;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        Stat::first()->increment('projects_count');
    }

}
