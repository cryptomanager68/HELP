<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Subscribe - HELP v{{ time() }}</title>
    <script>
        // Prevent 419 errors by refreshing page if it's been idle too long
        let lastActivity = Date.now();
        const MAX_IDLE_TIME = 30 * 60 * 1000; // 30 minutes
        
        // Update last activity on any user interaction
        ['mousedown', 'keydown', 'scroll', 'touchstart'].forEach(event => {
            document.addEventListener(event, () => {
                lastActivity = Date.now();
            });
        });
        
        // Check if page has been idle too long
        setInterval(() => {
            if (Date.now() - lastActivity > MAX_IDLE_TIME) {
                // Page has been idle, refresh to get new token
                window.location.reload();
            }
        }, 60000); // Check every minute
    </script>
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
                    <div class="text-5xl font-bold text-white mb-2">$229 <span class="text-2xl text-white/60">AUD</span></div>
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
                <form action="{{ route('subscription.checkout.process') }}" method="POST" class="space-y-6" id="checkoutForm">
                    @csrf
                    
                    @if($errors->any())
                        <div class="bg-red-500/10 border border-red-500/20 rounded-lg p-4">
                            <p class="text-red-400 text-sm">{{ $errors->first() }}</p>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="bg-red-500/10 border border-red-500/20 rounded-lg p-4">
                            <p class="text-red-400 text-sm">{{ session('error') }}</p>
                        </div>
                    @endif
                    
                    @if(session('info'))
                        <div class="bg-blue-500/10 border border-blue-500/20 rounded-lg p-4">
                            <p class="text-blue-400 text-sm">{{ session('info') }}</p>
                        </div>
                    @endif
                    
                    @guest
                        <div>
                            <label for="name" class="block text-sm font-medium text-white mb-2">Full Name</label>
                            <input type="text" name="name" id="name" required value="{{ old('name') }}"
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-white mb-2">Email Address</label>
                            <input type="email" name="email" id="email" required value="{{ old('email') }}"
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                        </div>
                    @else
                        <div class="bg-white/5 rounded-lg p-4 border border-white/10">
                            <p class="text-white/80 text-sm mb-1">Subscribing as:</p>
                            <p class="text-white font-medium">{{ auth()->user()->name }}</p>
                            <p class="text-white/60 text-sm">{{ auth()->user()->email }}</p>
                            <a href="{{ route('subscription.checkout', ['logout' => 1]) }}" class="text-primary hover:text-primary-dark text-sm mt-2 inline-block">
                                Use a different email →
                            </a>
                        </div>
                    @endguest

                    <button type="submit" id="submitBtn" class="w-full px-6 py-4 gradient-primary text-white rounded-lg font-bold text-lg shadow-lg hover:shadow-xl transition-all hover:scale-105">
                        <span id="btnText">Proceed to Payment</span>
                        <span id="btnLoading" class="hidden">Processing...</span>
                    </button>
                </form>

                <script>
                    // Prevent double submission and handle session expiry
                    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
                        const btn = document.getElementById('submitBtn');
                        const btnText = document.getElementById('btnText');
                        const btnLoading = document.getElementById('btnLoading');
                        
                        // Disable button and show loading
                        btn.disabled = true;
                        btnText.classList.add('hidden');
                        btnLoading.classList.remove('hidden');
                        
                        // Re-enable after 10 seconds in case of error
                        setTimeout(function() {
                            btn.disabled = false;
                            btnText.classList.remove('hidden');
                            btnLoading.classList.add('hidden');
                        }, 10000);
                    });
                </script>
                            const doc = parser.parseFromString(html, 'text/html');
                            const newToken = doc.querySelector('input[name="_token"]');
                            if (newToken) {
                                document.querySelector('input[name="_token"]').value = newToken.value;
                            }
                        }).catch(err => console.log('Token refresh failed:', err));
                    }, 300000); // 5 minutes
                    
                    // Prevent back button after logout
                    (function() {
                        if (window.history && window.history.pushState) {
                            window.history.pushState('forward', null, window.location.href);
                            window.addEventListener('popstate', function() {
                                window.history.pushState('forward', null, window.location.href);
                            });
                        }
                    })();
                </script>

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
    <div class="py-20 px-4 bg-gradient-to-br from-slate-50 via-white to-blue-50 relative overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-primary/10 to-accent/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gradient-to-br from-cyan-500/5 to-teal-500/5 rounded-full blur-3xl"></div>
        </div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-16">
                <!-- Premium Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-primary/10 to-accent/10 backdrop-blur-sm border border-primary/20 rounded-full mb-6 animate-fadeInUp">
                    <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span class="text-sm font-semibold text-primary">PREMIUM FEATURES</span>
                </div>
                
                <!-- Main Heading - Brilliant Gradients -->
                <div class="mb-8">
                    <h2 class="text-4xl md:text-5xl lg:text-6xl font-black tracking-tight" style="line-height: 1.2;">
                        <div class="mb-4" style="background: linear-gradient(135deg, #9333ea 0%, #ec4899 50%, #ef4444 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; padding: 0.2em 0;">
                            What You'll Get
                        </div>
                        <div style="background: linear-gradient(135deg, #0ea5e9 0%, #06b6d4 50%, #14b8a6 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; padding: 0.2em 0;">
                            Full Access To
                        </div>
                    </h2>
                </div>
                
                <p class="text-lg md:text-xl text-slate-600 max-w-2xl mx-auto animate-fadeInUp" style="animation-delay: 0.2s;">
                    Comprehensive portfolio analysis and strategic insights
                </p>
                
                <!-- Decorative Line -->
                <div class="flex items-center justify-center gap-3 mt-6 animate-fadeInUp" style="animation-delay: 0.3s;">
                    <div class="h-px w-12 bg-gradient-to-r from-transparent to-primary"></div>
                    <div class="w-2 h-2 rounded-full bg-primary animate-pulse"></div>
                    <div class="h-px w-12 bg-gradient-to-l from-transparent to-primary"></div>
                </div>
            </div>
            
            @include('subscription.partials.portfolio-metrics')
        </div>
    </div>
    
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }
        
        /* Prevent gradient text clipping - critical fix */
        h2 span {
            overflow: visible !important;
            padding-bottom: 0.2em !important;
            line-height: 1.4 !important;
        }
    </style>
</body>
</html>
