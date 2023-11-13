<?php
 
namespace App\Observers;
 
use App\Models\Stat;

 
class StatObserver
{

    public function updated(Stat $stat): void
    {
        // ...
        Stat::update(['projects_count'=>$stat->projects_count+1]);
    }

}
