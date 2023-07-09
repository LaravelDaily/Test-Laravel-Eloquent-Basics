<?php

namespace App\Observers;

use App\Models\project;
use App\Models\stat;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     */
    public function created(project $project): void
    {
        /*$stat = new stat;
        $stat->increments('project_count');;
        $stat->save();*/

        $statsRow = Stat::first();
        $statsRow->projects_count = $statsRow->projects_count + 1;
        $statsRow->save();
    }

    /**
     * Handle the project "updated" event.
     */
    public function updated(project $project): void
    {
        //
    }

    /**
     * Handle the project "deleted" event.
     */
    public function deleted(project $project): void
    {
        //
    }

    /**
     * Handle the project "restored" event.
     */
    public function restored(project $project): void
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     */
    public function forceDeleted(project $project): void
    {
        //
    }
}