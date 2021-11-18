<?php

namespace App\Observers;

use App\Models\Stat;

class ProjectObserver
{
    public function created()
    {
        Stat::first()->increment('projects_count', 1);
    }
}
