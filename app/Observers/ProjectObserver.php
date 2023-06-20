<?php

namespace App\Observers;

use App\Models\Project;
use App\Models\Stat;
use Illuminate\Support\Facades\DB;

class ProjectObserver {
    /**
     * Handle the Project "created" event.
     */
    public function created(): void {
        $stat = Stat::first();
        $stat->projects_count += 1;
        $stat->save();
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(): void {
        //
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(): void {
        //
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(): void {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void {
        //
    }
}
