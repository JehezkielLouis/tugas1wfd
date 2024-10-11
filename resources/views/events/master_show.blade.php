<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
</head>
<body>
@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="container mx-auto mt-8">
    <!-- Event Title -->
    <h1 class="text-2xl font-semibold mb-4">{{ $event->title }}</h1>

    <!-- Edit and Delete Options -->
    <div class="mb-4">
        <a href="{{ route('events.edit', $event->id) }}" class="text-yellow-500 mr-2"> Edit</a>
        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500"> Delete</button>
        </form>
    </div>

    <!-- Event Date and Time -->
    <div class="mb-4">
        <h2 class="text-lg font-semibold">Date </h2>
        <p>{{ $event->date }} | {{ $event->start_time }}</p>
    </div>

    <!-- Event Venue -->
    <div class="mb-4">
        <h2 class="text-lg font-semibold">Location</h2>
        <p>{{ $event->venue }}</p>
    </div>

    <!-- Organizer Information -->
    <div class="mb-4">
        <h2 class="text-lg font-semibold">Organizer</h2>
        <p>{{ $event->organizer->name }}</p>
        <a href="{{ route('organizers.show', $event->organizer->id) }}" class="text-blue-500">View Organizer</a>
    </div>

    <!-- Event Description -->
    <div class="mb-4">
        <h2 class="text-lg font-semibold">About</h2>
        <p>{{ $event->description }}</p>
    </div>

    <!-- Event Tags -->
    <div class="mb-4">
        <h2 class="text-lg font-semibold">Tags</h2>
        <p>
            @foreach(explode(',', $event->tags) as $tag)
                <span class="bg-gray-200 px-2 py-1 rounded-full text-gray-700">{{ $tag }}</span>
                
            @endforeach
        </p>
    </div>

    <!-- Booking URL -->
    @if ($event->booking_url)
    <div class="mb-4">
        <h2 class="text-lg font-semibold">Book Now</h2>
        <a href="{{ $event->booking_url }}" target="_blank" class="text-blue-500">Book Here</a>
    </div>
    @endif
</div>
@endsection

</body>
</html>
