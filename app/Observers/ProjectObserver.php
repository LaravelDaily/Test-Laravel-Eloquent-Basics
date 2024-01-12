<?php
 
namespace App\Observers;
 
use App\Models\Stat;
 
class ProjectObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(Project $project): void
    {
        // ...
        $stat->increment('projects_count');
        $stat->increment('users_count');
    }
 
   
}
