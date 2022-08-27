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

    public function updated(Project $project)
    {
    }

    public function deleted(Project $project)
    {
    }

    public function restored(Project $project)
    {
    }

    public function forceDeleted(Project $project)
    {
    }

}