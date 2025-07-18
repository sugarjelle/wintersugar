@extends('layouts.app')

@section('title', 'Edit Booking')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<div class="py-12 px-4 min-h-screen bg-gradient-to-tr from-purple-200 via-pink-100 to-purple-300">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg rounded-2xl p-8 border border-purple-200">
            <h2 class="text-2xl font-bold mb-6 text-center text-purple-700">Edit Booking</h2>

            <form method="POST" action="{{ route('bookings.update', $booking->id) }}">
                @csrf
                @method('PUT')

                <!-- Title -->
                <div class="mb-5">
                    <label for="title" class="block font-medium text-purple-700 mb-1">Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title', $booking->title) }}"
                        required
                        class="w-full border border-purple-300 bg-white text-purple-900 rounded-lg p-2 focus:ring-2 focus:ring-pink-400 focus:border-pink-400"
                    />
                </div>

                <!-- Description -->
                <div class="mb-5">
                    <label for="description" class="block font-medium text-purple-700 mb-1">Description</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        required
                        class="w-full border border-purple-300 bg-white text-purple-900 rounded-lg p-2 focus:ring-2 focus:ring-pink-400 focus:border-pink-400"
                    >{{ old('description', $booking->description) }}</textarea>
                </div>

                <!-- Booking Date -->
                <div class="mb-6">
                    <label for="booking_date" class="block font-medium text-purple-700 mb-1">Booking Date & Time</label>
                    <input
                        type="datetime-local"
                        name="booking_date"
                        id="booking_date"
                        value="{{ \Carbon\Carbon::parse($booking->booking_date)->format('Y-m-d\TH:i') }}"
                        required
                        class="w-full border border-purple-300 bg-white text-purple-900 rounded-lg p-2 focus:ring-2 focus:ring-pink-400 focus:border-pink-400"
                    />
                </div>

                <button
                    type="submit"
                    class="w-full bg-pink-500 text-white font-semibold py-3 rounded-lg hover:bg-pink-600 transition"
                >
                    Update Booking
                </button>
            </form>

            <!-- Back Button Below -->
            <div class="mt-6 text-center">
                <a href="{{ route('bookings.index') }}"
                   class="inline-block px-6 py-2 text-purple-700 border border-purple-400 rounded-lg hover:bg-purple-100 transition"
                >
                    &larr; Back to Bookings
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
