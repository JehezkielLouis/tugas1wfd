<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} Details</title>
</head>
<body>

@extends('layouts.app')

@section('title', $category->name)

@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-2xl mb-4">{{ $category->name }}</h1>

    <div class="mb-4">
        <!-- Fix: use array key for route parameter -->
        <a href="{{ route('event_categories.edit', $category->id) }}" class="text-yellow-500 mr-2"> Edit</a>
<form action="{{ route('event_categories.destroy', $category->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500"> Delete</button>
</form>

    </div>

    <!-- Details of the category -->
    <div class="mb-4">
        <h2 class="text-lg ">Category Name</h2>
        <p>{{ $category->name }}</p>
    </div>

</div>

@endsection

</body>
</html>
