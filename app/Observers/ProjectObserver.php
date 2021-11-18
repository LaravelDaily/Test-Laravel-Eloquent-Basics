<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Project "saved" event.
     *
     * @param  Project  $project
     *
     * @return void
     */
    public function saved(Project $project)
    {
        Stat::increment('projects_count');
    }
}
