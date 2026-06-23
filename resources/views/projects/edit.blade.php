@extends('layouts.app')

@section('title', 'Update project')

@section('content')
<h2 class="font-semibold text-2xl">Update Project</h2>

<form action="{{ route('projects.update', $project) }}" method="POST" class="flex flex-col gap-4 w-full max-w-1/3">
    @csrf
    @method('PUT')

    @include('projects.partials.form', [
        'project' => $project,
        'submitText' => 'Update'
    ])
</form>
@endsection
