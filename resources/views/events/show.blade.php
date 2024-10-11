<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Details</title>
</head>
<body>
@extends('layouts.app')

@section('title', $event->title)

@section('content')
<div class="container mx-auto mt-8 ">
        
        <!-- Event Banner -->
        <div class="mb-8">
            <img src="https://picsum.photos/3000" alt="Event Banner" class="w-2/3 h-64 object-cover rounded-t-lg">
        </div>

        <!-- Event Details (2 x 2 Columns) -->
        <div class="w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Organizer -->
            <div class="p-4 bg-transparent border border-transparent rounded-lg">
                <h2 class="text-xl font-semibold text-black-400">Organizer</h2>
                <p class="text-black-300">{{ $event->organizer->name }}</p>
            </div>

            <!-- Booking URL -->
            <div class="p-4 bg-transparent border border-transparent rounded-lg">
                <h2 class="text-xl font-semibold text-black-400">Booking URL</h2>
                @if($event->booking_url)
                    <a href="{{ $event->booking_url }}" class="text-black-300 hover:text-black-500">{{ $event->booking_url }}</a>
                @else
                    <p class="text-black-300">Not available</p>
                @endif
            </div>

            <!-- Date and Time -->
            <div class="p-4 bg-transparent border border-transparent rounded-lg">
                <h2 class="text-xl font-semibold text-black-400">Date & Time</h2>
                <p class="text-black-300">{{ $event->date }} | {{ $event->start_time }} - {{ $event->end_time }}</p>
            </div>

            <!-- Location -->
            <div class="p-4 bg-transparent border border-transparent rounded-lg">
                <h2 class="text-xl font-semibold text-black-400">Location</h2>
                <p class="text-black-300">{{ $event->venue }}</p>
            </div>
        </div>

        <!-- About This Event Section -->
        <div class="p-4 bg-transparent border border-transparent rounded-lg mb-8">
            <h2 class="text-2xl font-semibold text-black-400 mb-4">About This Event</h2>
            <p class="text-black-300">{{ $event->description }}</p>
        </div>

        <!-- Tags Section -->
        <div class="p-4 bg-transparent border border-transparent rounded-lg mb-8">
            <h2 class="text-2xl font-semibold text-black-400 mb-4">Tags</h2>
            <div class="flex flex-wrap gap-2">
                @foreach(explode(',', $event->tags) as $tag)
                <div class="bg-gray-100 text-gray-700 px-4 py-2 border-2 border-black">

                        {{ trim($tag) }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

            <!-- Events Button -->
            <a href="{{ route('events.index') }}" class="mx-4 border-2 border hover:bg-gray-700 text-black py-2 px-4 rounded">
                Back
            </a>
        </div>
@endsection

</body>
</html>
