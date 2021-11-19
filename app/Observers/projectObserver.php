<?php

namespace App\Observers;

use App\Models\Project;

class projectObserver
{
    public function created(Project $project)
    {
        \DB::table('stats')->increment('projects_count');
    }
}
