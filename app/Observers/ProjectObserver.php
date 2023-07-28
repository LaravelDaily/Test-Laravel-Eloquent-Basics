<?php

namespace App\Observers;

use App\Models\Stat;

class ProjectObserver
{
    public function stats(): void
    {
        Stat::all()->map(function ($stat) {
            $stat->projects_count++;
            $stat->save();
        });
    }
}
