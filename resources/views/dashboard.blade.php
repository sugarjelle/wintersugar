@extends('layouts.app')

@section('title', 'K-POP Dashboard')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div x-data="{ sidebarOpen: false, notifOpen: false }" class="min-h-screen bg-gradient-to-b from-gray-50 to-white flex flex-col">
    <!-- Top Bar with K-pop theme -->
    <header class="w-full bg-white border-b border-gray-200 shadow-sm flex items-center px-4 py-3">
        <button @click="sidebarOpen = true" class="text-pink-500 hover:text-pink-700 focus:outline-none mr-4" aria-label="Open menu">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>
        <span class="text-xl font-bold bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">K-POP FAN SYSTEM</span>
    </header>

    <div class="flex-1 flex">
        <!-- Sidebar Drawer - K-pop themed -->
        <div x-show="sidebarOpen" @click.away="sidebarOpen = false" class="fixed inset-0 z-40 flex">
            <div class="w-64 bg-white border-r border-gray-100 shadow-lg flex flex-col py-8 px-4 min-h-screen relative">
                <button @click="sidebarOpen = false" class="absolute top-2 right-2 text-gray-400 hover:text-pink-500" aria-label="Close menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
                <div class="mb-10 flex items-center">
                    <span class="text-2xl font-extrabold bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">K-FAN PORTAL</span>
                </div>
                <nav class="flex flex-col space-y-2">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:bg-pink-50 px-4 py-2 rounded-lg transition font-medium flex items-center">
                        <svg class="w-5 h-5 mr-3 text-pink-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0H7m6 0v6m0 0H7m6 0h6" /></svg>
                        Dashboard
                    </a>
                    <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:bg-pink-50 px-4 py-2 rounded-lg transition font-medium flex items-center">
                        <svg class="w-5 h-5 mr-3 text-pink-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.485 0 4.797.657 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        My Profile
                    </a>
                    <a href="{{ route('bookings.index') }}" class="text-gray-700 hover:bg-pink-50 px-4 py-2 rounded-lg transition font-medium flex items-center">
                        <svg class="w-5 h-5 mr-3 text-pink-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        My Tickets
                    </a>
                    <!-- Notification Bell -->
                    <div class="relative mt-4">
                        <button @click="notifOpen = !notifOpen" class="relative w-full text-left text-gray-600 hover:bg-pink-50 px-4 py-2 rounded-lg transition font-medium flex items-center focus:outline-none">
                            <svg class="w-5 h-5 mr-3 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            Notifications
                            @if(auth()->user()->unreadNotifications->count())
                                <span class="absolute top-2 right-4 inline-block w-2 h-2 bg-red-500 rounded-full"></span>
                            @endif
                        </button>
                        <!-- Dropdown -->
                        <div x-show="notifOpen" @click.away="notifOpen = false" class="absolute left-0 mt-1 ml-12 w-72 bg-white border border-gray-100 rounded-lg shadow-lg z-50">
                            <div class="p-3 font-semibold border-b text-pink-600">K-POP Updates</div>
                            <ul class="max-h-64 overflow-y-auto divide-y divide-gray-100">
                                @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                                    <li class="px-3 py-2 text-sm text-gray-700 hover:bg-pink-50 transition">
                                        <div class="flex items-start">
                                            <span class="inline-block bg-pink-100 text-pink-600 rounded-full p-1 mr-2 mt-0.5">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" /></svg>
                                            </span>
                                            {{ $notification->data['message'] ?? 'New notification' }}
                                        </div>
                                        <div class="text-xs text-gray-400 mt-1 pl-5">{{ $notification->created_at->diffForHumans() }}</div>
                                    </li>
                                @empty
                                    <li class="px-3 py-3 text-sm text-gray-500 text-center">No new updates</li>
                                @endforelse
                            </ul>
                            @if(auth()->user()->unreadNotifications->count())
                                <form method="POST" action="{{ route('notifications.markAllRead') }}" class="p-2 text-center border-t">
                                    @csrf
                                    <button type="submit" class="text-pink-500 text-sm hover:underline">
                                        Mark all as read
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </nav>
            </div>
            <div class="flex-1" @click="sidebarOpen = false"></div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 py-8 px-4 sm:px-6 flex justify-center items-start">
            <div class="w-full max-w-4xl space-y-6">
                <!-- Welcome Card with K-pop theme -->
                <div class="bg-white border border-gray-100 rounded-xl p-6 sm:p-8 shadow-sm">
                    @php
                        $hour = now()->format('H');
                        $greeting = ($hour >= 5 && $hour < 12) ? 'Good morning' : (($hour >= 12 && $hour < 18) ? 'Good afternoon' : 'Good evening');
                        $kpopGroups = ['BTS', 'BLACKPINK', 'TWICE', 'EXO', 'Red Velvet', 'NCT', 'Stray Kids', 'ITZY'];
                        $randomGroup = $kpopGroups[array_rand($kpopGroups)];
                    @endphp
                    <h2 class="text-3xl font-extrabold text-gray-800">{{ $greeting }}, {{ Auth::user()->name }} <span class="text-pink-500">♥</span></h2>
                    <p class="mt-2 text-lg text-gray-600">Ready for the next <span class="font-semibold text-pink-500">{{ $randomGroup }}</span> concert?</p>
                    
                    <!-- Quick stats - Fixed variable names -->
                    <div class="mt-6 grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="bg-pink-50 rounded-lg p-3 text-center">
                            <div class="text-sm text-pink-500">Upcoming</div>
                            <div class="text-xl font-bold text-gray-800">{{ $upcomingBookingsCount ?? 0 }}</div>
                            <div class="text-xs text-gray-500 mt-1">Events you have booked that are coming soon.</div>
                        </div>
                        <div class="bg-purple-50 rounded-lg p-3 text-center">
                            <div class="text-sm text-purple-500">Past Events</div>
                            <div class="text-xl font-bold text-gray-800">{{ $pastBookingsCount ?? 0 }}</div>
                            <div class="text-xs text-gray-500 mt-1">Your completed or attended events.</div>
                        </div>
                        <div class="bg-blue-50 rounded-lg p-3 text-center">
                            <div class="text-sm text-blue-500">Fanmeets</div>
                            <div class="text-xl font-bold text-gray-800">{{ $fanmeetingsCount ?? 0 }}</div>
                            <div class="text-xs text-gray-500 mt-1">Special meet-and-greet sessions with idols.</div>
                        </div>
                        <div class="bg-yellow-50 rounded-lg p-3 text-center">
                            <div class="text-sm text-yellow-500">Concerts</div>
                            <div class="text-xl font-bold text-gray-800">{{ $concertsCount ?? 0 }}</div>
                            <div class="text-xs text-gray-500 mt-1">All K-POP concerts you have booked.</div>
                        </div>
                    </div>
                </div>

                <!-- All Bookings Section -->
                <div x-data="{ open: false }" class="bg-white border border-gray-100 rounded-xl shadow-sm">
                    <button type="button" @click="open = !open" class="w-full flex items-center justify-between px-6 py-4 focus:outline-none hover:bg-gray-50 rounded-t-xl transition">
                        <span class="text-lg font-semibold text-gray-800 flex items-center">
                            <span class="inline-block bg-gray-100 text-gray-600 rounded-lg p-2 mr-3">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" /></svg>
                            </span>
                            All Your Bookings
                        </span>
                        <span class="ml-4 text-gray-500 transition-transform duration-200" :class="open ? 'rotate-90' : ''">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" /></svg>
                        </span>
                    </button>
                    <div x-show="open" x-transition class="px-6 pb-4 pt-2 border-t border-gray-50 bg-gray-50 rounded-b-xl">
                        @if (isset($allBookings) && $allBookings->count())
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($allBookings as $booking)
                                            <tr class="hover:bg-gray-50">
                                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-900">{{ $booking->event->name ?? $booking->title }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">{{ \Carbon\Carbon::parse($booking->booking_date)->format('M j, Y') }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                                    <span class="px-2 py-1 text-xs rounded-full 
                                                        {{ $booking->type === 'concert' ? 'bg-pink-100 text-pink-600' : 'bg-purple-100 text-purple-600' }}">
                                                        {{ ucfirst($booking->type) }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                                    @if($booking->booking_date > now())
                                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-600">Upcoming</span>
                                                    @else
                                                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-600">Completed</span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-right">
                                                    <a href="{{ route('bookings.show', $booking) }}" class="inline-flex items-center px-3 py-1.5 bg-pink-500 text-white rounded hover:bg-pink-600 transition text-xs font-semibold">I Booked</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="text-center text-gray-400 italic py-4">
                                No bookings yet. Start by booking your first K-POP event!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection