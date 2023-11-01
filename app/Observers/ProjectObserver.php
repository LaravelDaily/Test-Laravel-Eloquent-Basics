<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectObserver
{
    public function created(Project $project)
    {
        // Update the stats table to increment projects_count
        DB::table('stats')
            ->increment('projects_count');
    }
}
