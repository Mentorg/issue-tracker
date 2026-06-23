@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <div class="flex justify-between">
        <h1 class="font-semibold text-2xl">{{ $project->name }}</h1>
        <div class="flex gap-4">
            <a href="{{ route('projects.edit', $project) }}" class="bg-green-600 text-white py-2 px-6 rounded-md transition-all hover:bg-green-500">Update</a>
            <a href="!#" class="bg-red-600 text-white py-2 px-6 rounded-md transition-all hover:bg-red-500">Delete</a>
        </div>
    </div>
    <p class="mt-4">{{ $project->description }}</p>
@endsection
