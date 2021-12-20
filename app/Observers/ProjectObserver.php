<?php

namespace App\Observers;

use App\Models\Stat;
use App\Models\Project;

class ProjectObserver
{
    public function created(Project $project)
    {
        Stat::query()->increment('projects_count', 1);
    }
}
