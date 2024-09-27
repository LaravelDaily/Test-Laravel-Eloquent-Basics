<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

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
        DB::table('stats')->increment('projects_count');
    }
}
