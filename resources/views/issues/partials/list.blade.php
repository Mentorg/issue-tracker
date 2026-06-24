<ul class="grid grid-cols-1 gap-4">
    @foreach ($issues as $issue)
        <li class="my-4 border border-slate-200 rounded-md py-3 px-6">
            <div class="flex justify-between gap-4">
                <a href="{{ route('issues.show', $issue) }}" class="text-lg font-semibold line-clamp-1 transition-all hover:text-slate-500">{{ $issue->title }}</a>
                <form action="{{ route('issues.destroy', $issue) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white text-xs py-1.5 px-6 rounded-md transition-all hover:cursor-pointer hover:bg-red-500" onclick="return confirm('Are you sure you want to delete this project?')">
                        Delete
                    </button>
                </form>
            </div>
            <p class="text-sm"><span class="font-semibold">{{ $issue->due_date ? 'Due Date: ' : '' }}</span> {{ $issue->due_date }}</p>
            <p class="text-sm line-clamp-2 mt-2.5">{{ $issue->description }}</p>
            <p class="text-sm mt-4"><span class="font-semibold">Project: </span>{{ $issue->project->name }}</p>
            <div class="flex flex-flex gap-3 mt-4">
                <p class="text-sm font-semibold">Status: <span class="bg-green-600 text-white rounded-md py-1 px-3">{{ $issue->status }}</span></p>
                <p class="text-sm font-semibold">Priority: <span class="bg-blue-600 text-white rounded-md py-1 px-3">{{ $issue->priority }}</span></p>
            </div>
        </li>
    @endforeach
</ul>

