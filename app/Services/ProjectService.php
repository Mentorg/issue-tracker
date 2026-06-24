<?php

namespace App\Services;

use App\Models\Project;

class ProjectService
{
    public function getProjects()
    {
        return Project::with('issues')->orderBy('created_at', 'desc')->paginate(15);
    }

    public function getProject($project)
    {
        return $project->load('issues');
    }

    public function create(array $validated)
    {
        return Project::create([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);
    }

    public function update(array $validated, $project)
    {
        return $project->update([
            'name' => $validated['name'],
            'description' => $validated['description']
        ]);
    }

    public function delete($project)
    {
        return $project->delete();
    }
}
