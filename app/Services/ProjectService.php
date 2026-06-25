<?php

namespace App\Services;

use App\Models\Project;

class ProjectService
{
    public function getProjects()
    {
        return Project::with(['issues.users', 'issues.tags'])->orderBy('created_at', 'desc')->paginate(15);
    }

    public function getProject($project)
    {
        return $project->load(['issues.users', 'issues.tags']);
    }

    public function create(array $validated)
    {
        return Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'deadline' => $validated['deadline'],
            'user_id' => auth()->id(),
        ]);
    }

    public function update(array $validated, $project)
    {
        return $project->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'start_date' => $validated['start_date'],
            'deadline' => $validated['deadline'],
        ]);
    }

    public function delete($project)
    {
        return $project->delete();
    }
}
