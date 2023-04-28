<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;
class ProjectObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(Project $project): void
    {
        $stat = Stat::first();
        $stat->update(['projects_count' => $stat->projects_count + 1]);
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(Project $project): void
    {
        // ...
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(Project $project): void
    {
        // ...
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(Project $project): void
    {
        // ...
    }

    /**
     * Handle the User "forceDeleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        // ...
    }
}
