<?php

namespace App\Observers;

use App\Models\Stat;
use App\Models\project;
use Illuminate\Support\Facades\DB;

class projectObserver
{
    /**
     * Handle the project "created" event.
     */
    public function created(project $project): void
    {

        Stat::query()->update(['projects_count'=> + 1]);

    }

    /**
     * Handle the project "updated" event.
     */
    public function updated(project $project): void
    {
        //
    }

    /**
     * Handle the project "deleted" event.
     */
    public function deleted(project $project): void
    {
        //
    }

    /**
     * Handle the project "restored" event.
     */
    public function restored(project $project): void
    {
        //
    }

    /**
     * Handle the project "force deleted" event.
     */
    public function forceDeleted(project $project): void
    {
        //
    }
}
