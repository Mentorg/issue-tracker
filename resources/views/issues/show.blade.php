@extends('layouts.app')

@section('title', $issue->title)

@section('content')
    <div class="flex justify-between">
        <div class="flex items-center gap-4">
            <h1 class="font-semibold text-2xl">{{ $issue->title }}</h1>
            <p class="text-sm"><span class="font-semibold">{{ $issue->due_date ? 'Due Date: ' : '' }}</span> {{ $issue->due_date }}</p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('issues.edit', $issue) }}" class="bg-green-600 text-white py-2 px-6 rounded-md transition-all hover:bg-green-500">Update</a>
            <form action="{{ route('issues.destroy', $issue) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white py-2 px-6 rounded-md transition-all hover:bg-red-500 hover:cursor-pointer" onclick="return confirm('Are you sure you want to delete this project?')">
                    Delete
                </button>
            </form>
        </div>
    </div>
    <p class="mt-4">{{ $issue->description }}</p>
    <div class="mt-4">
        <h2><span class="font-semibold">Project:</span> <a href="{{ route('projects.show', $issue->project) }}" class="text-sm text-blue-600 transition-all hover:text-blue-500">{{ $issue->project->name }}</a></h2>
    </div>
@endsection
