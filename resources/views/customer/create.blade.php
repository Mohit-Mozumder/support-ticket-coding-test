@extends('layouts.app')

@section('title', 'Create Ticket')

@section('content')
<div class="dashboard-card">
    <h2>Open a New Ticket</h2>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
