@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')
<div class="dashboard-card">
    <h2>All Tickets</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Customer</th>
                <th>Status</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->subject }}</td>
                    <td>{{ $ticket->user->name }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ $ticket->message }}</td>
                    <td>
                        @if($ticket->status == 'open')
                            <!-- Reply Form -->
                            <form action="#" method="POST" class="d-inline">
                                @csrf
                                <div class="mb-2">
                                    <textarea name="reply_message" class="form-control" rows="2" placeholder="Reply here..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success">Reply</button>
                            </form>

                            <!-- Close Ticket Button -->
                            <form action="{{ route('admin.close', $ticket) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">Close Ticket</button>
                            </form>
                        @else
                            <span class="badge bg-secondary">Closed</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
