<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reset Password - HELP Platform</title>
    
    {{-- Premium Modern Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&family=Sora:wght@400;500;600;700;800;900&family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'],
                        display: ['Outfit', 'Inter', 'sans-serif'],
                        heading: ['Sora', 'Inter', 'sans-serif'],
                        mono: ['Space Grotesk', 'monospace']
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes float { 0%, 100% { transform: translateY(0) rotate(0deg); } 50% { transform: translateY(-20px) rotate(5deg); } }
        @keyframes shimmer { 0% { transform: translateX(-100%); } 100% { transform: translateX(100%); } }
        @keyframes pulseGlow { 0%, 100% { box-shadow: 0 0 20px rgba(13,148,136,0.3); } 50% { box-shadow: 0 0 40px rgba(13,148,136,0.6); } }
        @keyframes gradientShift { 0%, 100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
        
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-pulseGlow { animation: pulseGlow 2s ease-in-out infinite; }
        .animate-gradientShift { animation: gradientShift 3s ease infinite; background-size: 200% 200%; }
        
        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .bg-pattern-dots {
            background-image: radial-gradient(circle, rgba(13,148,136,0.08) 1px, transparent 1px);
            background-size: 24px 24px;
        }
        
        .bg-mesh-gradient {
            background: 
                radial-gradient(at 0% 0%, rgba(13,148,136,0.2) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(6,182,212,0.2) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(139,92,246,0.2) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(249,115,22,0.2) 0px, transparent 50%);
        }
        
        input:focus {
            outline: none;
            border-color: #0d9488;
            box-shadow: 0 0 0 3px rgba(13,148,136,0.1);
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-teal-50 to-cyan-50 bg-pattern-dots font-sans antialiased">
    
    <!-- Animated Background Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-teal-400/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-cyan-400/20 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 w-80 h-80 bg-purple-400/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
    </div>

    <div class="relative min-h-screen flex flex-col items-center justify-center px-4 py-12">
        
        <!-- Logo -->
        <div class="mb-8 animate-fadeInUp">
            <a href="/" class="inline-block">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-16 hover:scale-110 transition-transform duration-300">
            </a>
        </div>

        <!-- Main Card -->
        <div class="w-full max-w-md animate-fadeInUp" style="animation-delay: 0.2s;">
            <div class="relative">
                <!-- Gradient Border Effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-teal-400 via-cyan-400 to-blue-400 rounded-3xl blur-xl opacity-30 animate-pulseGlow"></div>
                
                <!-- Card Content -->
                <div class="relative glass rounded-3xl p-10 shadow-2xl">
                    
                    <!-- Icon -->
                    <div class="flex justify-center mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg animate-float">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Title -->
                    <h1 class="text-3xl font-black font-display text-center text-slate-900 mb-3 tracking-tight">
                        Reset Password
                    </h1>
                    
                    <!-- Subtitle -->
                    <p class="text-center text-slate-600 font-medium mb-8 leading-relaxed">
                        No problem! Enter your email and we'll send you a secure reset link.
                    </p>

                    <!-- Success Message -->
                    @if (session('status'))
                        <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl animate-fadeInUp">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <p class="text-sm font-semibold text-green-800">{{ session('status') }}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 rounded-xl animate-fadeInUp">
                            <div class="flex items-start gap-3">
                                <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    @foreach ($errors->all() as $error)
                                        <p class="text-sm font-semibold text-red-800">{{ $error }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Form -->
                    <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                        @csrf

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-sm font-bold font-heading text-slate-700 mb-2">
                                Email Address
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                    </svg>
                                </div>
                                <input 
                                    id="email" 
                                    type="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    required 
                                    autofocus 
                                    autocomplete="username"
                                    class="w-full pl-12 pr-4 py-4 bg-white border-2 border-slate-200 rounded-xl text-slate-900 font-medium placeholder-slate-400 transition-all duration-300 hover:border-teal-300"
                                    placeholder="your.email@example.com">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="group relative w-full px-6 py-4 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-xl font-bold font-heading text-lg shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-[1.02] overflow-hidden">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Send Reset Link
                                <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </span>
                            <div class="absolute inset-0 bg-gradient-to-r from-cyan-600 to-teal-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </button>
                    </form>

                    <!-- Back to Login -->
                    <div class="mt-8 text-center">
                        <a href="{{ route('login') }}" class="inline-flex items-center gap-2 text-sm font-semibold font-heading text-slate-600 hover:text-teal-600 transition-colors duration-300 group">
                            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Sign In
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <!-- Security Badge -->
        <div class="mt-8 flex items-center gap-2 text-sm text-slate-500 animate-fadeInUp" style="animation-delay: 0.4s;">
            <svg class="w-5 h-5 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
            </svg>
            <span class="font-medium">Secure password reset • Your data is protected</span>
        </div>

    </div>

</body>
</html>
