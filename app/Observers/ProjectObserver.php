<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use App\Models\Stat;


class ProjectObserver
{
    public function created()
    {
        Stat::increment('projects_count');
    }
}
