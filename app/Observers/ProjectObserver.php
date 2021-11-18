<?php

namespace App\Observers;

use App\Models\project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param  \App\Models\project  $project
     * @return void
     */
    public function created(project $project)
    {
        Stat::increment('projects_count');
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Models\project  $project
     * @return void
     */
    public function updated(project $project)
    {
        //
    }

    /**
     * Handle the project "deleted" event.
     *
     * @param  \App\Models\project  $project
     * @return void
     */
    public function deleted(project $project)
    {
        //
    }

    /**
     * Handle the project "restored" event.
     *
     * @param  \App\Models\project  $project
     * @return void
     */
    public function restored(project $project)
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     *
     * @param  \App\Models\project  $project
     * @return void
     */
    public function forceDeleted(project $project)
    {
        //
    }
}
