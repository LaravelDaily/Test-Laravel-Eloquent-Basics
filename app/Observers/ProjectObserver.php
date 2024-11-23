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
        Stat::first()
            ->update(['projects_count' => Stat::first()->projects_count + 1]);
    }
}
