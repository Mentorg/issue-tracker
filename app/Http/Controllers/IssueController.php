<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIssueRequest;
use App\Http\Requests\UpdateIssueRequest;
use App\Models\Issue;
use App\Models\Project;
use App\Models\Tag;
use App\Services\IssueService;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    protected $issueService;

    public function __construct(IssueService $issueService)
    {
        $this->issueService = $issueService;
    }

    public function index(Request $request)
    {
        $issues = $this->issueService->getIssues($request);

        if ($request->ajax()) {
            return view('issues.partials.list', compact('issues'))->render();
        }
        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        return view('issues.create', ['projects' => Project::orderBy('name')->get()]);
    }

    public function store(StoreIssueRequest $request)
    {
        $this->issueService->create($request->validated());

        return redirect()->route('issues.index');
    }

    public function show(Issue $issue)
    {
        return view('issues.show', [
            'issue' => $this->issueService->getIssue($issue),
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function edit(Issue $issue)
    {
        return view('issues.edit', [
            'issue' => $issue,
            'projects' => Project::orderBy('name')->get()
        ]);
    }

    public function update(UpdateIssueRequest $request, Issue $issue)
    {
        $this->issueService->update($request->validated(), $issue);

        return redirect()->route('issues.index');
    }

    public function destroy(Issue $issue)
    {
        $this->issueService->delete($issue);

        return redirect()->route('issues.index');
    }
}
