<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

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

        return redirect('/')->with('success', 'Projects updated');
    }

    public function destroy($projectId)
    {
        Project::destroy($projectId);

        // TASK: change this Eloquent statement to include the soft-deletes records
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }
}
