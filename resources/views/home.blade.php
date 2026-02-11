<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Equity Strategy Platform - Australia</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
                    colors: {
                        brand: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            900: '#14532d'
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .gradient-bg { background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); }
        .glass-card { background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
    </style>
</head>
<body class="antialiased bg-white">

    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <div class="flex items-center">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
                </div>
                @auth
                    <a href="{{ route('dashboard') }}" class="px-6 py-2.5 bg-brand-600 text-white rounded-lg font-semibold text-sm hover:bg-brand-700 transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="px-6 py-2.5 bg-gray-900 text-white rounded-lg font-semibold text-sm hover:bg-gray-800 transition-colors">
                        Sign In
                    </a>
                @endauth
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('3.jpg') }}" alt="Property" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 gradient-bg opacity-95"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10 text-center py-20">
            <div class="max-w-4xl mx-auto space-y-8">
                <h1 class="text-5xl md:text-7xl font-bold text-white leading-tight">
                    Strategic Home Equity<br><span class="text-brand-500">Access Platform</span>
                </h1>
                
                <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Independent, strategy-led pathways for Australian property owners seeking structured equity participation opportunities.
                </p>

                <!-- Video Player -->
                <div class="max-w-3xl mx-auto my-12">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <video id="mainVideo" class="w-full" controls poster="{{ asset('3.jpg') }}">
                            <source src="{{ asset('1.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>

                <!-- CTA -->
                <div class="glass-card max-w-2xl mx-auto p-8 rounded-2xl">
                    <div class="space-y-6">
                        <div class="text-center">
                            <p class="text-gray-300 text-lg mb-2">Annual Strategy Access</p>
                            <div class="text-5xl font-bold text-white mb-1">$299 <span class="text-2xl text-gray-400">AUD</span></div>
                            <p class="text-sm text-gray-400">Includes GST • Annual billing</p>
                        </div>
                        
                        <form action="{{ route('subscription.checkout') }}" method="POST" class="space-y-4">
                            @csrf
                            @guest
                                <input type="text" name="name" placeholder="Full Name" required 
                                    class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-500">
                                <input type="email" name="email" placeholder="Email Address" required 
                                    class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            @endguest
                            
                            <button type="submit" class="w-full px-8 py-4 bg-brand-600 text-white rounded-xl font-bold text-lg shadow-2xl hover:bg-brand-700 transition-all hover:scale-105">
                                Unlock Strategy Access
                            </button>
                        </form>
                        
                        <p class="text-xs text-gray-400 text-center">
                            Secure payment via Stripe • Cancel anytime
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Equity Pathways Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Three Strategic Pathways</h2>
                <p class="text-xl text-gray-600">Choose the approach that aligns with your equity position</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Pathway A -->
                <div class="bg-white rounded-2xl p-8 shadow-xl border-2 border-brand-500">
                    <div class="w-16 h-16 bg-brand-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-3xl">🏠</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Pathway A</h3>
                    <p class="text-lg font-semibold text-brand-600 mb-4">Direct Equity Strategy</p>
                    <p class="text-gray-600 leading-relaxed">
                        For property owners with sufficient home equity. Access structured strategies and participation frameworks.
                    </p>
                </div>

                <!-- Pathway B -->
                <div class="bg-white rounded-2xl p-8 shadow-xl border-2 border-blue-500">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-3xl">🤝</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Pathway B</h3>
                    <p class="text-lg font-semibold text-blue-600 mb-4">Syndicate Participation</p>
                    <p class="text-gray-600 leading-relaxed">
                        For those without sufficient individual equity. Join collective opportunities with other participants.
                    </p>
                </div>

                <!-- Pathway C -->
                <div class="bg-white rounded-2xl p-8 shadow-xl border-2 border-purple-500">
                    <div class="w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6">
                        <span class="text-3xl">📊</span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Pathway C</h3>
                    <p class="text-lg font-semibold text-purple-600 mb-4">Strategic Association</p>
                    <p class="text-gray-600 leading-relaxed">
                        Optional for all users. Benefit from scale, leverage, and shared risk across multiple projects.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Value Proposition -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">What You Get</h2>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start gap-4 p-6 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-brand-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">✓</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Strategy Framework Access</h3>
                            <p class="text-gray-600">Comprehensive equity participation frameworks and structures</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-6 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-brand-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">✓</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Pathway Guidance</h3>
                            <p class="text-gray-600">Clear direction on which pathway suits your situation</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-6 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-brand-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">✓</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Member Dashboard</h3>
                            <p class="text-gray-600">Secure access to resources and communication channels</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-6 bg-gray-50 rounded-xl">
                        <div class="w-12 h-12 bg-brand-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <span class="text-2xl">✓</span>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 mb-2">Direct Contact Access</h3>
                            <p class="text-gray-600">Communicate directly with the strategy team</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Disclaimer -->
    <section class="py-16 bg-gray-900 text-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 mb-6">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                    </svg>
                    <h3 class="text-xl font-bold uppercase tracking-wider">Important Notice</h3>
                </div>
                
                <div class="space-y-4 text-gray-300">
                    <p class="text-lg">
                        This platform provides strategy frameworks and participation pathways only. <strong class="text-white">No financial, investment, lending, or credit advice is provided.</strong>
                    </p>
                    <p>
                        All participation is subject to independent professional advice and third-party financier approval. This is a paid strategy access platform operating independently.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 bg-gray-950 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center justify-center gap-6">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-10 opacity-70">
                <p class="text-sm text-gray-500">
                    © 2026 Home Equity Strategy Platform. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

</body>
</html>
