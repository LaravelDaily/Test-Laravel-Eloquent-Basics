<?php

namespace App\Observers;

use Illuminate\Support\Facades\DB;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @return void
     */
    public function created()
    {
        DB::table('stats')->increment('projects_count');;
    }
}
