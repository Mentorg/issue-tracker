<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\User;
use Illuminate\Http\Request;

class IssueUserController extends Controller
{
    public function store(Request $request, Issue $issue)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $issue->users()->syncWithoutDetaching($request->user_id);

        return response()->json(User::find($request->user_id));
    }

    public function destroy(Issue $issue, User $user)
    {
        $issue->users()->detach($user->id);

        return response()->noContent();
    }
}
