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
    <div class="grid grid-cols-4 gap-4 mt-8">
        @foreach ($project->issues as $issue)
            <div class="border border-slate-300 py-4 px-2 rounded-md">
                <a href="{{ route('issues.show', $issue) }}" class="text-lg font-semibold line-clamp-1 transition-all hover:text-slate-600 hover:cursor-pointer">{{  $issue->title }}</a>
                <p class="text-sm mt-2 line-clamp-2">{{ $issue->description }}</p>
            </div>
        @endforeach
    </div>
@endsection
