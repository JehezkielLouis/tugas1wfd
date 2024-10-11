<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
@extends('layouts.app')

@section('title', 'Event Categories List')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl">Event Categories</h1>
        <a href="{{ route('event_categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">+ Create</a>
    </div>

    <table class="min-w-full bg-white border border-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="py-2 px-4 border text-center">No</th>
                <th class="py-2 px-4 border text-center">Event Category Name</th>
                <th class="py-2 px-4 border text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $key => $category)
            <tr class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b text-center">{{ $key + 1 }}</td>
                <td class="py-2 px-4 border-b text-center">{{ $category->name }}</td>
                <td class="py-2 px-4 border-b text-center">
                    <a href="{{ route('event_categories.edit', $category->id) }}" class="text-yellow-500 mr-2">Edit</a>
                    <form action="{{ route('event_categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Delete</button>
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
