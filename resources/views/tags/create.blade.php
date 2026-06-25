@extends('layouts.app')

@section('title', 'Create new tag')

@section('content')
    <h2 class="font-semibold text-2xl">New Tag</h2>
    <form action="{{ route('tags.store') }}" method="POST" class="flex flex-col gap-4 w-full max-w-1/3">
        @csrf
         <div class="flex flex-col">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">
        </div>
        <div class="flex flex-col">
            <label for="priority">Priority</label>
            <select name="color" id="color" class="border border-slate-300 rounded-sm py-1.5 px-2.5 mt-1.5">
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
                <option value="black">Black</option>
                <option value="orange">Orange</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white w-fit py-2 px-8 rounded-md transition-all hover:bg-blue-500 hover:cursor-pointer">Create</button>
    </form>
@endsection
