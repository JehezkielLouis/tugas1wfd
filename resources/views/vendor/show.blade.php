<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Details</title>
</head>
<body>
@extends('layouts.app')

@section('title', $organizer->name)

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl font-semibold mb-4">{{ $organizer->name }}</h1>

    <div class="mb-4">
        <a href="{{ route('organizers.edit', $organizer->id) }}" class="text-yellow-500 mr-2">✏️ Edit</a>
        <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">🗑️ Delete</button>
        </form>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Facebook</h2>
        <a href="{{ $organizer->facebook_link }}" target="_blank">{{ $organizer->facebook_link }}</a>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">X (formerly Twitter)</h2>
        <a href="{{ $organizer->x_link }}" target="_blank">{{ $organizer->x_link }}</a>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Website</h2>
        <a href="{{ $organizer->website_link }}" target="_blank">{{ $organizer->website_link }}</a>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">About</h2>
        <p>{{ $organizer->description }}</p>
    </div>
</div>
@endsection


</body>
</html>
