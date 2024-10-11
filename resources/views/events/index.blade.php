<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizers</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-4xl mb-8 text-center text-gray-800">Upcoming Events</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($events as $event)
            <a href="{{ route('events.show', $event->id) }}" class="block">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <!-- Default Banner Image -->
                    <img src="https://picsum.photos/300" alt="Event Banner" class="w-full h-48 object-cover">

                    <div class="p-6">
                        <h3 class="text-xl  text-gray-800 mb-2 text-center">{{ $event->title }}</h3>
                        <p class="text-gray-600 text-sm mb-1 text-center">{{ $event->date }} | {{ $event->start_time }}</p>
                        <p class="text-gray-700 mb-4 text-center">{{ $event->venue }}</p>

                        <div class="flex justify-between items-center">
                            <p class="text-gray-500  text-center">Free</p>
                            <p class="text-gray-500 text-center">Organizer: {{ $event->organizer->name }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        <div class="mt-6 text-center">
            {{ $events->links('pagination::tailwind') }}  <!-- Tailwind-styled pagination -->
        </div>
    </div>
@endsection

</body>
</html>
