@extends('layouts.app')

@section('title', 'Create new issue')

@section('content')
    <h2 class="font-semibold text-2xl">New Issue</h2>
    <form action="{{ route('issues.store') }}" method="POST" class="flex flex-col gap-4 w-full max-w-1/3">
        @include('issues.partials.form', [
            'issue' => new App\Models\Issue(),
            'submitText' => 'Create'
        ])
    </form>
@endsection
