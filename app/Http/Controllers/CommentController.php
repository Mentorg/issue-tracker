<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Issue;
use App\Models\Tag;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request, Issue $issue)
    {
        $comments = $issue->comments()->latest()->paginate(5);

        if ($request->ajax()) {
            return view('comments.partials.list', compact('comments'));
        }

        return view('issues.show', [
            'issue' => $issue,
            'tags' => Tag::orderBy('name')->get(),
        ]);
    }

    public function store(StoreCommentRequest $request, Issue $issue)
    {
        $comment = $issue->comments()->create([
            'body' => $request->validated()['body'],
            'author_name' => auth()->user()->name,
        ]);

        return response()->json([
            'id' => $comment->id,
            'author_name' => $comment->author_name,
            'body' => $comment->body,
            'created_at' => $comment->created_at->diffForHumans(),
        ]);
    }
}
