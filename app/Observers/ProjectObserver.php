<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectObserver
{
    public function created()
    {
        Stat::increment('projects_count');
    }
}
