@extends('layouts.app')

@section('content')
    <h1>Workouts</h1>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('workouts.filter') }}">
        <div>
            <label for="date">Sort by Date:</label>
            <select name="date" id="date">
                <option value="asc">Oldest</option>
                <option value="desc">Newest</option>
            </select>
        </div>
        <div>
            <label for="rating">Sort by Rating:</label>
            <select name="rating" id="rating">
                <option value="asc">Worst</option>
                <option value="desc">Best</option>
            </select>
        </div>
        <div>
            <label for="muscle_groups">Muscle Groups:</label>
            <select name="muscle_groups[]" id="muscle_groups" multiple>
                <option value="Chest">Chest</option>
                <option value="Triceps">Triceps</option>
                <option value="Back">Back</option>
                <option value="Biceps">Biceps</option>
                <option value="Legs">Legs</option>
                <option value="Shoulders">Shoulders</option>
            </select>
        </div>
        <div>
            <label for="keywords">Keywords:</label>
            <input type="text" name="keywords" id="keywords">
        </div>
        <button type="submit">Filter</button>
    </form>

    <!-- Workouts List -->
    <ul>
        @foreach($workouts as $workout)
            <li>
                <strong>{{ $workout->date }}</strong> - {{ $workout->author }} - {{ $workout->muscle_group }} - {{ $workout->rating }} - {{ $workout->description }}
                @can('update', $workout)
                    <a href="{{ route('workouts.edit', $workout) }}">Edit</a>
                @endcan
                @can('delete', $workout)
                    <form method="POST" action="{{ route('workouts.destroy', $workout) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endcan
            </li>
        @endforeach
    </ul>
@endsection
