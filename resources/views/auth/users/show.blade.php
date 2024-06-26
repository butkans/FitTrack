@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}'s Profile</h1>

    <h2>Workouts</h2>
    <ul>
        @foreach($workouts as $workout)
            <li>{{ $workout->date }} - {{ $workout->muscle_group }} - {{ $workout->rating }} - {{ $workout->description }}</li>
        @endforeach
    </ul>
@endsection
