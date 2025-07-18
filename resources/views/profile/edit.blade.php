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
            background-color: #f8fafc;
        }
        .profile-header {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }
        .avatar {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
        .footer {
            background-color: #f1f5f9;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <!-- Header -->
    <header class="profile-header text-white py-8 px-6 sm:px-12">
        <div class="max-w-6xl mx-auto">
            <div class="flex flex-col sm:flex-row items-center gap-6">
                <div class="avatar w-24 h-24 rounded-full bg-white flex items-center justify-center text-3xl font-bold text-indigo-600">
                    J
                </div>
                <div class="text-center sm:text-left">
                    <h1 class="text-3xl font-bold">My Profile</h1>
                    <p class="mt-2 text-indigo-100">Att Bookmarks</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow py-8 px-6 sm:px-12">
        <div class="max-w-6xl mx-auto">
            <!-- User Info Section -->
            @include('profile.partials.update-profile-information-form', ['user' => $user])

            <!-- Recent Booked / History Booked Section -->
            <section class="bg-white rounded-xl shadow-sm p-6 mt-8">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Recent Booked</h2>
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