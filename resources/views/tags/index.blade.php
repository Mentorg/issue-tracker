@extends('layouts.app')

@section('title', 'Tags')

@section('content')
    <div class="flex justify-between">
        <h1 class="font-semibold text-2xl">Tags</h1>
        <a href="{{ route('tags.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded-md transition-all hover:bg-blue-500">Create Tag</a>
    </div>

    @if ($tags->isEmpty())
        <p>No tags found.</p>
    @else
        <ul class="flex gap-4 mt-4">
            @foreach ($tags as $tag)
                <li class="py-1 px-3 rounded-md w-fit" style="background-color: {{ $tag->color }}">
                    <p class="text-sm text-white">{{ $tag->name }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
