<?php

namespace App\Services;

use App\Models\Issue;

class IssueService
{
    public function getIssues($request)
    {
        return Issue::query()
            ->with(['project'])
            ->when($request->status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($request->priority, function ($query, $priority) {
                $query->where('priority', $priority);
            })
            ->when($request->search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();
    }

    public function getIssue($issue)
    {
        return $issue->load([
            'project',
            'comments' => function ($query) {
                $query->latest();
            }
        ]);
    }

    public function create(array $validated)
    {
        return Issue::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'priority' => $validated['priority'],
            'due_date' => $validated['due_date'],
            'project_id' => $validated['project_id'],
        ]);
    }

    public function update(array $validated, $issue)
    {
        return $issue->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'priority' => $validated['priority'],
            'due_date' => $validated['due_date'],
            'project_id' => $validated['project_id'],
        ]);
    }

    public function delete($issue)
    {
        return $issue->delete();
    }
}
