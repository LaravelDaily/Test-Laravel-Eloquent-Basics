<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Schema;
use App\Models\Stat;

class ProjectCountObserver
{

    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        $stats = Stat::first();
        $stats->projects_count = $stats->projects_count + 1;
        $stats->save();
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
