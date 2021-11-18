<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    public function created(Project $project) {
        Stat::find(1)->increment('projects_count');
    }
}
