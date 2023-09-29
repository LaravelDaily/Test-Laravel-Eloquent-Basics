<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    public function created(Project $project): void
    {
        $stat = Stat::first();
        $stat->projects_count = $stat->projects_count + 1;
        $stat->save();
    }
}
