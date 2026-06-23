<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        return view('projects.index', ['projects' => $this->projectService->getProjects()]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $this->projectService->create($request->validated());

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.show', ['project' => $this->projectService->getProject($project)]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', ['project' => $project]);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->projectService->update($request->validated(), $project);

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $this->projectService->delete($project);

        return redirect()->route('projects.index');
    }
}
