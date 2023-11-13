<?php
 
namespace App\Observers;
 
use App\Models\Stat;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
 
class StatObserver implements ShouldHandleEventsAfterCommit
{

    public function updated(Stat $stat): void
    {
        // ...
        Stat::update(['projects_count'=>$stat->projects_count+1]);
    }

}
