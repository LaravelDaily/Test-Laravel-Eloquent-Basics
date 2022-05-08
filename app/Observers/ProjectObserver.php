<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    public function created(Project $project)
    {
        Stat::first()->increment('projects_count');
    }
}
