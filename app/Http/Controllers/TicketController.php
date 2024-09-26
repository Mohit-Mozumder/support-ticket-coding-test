<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    
        Auth::user()->tickets()->create($request->only('subject', 'message'));
    
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully!');
    }
    
    public function close(Ticket $ticket)
    {
        $ticket->update(['status' => 'closed']);
    
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket closed successfully!');
    }
    
}
