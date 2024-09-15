<?php

namespace App\Observers;

use App\Models\Stat;
use App\Models\Project;

class ProjectObserver
{
    public function created(Project $project){
        $stat = Stat::firstOrCreate();
        $stat->projects_count += 1;
        $stat->save();
    }
}
