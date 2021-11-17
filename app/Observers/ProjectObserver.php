<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    public function created(Project $project)
    {
        Stat::query()
            ->firstOr(fn() => Stat::query()->create(['projects_count' => 0]))
            ->increment('projects_count');
    }
}
