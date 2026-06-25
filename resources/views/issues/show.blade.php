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
    <ul id="tags-list" class="flex gap-4 mt-4">
        @foreach ($issue->tags as $tag)
            <li data-tag-id="{{ $tag->id }}" class="flex items-center gap-2 py-1 px-3 rounded-md" style="background-color: {{ $tag->color }}">
                <span class="text-sm text-white">{{ $tag->name }}</span>
                <button class="detach-tag text-white font-bold transition-all rounded-full w-6 h-6 flex items-center justify-center hover:bg-slate-400 hover:cursor-pointer" data-tag-id="{{ $tag->id }}">×</button>
            </li>
        @endforeach
    </ul>
    <div class="mt-6">
        <select id="tag-select" class="border rounded px-2 py-1">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        <button id="attach-tag-btn" class="bg-blue-600 text-white px-4 py-1 rounded transition-all hover:bg-blue-500 hover:cursor-pointer">Attach Tag</button>
    </div>
    <script>
        document.getElementById('attach-tag-btn')
            .addEventListener('click', async function () {

            const tagId = document.getElementById('tag-select').value;

            const response = await fetch(
                '{{ route('issues.tags.store', $issue) }}',
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        tag_id: tagId
                    })
                }
            );

            if (response.ok) {
                const tag = await response.json();

                const li = document.createElement('li');
                li.className = 'flex items-center gap-2 py-1 px-3 rounded-md';
                li.style.backgroundColor = tag.color;

                li.innerHTML = `
                    <span class="text-sm text-white">${tag.name}</span>
                    <button class="detach-tag text-white font-bold" data-tag-id="${tag.id}">
                        ×
                    </button>
                `;

                document.getElementById('tags-list').appendChild(li);
            }
        });
        document.getElementById('tags-list').addEventListener('click', async function (e) {
            if (!e.target.classList.contains('detach-tag')) return;

            const tagId = e.target.dataset.tagId;

            const response = await fetch(
                `/issues/{{ $issue->id }}/tags/${tagId}`,
                {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            );

            if (response.ok) {
                e.target.closest('li').remove();
            }
        });
    </script>
@endsection
