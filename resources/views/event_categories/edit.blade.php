<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event Category</title>
</head>
<body>
@extends('layouts.app')

@section('title', 'Edit Event Category')

@section('content')
    <h1 class="text-3xl mb-6">Edit Event Category</h1>

    <form action="{{ route('event_categories.update', $category->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Event Category Name -->
        <div>
            <label for="name" class="block text-gray-700">Event Category Name</label>
            <input type="text" name="name" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ $category->name }}" required>
        </div>

        

        <!-- Save/Cancel Buttons -->
        <div class="flex space-x-4">
            <button type="submit" class="border-black border bg-white-500 hover:bg-green-700 py-2 px-4 rounded">
                Save
            </button>
            <a href="{{ route('event_categories.index') }}" class="border-black border bg-white-500 hover:bg-red-700 py-2 px-4 rounded">
                Cancel
            </a>
        </div>
    </form>
@endsection

</body>
</html>
