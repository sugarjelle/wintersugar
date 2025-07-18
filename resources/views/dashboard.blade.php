@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div x-data="{ sidebarOpen: false, notifOpen: false }" class="min-h-screen bg-gradient-to-b from-gray-100 to-white flex flex-col">
    <!-- Top Bar -->
    <header class="w-full bg-white border-b border-gray-200 shadow flex items-center px-4 py-3">
        <button @click="sidebarOpen = true" class="text-indigo-600 hover:text-indigo-800 focus:outline-none mr-4" aria-label="Open menu">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>
        <span class="text-xl font-bold text-indigo-700">Dashboard</span>
    </header>

    <div class="flex-1 flex">
        <!-- Sidebar Drawer -->
        <div x-show="sidebarOpen" @click.away="sidebarOpen = false" class="fixed inset-0 z-40 flex">
            <div class="w-64 bg-white border-r border-gray-200 shadow-lg flex flex-col py-8 px-4 min-h-screen relative">
                <button @click="sidebarOpen = false" class="absolute top-2 right-2 text-gray-400 hover:text-red-500" aria-label="Close menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
                <div class="mb-10">
                    <span class="text-2xl font-extrabold text-indigo-600">Att Bookmarks</span>
                </div>
                <nav class="flex flex-col space-y-4">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:bg-indigo-50 px-4 py-2 rounded transition font-medium flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0H7m6 0h6" /></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:bg-indigo-50 px-4 py-2 rounded transition font-medium flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.657 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        Profile
                    </a>
                    <a href="{{ route('bookings.index') }}" class="text-gray-700 hover:bg-indigo-50 px-4 py-2 rounded transition font-medium flex items-center">
                        <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Bookings
                    </a>
                    <!-- Notification Bell -->
                    <div class="relative">
                        <button @click="notifOpen = !notifOpen" class="relative text-gray-600 hover:text-gray-800 focus:outline-none flex items-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="ml-2">Notifications</span>
                            @if(auth()->user()->unreadNotifications->count())
                                <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-600 rounded-full animate-ping"></span>
                                <span class="absolute top-0 right-0 inline-block w-2 h-2 bg-red-600 rounded-full"></span>
                            @endif
                        </button>
                        <!-- Dropdown -->
                        <div x-show="notifOpen" @click.away="notifOpen = false" class="absolute left-full top-0 mt-0 ml-2 w-80 bg-white border border-gray-200 rounded shadow-lg z-50">
                            <div class="p-4 font-semibold border-b">Notifications</div>
                            <ul class="max-h-64 overflow-y-auto">
                                @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                                    <li class="px-4 py-2 text-sm text-gray-700 border-b hover:bg-gray-100">
                                        {{ $notification->data['message'] ?? 'New Notification' }}
                                    </li>
                                @empty
                                    <li class="px-4 py-2 text-sm text-gray-500">No new notifications</li>
                                @endforelse
                            </ul>
                            @if(auth()->user()->unreadNotifications->count())
                                <form method="POST" action="{{ route('notifications.markAllRead') }}" class="p-2 text-center">
                                    @csrf
                                    <button type="submit" class="text-blue-500 text-sm hover:underline">
                                        Mark all as read
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <!-- Profile/Logout -->
                    <div class="mt-6 border-t pt-4">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="font-medium text-gray-700">{{ Auth::user()->name }}</span>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="block text-gray-600 hover:text-indigo-600 py-1">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left text-red-500 hover:text-red-700 py-1">Logout</button>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="flex-1" @click="sidebarOpen = false"></div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 py-10 px-4 flex justify-center items-start">
            <div class="w-full max-w-4xl space-y-8">

        <!-- Welcome Card -->
        <div class="bg-white border border-gray-200 shadow-lg rounded-2xl p-6 sm:p-8">
            @php
                $hour = now()->format('H');
                $greeting = ($hour >= 5 && $hour < 12) ? 'Good morning' : (($hour >= 12 && $hour < 18) ? 'Good afternoon' : 'Good evening');
            @endphp
            <h2 class="text-3xl font-extrabold text-gray-800">{{ $greeting }}, {{ Auth::user()->name }} 👋</h2>
            <p class="mt-2 text-lg text-gray-600">Here’s a quick look at your upcoming bookings.</p>
        </div>

        <!-- All Bookings List (Minimalistic Collapsible Box) -->
        <div x-data="{ open: false }" class="bg-white border border-gray-100 shadow rounded-xl p-0 sm:p-0 mb-8">
            <button type="button" @click="open = !open" class="w-full flex items-center justify-between px-6 py-4 focus:outline-none hover:bg-gray-50 rounded-t-xl transition">
                <span class="text-lg font-semibold text-gray-800 flex items-center">
                    <span class="inline-block bg-gray-100 text-gray-600 rounded-full p-2 mr-3">
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 8h14M7 12h10m-7 4h4' /></svg>
                    </span>
                    All Bookings
                </span>
                <span class="ml-4 text-gray-500 transition-transform duration-200" :class="open ? 'rotate-90' : ''">
                    <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 5l7 7-7 7' /></svg>
                </span>
            </button>
            <div x-show="open" x-transition class="px-6 pb-4 pt-2 border-t border-gray-50 bg-gray-50 rounded-b-xl">
                @if ($allBookings->count())
                    <ul class="space-y-3">
                        @foreach ($allBookings as $booking)
                            <li class="flex flex-col sm:flex-row sm:items-center justify-between p-3 rounded hover:bg-white transition">
                                <div class="flex items-center space-x-3">
                                    <span class="inline-block bg-blue-100 text-blue-600 rounded-full p-2">
                                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 8h14M7 12h10m-7 4h4' /></svg>
                                    </span>
                                    <span class="font-semibold text-gray-700">{{ $booking->title }}</span>
                                    <span class="text-xs text-gray-400">by {{ $booking->user->name ?? 'Unknown' }}</span>
                                </div>
                                <div class="text-sm text-gray-500 mt-1 sm:mt-0">
                                    {{ \Carbon\Carbon::parse($booking->booking_date)->format('M j, Y · h:i A') }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center text-gray-400 italic py-4">
                        No bookings yet.
                    </div>
                @endif
            </div>
        </div>

        <!-- Users With Bookings List (Minimalistic Collapsible Box) -->
        <div x-data="{ open: false }" class="bg-white border border-blue-100 shadow rounded-xl p-0 sm:p-0 mt-8">
            <button type="button" @click="open = !open" class="w-full flex items-center justify-between px-6 py-4 focus:outline-none hover:bg-blue-50 rounded-t-xl transition">
                <span class="text-lg font-semibold text-blue-800 flex items-center">
                    <span class="inline-block bg-blue-100 text-blue-600 rounded-full p-2 mr-3">
                        <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M16 3.13a4 4 0 010 7.75M8 3.13a4 4 0 000 7.75' /></svg>
                    </span>
                    Users Who Have Booked
                </span>
                <span class="ml-4 text-blue-500 transition-transform duration-200" :class="open ? 'rotate-90' : ''">
                    <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 5l7 7-7 7' /></svg>
                </span>
            </button>
            <div x-show="open" x-transition class="px-6 pb-4 pt-2 border-t border-blue-50 bg-blue-50 rounded-b-xl">
                @if ($usersWithBookings->count())
                    <ul class="space-y-2">
                        @foreach ($usersWithBookings as $user)
                            <li class="flex items-center p-2 rounded hover:bg-white transition">
                                <span class="font-medium text-blue-700 mr-2">{{ $user->name }}</span>
                                <span class="text-xs text-gray-400">{{ $user->email }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="text-center text-gray-400 italic py-4">
                        No users have made bookings yet.
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
