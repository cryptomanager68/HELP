<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribe - HELP</title>
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
    <!-- Checkout Section with Dark Background -->
    <div class="gradient-dark px-4 py-12 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
        
        <!-- Checkout Card -->
        <div class="max-w-lg w-full mx-auto relative z-10">
            <!-- Logo -->
            <div class="text-center mb-8">
                <a href="/" class="inline-block">
                    <img src="{{ asset('logo.png') }}" alt="HELP Logo" class="h-16 mx-auto mb-4">
                </a>
                <h1 class="text-3xl font-bold text-white mb-2">Subscribe to Continue</h1>
                <p class="text-white/70">Get full access to the equity strategy platform</p>
            </div>

            <!-- Subscription Card -->
            <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-2xl p-8 shadow-2xl">
                <!-- Pricing -->
                <div class="text-center mb-8">
                    <div class="text-5xl font-bold text-white mb-2">$299 <span class="text-2xl text-white/60">AUD</span></div>
                    <p class="text-white/80 text-lg">Annual Strategy Access</p>
                    <p class="text-sm text-white/60 mt-1">Includes GST • Billed annually</p>
                </div>

                <!-- Features -->
                <div class="space-y-4 mb-8">
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <p class="text-white font-medium">Full Pathway Access</p>
                            <p class="text-white/60 text-sm">Detailed guidance for Pathways A, B, and C</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <p class="text-white font-medium">Strategy Frameworks</p>
                            <p class="text-white/60 text-sm">Complete implementation frameworks</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <p class="text-white font-medium">Direct Team Contact</p>
                            <p class="text-white/60 text-sm">Communicate directly with strategy team</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg class="w-6 h-6 text-primary flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <p class="text-white font-medium">12 Months Access</p>
                            <p class="text-white/60 text-sm">Full year of platform access</p>
                        </div>
                    </div>
                </div>

                <!-- Checkout Form -->
                <form action="{{ route('subscription.checkout.process') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    @guest
                        <div>
                            <label for="name" class="block text-sm font-medium text-white mb-2">Full Name</label>
                            <input type="text" name="name" id="name" required 
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-2">Email Address</label>
                            <input type="email" name="email" id="email" required 
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                        </div>
                    @else
                        <div class="bg-white/5 rounded-lg p-4 border border-white/10">
                            <p class="text-white/80 text-sm mb-1">Subscribing as:</p>
                            <p class="text-white font-medium">{{ auth()->user()->name }}</p>
                            <p class="text-white/60 text-sm">{{ auth()->user()->email }}</p>
                        </div>
                    @endguest

                    <button type="submit" class="w-full px-6 py-4 gradient-primary text-white rounded-lg font-bold text-lg shadow-lg hover:shadow-xl transition-all hover:scale-105">
                        Proceed to Payment
                    </button>
                </form>

                <p class="text-xs text-white/50 text-center mt-6">
                    Secure payment via Stripe • Cancel anytime
                </p>

                <!-- Back Links -->
                <div class="mt-6 flex items-center justify-center gap-4 text-sm">
                    <a href="/" class="text-white/60 hover:text-white transition-colors">
                        ← Back to Homepage
                    </a>
                    @auth
                        <span class="text-white/30">•</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-white/60 hover:text-white transition-colors">
                                Sign Out
                            </button>
                        </form>
                    @endauth
                </div>
            </div>

            <!-- Security Notice -->
            <div class="mt-6 text-center">
                <p class="text-xs text-white/50">
                    🔒 Secure checkout • Your payment information is encrypted
                </p>
            </div>
        </div>
    </div>

    <!-- Portfolio Metrics Section -->
    <div class="py-20 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-slate-900 mb-4">What You'll Get Access To</h2>
                <p class="text-xl text-slate-600">Comprehensive portfolio analysis and strategic insights</p>
            </div>
            
            @include('subscription.partials.portfolio-metrics')
        </div>
    </div>
</body>
</html>
