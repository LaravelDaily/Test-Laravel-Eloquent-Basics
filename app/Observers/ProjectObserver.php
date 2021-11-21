<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;

class ProjectObserver
{
    public function created(Project $project){
        $stat = Stat::first();
        $stat->update([
            'projects_count' => $stat->projects_count +1
        ]);
    }
}
