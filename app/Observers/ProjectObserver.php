<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        Stat::where('id', 1)->increment('projects_count');
    }
}
