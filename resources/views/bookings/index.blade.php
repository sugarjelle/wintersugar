@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

<div class="min-h-screen bg-white flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-3xl bg-gray-100 rounded-xl shadow-xl p-10">
        
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-gray-800">📌 Book an Appointment</h1>
            <p class="text-gray-600 text-sm mt-2">Fill out the details below to schedule your session.</p>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 p-4 rounded-md bg-green-50 border border-green-200 text-green-800 text-sm text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('bookings.store') }}" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title') }}" 
                    required 
                    class="mt-1 w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-700"
                />
                @error('title')
                    <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="4" 
                    required 
                    class="mt-1 w-full p-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-700"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Hidden Date Input -->
            <input type="hidden" name="booking_date" id="booking_date" value="{{ old('booking_date') }}" />

            <!-- Calendar -->
            <div>
                <label for="inline-calendar" class="block text-sm font-medium text-gray-700 mb-2">Booking Date & Time</label>
                <div 
                    id="inline-calendar" 
                    class="bg-white border border-gray-300 rounded-md shadow-sm p-3 w-full"
                    aria-describedby="calendarHelp"
                ></div>
                <p id="calendarHelp" class="text-xs text-gray-500 mt-1">Select your preferred date and time.</p>
                @error('booking_date')
                    <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit -->
            <div class="pt-4 text-center">
                <button 
                    type="submit" 
                    class="w-full sm:w-auto px-8 py-3 bg-gray-800 text-white rounded-md font-semibold hover:bg-gray-700 transition"
                >
                    Confirm Booking
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    const bookedDates = @json($bookedDates);
    const hiddenInput = document.getElementById("booking_date");

    flatpickr("#inline-calendar", {
        inline: true,
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
        disable: bookedDates,
        time_24hr: false,
        defaultDate: hiddenInput.value || null,
        onChange: function(selectedDates, dateStr) {
            hiddenInput.value = dateStr;
        }
    });
</script>
@endsection
