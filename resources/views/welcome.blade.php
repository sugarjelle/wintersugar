<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>K-Pop World | Concert & Fan Meet Tickets</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Custom Tailwind config with K-pop vibrant colors -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            kpop: {
              pink: '#FF48B0',
              purple: '#A162E8',
              blue: '#4F46E5',
              yellow: '#FACC15',
              red: '#EF4444'
            },
            gradient: {
              start: '#FF48B0',
              middle: '#A162E8',
              end: '#4F46E5'
            }
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
            'fade-in': 'fadeIn 1s ease-out',
            'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite'
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-10px)' },
            },
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(10px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            }
          }
        }
      }
    }
  </script>
  
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Black+Han+Sans&display=swap');
    
    body {
      font-family: 'Inter', sans-serif;
      background: url('https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
      background-size: cover;
      position: relative;
    }
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0, 0, 0, 0.6);
      z-index: -1;
    }
    .kpop-title {
      font-family: 'Black Han Sans', sans-serif;
      letter-spacing: 1px;
    }
    .card-gradient {
      background: linear-gradient(to bottom right, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0.05) 100%);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .btn-primary {
      background: linear-gradient(to right, #FF48B0 0%, #A162E8 50%, #4F46E5 100%);
      background-size: 200% auto;
      box-shadow: 0 4px 15px rgba(161, 98, 232, 0.4);
    }
    .btn-primary:hover {
      background-position: right center;
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(161, 98, 232, 0.6);
    }
    .btn-secondary {
      border: 1px solid rgba(255, 255, 255, 0.3);
      background: rgba(255, 255, 255, 0.1);
      color: white;
    }
    .btn-secondary:hover {
      background: rgba(255, 255, 255, 0.2);
      transform: translateY(-2px);
    }
    .transition-all {
      transition: all 0.3s ease;
    }
    .light-stick {
      position: absolute;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      filter: blur(15px);
      opacity: 0.7;
      z-index: -1;
    }
    .artist-card {
      transition: all 0.3s ease;
    }
    .artist-card:hover {
      transform: translateY(-5px) scale(1.03);
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-12 text-white">

  <div class="w-full max-w-2xl card-gradient rounded-2xl shadow-2xl overflow-hidden p-0 transition-all hover:shadow-3xl">
    
    <!-- K-pop gradient header -->
    <div class="h-2 bg-gradient-to-r from-kpop-pink via-kpop-purple to-kpop-blue"></div>
    
    <div class="px-8 py-8 sm:px-10 sm:py-10">
      <!-- K-pop logo/icon with lightstick -->
      <div class="flex flex-col items-center mb-8">
        <div class="relative mb-6">
          <div class="absolute -inset-4 bg-kpop-pink rounded-full animate-pulse-slow opacity-30"></div>
          <div class="w-20 h-20 bg-gradient-to-br from-kpop-pink to-kpop-purple rounded-2xl flex items-center justify-center shadow-lg relative z-10 animate-float">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
            </svg>
          </div>
        </div>
        <h1 class="kpop-title text-4xl font-bold mb-2 bg-clip-text text-transparent bg-gradient-to-r from-kpop-pink via-kpop-purple to-kpop-blue">
          KPOP WORLD
        </h1>
        <p class="text-gray-300">Book concert tickets & fan meets with your favorite idols</p>
      </div>

      <!-- Featured Artists -->
      <div class="mb-8 animate-fade-in">
        <h2 class="text-xl font-semibold mb-4 text-center">Featured Artists This Month</h2>
        <div class="grid grid-cols-3 gap-4">
          <div class="artist-card bg-white/10 rounded-lg p-3 text-center cursor-pointer">
            <div class="w-16 h-16 mx-auto mb-2 rounded-full bg-gradient-to-br from-kpop-pink to-kpop-purple flex items-center justify-center">
              <span class="text-xl">💜</span>
            </div>
            <p class="text-sm font-medium">BTS</p>
          </div>
          <div class="artist-card bg-white/10 rounded-lg p-3 text-center cursor-pointer">
            <div class="w-16 h-16 mx-auto mb-2 rounded-full bg-gradient-to-br from-kpop-blue to-kpop-purple flex items-center justify-center">
              <span class="text-xl">🖤</span>
            </div>
            <p class="text-sm font-medium">BLACKPINK</p>
          </div>
          <div class="artist-card bg-white/10 rounded-lg p-3 text-center cursor-pointer">
            <div class="w-16 h-16 mx-auto mb-2 rounded-full bg-gradient-to-br from-kpop-yellow to-kpop-red flex items-center justify-center">
              <span class="text-xl">💛</span>
            </div>
            <p class="text-sm font-medium">TWICE</p>
          </div>
        </div>
      </div>

      <!-- Upcoming Events -->
      <div class="mb-8 bg-black/20 rounded-xl p-4 border border-white/10">
        <h2 class="text-lg font-semibold mb-3">Upcoming Events</h2>
        <ul class="space-y-3">
          <li class="flex items-center justify-between bg-gradient-to-r from-kpop-purple/20 to-transparent p-3 rounded-lg border-l-4 border-kpop-purple">
            <div>
              <p class="font-medium">BTS - Yet to Come in Seoul</p>
              <p class="text-xs text-gray-300">March 10, 2023 | Olympic Stadium</p>
            </div>
            <span class="text-xs bg-kpop-purple px-2 py-1 rounded-full">Selling Fast</span>
          </li>
          <li class="flex items-center justify-between bg-gradient-to-r from-kpop-pink/20 to-transparent p-3 rounded-lg border-l-4 border-kpop-pink">
            <div>
              <p class="font-medium">BLACKPINK - Born Pink World Tour</p>
              <p class="text-xs text-gray-300">March 25, 2023 | Gocheok Sky Dome</p>
            </div>
            <span class="text-xs bg-kpop-pink px-2 py-1 rounded-full">VIP Available</span>
          </li>
        </ul>
      </div>

      <!-- Action Buttons -->
      <div class="flex flex-col gap-4">
        <a href="{{ route('register') }}" 
           class="btn-primary text-white font-medium py-3 px-4 rounded-lg transition-all text-center">
           Join Now - Get Early Access
        </a>
        <a href="{{ route('login') }}" 
           class="btn-secondary font-medium py-3 px-4 rounded-lg transition-all text-center">
           Existing Fan? Sign In
        </a>
      </div>

      <div class="mt-8 pt-6 border-t border-white/10 text-center">
        <p class="text-xs text-gray-400">&copy; {{ date('Y') }} KPOP WORLD. All rights reserved.</p>
        <p class="mt-1 text-xs text-gray-500">By continuing, you agree to our Terms and Privacy Policy.</p>
      </div>
    </div>
  </div>

  <!-- Floating light sticks -->
  <div class="light-stick bg-kpop-pink top-1/4 left-1/4 animate-float" style="animation-delay: 0.5s;"></div>
  <div class="light-stick bg-kpop-blue bottom-1/4 right-1/4 animate-float" style="animation-delay: 1s;"></div>
  <div class="light-stick bg-kpop-purple top-1/3 right-1/3 animate-float" style="animation-delay: 1.5s;"></div>
  <div class="light-stick bg-kpop-yellow bottom-1/3 left-1/3 animate-float" style="animation-delay: 2s;"></div>

</body>
</html>