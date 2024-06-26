<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validate and store a new comment
        $request->validate([
            'author' => 'required|string|max:255',
            'content' => 'required|string',
            'workout_id' => 'required|exists:workouts,id',
        ]);

        Comment::create($request->all());
        return redirect()->back();
    }

    public function update(Request $request, Comment $comment)
    {
        // Validate and update a comment
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update($request->all());
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        // Delete a comment
        $comment->delete();
        return redirect()->back();
    }
}
