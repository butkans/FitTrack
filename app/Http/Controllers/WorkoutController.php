<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;

class WorkoutController extends Controller
{
    public function index()
    {
        // Display all workouts
        $workouts = Workout::all();
        return view('workouts.index', compact('workouts'));
    }

    public function filter(Request $request)
    {
        // Filter workouts based on criteria
        $query = Workout::query();

        if ($request->has('date')) {
            $query->orderBy('date', $request->input('date'));
        }

        if ($request->has('rating')) {
            $query->orderBy('rating', $request->input('rating'));
        }

        if ($request->has('muscle_groups')) {
            $query->whereIn('muscle_group', $request->input('muscle_groups'));
        }

        if ($request->has('keywords')) {
            $keywords = $request->input('keywords');
            $query->where('description', 'like', "%{$keywords}%");
        }

        $workouts = $query->get();
        return view('workouts.index', compact('workouts'));
    }

    public function create()
    {
        // Show form to create a new workout
        return view('workouts.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new workout
        $request->validate([
            'date' => 'required|date',
            'author' => 'required|string|max:255',
            'muscle_group' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string',
        ]);

        Workout::create($request->all());
        return redirect()->route('workouts.index');
    }

    public function edit(Workout $workout)
    {
        // Show form to edit a workout
        return view('workouts.edit', compact('workout'));
    }

    public function update(Request $request, Workout $workout)
    {
        // Validate and update a workout
        $request->validate([
            'date' => 'required|date',
            'author' => 'required|string|max:255',
            'muscle_group' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'description' => 'required|string',
        ]);

        $workout->update($request->all());
        return redirect()->route('workouts.index');
    }

    public function destroy(Workout $workout)
    {
        // Delete a workout
        $workout->delete();
        return redirect()->route('workouts.index');
    }
}
