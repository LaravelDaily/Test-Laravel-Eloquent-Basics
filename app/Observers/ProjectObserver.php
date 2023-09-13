<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        $stat = Stat::firstOrCreate();
        $stat->update([
            'projects_count' => $stat->projects_count + 1
        ]);
    }
}