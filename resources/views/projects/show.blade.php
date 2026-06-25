@extends('layouts.app')

@section('title', $project->name)

@section('content')
    <div class="flex justify-between">
        <h1 class="font-semibold text-2xl">{{ $project->name }}</h1>
        <div class="flex gap-4">
            @can('update', $project)
                <a href="{{ route('projects.edit', $project) }}" class="bg-green-600 text-white py-2 px-6 rounded-md transition-all hover:bg-green-500">Update</a>
            @endcan
            @can('delete', $project)
                <form action="{{ route('projects.destroy', $project) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white py-2 px-6 rounded-md transition-all hover:bg-red-500 hover:cursor-pointer" onclick="return confirm('Are you sure you want to delete this project?')">
                        Delete
                    </button>
                </form>
            @endcan
        </div>
    </div>
    <div>
        <p><span class="text-sm font-semibold">Start date: </span>{{ $project->start_date }}</p>
        <p><span class="text-sm font-semibold">Deadline: </span>{{ $project->deadline }}</p>
    </div>
    <p class="mt-4">{{ $project->description }}</p>
    <div class="grid grid-cols-4 gap-4 mt-8">
        @foreach ($project->issues as $issue)
            <div class="border border-slate-300 py-4 px-2 rounded-md">
                <a href="{{ route('issues.show', $issue) }}" class="text-lg font-semibold line-clamp-1 transition-all hover:text-slate-600 hover:cursor-pointer">{{  $issue->title }}</a>
                <p class="text-sm mt-2 line-clamp-2">{{ $issue->description }}</p>
            </div>
        @endforeach
    </div>
@endsection
