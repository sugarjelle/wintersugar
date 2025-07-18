<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Notifications\BookingCreated;

class BookingViewController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->orderBy('booking_date')->get();
        $bookedDates = $bookings->pluck('booking_date')->map(fn($date) => \Carbon\Carbon::parse($date)->format('Y-m-d H:i'))->toArray();

        return view('bookings.index', compact('bookings', 'bookedDates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'booking_date' => 'required|date',
        ]);

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'booking_date' => $request->booking_date,
        ]);

        // Notify the user (for notification badge)
        Auth::user()->notify(new BookingCreated($booking));

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    public function edit(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) abort(403);
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) abort(403);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'booking_date' => 'required|date',
        ]);

        $booking->update($request->only(['title', 'description', 'booking_date']));

        return redirect()->route('bookings.index')->with('success', 'Booking updated!');
    }

    public function destroy(Booking $booking)
    {
        if ($booking->user_id !== Auth::id()) abort(403);
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted!');
    }
}