@extends('layouts.app')

@section('title', 'Update issue')

@section('content')
    <h2 class="font-semibold text-2xl">Update Issue</h2>
    <form action="{{ route('issues.update', $issue) }}" method="POST" class="flex flex-col gap-4 w-full max-w-1/3">
        @csrf
        @method('PUT')

        @include('issues.partials.form', [
            'issue' => $issue,
            'submitText' => 'Update'
        ])
    </form>
@endsection
