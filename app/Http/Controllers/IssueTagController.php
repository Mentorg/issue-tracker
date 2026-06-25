<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\Tag;
use Illuminate\Http\Request;

class IssueTagController extends Controller
{
    public function store(Request $request, Issue $issue)
    {
        $request->validate([
            'tag_id' => 'required|exists:tags,id',
        ]);

        $tag = Tag::findOrFail($request->tag_id);

        $issue->tags()->syncWithoutDetaching([$tag->id]);

        return response()->json([
            'id' => $tag->id,
            'name' => $tag->name,
            'color' => $tag->color,
        ]);
    }

    public function destroy(Issue $issue, Tag $tag)
    {
        $issue->tags()->detach($tag->id);

        return response()->json([
            'success' => true,
        ]);
    }
}
