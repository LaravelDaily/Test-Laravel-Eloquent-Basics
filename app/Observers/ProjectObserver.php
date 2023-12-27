<?php

namespace App\Observers;

use App\Models\Stat;
use Illuminate\Support\Facades\DB;

class ProjectObserver
{
public function created($project)

{
    $project->save();
   // DB::update('update stats set projects_count = projects_count + 1');
    Stat::increment('projects_count');

}
}
