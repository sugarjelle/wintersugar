<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Welcome to Our Platform</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  
  <!-- Custom Tailwind config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              200: '#bae6fd',
              300: '#7dd3fc',
              400: '#38bdf8',
              500: '#0ea5e9',
              600: '#0284c7',
              700: '#0369a1',
              800: '#075985',
              900: '#0c4a6e',
            }
          },
          animation: {
            'float': 'float 6s ease-in-out infinite',
            'fade-in': 'fadeIn 1s ease-out'
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
    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 50%, #bae6fd 100%);
      background-attachment: fixed;
    }
    .card-gradient {
      background: linear-gradient(to bottom right, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%);
      backdrop-filter: blur(10px);
    }
    .btn-primary {
      background: linear-gradient(to right, #0ea5e9 0%, #0369a1 100%);
      box-shadow: 0 4px 15px rgba(7, 89, 133, 0.2);
    }
    .btn-primary:hover {
      background: linear-gradient(to right, #0284c7 0%, #075985 100%);
      transform: translateY(-2px);
    }
    .btn-secondary:hover {
      transform: translateY(-2px);
    }
    .transition-all {
      transition: all 0.3s ease;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center px-4 py-12">

  <div class="w-full max-w-md card-gradient border border-white/30 rounded-2xl shadow-xl overflow-hidden p-0 transition-all hover:shadow-2xl">
    
    <!-- Decorative header with gradient -->
    <div class="h-2 bg-gradient-to-r from-primary-400 via-primary-500 to-primary-600"></div>
    
    <div class="px-8 py-8 sm:px-10 sm:py-10 text-center">
      <!-- Animated logo/icon -->
      <div class="mx-auto mb-6 w-20 h-20 bg-primary-500 rounded-2xl flex items-center justify-center shadow-lg animate-float">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
        </svg>
      </div>
      
      <div class="mb-8 animate-fade-in">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome to Our Platform</h1>
        <p class="text-gray-600">Join our community and unlock amazing features</p>
      </div>

      <div class="flex flex-col gap-4">
        <a href="{{ route('register') }}" 
           class="btn-primary text-white font-medium py-3 px-4 rounded-lg transition-all hover:shadow-md">
           Get Started - It's Free
        </a>
        <a href="{{ route('login') }}" 
           class="btn-secondary border border-gray-300 text-gray-700 font-medium py-3 px-4 rounded-lg transition-all hover:bg-gray-50 hover:shadow-sm">
           Already have an account? Sign In
        </a>
      </div>

      <div class="mt-8 pt-6 border-t border-gray-200/50">
        <p class="text-xs text-gray-500">&copy; {{ date('Y') }} Your Awesome App. All rights reserved.</p>
        <p class="mt-1 text-xs text-gray-400">By continuing, you agree to our Terms and Privacy Policy.</p>
      </div>
    </div>
  </div>

  <!-- Floating decorative elements -->
  <div class="fixed -bottom-20 -left-20 w-64 h-64 rounded-full bg-primary-100/50 blur-xl -z-10"></div>
  <div class="fixed -top-20 -right-20 w-64 h-64 rounded-full bg-primary-200/50 blur-xl -z-10"></div>

</body>
</html>