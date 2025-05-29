<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Train;
use App\Models\Schedule;
use App\Models\Ticket;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        return view('admin.dashboard', [
            'totalReservations' => Ticket::count(),
            'totalUsers' => User::count(),
        ]);
    }

    public function manageTrains()
    {
        $trains = Train::all();
        return view('admin.trains', compact('trains'));
    }

    public function manageSchedules()
    {
        $schedules = Schedule::with('train')->get();
        return view('admin.schedules', compact('schedules'));
    }

    public function verifyTicket($bookingCode)
    {
        $ticket = Ticket::where('booking_code', $bookingCode)->first();

        if (!$ticket) {
            return response()->json(['message' => 'Tiket tidak ditemukan'], 404);
        }

        $ticket->status = 'confirmed';
        $ticket->save();

        return response()->json(['message' => 'Tiket berhasil diverifikasi']);
    }
}