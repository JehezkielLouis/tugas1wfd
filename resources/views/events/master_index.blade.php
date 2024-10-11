<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@extends('layouts.app')

@section('title', 'Event List')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Event List</h1>
        <a href="{{ route('events.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">+ Create</a>
    </div>

    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="py-2 px-4 border">No</th>
                <th class="py-2 px-4 border">Event Name</th>
                <th class="py-2 px-4 border">Date</th>
                <th class="py-2 px-4 border">Location</th>
                <th class="py-2 px-4 border">Organizer</th>
                <th class="py-2 px-4 border">About</th>
                <th class="py-2 px-4 border">Tags</th>
                <th class="py-2 px-4 border">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($events as $key => $event)
            <tr class="hover:bg-gray-100 cursor-pointer">
                <!-- Event Number -->
                <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $key + 1 }}</td>

                <!-- Event Name -->
                <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $event->title }}</td>

                <!-- Date -->
                <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $event->date }} | {{ $event->start_time }}</td>

                <!-- Location -->
                <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $event->venue }}</td>

                <!-- Organizer -->
                <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ $event->organizer->name }}</td>

                <!-- About This Event -->
                <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">{{ Str::limit($event->description, 50) }}</td>

                <!-- Tags -->
                <td class="py-2 px-4 border-b" onclick="window.location='{{ route('events.master_show', $event->id) }}'">
                    @php
                        $tags = explode(',', $event->tags);
                    @endphp
                    @foreach($tags as $index => $tag)
                        <span class="text-black-700 px-2 py-1 border-full text-xs border-2 border-gray-300">
                            {{ trim($tag) }}
                        </span>
                    @endforeach
                </td>

                <!-- Action Buttons -->
                <td class="py-2 px-4 border-b flex space-x-2">
                    <a href="{{ route('events.edit', $event->id) }}" class="text-yellow-500 hover:text-yellow-700">
                     Edit
                    </a>
                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this event?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection

</body>
</html>
