<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class UserObserver
{
    /**
     * Handle the Projects "created" event.
     */
    public function created(Project $projects): void
    {
        Stat::increment('projects_count', 1);
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $projects): void
    {
        //
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $projects): void
    {
        //
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $projects): void
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $projects): void
    {
        //
    }
}
