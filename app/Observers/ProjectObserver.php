<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{

    public function creating(Project $project)
    {
       Stat::first()->increment('projects_count');


    }


}
