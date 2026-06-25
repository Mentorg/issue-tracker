@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="flex justify-between">
        <h1 class="font-semibold text-2xl">Projects</h1>
        <a href="{{ route('projects.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded-md transition-all hover:bg-blue-500">Create Project</a>
    </div>

    <ul class="grid grid-cols-1 gap-4">
        @foreach ($projects as $project)
            <li class="my-4 border border-slate-200 rounded-md py-3 px-6">
                <div class="flex justify-between">
                    <a href="{{ route('projects.show', $project) }}" class="text-lg font-semibold line-clamp-1 transition-all hover:text-slate-500">{{ $project->name }}</a>
                    @can('delete', $project)
                        <form action="{{ route('projects.destroy', $project) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white text-xs py-1.5 px-6 rounded-md transition-all hover:cursor-pointer hover:bg-red-500" onclick="return confirm('Are you sure you want to delete this project?')">
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>
                <p class="text-sm line-clamp-2 mt-2.5">{{ $project->description }}</p>
            </li>
        @endforeach
    </ul>
    @if ($projects->isEmpty())
        <p>No projects found.</p>
    @else
        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    @endif
@endsection
