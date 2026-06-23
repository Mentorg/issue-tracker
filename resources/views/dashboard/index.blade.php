@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>

    <div class="stats">
        <div>Total Projects: {{ $projectCount }}</div>
        <div>Open Issues: {{ $openIssues }}</div>
        <div>Closed Issues: {{ $closedIssues }}</div>
    </div>
@endsection
