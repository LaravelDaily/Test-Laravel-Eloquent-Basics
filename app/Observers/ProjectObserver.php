<?php

namespace App\Observers;

use App\Models\Stat;

class ProjectObserver
{
    public function created(): void
    {
        $stat = Stat::first();
        $stat->update(['projects_count' => $stat->projects_count + 1]);
    }
}
