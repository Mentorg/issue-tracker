@csrf
<div class="flex gap-4">
    <div class="flex flex-col w-full">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title', $issue->title ?? '') }}" class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">
        @error('title')
            <p class="text-red-500 font-semibold text-sm">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex flex-col w-full">
        <label for="due_date">Due Date</label>
        <input type="datetime-local" name="due_date" id="due_date" value="{{ old('due_date', $issue->due_date ?? '') }}" class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">
    </div>
</div>
<div class="flex gap-4">
    <div class="flex flex-col w-full">
        <label for="status">Status</label>
        <select name="status" id="status" class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">
            <option value="open" {{ old('status', $issue->status ?? 'open') === 'open' ? 'selected' : '' }}>Open</option>
            <option value="in_progress"  {{ old('status', $issue->status ?? 'in_progress') === 'in_progress' ? 'selected' : '' }}>In Progress</option>
            <option value="closed" {{ old('status', $issue->status ?? 'closed') === 'closed' ? 'selected' : '' }}>Closed</option>
        </select>
    </div>
    <div class="flex flex-col w-full">
        <label for="priority">Priority</label>
        <select name="priority" id="priority" class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">
            <option value="high" {{ old('priority', $issue->priority ?? 'high') === 'high' ? 'selected' : '' }}>High</option>
            <option value="medium" {{ old('priority', $issue->priority ?? 'medium') === 'medium' ? 'selected' : '' }}>Medium</option>
            <option value="low" {{ old('priority', $issue->priority ?? 'low') === 'low' ? 'selected' : '' }}>Low</option>
        </select>
    </div>
</div>
<div class="flex flex-col w-full">
    <label for="project_id">Project</label>
    <select name="project_id" id="project_id"
        class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">
        @foreach ($projects as $project)
            <option value="{{ $project->id }}"
                {{ old('project_id') == $project->id ? 'selected' : '' }}>
                {{ $project->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="flex flex-col">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">{{ old('description', $issue->description ?? '') }}</textarea>
    @error('description')
        <p class="text-red-500 font-semibold text-sm">{{ $message }}</p>
    @enderror
</div>
<button type="submit" class="bg-blue-600 text-white w-fit py-2 px-8 rounded-md transition-all hover:bg-blue-500 hover:cursor-pointer">{{ $submitText ?? 'Save' }}</button>
