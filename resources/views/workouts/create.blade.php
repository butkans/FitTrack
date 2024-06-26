@extends('layouts.app')

@section('content')
    <h1>Create Workout</h1>

    <form method="POST" action="{{ route('workouts.store') }}">
        @csrf
        <div>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" required>
        </div>
        <div>
            <label for="muscle_group">Muscle Group:</label>
            <select name="muscle_group" id="muscle_group" required>
                <option value="Chest">Chest</option>
                <option value="Triceps">Triceps</option>
                <option value="Back">Back</option>
                <option value="Biceps">Biceps</option>
                <option value="Legs">Legs</option>
                <option value="Shoulders">Shoulders</option>
            </select>
        </div>
        <div>
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" min="1" max="5" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
