<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $user): void
    {
        // ...
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $user): void
    {
        // ...
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $user): void
    {
        // ...
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $user): void
    {
        // ...
    }

    /**
     * Handle the Project "forceDeleted" event.
     */
    public function forceDeleted(Project $user): void
    {
        // ...
    }
}
