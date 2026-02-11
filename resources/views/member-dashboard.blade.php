<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard - Strategy Access</title>
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
                    },
                    colors: {
                        primary: { DEFAULT: '#0d9488', dark: '#0f766e', light: '#14b8a6' },
                        secondary: { DEFAULT: '#1e293b', dark: '#0f172a' },
                        accent: { DEFAULT: '#06b6d4', purple: '#8b5cf6', orange: '#f97316' }
                    }
                }
            }
        }
    </script>
    <style>
        /* Premium Animations */
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideInLeft { from { opacity: 0; transform: translateX(-30px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        @keyframes shimmer { 0% { transform: translateX(-100%); } 100% { transform: translateX(100%); } }
        @keyframes pulseGlow { 0%, 100% { box-shadow: 0 0 20px rgba(13,148,136,0.3); } 50% { box-shadow: 0 0 40px rgba(13,148,136,0.6); } }
        @keyframes gradientShift { 0%, 100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
        @keyframes sparkle { 0%, 100% { opacity: 0; transform: scale(0); } 50% { opacity: 1; transform: scale(1); } }
        @keyframes shine { 0% { background-position: -200% center; } 100% { background-position: 200% center; } }
        @keyframes glowPulse {
            0%, 100% { text-shadow: 0 0 20px rgba(6,182,212,0.4), 0 0 40px rgba(6,182,212,0.2); }
            50% { text-shadow: 0 0 30px rgba(6,182,212,0.6), 0 0 60px rgba(6,182,212,0.4); }
        }
        @keyframes borderGlow {
            0%, 100% { border-color: rgba(13,148,136,0.3); box-shadow: 0 0 20px rgba(13,148,136,0.1); }
            50% { border-color: rgba(13,148,136,0.6); box-shadow: 0 0 40px rgba(13,148,136,0.3); }
        }
        
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-slideInLeft { animation: slideInLeft 0.8s ease-out forwards; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-shimmer { animation: shimmer 2s infinite; }
        .animate-pulseGlow { animation: pulseGlow 2s ease-in-out infinite; }
        .animate-gradientShift { animation: gradientShift 3s ease infinite; background-size: 200% 200%; }
        .animate-shine { animation: shine 3s linear infinite; }
        .animate-glowPulse { animation: glowPulse 2s ease-in-out infinite; }
        .animate-borderGlow { animation: borderGlow 2s ease-in-out infinite; }
        
        /* Glassmorphism */
        .glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .glass-dark {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Gradient Text */
        .gradient-text {
            background: linear-gradient(135deg, #0d9488 0%, #06b6d4 50%, #8b5cf6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            background-size: 200% 200%;
        }
        
        /* Modern Card Hover Effects */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        
        /* Background Patterns */
        .bg-pattern-dots {
            background-image: radial-gradient(circle, rgba(13,148,136,0.08) 1px, transparent 1px);
            background-size: 24px 24px;
        }
        
        .bg-mesh-gradient {
            background: 
                radial-gradient(at 0% 0%, rgba(13,148,136,0.15) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(6,182,212,0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(139,92,246,0.15) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(249,115,22,0.15) 0px, transparent 50%);
        }
        
        /* Smooth Scroll */
        html { scroll-behavior: smooth; }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 10px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #0d9488; border-radius: 5px; }
        ::-webkit-scrollbar-thumb:hover { background: #0f766e; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-teal-50 font-sans antialiased bg-pattern-dots">

    <!-- Ultra-Modern Header -->
    <header class="glass sticky top-0 z-50 border-b border-white/20 shadow-lg">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between py-5">
                <div class="flex items-center gap-10">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-11 animate-float">
                    <nav class="hidden md:flex items-center gap-8">
                        <a href="#overview" class="text-sm font-semibold font-heading text-slate-700 hover:text-primary transition-all duration-300 hover:scale-105">Overview</a>
                        <a href="#pathways" class="text-sm font-semibold font-heading text-slate-700 hover:text-primary transition-all duration-300 hover:scale-105">Pathways</a>
                        <a href="#contact" class="text-sm font-semibold font-heading text-slate-700 hover:text-primary transition-all duration-300 hover:scale-105">Contact</a>
                    </nav>
                </div>
                <div class="flex items-center gap-5">
                    <div class="hidden sm:flex items-center gap-3 px-4 py-2 bg-gradient-to-r from-teal-50 to-cyan-50 rounded-full border border-teal-200/50">
                        <div class="w-2 h-2 bg-green-500 rounded-full animate-pulseGlow"></div>
                        <span class="text-sm font-semibold font-heading text-slate-700">{{ Auth::user()->name }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm font-semibold font-heading text-slate-600 hover:text-red-600 transition-all duration-300 px-4 py-2 rounded-lg hover:bg-red-50">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 lg:px-8 py-16">
        
        <!-- Ultra-Modern Welcome Hero Section -->
        <section id="overview" class="mb-20 animate-fadeInUp">
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-teal-600 via-cyan-600 to-blue-600 p-1 animate-gradientShift">
                <div class="relative bg-gradient-to-br from-teal-500/95 via-cyan-500/95 to-blue-500/95 rounded-3xl p-10 md:p-16 overflow-hidden bg-mesh-gradient">
                    <!-- Animated Background Elements -->
                    <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full blur-3xl animate-float"></div>
                    <div class="absolute bottom-0 left-0 w-80 h-80 bg-cyan-300/20 rounded-full blur-3xl" style="animation: float 4s ease-in-out infinite;"></div>
                    
                    <div class="relative z-10">
                        <!-- Premium Badge -->
                        <div class="inline-flex items-center gap-2 mb-6 px-5 py-2.5 bg-white/20 backdrop-blur-xl rounded-full border border-white/30 animate-borderGlow">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-bold font-heading text-white text-sm tracking-wide">ACTIVE MEMBERSHIP</span>
                        </div>
                        
                        <!-- Hero Title -->
                        <h1 class="text-5xl md:text-7xl font-black font-display text-white mb-6 leading-tight tracking-tight animate-glowPulse">
                            Welcome to Your<br>
                            <span class="bg-gradient-to-r from-white via-cyan-100 to-white bg-clip-text text-transparent animate-shine" style="background-size: 200% auto;">
                                Strategy Dashboard
                            </span>
                        </h1>
                        
                        <!-- Subtitle -->
                        <p class="text-xl md:text-2xl text-white/90 font-medium font-heading mb-8 max-w-3xl leading-relaxed">
                            You now have <span class="font-bold text-white border-b-2 border-white/50">full access</span> to equity participation frameworks and direct communication channels with our strategy team.
                        </p>
                        
                        <!-- Feature Pills -->
                        <div class="flex flex-wrap gap-3">
                            <div class="px-5 py-3 bg-white/15 backdrop-blur-xl rounded-xl border border-white/20 hover:bg-white/25 transition-all duration-300 card-hover">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                    <span class="font-semibold font-heading text-white text-sm">Instant Access</span>
                                </div>
                            </div>
                            <div class="px-5 py-3 bg-white/15 backdrop-blur-xl rounded-xl border border-white/20 hover:bg-white/25 transition-all duration-300 card-hover">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    <span class="font-semibold font-heading text-white text-sm">Secure Platform</span>
                                </div>
                            </div>
                            <div class="px-5 py-3 bg-white/15 backdrop-blur-xl rounded-xl border border-white/20 hover:bg-white/25 transition-all duration-300 card-hover">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                                    </svg>
                                    <span class="font-semibold font-heading text-white text-sm">Direct Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ultra-Modern Equity Pathways -->
        <section id="pathways" class="mb-20 animate-fadeInUp" style="animation-delay: 0.2s;">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-teal-100 to-cyan-100 rounded-full mb-4 border border-teal-200">
                    <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                    </svg>
                    <span class="text-sm font-bold font-heading text-teal-700 tracking-wide">CHOOSE YOUR PATH</span>
                </div>
                <h2 class="text-5xl md:text-6xl font-black font-display gradient-text mb-4 tracking-tight">
                    Your Equity Pathways
                </h2>
                <p class="text-lg text-slate-600 font-medium max-w-2xl mx-auto">
                    Select the strategy that aligns with your equity position and investment goals
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Pathway A - Premium Card -->
                <div class="group relative card-hover">
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-400 to-cyan-500 rounded-2xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
                    <div class="relative glass rounded-2xl p-8 border-2 border-teal-200 hover:border-teal-400 transition-all duration-500 h-full">
                        <!-- Icon Badge -->
                        <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="text-4xl">🏠</span>
                        </div>
                        
                        <!-- Pathway Label -->
                        <div class="flex items-center gap-3 mb-3">
                            <h3 class="text-2xl font-black font-display text-slate-900">Pathway A</h3>
                            <span class="px-3 py-1 bg-teal-100 text-teal-700 text-xs font-bold font-heading rounded-full">DIRECT</span>
                        </div>
                        
                        <p class="text-base font-bold font-heading text-teal-600 mb-4">Direct Equity Strategy</p>
                        
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed">
                            For property owners with sufficient home equity. Access structured strategies, participation frameworks, and direct implementation guidance.
                        </p>
                        
                        <!-- Info Box -->
                        <div class="bg-gradient-to-br from-teal-50 to-cyan-50 rounded-xl p-5 border border-teal-100">
                            <p class="font-bold font-heading text-slate-800 mb-3 text-sm">Suitable if you have:</p>
                            <ul class="space-y-2 text-xs text-slate-700">
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Significant home equity position</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Clear property ownership</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-teal-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Independent professional advisors</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Pathway B - Premium Card -->
                <div class="group relative card-hover">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
                    <div class="relative glass rounded-2xl p-8 border-2 border-blue-200 hover:border-blue-400 transition-all duration-500 h-full">
                        <!-- Icon Badge -->
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="text-4xl">🤝</span>
                        </div>
                        
                        <!-- Pathway Label -->
                        <div class="flex items-center gap-3 mb-3">
                            <h3 class="text-2xl font-black font-display text-slate-900">Pathway B</h3>
                            <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-bold font-heading rounded-full">SYNDICATE</span>
                        </div>
                        
                        <p class="text-base font-bold font-heading text-blue-600 mb-4">Syndicate Participation</p>
                        
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed">
                            For those without sufficient individual equity. Join collective opportunities with other participants to access larger projects.
                        </p>
                        
                        <!-- Info Box -->
                        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 border border-blue-100">
                            <p class="font-bold font-heading text-slate-800 mb-3 text-sm">Suitable if you have:</p>
                            <ul class="space-y-2 text-xs text-slate-700">
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Limited individual equity</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Interest in collective participation</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Willingness to share project outcomes</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Pathway C - Premium Card -->
                <div class="group relative card-hover md:col-span-2 lg:col-span-1">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl blur-xl opacity-20 group-hover:opacity-40 transition-opacity duration-500"></div>
                    <div class="relative glass rounded-2xl p-8 border-2 border-purple-200 hover:border-purple-400 transition-all duration-500 h-full">
                        <!-- Icon Badge -->
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg group-hover:scale-110 transition-transform duration-500">
                            <span class="text-4xl">📊</span>
                        </div>
                        
                        <!-- Pathway Label -->
                        <div class="flex items-center gap-3 mb-3">
                            <h3 class="text-2xl font-black font-display text-slate-900">Pathway C</h3>
                            <span class="px-3 py-1 bg-purple-100 text-purple-700 text-xs font-bold font-heading rounded-full">STRATEGIC</span>
                        </div>
                        
                        <p class="text-base font-bold font-heading text-purple-600 mb-4">Strategic Association</p>
                        
                        <p class="text-slate-600 text-sm mb-6 leading-relaxed">
                            Optional for all users. Benefit from scale, leverage, and shared risk across multiple projects and participants.
                        </p>
                        
                        <!-- Info Box -->
                        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl p-5 border border-purple-100">
                            <p class="font-bold font-heading text-slate-800 mb-3 text-sm">Benefits include:</p>
                            <ul class="space-y-2 text-xs text-slate-700">
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-purple-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Enhanced leverage opportunities</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-purple-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Risk distribution across projects</span>
                                </li>
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-purple-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Access to larger opportunities</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ultra-Modern Strategy Framework -->
        <section class="mb-20 animate-fadeInUp" style="animation-delay: 0.4s;">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-orange-100 to-amber-100 rounded-full mb-4 border border-orange-200">
                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <span class="text-sm font-bold font-heading text-orange-700 tracking-wide">FRAMEWORK</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black font-display gradient-text mb-4 tracking-tight">
                    Strategy Framework Overview
                </h2>
            </div>
            
            <div class="grid md:grid-cols-2 gap-6">
                <!-- Framework Card 1 -->
                <div class="group relative card-hover">
                    <div class="absolute inset-0 bg-gradient-to-br from-teal-400 to-cyan-500 rounded-2xl blur-lg opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                    <div class="relative glass rounded-2xl p-8 border-l-4 border-teal-500 h-full">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black font-display text-slate-900 mb-3 text-xl">Independent Assessment Required</h3>
                                <p class="text-slate-600 text-sm leading-relaxed">
                                    All participation requires independent professional advice from accountants and lawyers. Third-party financier approval is mandatory before any equity commitment.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Framework Card 2 -->
                <div class="group relative card-hover">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-indigo-500 rounded-2xl blur-lg opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                    <div class="relative glass rounded-2xl p-8 border-l-4 border-blue-500 h-full">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black font-display text-slate-900 mb-3 text-xl">Voluntary Participation</h3>
                                <p class="text-slate-600 text-sm leading-relaxed">
                                    Every decision is made at your request and by your own volition. This platform provides frameworks and pathways, not recommendations or advice.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Framework Card 3 -->
                <div class="group relative card-hover md:col-span-2">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl blur-lg opacity-0 group-hover:opacity-20 transition-opacity duration-500"></div>
                    <div class="relative glass rounded-2xl p-8 border-l-4 border-purple-500 h-full">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-black font-display text-slate-900 mb-3 text-xl">Project-Specific Opportunities</h3>
                                <p class="text-slate-600 text-sm leading-relaxed">
                                    Each opportunity stands alone. Participation in one project does not obligate or guarantee participation in others. Every project is independently assessed and approved.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ultra-Modern Contact Section -->
        <section id="contact" class="mb-20 animate-fadeInUp" style="animation-delay: 0.6s;">
            <div class="relative overflow-hidden rounded-3xl">
                <!-- Gradient Border Effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-slate-800 via-slate-900 to-slate-800 rounded-3xl animate-gradientShift"></div>
                
                <div class="relative m-[2px] bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 rounded-3xl p-10 md:p-14 overflow-hidden">
                    <!-- Animated Background Elements -->
                    <div class="absolute top-0 right-0 w-96 h-96 bg-teal-500/10 rounded-full blur-3xl animate-float"></div>
                    <div class="absolute bottom-0 left-0 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl" style="animation: float 4s ease-in-out infinite;"></div>
                    
                    <div class="relative z-10">
                        <!-- Section Header -->
                        <div class="mb-8">
                            <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-xl rounded-full mb-4 border border-white/20">
                                <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                <span class="text-sm font-bold font-heading text-white tracking-wide">DIRECT ACCESS</span>
                            </div>
                            <h2 class="text-4xl md:text-5xl font-black font-display text-white mb-4 tracking-tight">
                                Contact Strategy Team
                            </h2>
                            <p class="text-lg text-slate-300 font-medium max-w-2xl">
                                As a paid member, you now have <span class="text-teal-400 font-bold">direct access</span> to communicate with the strategy team. Use the form below to initiate contact.
                            </p>
                        </div>
                        
                        @if(session('success'))
                            <div class="mb-8 glass-dark rounded-2xl p-6 border border-green-500/30 animate-fadeInUp">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-green-100 font-semibold">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif
                        
                        <form action="{{ route('member.contact.submit') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label class="block text-sm font-bold font-heading text-white mb-3">Subject</label>
                                <input type="text" name="subject" required 
                                    class="w-full px-5 py-4 rounded-xl glass-dark text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500 transition-all duration-300 font-medium"
                                    placeholder="What would you like to discuss?">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold font-heading text-white mb-3">Message</label>
                                <textarea name="message" rows="6" required 
                                    class="w-full px-5 py-4 rounded-xl glass-dark text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500 transition-all duration-300 font-medium resize-none"
                                    placeholder="Share your thoughts, questions, or requirements..."></textarea>
                            </div>
                            
                            <button type="submit" class="group relative px-8 py-4 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-xl font-bold font-heading text-lg shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 overflow-hidden">
                                <span class="relative z-10 flex items-center gap-2">
                                    Send Message
                                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </span>
                                <div class="absolute inset-0 bg-gradient-to-r from-cyan-600 to-teal-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ultra-Modern Coming Soon Section -->
        <section class="mb-20 animate-fadeInUp" style="animation-delay: 0.8s;">
            <div class="relative overflow-hidden rounded-3xl glass p-10 md:p-14 border border-slate-200">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-pattern-dots opacity-50"></div>
                
                <div class="relative z-10 text-center">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-amber-100 to-orange-100 rounded-full mb-6 border border-amber-200">
                        <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span class="text-sm font-bold font-heading text-amber-700 tracking-wide">COMING SOON</span>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl font-black font-display gradient-text mb-4 tracking-tight">
                        Future Enhancements
                    </h2>
                    <p class="text-lg text-slate-600 font-medium mb-10 max-w-2xl mx-auto">
                        Additional features currently in development to enhance your experience
                    </p>
                    
                    <div class="flex flex-wrap justify-center gap-4">
                        <div class="group card-hover">
                            <div class="px-6 py-4 glass rounded-xl border border-slate-200 shadow-lg">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-bold font-heading text-slate-800">Loyalty Points System</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="group card-hover">
                            <div class="px-6 py-4 glass rounded-xl border border-slate-200 shadow-lg">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-bold font-heading text-slate-800">Syndicate-Specific Portals</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="group card-hover">
                            <div class="px-6 py-4 glass rounded-xl border border-slate-200 shadow-lg">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                    </div>
                                    <span class="font-bold font-heading text-slate-800">Enhanced Analytics</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- Ultra-Modern Footer -->
    <footer class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 text-white py-12 overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-pattern-dots opacity-10"></div>
        
        <div class="container mx-auto px-4 lg:px-8 relative z-10">
            <div class="text-center">
                <div class="mb-6">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12 mx-auto opacity-80 hover:opacity-100 transition-opacity duration-300">
                </div>
                <p class="text-sm text-slate-400 font-medium">
                    © 2026 Home Equity Strategy Platform. All rights reserved.
                </p>
                <div class="mt-6 flex justify-center gap-6">
                    <a href="#" class="text-slate-400 hover:text-teal-400 transition-colors duration-300 text-sm font-semibold">Privacy Policy</a>
                    <span class="text-slate-600">•</span>
                    <a href="#" class="text-slate-400 hover:text-teal-400 transition-colors duration-300 text-sm font-semibold">Terms of Service</a>
                    <span class="text-slate-600">•</span>
                    <a href="#" class="text-slate-400 hover:text-teal-400 transition-colors duration-300 text-sm font-semibold">Contact</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
