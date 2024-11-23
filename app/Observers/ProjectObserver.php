<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Project "creating" event.
     */
    public function creating(Project $project): void
    {
        $statsRow = Stat::first();
        $statsRow->projects_count += 1;
        $statsRow->save();
    }
}
