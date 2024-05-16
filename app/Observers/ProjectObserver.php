<?php


namespace App\Observers;

use App\Models\Stat;

class ProjectObserver 
{
    public function created() {
        $stats = Stat::first();
        $stats->increment('projects_count');
    }
}