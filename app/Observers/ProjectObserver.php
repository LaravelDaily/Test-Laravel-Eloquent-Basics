<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     *
     * @param Project $project
     * @return void
     */
    public function saved(Project $project): void
    {
        Stat::increment('projects_count');
    }
}
