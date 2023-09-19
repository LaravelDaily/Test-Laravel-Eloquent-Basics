<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;
use Illuminate\Support\Facades\DB;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        //Stat::find(1)->increment('projects_count');
        //Stat::take(1)->first()->increment('projects_count');
        DB::table('stats')->increment('projects_count');
    }
}
