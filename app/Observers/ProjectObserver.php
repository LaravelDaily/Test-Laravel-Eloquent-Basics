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
        // update env
        $stat = new Stat();
        $stat->projects_count+1;
        $stat->save();
    }
 
    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        // ...
    }
 
    /**
     * Handle the User "forceDeleted" event.
     */
    public function forceDeleted(User $user): void
    {
        // ...
    }
}