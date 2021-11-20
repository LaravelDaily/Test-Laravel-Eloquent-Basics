<?php

namespace App\Listeners;

use App\Events\Observer;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveStats
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
     * @param  Observer  $event
     * @return void
     */
    public function handle(Observer $event)
    {
        $stat=$event->stat;
        $stat->projects_count+=1;
        $stat->save();
        
    }
}
