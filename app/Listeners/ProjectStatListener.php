<?php

namespace App\Listeners;

use App\Models\Stat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProjectStatListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
      $stat =  Stat::first();
      $stat->projects_count = $stat->projects_count + 1;
      $stat->update();
    }
}
