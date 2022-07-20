<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     *
     * @param  \App\Models\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        //
        // TASK: on creating a new project, create an Observer event to run SQL
        //   update stats set projects_count = projects_count + 1
        (new \App\Models\Stat)->increment('projects_count');
    }

}