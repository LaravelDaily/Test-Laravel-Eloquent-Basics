<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;
use Illuminate\Support\Facades\Log;

class ProjectObserver
{
    public function created(Project $project) {
        Log::info('New project created: '.$project->name);
        Stat::first()->increment('projects_count');
    }
}
