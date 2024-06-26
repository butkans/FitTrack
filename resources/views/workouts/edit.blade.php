@extends('layouts.app')

@section('content')
    <h1>Edit Workout</h1>

    <form method="POST" action="{{ route('workouts.update', $workout) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" value="{{ $workout->date }}" required>
        </div>
        <div>
            <label for="author">Author:</label>
            <input type="text" name="author" id="author" value="{{ $workout->author }}" required>
        </div>
        <div>
            <label for="muscle_group">Muscle Group:</label>
            <select name="muscle_group" id="muscle_group" required>
                <option value="Chest" {{ $workout->muscle_group == 'Chest' ? 'selected' : '' }}>Chest</option>
                <option value="Triceps" {{ $workout->muscle_group == 'Triceps' ? 'selected' : '' }}>Triceps</option>
                <option value="Back" {{ $workout->muscle_group == 'Back' ? 'selected' : '' }}>Back</option>
                <option value="Biceps" {{ $workout->muscle_group == 'Biceps' ? 'selected' : '' }}>Biceps</option>
                <option value="Legs" {{ $workout->muscle_group == 'Legs' ? 'selected' : '' }}>Legs</option>
                <option value="Shoulders" {{ $workout->muscle_group == 'Shoulders' ? 'selected' : '' }}>Shoulders</option>
            </select>
        </div>
        <div>
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" value="{{ $workout->rating }}" min="1" max="5" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ $workout->description }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
