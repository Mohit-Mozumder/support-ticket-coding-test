<!DOCTYPE html>
<html>
<head>
    <title>Ticket Closed</title>
</head>
<body>
    <h1>Your Ticket has been Closed</h1>
    <p>Dear {{ $ticket->user->name }},</p>

    <p>Your ticket with the subject <strong>{{ $ticket->subject }}</strong> has been closed by our admin team.</p>

    <p>If you have any further questions or need more help, please feel free to open a new ticket or reply to this email.</p>

    <p>Thank you for reaching out to us!</p>

    <p>Best Regards,<br>{{ config('app.name') }} Support Team</p>
</body>
</html>
