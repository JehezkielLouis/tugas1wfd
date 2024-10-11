<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($event) ? 'Edit Event' : 'Create Event' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
@extends('layouts.app')

@section('title', isset($event) ? 'Edit Event' : 'Create Event')

@section('content')
    <div class="flex justify-center items-center min-h-screen">
        <div class="container mx-auto p-8 bg-white rounded-lg shadow-lg w-full max-w-2xl mt-10">
            <h1 class="text-4xl mb-8 text-gray-800 text-center bg-gray-200 rounded-lg py-4">{{ isset($event) ? 'Edit Event' : 'Create Event' }}</h1>

            <form action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}" method="POST" class="space-y-6">
                @csrf
                @if(isset($event))
                    @method('PUT') <!-- Update method for edit -->
                @endif

                <!-- Event Title -->
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <label for="title" class="text-gray-700">Event Name</label>
                    <input type="text" name="title" class="col-span-2 block border border-gray-300 focus:border-blue-500 rounded-md shadow-sm p-2" value="{{ isset($event) ? $event->title : old('title') }}" required>
                </div>

                <!-- Date and Start Time -->
<div class="grid grid-cols-3 gap-4 mb-4">
    <label for="date" class="text-gray-700">Date</label>
    <input type="date" name="date" class="col-span-2 block border border-gray-300 focus:border-blue-500 rounded-md shadow-sm p-2" value="{{ isset($event) ? $event->date : old('date') }}" required>
</div>

<div class="grid grid-cols-3 gap-4 mb-4">
    <label for="start_time" class="text-gray-700">Start Time</label>
    <input type="time" name="start_time" class="col-span-2 block border border-gray-300 focus:border-blue-500 rounded-md shadow-sm p-2" value="{{ isset($event) ? $event->start_time : old('start_time') }}" required>
</div>

                <!-- Venue -->
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <label for="venue" class="text-gray-700">Location</label>
                    <input type="text" name="venue" class="col-span-2 block border border-gray-300 focus:border-blue-500 rounded-md shadow-sm p-2" value="{{ isset($event) ? $event->venue : old('venue') }}" required>
                </div>

                <!-- Organizer and Category -->
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <label for="organizer_id" class="text-gray-700">Organizer</label>
                    <select name="organizer_id" class="col-span-2 block border border-gray-300 focus:border-blue-500 rounded-md shadow-sm p-2">
                        @foreach($organizers as $organizer)
                            <option value="{{ $organizer->id }}" {{ (isset($event) && $event->organizer_id == $organizer->id) || old('organizer_id') == $organizer->id ? 'selected' : '' }}>
                                {{ $organizer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-3 gap-4 mb-4">
                    <label for="event_category_id" class="text-gray-700">Category</label>
                    <select name="event_category_id" class="col-span-2 block border border-gray-300 focus:border-blue-500 rounded-md shadow-sm p-2">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (isset($event) && $event->event_category_id == $category->id) || old('event_category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Booking URL -->
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <label for="booking_url" class="text-gray-700">Booking URL</label>
                    <input type="url" name="booking_url" class="col-span-2 block border border-gray-300 focus:border-blue-500 rounded-md shadow-sm p-2" value="{{ isset($event) ? $event->booking_url : old('booking_url') }}">
                </div>

                <!-- Description -->
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <label for="description" class="text-gray-700">About</label>
                    <textarea name="description" class="col-span-2 block h-48 border border-gray-300 focus:border-blue-500 rounded-md shadow-sm p-2" required>{{ isset($event) ? $event->description : old('description') }}</textarea>
                </div>

                <!-- Tags -->
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <label for="tags" class="text-gray-700">Tags (comma-separated)</label>
                    <input type="text" name="tags" class="col-span-2 block border border-gray-300 focus:border-blue-500 rounded-md shadow-sm p-2" value="{{ isset($event) ? $event->tags : old('tags') }}" required>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-4 justify-center mt-6">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded transition duration-300 hover:bg-blue-600">
                        {{ isset($event) ? 'Update' : 'Create' }} Event
                    </button>
                    <a href="{{ route('events.master_index') }}" class="border border-gray-300 text-gray-700 py-2 px-4 rounded transition duration-300 hover:bg-red-500 hover:text-white">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

</body>
</html>
