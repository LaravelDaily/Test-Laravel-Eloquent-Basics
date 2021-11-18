<?php

namespace App\Http\Controllers;

use App\Models\Stat;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Observers\ProjectObserver;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        // TASK: Currently this statement fails. Fix the underlying issue.
        Project::create([
            'name' => $request->name
        ]);

        return redirect('/')->with('success', 'Project created');
    }

    public function mass_update(Request $request)
    {
        // TASK: Transform this SQL query into Eloquent
        // update projects
        //   set name = $request->new_name
        //   where name = $request->old_name

        // Insert Eloquent statement below
        // dd($request->new_name);
        $project = Project::where('name', $request->old_name)->first();
        $project->name = $request->new_name;
        $project->update();
        return redirect('/')->with('success', 'Projects updated');
    }

    public function destroy($projectId)
    {
        Project::destroy($projectId);

        // TASK: change this Eloquent statement to include the soft-deletes records
        $projects = Project::withTrash()->get();

        return view('projects.index', compact('projects'));
    }

    public function store_with_stats(Request $request)
    {
        // TASK: on creating a new project, create an Observer event to run SQL
        //   update stats set projects_count = projects_count + 1
        $project = new Project();
        $project->name = $request->name;
        $project->save();
        Project::observe(ProjectObserver::class);
        return redirect('/')->with('success', 'Project created');
    }

}
