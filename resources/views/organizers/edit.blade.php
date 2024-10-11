<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Edit Organizer')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Edit Organizer</h1>

    <form action="{{ route('organizers.update', $organizer->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-gray-700">Organizer Name</label>
            <!-- Applied border-black and focus:border-black to always show the black border -->
            <input type="text" name="name" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ $organizer->name }}" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
            <label for="facebook_link" class="block text-gray-700">Facebook</label>
            <label for="x_link" class="block text-gray-700">X</label>
            <!-- Applied border-black and focus:border-black to both fields -->
            <input type="url" name="facebook_link" class="mt-1  block w-11/12 border border-black focus:border-black rounded-md shadow-sm"  value="{{ $organizer->facebook_link }}">
            <input type="url" name="x_link" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ $organizer->x_link }}">
        </div>

        <div>
            <label for="website_link" class="block text-gray-700">Website</label>
            <!-- Applied border-black and focus:border-black -->
            <input type="url" name="website_link" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ $organizer->website_link }}">
        </div>

        <div>
            <label for="description" class="block text-gray-700 ">About</label>
            <!-- Applied border-black and focus:border-black -->
            <textarea name="description" class="mt-1 block w-full border h-48 border-black focus:border-black rounded-md shadow-sm">{{ $organizer->description }}</textarea>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="border-black border bg-white-500 hover:bg-green-700 font-bold py-2 px-4 rounded">
                Save
            </button>
            <a href="{{ route('organizers.index') }}" class="border-black border bg-white-500 hover:bg-red-700 font-bold py-2 px-4 rounded">
                Cancel
            </a>
        </div>
    </form>
@endsection

</body>
</html>
