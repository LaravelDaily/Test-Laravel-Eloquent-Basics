<?php

namespace App\Observers;

use App\Models\Stat;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(): void
    {
        Stat::query()->first()->increment('projects_count');
    }
}
