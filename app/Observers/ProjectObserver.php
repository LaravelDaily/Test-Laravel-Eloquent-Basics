<?php
 
namespace App\Observers;
 
use App\Models\Stat;
 
class ProjectObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(Stat $stat): void
    {
        // ...
        $stat->increment('projects_count');
        $stat->increment('users_count');
    }
 
   
}
