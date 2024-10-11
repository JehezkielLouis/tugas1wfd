<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($category) ? 'Edit Event Category' : 'Create Event Category' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@extends('layouts.app')

@section('title', isset($category) ? 'Edit Event Category' : 'Create Event Category')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-3xl mb-6 text-center">{{ isset($category) ? 'Edit Event Category' : 'Create Event Category' }}</h1>

            <!-- Form to handle both Create and Update actions -->
            <form action="{{ isset($category) ? route('event_categories.update', $category->id) : route('event_categories.store') }}" method="POST" class="space-y-6">
                @csrf
                @if(isset($category))
                    @method('PUT') <!-- Update method for edit -->
                @endif

                <!-- Event Category Name -->
                <div>
                    <label for="name" class="block text-gray-700">Event Category Name</label>
                    <input type="text" name="name" class="mt-1 block w-full border border-black focus:border-black rounded-md shadow-sm" value="{{ isset($category) ? $category->name : old('name') }}" required>
                </div>

                <!-- Buttons -->
                <div class="flex space-x-4 justify-center">
                    <button type="submit" class="border-black border bg-white-500 hover:bg-green-700 py-2 px-4 rounded">
                        {{ isset($category) ? 'Update' : 'Create' }} Category
                    </button>
                    <a href="{{ route('event_categories.index') }}" class="border-black border bg-white-500 hover:bg-red-700 py-2 px-4 rounded">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

</body>
</html>
