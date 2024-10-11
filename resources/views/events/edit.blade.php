<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Edit event')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Event</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Event Title --> 
         <div class="grid grid-cols-1 md:grid-cols-2">
        <div>
            <label for="title" class="block text-gray-700">Event Name</label>
            <input type="text" name="title" class="mt-1 block w-11/12 border border-black focus:border-black rounded-md shadow-sm" value="{{ $event->title }}" required>
        </div>

        <!-- Event Date and Time -->
       
            <div>
                <label for="date" class="block text-gray-700">Date</label>
                <input type="date" name="date" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ $event->date }}" required>
            </div>
            <!-- Venue -->
        <div>
            <label for="venue" class="block text-gray-700">Location</label>
            <input type="text" name="venue" class="mt-1 block w-11/12 border border-black focus:border-black rounded-md shadow-sm" value="{{ $event->venue }}" required>
        </div>
        
            <div>
                <label for="start_time" class="block text-gray-700">Start Time</label>
                <input type="time" name="start_time" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }}" required>
                </div>

        <!-- Organizer and Category -->
        
            <div>
                <label for="organizer_id" class="block text-gray-700">Organizer</label>
                <select name="organizer_id" class="mt-1 block w-11/12 border border-black focus:border-black rounded-md shadow-sm">
                    @foreach($organizers as $organizer)
                        <option value="{{ $organizer->id }}" {{ $event->organizer_id == $organizer->id ? 'selected' : '' }}>{{ $organizer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="event_category_id" class="block text-gray-700">Category</label>
                <select name="event_category_id" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $event->event_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
<!-- Booking URL -->
        <div>
            <label for="booking_url" class="block text-gray-700">Booking URL</label>
            <input type="url" name="booking_url" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ $event->booking_url }}">
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-gray-700">About</label>
            <textarea name="description" class="mt-1 block w-full border h-48 border-black focus:border-black rounded-md shadow-sm" required>{{ $event->description }}</textarea>
        </div>

        <!-- Tags -->
        <div>
            <label for="tags" class="block text-gray-700">Tags (comma-separated)</label>
            <input type="text" name="tags" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ $event->tags }}" required>
        </div>

        
        <!-- Action Buttons -->
        <div class="flex space-x-4">
            <button type="submit" class="border-black border bg-white-500 hover:bg-green-700 font-bold py-2 px-4 rounded">
                Save
            </button>
            <a href="{{ route('events.master_index') }}" class="border-black border bg-white-500 hover:bg-red-700 font-bold py-2 px-4 rounded">
                Cancel
            </a>
        </div>
    </form>
@endsection

</body>
</html>
