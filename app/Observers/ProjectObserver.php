<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    //
    public function created(Project $project)
    {
        //update stats set projects_count = projects_count + 1
        Stat::first()->increment('projects_count');
    }
}
