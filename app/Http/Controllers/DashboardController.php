<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the user's dashboard with their bookings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // All bookings (not just the current user's)
        $allBookings = \App\Models\Booking::with('user')->latest()->get();
        // Get all users who have at least one booking
        $usersWithBookings = \App\Models\User::whereHas('bookings')->get();
        return view('dashboard', compact('allBookings', 'usersWithBookings'));
    }
}
