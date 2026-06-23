@csrf
<div class="flex flex-col">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="{{ old('name', $project->name ?? '') }}" class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">
</div>
<div class="flex flex-col">
    <label for="description">Description</label>
    <textarea name="description" id="description" class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">{{ old('description', $project->description ?? '') }}</textarea>
</div>
<button type="submit" class="bg-blue-600 text-white w-fit py-2 px-8 rounded-md transition-all hover:bg-blue-500 hover:cursor-pointer">{{ $submitText ?? 'Save' }}</button>
