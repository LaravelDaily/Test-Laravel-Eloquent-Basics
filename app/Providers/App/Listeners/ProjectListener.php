<?php

namespace App\Providers\App\Listeners;

use App\Models\Stat;
use App\Providers\App\Events\ProjectEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProjectListener
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
     * @param  ProjectEvent  $event
     * @return void
     */
    public function handle(ProjectEvent $event)
    {
        Stat::first()->update(['projects_count' => 1]);
    }
}
