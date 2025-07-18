<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | Att Bookmarks</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #fce7f3 0%, #ede9fe 100%);
        }
        .profile-header {
            background: linear-gradient(135deg, #f472b6 0%, #a78bfa 100%);
        }
        .footer {
            background-color: #f1f5f9;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="profile-header text-white py-10 px-6 sm:px-12 relative overflow-hidden">
        <div class="absolute -top-8 -right-8 w-32 h-32 bg-pink-200 rounded-full opacity-20 blur-2xl"></div>
        <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-purple-200 rounded-full opacity-20 blur-2xl"></div>
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col sm:flex-row items-center gap-6">
                <div class="flex items-center justify-center w-24 h-24 rounded-full bg-white text-3xl font-bold text-pink-500 shadow-lg">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                </div>
                <div class="text-center sm:text-left">
                    <h1 class="text-3xl font-bold tracking-tight">My K-POP Profile</h1>
                    <p class="mt-2 text-pink-100">Att Bookmarks</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow py-12 px-6 sm:px-12">
        <div class="max-w-3xl mx-auto">
            <div class='mb-8'><x-back-button /></div>
            <!-- User Info Section -->
            <section class="bg-white/90 shadow-sm rounded-2xl p-8 border border-pink-100">
                @include('profile.partials.update-profile-information-form', ['user' => $user])
            </section>

            <!-- Recent Booked / History Booked Section -->
            <section class="bg-white/80 rounded-2xl shadow-sm p-6 mt-8 border border-purple-100">
                <h2 class="text-xl font-semibold text-purple-700 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                    Recent Booked
                </h2>
                <div class="text-gray-500">No recent bookings found.</div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer py-6 px-6 sm:px-12 text-center text-gray-500 text-sm">
        <p>© 2025 Laravel. All rights reserved.</p>
    </footer>
</body>
</html>