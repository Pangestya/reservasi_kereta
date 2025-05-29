<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'schedule_id' => 'required|exists:schedules,id',
    ]);

    $ticket = Ticket::create([
        'user_id' => $request->user_id,
        'schedule_id' => $request->schedule_id,
        'booking_code' => strtoupper(uniqid('TK-')),
        'status' => 'pending'
    ]);

    return response()->json(['message' => 'Reservasi berhasil', 'ticket' => $ticket]);
}
}