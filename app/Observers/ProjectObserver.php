<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        DB::statement('UPDATE stats SET projects_count = projects_count + 1');
    }
    
}
