<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\BookingCreated;

class BookingController extends Controller
{
    // API route: GET /api/bookings
    public function apiIndex()
    {
        return response()->json(Auth::user()->bookings);
    }

    // Web route: GET /bookings
    public function index()
    {
        return view('bookings.index');
    }

    // API route: POST /api/bookings
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'booking_date' => 'required|date',
        ]);

        $booking = Auth::user()->bookings()->create($validated);

        Auth::user()->notify(new BookingCreated($booking));

        return response()->json([
            'message' => 'Booking created',
            'booking' => $booking
        ], 201);
    }

    // API route: GET /api/bookings/{booking}
    public function show(Booking $booking)
    {
         return view('bookings.show', compact('booking'));
    }

    // API route: PUT/PATCH /api/bookings/{booking}
    public function update(Request $request, Booking $booking)
    {
        $this->authorize('update', $booking);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'booking_date' => 'required|date',
        ]);

        $booking->update($validated);

        return response()->json([
            'message' => 'Booking updated',
            'booking' => $booking
        ]);
    }

    // API route: DELETE /api/bookings/{booking}
    public function destroy(Booking $booking)
    {
        $this->authorize('delete', $booking);

        $booking->delete();

        return response()->json(['message' => 'Booking deleted']);
    }
} 