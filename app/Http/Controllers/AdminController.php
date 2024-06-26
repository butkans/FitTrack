<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;
use App\Models\Comment;
use App\Models\User;

class AdminController extends Controller
{
    public function deleteWorkout(Workout $workout)
    {
        // Delete any user's workout
        $workout->delete();
        return redirect()->back();
    }

    public function deleteComment(Comment $comment)
    {
        // Delete any user's comment
        $comment->delete();
        return redirect()->back();
    }

    public function blockUser(User $user)
    {
        // Block a user
        $user->blocked = true;
        $user->save();
        return redirect()->back();
    }
}
