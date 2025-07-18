@extends('layouts.app')

@section('title', 'Book a K-POP Event')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />

<div class="min-h-screen bg-gradient-to-br from-pink-50 via-purple-50 to-blue-50 flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-2xl bg-white/90 rounded-2xl shadow-xl p-8 border border-pink-100 relative overflow-hidden">
        <!-- Decorative K-pop icon -->
        <div class="absolute -top-8 -right-8 w-32 h-32 bg-pink-100 rounded-full opacity-20 blur-2xl"></div>
        <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-purple-100 rounded-full opacity-20 blur-2xl"></div>
        
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-600 tracking-tight flex items-center justify-center">
                <svg class="w-8 h-8 mr-2 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                Book a K-POP Event
            </h1>
            <p class="text-gray-500 text-sm mt-2">Fill out the details below to secure your spot at the next K-POP experience!</p>
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
                <label for="title" class="block text-sm font-medium text-pink-600">Title</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title') }}" 
                    required 
                    class="mt-1 w-full p-3 rounded-lg border border-pink-200 focus:outline-none focus:ring-2 focus:ring-pink-400 bg-pink-50/50 placeholder-gray-400"
                    placeholder="e.g. VIP Ticket, General Admission"
                />
                @error('title')
                    <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Country -->
            <div>
                <label for="country" class="block text-sm font-medium text-purple-600">Country</label>
                <input 
                    type="text" 
                    name="country" 
                    id="country" 
                    value="{{ old('country') }}" 
                    required 
                    class="mt-1 w-full p-3 rounded-lg border border-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50/50 placeholder-gray-400"
                    placeholder="e.g. South Korea, Philippines"
                />
                @error('country')
                    <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- K-pop Group -->
            <div>
                <label for="kpop_group" class="block text-sm font-medium text-blue-600">K-pop Group</label>
                <select name="kpop_group" id="kpop_group" required class="mt-1 w-full p-3 rounded-lg border border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-400 bg-blue-50/50 text-gray-700">
                    <option value="">Select a group</option>
                    <option value="BTS" {{ old('kpop_group') == 'BTS' ? 'selected' : '' }}>BTS</option>
                    <option value="BLACKPINK" {{ old('kpop_group') == 'BLACKPINK' ? 'selected' : '' }}>BLACKPINK</option>
                    <option value="TWICE" {{ old('kpop_group') == 'TWICE' ? 'selected' : '' }}>TWICE</option>
                    <option value="EXO" {{ old('kpop_group') == 'EXO' ? 'selected' : '' }}>EXO</option>
                    <option value="Red Velvet" {{ old('kpop_group') == 'Red Velvet' ? 'selected' : '' }}>Red Velvet</option>
                    <option value="NCT" {{ old('kpop_group') == 'NCT' ? 'selected' : '' }}>NCT</option>
                    <option value="Stray Kids" {{ old('kpop_group') == 'Stray Kids' ? 'selected' : '' }}>Stray Kids</option>
                    <option value="ITZY" {{ old('kpop_group') == 'ITZY' ? 'selected' : '' }}>ITZY</option>
                </select>
                @error('kpop_group')
                    <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea 
                    name="description" 
                    id="description" 
                    rows="3" 
                    required 
                    class="mt-1 w-full p-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-pink-300 bg-gray-50/50 placeholder-gray-400"
                    placeholder="Tell us more about your booking (e.g. seat preference, special requests)">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Booking Date -->
            <div>
                <label for="booking_date" class="block text-sm font-medium text-gray-700">Booking Date & Time</label>
                <input 
                    type="text" 
                    name="booking_date" 
                    id="booking_date" 
                    value="{{ old('booking_date') }}" 
                    required 
                    class="mt-1 w-full p-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-300 bg-gray-50/50 placeholder-gray-400"
                    placeholder="Select date and time"
                />
                @error('booking_date')
                    <p class="text-sm mt-1 text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" class="w-full py-3 rounded-lg bg-gradient-to-r from-pink-500 to-purple-500 text-white font-bold shadow-md hover:from-pink-600 hover:to-purple-600 transition flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                    Book Now
                </button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#booking_date", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",
    });
</script>
@endsection
