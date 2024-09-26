@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')
<div class="dashboard-card">
    <h2>My Tickets</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Status</th>
                <th>Message</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ $ticket->message }}</td>
                    <td>{{ $ticket->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
