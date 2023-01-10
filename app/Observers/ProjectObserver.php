<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{
    public function created(Project $project)
    {
        // / TASK: on creating a new project, create an Observer event to run SQL
        // //   update stats set projects_count = projects_count + 1
        // $project = new Project();
        // $project->name = $request->name;
        // $project->save()
        
        if ($project->isDirty())
        {
            $project->update(['projects_count' => 1]);
        }
        
    }
}
