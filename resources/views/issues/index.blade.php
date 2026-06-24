@extends('layouts.app')

@section('title', 'Issues')

@section('content')
    <div class="flex justify-between">
        <h1 class="font-semibold text-2xl">Issues</h1>
        <div>
            <input
                type="text"
                id="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search issues..."
                class="border px-3 py-2 rounded w-full"
            >
        </div>
        <div class="flex items-center gap-4">
            <p>Sort by</p>
            <form method="GET" action="{{ route('issues.index') }}" class="flex items-center gap-4">
                <select name="status" class="border px-2 py-1 rounded">
                    <option value="">All Statuses</option>
                    <option value="open" {{ request('status') === 'open' ? 'selected' : '' }}>Open</option>
                    <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                </select>
                <select name="priority" class="border px-2 py-1 rounded">
                    <option value="">All Priorities</option>
                    <option value="high" {{ request('priority') === 'high' ? 'selected' : '' }}>High</option>
                    <option value="medium" {{ request('priority') === 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="low" {{ request('priority') === 'low' ? 'selected' : '' }}>Low</option>
                </select>
                <button class="bg-blue-600 text-white px-4 py-1 rounded transition-all hover:bg-blue-500 hover:cursor-pointer">
                    Filter
                </button>
                <a href="{{ route('issues.index') }}" class="px-4 py-1 border rounded hover:cursor-pointer">
                    Reset
                </a>
            </form>
            <a href="{{ route('issues.create') }}" class="bg-blue-600 text-white py-2 px-6 rounded-md transition-all hover:bg-blue-500">Create Issue</a>
        </div>
    </div>
    @if ($issues->isEmpty())
        <p>No issues found.</p>
    @else
        <div id="issues-container">
            @include('issues.partials.list', ['issues' => $issues])
            <div class="mt-6">
                {{ $issues->links() }}
            </div>
        </div>
    @endif
<script>
let timer;

const searchInput = document.getElementById('search');

if (searchInput) {
    searchInput.addEventListener('input', function (e) {
        clearTimeout(timer);

        timer = setTimeout(() => {
            fetchIssues(e.target.value);
        }, 300);
    });
}

function fetchIssues(search) {
    const status = document.querySelector('select[name="status"]').value;
    const priority = document.querySelector('select[name="priority"]').value;

    fetch(`/issues?search=${encodeURIComponent(search)}&status=${status}&priority=${priority}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('issues-container').innerHTML = html;
    });
}
</script>
@endsection
