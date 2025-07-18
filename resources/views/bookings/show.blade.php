@extends('layouts.app')

@section('title', 'View Booking')

@section('content')
<div class="min-h-screen bg-gradient-to-tr from-pink-50 via-purple-50 to-blue-50 py-12 px-4 flex justify-center items-center">
    <div class="w-full max-w-xl bg-white/90 rounded-2xl shadow-xl p-4 border border-pink-100 relative overflow-hidden">
        <div class="absolute -top-8 -right-8 w-32 h-32 bg-pink-100 rounded-full opacity-20 blur-2xl"></div>
        <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-purple-100 rounded-full opacity-20 blur-2xl"></div>
        <h2 class="text-2xl font-bold text-pink-600 mb-3 flex items-center">
            <svg class="w-7 h-7 mr-2 text-purple-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
            Booking Details
        </h2>

        <div class="space-y-3">
            <div>
                <label class="text-sm font-semibold text-pink-500">Title:</label>
                <p class="text-gray-800 text-lg">{{ $booking->title ?? '—' }}</p>
            </div>
            <div>
                <label class="text-sm font-semibold text-purple-500">Description:</label>
                <p class="text-gray-700">{{ $booking->description ?? '—' }}</p>
            </div>
            <div>
                <label class="text-sm font-semibold text-blue-500">Booking Date & Time:</label>
                <p class="text-gray-700">{{ $booking->booking_date ? \Carbon\Carbon::parse($booking->booking_date)->format('F j, Y h:i A') : '—' }}</p>
            </div>
            <div>
                <label class="text-sm font-semibold text-yellow-500">Country:</label>
                <p class="text-gray-700">{{ $booking->country ?? '—' }}</p>
            </div>
            <div>
                <label class="text-sm font-semibold text-pink-400">K-pop Group:</label>
                <p class="text-gray-700">{{ $booking->kpop_group ?? '—' }}</p>
            </div>
        </div>

        <div class="mt-4 text-right">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white rounded-lg shadow hover:from-pink-600 hover:to-purple-600 transition text-sm font-semibold">
                ← Back to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
