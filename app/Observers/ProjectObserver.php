<?php

namespace App\Observers;

use App\Models\Stat;

class ProjectObserver
{
    public function created()
    {
        Stat::query()->increment('projects_count');
    }
}
