<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - HELP</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    },
                    colors: {
                        primary: { DEFAULT: '#0d9488', dark: '#0f766e' },
                        secondary: { DEFAULT: '#1e293b', dark: '#0f172a' }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-primary { background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); }
        .gradient-dark { background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%); }
    </style>
</head>
<body class="antialiased">
    <!-- Background -->
    <div class="min-h-screen gradient-dark flex items-center justify-center px-4 py-12 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
        
        <!-- Register Card -->
        <div class="max-w-md w-full relative z-10">
            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="/" class="inline-block">
                    <img src="{{ asset('logo.png') }}" alt="HELP Logo" class="h-16 mx-auto mb-4">
                </a>
                <h1 class="text-3xl font-bold text-white mb-2">Create Account</h1>
                <p class="text-white/70">Join the equity strategy platform</p>
            </div>

            <!-- Register Form -->
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8 shadow-2xl">
                @if ($errors->any())
                    <div class="mb-6 bg-red-500/10 border border-red-500/50 rounded-lg p-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-red-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="text-sm text-red-200">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-white mb-2">Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                            class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-white mb-2">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                            class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-white mb-2">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                        <p class="mt-1 text-xs text-white/60">Minimum 8 characters</p>
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-white mb-2">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                            class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    </div>

                    <!-- Terms and Privacy -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div>
                            <label class="flex items-start gap-3">
                                <input type="checkbox" name="terms" id="terms" required class="w-4 h-4 mt-1 rounded border-white/20 bg-white/10 text-primary focus:ring-primary focus:ring-offset-0">
                                <span class="text-sm text-white/80">
                                    I agree to the 
                                    <a href="{{ route('terms.show') }}" target="_blank" class="text-primary hover:text-primary-dark underline">Terms of Service</a>
                                    and 
                                    <a href="{{ route('policy.show') }}" target="_blank" class="text-primary hover:text-primary-dark underline">Privacy Policy</a>
                                </span>
                            </label>
                        </div>
                    @endif

                    <!-- Submit Button -->
                    <button type="submit" class="w-full px-6 py-3 gradient-primary text-white rounded-lg font-semibold text-base shadow-lg hover:shadow-xl transition-all hover:scale-105">
                        Create Account
                    </button>
                </form>

                <!-- Login Link -->
                <div class="mt-6 text-center">
                    <p class="text-sm text-white/70">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="text-primary hover:text-primary-dark font-semibold transition-colors">
                            Sign In
                        </a>
                    </p>
                </div>

                <!-- Back to Home -->
                <div class="mt-4 text-center">
                    <a href="/" class="text-sm text-white/60 hover:text-white transition-colors">
                        ← Back to Homepage
                    </a>
                </div>
            </div>

            <!-- Additional Info -->
            <div class="mt-6 text-center">
                <p class="text-xs text-white/50">
                    Secure registration • Your data is protected
                </p>
            </div>
        </div>
    </div>
</body>
</html>
