<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObsorver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        $stat = Stat::first();
        $stat->projects_count = $stat->projects_count + 1;
        $stat->save();
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        //
    }
}
