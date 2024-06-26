<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        // Display a user's profile and their workouts
        $workouts = $user->workouts;
        return view('users.show', compact('user', 'workouts'));
    }
}
