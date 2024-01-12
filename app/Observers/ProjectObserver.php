<?php
 
namespace App\Observers;
 
use App\Models\Stat;
use App\Models\Project;
 
class ProjectObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(Project $project): void
    {
        // ...
        Stat::increment('projects_count');
        
    }
 
   
}
