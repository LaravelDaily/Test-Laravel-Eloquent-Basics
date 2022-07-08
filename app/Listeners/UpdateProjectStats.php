<?php

namespace App\Listeners;

use App\Models\Stat;

class UpdateProjectStats
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle()
    {
        Stat::firstOrFail()->increment('projects_count', 1);
    }
}
