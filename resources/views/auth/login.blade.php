<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | K-POP Fan System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #fce7f3 0%, #ede9fe 100%);
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md bg-white/90 rounded-2xl shadow-xl p-8 border border-pink-100 relative overflow-hidden">
        <div class="absolute -top-8 -right-8 w-32 h-32 bg-pink-100 rounded-full opacity-20 blur-2xl"></div>
        <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-purple-100 rounded-full opacity-20 blur-2xl"></div>
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-600 tracking-tight flex items-center justify-center">
                <svg class="w-8 h-8 mr-2 text-pink-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                K-POP Fan Login
            </h1>
            <p class="text-gray-500 text-sm mt-2">Sign in to your K-POP fan account</p>
        </div>
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-pink-600">Email</label>
                <input id="email" type="email" name="email" required autofocus class="mt-1 w-full p-3 rounded-lg border border-pink-200 focus:outline-none focus:ring-2 focus:ring-pink-400 bg-pink-50/50 placeholder-gray-400" placeholder="you@email.com">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-purple-600">Password</label>
                <input id="password" type="password" name="password" required class="mt-1 w-full p-3 rounded-lg border border-purple-200 focus:outline-none focus:ring-2 focus:ring-purple-400 bg-purple-50/50 placeholder-gray-400" placeholder="••••••••">
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-pink-500 border-gray-300 rounded focus:ring-pink-400">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-700">Remember Me</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-sm text-pink-500 hover:underline">Forgot password?</a>
            </div>
            <button type="submit" class="w-full py-3 rounded-lg bg-gradient-to-r from-pink-500 to-purple-500 text-white font-bold shadow-md hover:from-pink-600 hover:to-purple-600 transition flex items-center justify-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" /></svg>
                Log In
            </button>
        </form>
        <div class="mt-8 text-center text-sm text-gray-600">
            <span>Don't have an account?
                <a href="{{ route('register') }}" class="text-pink-500 font-medium hover:underline">Register</a>
            </span>
        </div>
    </div>
</body>
</html>
