@extends('layouts.app')

@section('title', 'Create new project')

@section('content')
    <h2 class="font-semibold text-2xl">New Project</h2>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <form action="{{ route('projects.store') }}" method="POST" class="flex flex-col gap-4 w-full max-w-1/3">
        @include('projects.partials.form', [
            'project' => new App\Models\Project(),
            'submitText' => 'Create'
        ])
    </form>
@endsection
