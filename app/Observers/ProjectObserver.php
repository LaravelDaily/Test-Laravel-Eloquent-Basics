<?php

namespace App\Observers;


use App\Models\Stat;
use App\Models\Project;

class ProjectObserver
{
    public function created(Project $project)
    {
        $stat = new Stat();
        $stat->increment('projects_count');
    }
}