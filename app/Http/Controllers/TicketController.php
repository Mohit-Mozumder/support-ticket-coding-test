<?php

namespace App\Http\Controllers;

use App\Mail\TicketCreatedMail;
use App\Mail\TicketClosedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class TicketController extends Controller

{
    public function index()
    {
        $tickets = Auth::user()->tickets;
        return view('customer.index', compact('tickets'));
    }
    
    public function adminIndex()
    {
        $tickets = Ticket::all();
        return view('admin.index', compact('tickets'));
    }
    
    public function create()
    {
        return view('customer.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
    
        // Create a new ticket for the authenticated customer
        $ticket = Auth::user()->tickets()->create($request->only('subject', 'message'));
    
        // Find the admin email (assuming there's a single admin)
        $admin = User::where('role', 'admin')->first();  // Change this to get all admins if necessary
    
        // Send the email to the admin using Mailpit
        if ($admin) {
            Mail::to($admin->email)->send(new TicketCreatedMail($ticket));
        }
    
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully! The admin has been notified.');
    }

    public function close(Ticket $ticket)
    {
        // Update the ticket status to 'closed'
        $ticket->update(['status' => 'closed']);
    
        // Send a closure email to the customer
        Mail::to($ticket->user->email)->send(new TicketClosedMail($ticket));
    
        return redirect()->route('admin.index')->with('success', 'Ticket closed and customer notified!');
    }
    
}