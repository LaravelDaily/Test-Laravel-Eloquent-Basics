<?php

namespace App\Observers;

use App\Models\Stat;
use App\Models\Project;

class ProjectObserver
{
    public function created(Project $project)
    {
        Stat::whereNotNull('projects_count')->first()->increment('projects_count');
    }

    public function updated(Project $project)
    {
        //
    }

    public function deleted(Project $project)
    {
        //
    }

    public function restored(Project $project)
    {
        //
    }

    public function forceDeleted(Project $project)
    {
        //
    }
}
