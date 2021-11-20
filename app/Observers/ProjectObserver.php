<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;
use Illuminate\Support\Facades\DB;

class ProjectObserver
{
    public function created(Project $project)
    {
        DB::table('stats')
            ->increment('projects_count', 1);
    }
}
