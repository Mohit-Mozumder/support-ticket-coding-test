@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="dashboard-card">
        <h1>Welcome, Admin!</h1>
        <p>Here you can manage tickets, users, and other administrative tasks.</p>
        <!-- Example Admin Actions -->
        <a href="{{ route('admin.index') }}" class="btn btn-primary">View Tickets</a>
        <a href="#" class="btn btn-secondary">Manage Users</a>
    </div>
@endsection
