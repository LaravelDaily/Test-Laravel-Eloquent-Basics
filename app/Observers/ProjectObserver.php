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
      $stat->update(['projects_count'=>$stat->projects_count+1]);
    }
 
   
}
