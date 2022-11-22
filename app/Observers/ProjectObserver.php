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
        Stat::find(1)->increment('projects_count');
    }


}
