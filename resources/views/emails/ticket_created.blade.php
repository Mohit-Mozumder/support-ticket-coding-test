<!DOCTYPE html>
<html>
<head>
    <title>New Ticket Created</title>
</head>
<body>
    <h1>New Ticket Created</h1>
    <p>A new ticket has been created by {{ $ticket->user->name }}.</p>
    <p><strong>Subject:</strong> {{ $ticket->subject }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $ticket->message }}</p>
    <p>Please log in to the admin dashboard to review and respond to the ticket.</p>
</body>
</html>
