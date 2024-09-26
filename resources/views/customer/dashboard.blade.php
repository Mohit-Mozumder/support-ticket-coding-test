@extends('layouts.app')

@section('title', 'Customer Dashboard')

@section('content')
    <div class="dashboard-card">
        <h1>Welcome, {{ Auth::user()->name }}!</h1>
        <p>You can open support tickets or view your previous tickets here.</p>
        <!-- Example Customer Actions -->
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">Open New Ticket</a>
        <a href="{{ route('tickets.index') }}" class="btn btn-secondary">View My Tickets</a>
    </div>
@endsection
