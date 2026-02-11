<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeowners Equity & Liquidity Plan - HELP</title>
    {{-- Premium Modern Fonts from Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&family=Sora:wght@400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
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
                        primary: { DEFAULT: '#0d9488', dark: '#0f766e' },
                        secondary: { DEFAULT: '#1e293b', dark: '#0f172a' },
                        accent: '#06b6d4'
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideInLeft { from { opacity: 0; transform: translateX(-30px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        @keyframes shimmer { 0% { transform: translateX(-100%); } 100% { transform: translateX(100%); } }
        @keyframes pulseGlow { 0%, 100% { box-shadow: 0 0 20px rgba(13,148,136,0.5); } 50% { box-shadow: 0 0 40px rgba(13,148,136,0.8); } }
        @keyframes gradientShift { 0%, 100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
        @keyframes sparkle { 0%, 100% { opacity: 0; transform: scale(0); } 50% { opacity: 1; transform: scale(1); } }
        @keyframes slideDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Stunning Text Animations */
        @keyframes shine {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }
        
        @keyframes textReveal {
            0% { 
                opacity: 0;
                transform: translateY(100%) rotateX(-90deg);
                filter: blur(10px);
            }
            100% { 
                opacity: 1;
                transform: translateY(0) rotateX(0deg);
                filter: blur(0);
            }
        }
        
        @keyframes wave {
            0%, 100% { transform: translateY(0) scale(1); }
            25% { transform: translateY(-15px) scale(1.05); }
            50% { transform: translateY(0) scale(1); }
            75% { transform: translateY(-8px) scale(1.02); }
        }
        
        @keyframes glowPulse {
            0%, 100% { 
                text-shadow: 
                    0 0 10px rgba(255,255,255,0.5),
                    0 0 20px rgba(6,182,212,0.4),
                    0 0 30px rgba(6,182,212,0.3),
                    0 0 40px rgba(6,182,212,0.2);
            }
            50% { 
                text-shadow: 
                    0 0 20px rgba(255,255,255,0.8),
                    0 0 30px rgba(6,182,212,0.6),
                    0 0 40px rgba(6,182,212,0.5),
                    0 0 60px rgba(6,182,212,0.4),
                    0 0 80px rgba(6,182,212,0.3);
            }
        }
        
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        /* Modern Background Patterns */
        .bg-pattern-dots {
            background-image: radial-gradient(circle, rgba(13,148,136,0.1) 1px, transparent 1px);
            background-size: 30px 30px;
        }
        
        .bg-pattern-grid {
            background-image: 
                linear-gradient(rgba(13,148,136,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(13,148,136,0.05) 1px, transparent 1px);
            background-size: 50px 50px;
        }
        
        .bg-pattern-diagonal {
            background-image: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 35px,
                rgba(13,148,136,0.03) 35px,
                rgba(13,148,136,0.03) 70px
            );
        }
        
        .bg-gradient-mesh {
            background: 
                radial-gradient(at 0% 0%, rgba(13,148,136,0.2) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(6,182,212,0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(13,148,136,0.2) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(6,182,212,0.15) 0px, transparent 50%);
        }
        
        .animate-fade-in { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-slide-in { animation: slideInLeft 0.8s ease-out forwards; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-slide-down { animation: slideDown 0.6s ease-out forwards; }
        
        .gradient-primary { background: linear-gradient(135deg, #0d9488 0%, #0f766e 100%); }
        .gradient-dark { background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%); }
        .gradient-animated { 
            background: linear-gradient(270deg, #0d9488, #06b6d4, #0d9488);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }
        
        /* Stunning Title Effect */
        .stunning-title {
            perspective: 1000px;
            transform-style: preserve-3d;
        }
        
        .stunning-title .char {
            display: inline-block;
            opacity: 0;
            animation: textReveal 0.8s cubic-bezier(0.77, 0, 0.175, 1) forwards,
                       wave 2s ease-in-out infinite;
            transform-origin: bottom center;
        }
        
        /* Stagger animation delays for each character */
        .stunning-title .char:nth-child(1) { animation-delay: 0s, 1s; }
        .stunning-title .char:nth-child(2) { animation-delay: 0.05s, 1.1s; }
        .stunning-title .char:nth-child(3) { animation-delay: 0.1s, 1.2s; }
        .stunning-title .char:nth-child(4) { animation-delay: 0.15s, 1.3s; }
        .stunning-title .char:nth-child(5) { animation-delay: 0.2s, 1.4s; }
        .stunning-title .char:nth-child(6) { animation-delay: 0.25s, 1.5s; }
        .stunning-title .char:nth-child(7) { animation-delay: 0.3s, 1.6s; }
        .stunning-title .char:nth-child(8) { animation-delay: 0.35s, 1.7s; }
        .stunning-title .char:nth-child(9) { animation-delay: 0.4s, 1.8s; }
        .stunning-title .char:nth-child(10) { animation-delay: 0.45s, 1.9s; }
        .stunning-title .char:nth-child(11) { animation-delay: 0.5s, 2s; }
        .stunning-title .char:nth-child(12) { animation-delay: 0.55s, 2.1s; }
        
        /* Gradient Shine Effect for "Opportunity" */
        .opportunity-shine {
            background: linear-gradient(
                90deg,
                #fff 0%,
                #06b6d4 20%,
                #0ea5e9 40%,
                #06b6d4 60%,
                #fff 80%,
                #06b6d4 100%
            );
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: 
                shine 3s linear infinite,
                textReveal 1s cubic-bezier(0.77, 0, 0.175, 1) 0.6s forwards,
                glowPulse 3s ease-in-out infinite;
            animation-delay: 0s, 0.6s, 1.5s;
            opacity: 0;
            display: inline-block;
            position: relative;
        }
        
        .opportunity-shine::before {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #06b6d4, #0ea5e9, #06b6d4, transparent);
            box-shadow: 0 0 15px rgba(6,182,212,0.8);
            animation: shine 2s linear infinite;
        }
        
        .glass-card { 
            background: rgba(255, 255, 255, 0.05); 
            backdrop-filter: blur(12px); 
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        .glass-card-light { 
            background: rgba(255, 255, 255, 0.7); 
            backdrop-filter: blur(12px); 
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        .glass-card-dark {
            background: rgba(13, 148, 136, 0.1);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(13, 148, 136, 0.2);
        }
        
        .btn-outline-light { 
            padding: 1rem 2rem; 
            border: 2px solid rgba(255,255,255,0.2); 
            border-radius: 0.75rem; 
            color: white; 
            font-weight: 600; 
            transition: all 0.3s; 
            backdrop-filter: blur(8px);
            background: rgba(255,255,255,0.05);
            position: relative;
            overflow: hidden;
        }
        .btn-outline-light:hover { 
            background: rgba(255,255,255,0.1); 
            border-color: rgba(13,148,136,0.5); 
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(13,148,136,0.3);
        }
        .btn-outline-light::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        .btn-outline-light:hover::before {
            left: 100%;
        }
        
        .text-gradient {
            background: linear-gradient(135deg, #0d9488 0%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .glow-border {
            box-shadow: 0 0 30px rgba(13,148,136,0.3);
            transition: box-shadow 0.3s;
        }
        .glow-border:hover {
            box-shadow: 0 0 50px rgba(13,148,136,0.5);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 60px rgba(13,148,136,0.2);
        }
        
        .sparkle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: white;
            border-radius: 50%;
            animation: sparkle 2s ease-in-out infinite;
        }
        
        /* Scroll reveal */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }
        .scroll-reveal.revealed {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="antialiased">

    <!-- Header -->
    <header id="header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-secondary-dark/70 backdrop-blur-md border-b border-white/10">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-1.5">
                <!-- Logo with Modern & Unique Styling -->
                <a href="/" class="flex items-center group relative">
                    <!-- Multi-layer glow effects -->
                    <div class="absolute -inset-6 bg-gradient-to-r from-primary via-accent to-cyan-400 rounded-full opacity-0 group-hover:opacity-30 blur-3xl transition-all duration-700 animate-pulse"></div>
                    <div class="absolute -inset-4 bg-gradient-to-br from-accent/40 to-primary/40 rounded-2xl opacity-0 group-hover:opacity-100 blur-2xl transition-opacity duration-500"></div>
                    
                    <!-- Animated ring effect -->
                    <div class="absolute inset-0 rounded-full border-2 border-accent/0 group-hover:border-accent/50 scale-100 group-hover:scale-125 transition-all duration-700 ease-out"></div>
                    
                    <!-- Logo with modern effects -->
                    <div class="relative">
                        <!-- Reflection effect -->
                        <div class="absolute inset-0 bg-gradient-to-br from-white/20 to-transparent rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Main logo image -->
                        <img src="{{ asset('logo.png') }}" alt="HELP Logo" 
                            class="h-10 relative z-10 transition-all duration-500 ease-out
                                   group-hover:scale-110 
                                   drop-shadow-[0_10px_30px_rgba(13,148,136,0.3)]
                                   group-hover:drop-shadow-[0_15px_50px_rgba(13,148,136,0.6)]
                                   group-hover:brightness-110
                                   group-hover:contrast-110
                                   filter
                                   group-hover:saturate-125">
                        
                        <!-- Animated particles -->
                        <div class="absolute -top-2 -right-2 w-2 h-2 bg-accent rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping"></div>
                        <div class="absolute -bottom-2 -left-2 w-2 h-2 bg-cyan-400 rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping" style="animation-delay: 0.2s;"></div>
                        <div class="absolute top-0 -left-3 w-1.5 h-1.5 bg-primary rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping" style="animation-delay: 0.4s;"></div>
                    </div>
                    
                    <!-- Floating accent line -->
                    <div class="absolute -bottom-2 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-accent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </a>
                
                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-8">
                    <a href="#about" class="text-sm text-white/70 hover:text-accent transition-colors font-medium">About</a>
                    <a href="#services" class="text-sm text-white/70 hover:text-accent transition-colors font-medium">Services</a>
                    <a href="#syndicates" class="text-sm text-white/70 hover:text-accent transition-colors font-medium">Syndicates</a>
                    <a href="#process" class="text-sm text-white/70 hover:text-accent transition-colors font-medium">Process</a>
                    <a href="#disclaimers" class="text-sm text-white/70 hover:text-accent transition-colors font-medium">Important Info</a>
                    <a href="{{ route('login') }}" class="px-6 py-2.5 gradient-primary text-white rounded-lg font-semibold text-sm shadow-lg hover:shadow-xl transition-all hover:scale-105">
                        Member Login
                    </a>
                </nav>
                
                <!-- Mobile Login Button -->
                <div class="flex md:hidden items-center">
                    <a href="{{ route('login') }}" class="px-5 py-2.5 gradient-primary text-white rounded-lg font-semibold text-sm shadow-lg hover:shadow-xl transition-all">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('landingPage/img/hero-building.jpg') }}" alt="Property Development" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-secondary-dark/90 via-secondary-dark/80 to-primary-dark/70"></div>
        </div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-accent/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-primary/10 rounded-full blur-3xl animate-float" style="animation-delay: 1s;"></div>
        
        <!-- Content -->
        <div class="container mx-auto px-4 relative z-10 text-center pt-24 pb-16">
            <div class="max-w-5xl mx-auto space-y-8">
                <h1 class="font-display text-6xl md:text-8xl font-bold text-white leading-tight stunning-title" style="font-family: 'Playfair Display', serif;">
                    <span class="char">A</span>
                    <span class="char"> </span>
                    <span class="char">G</span>
                    <span class="char">a</span>
                    <span class="char">t</span>
                    <span class="char">e</span>
                    <span class="char">w</span>
                    <span class="char">a</span>
                    <span class="char">y</span>
                    <span class="char"> </span>
                    <span class="char">t</span>
                    <span class="char">o</span>
                    <br><span class="opportunity-shine italic">Opportunity</span>
                </h1>
                
                <p class="text-xl md:text-2xl lg:text-3xl text-white/95 max-w-4xl mx-auto leading-relaxed animate-fade-in" style="animation-delay: 0.4s; opacity: 0; font-family: 'Inter', -apple-system, sans-serif; font-weight: 400; letter-spacing: -0.01em;">
                    <span class="font-normal">Enabling property owners to participate in</span>
                    <span class="font-semibold text-white" style="font-family: 'Sora', 'Inter', sans-serif;">property development syndicates</span>
                    <span class="font-normal">&mdash; where</span>
                    <span class="relative inline-block">
                        <span class="font-semibold bg-gradient-to-r from-cyan-300 via-blue-300 to-purple-300 bg-clip-text text-transparent" style="font-family: 'Sora', 'Inter', sans-serif;">equity use</span>
                        <span class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-cyan-400/40 to-blue-400/40 blur-sm"></span>
                    </span>
                    <span class="font-normal">is independently assessed and approved.</span>
                </p>
                
                <div class="glass-card max-w-3xl mx-auto p-6 rounded-2xl animate-fade-in" style="animation-delay: 0.6s; opacity: 0;">
                    <p class="text-white/80 text-sm md:text-base italic">
                        Participation is subject to independent professional advice and third-party financier approval. No financial, investment, lending, or credit advice is provided.
                    </p>
                </div>
                
                <!-- Video Player Section -->
                <div class="max-w-4xl mx-auto mt-12 mb-8 animate-fade-in" style="animation-delay: 0.8s; opacity: 0;">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white/10">
                        <video id="mainVideo" class="w-full aspect-video" autoplay muted loop playsinline>
                            <source src="{{ asset('int.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        
                        <!-- Audio Player Bar at Bottom -->
                        <div class="absolute bottom-0 left-0 right-0 bg-black/80 backdrop-blur-sm p-3">
                            <audio id="audioPlayer" class="w-full" controls>
                                <source src="{{ asset('1.mp3') }}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                    <p class="text-center text-white/60 text-sm mt-3">Watch our introduction video</p>
                </div>

                <!-- Subscription CTA -->
                <div id="subscription-form" class="glass-card max-w-2xl mx-auto p-8 rounded-2xl animate-fade-in mt-8" style="animation-delay: 1s; opacity: 0;">
                    <div class="space-y-6">
                        <div class="text-center">
                            <p class="text-white/90 text-lg mb-2">Annual Strategy Access</p>
                            <div class="text-5xl font-bold text-white mb-1">$299 <span class="text-2xl text-white/60">AUD</span></div>
                            <p class="text-sm text-white/60">Includes GST &bull; Annual billing</p>
                        </div>
                        
                        <form action="{{ route('subscription.checkout.process') }}" method="POST" class="space-y-4">
                            @csrf
                            <input type="text" name="name" placeholder="Full Name" required 
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent transition-all">
                            <input type="email" name="email" placeholder="Email Address" required 
                                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20 text-white placeholder-white/60 focus:outline-none focus:ring-2 focus:ring-accent focus:border-accent transition-all">
                            
                            <button type="submit" class="w-full px-8 py-4 gradient-primary text-white rounded-xl font-bold text-lg shadow-2xl hover:shadow-accent/50 transition-all hover:scale-105">
                                Unlock Strategy Access
                            </button>
                        </form>
                        
                        <p class="text-xs text-white/50 text-center">
                            Secure payment via Stripe &bull; Cancel anytime
                        </p>
                    </div>
                </div>

                <!-- Original Gateway Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center pt-8 animate-fade-in" style="animation-delay: 1.2s; opacity: 0;">
                    <a href="{{ route('equity-participant-gateway') }}" class="group relative px-8 py-4 bg-white/10 backdrop-blur-md border-2 border-white/30 text-white rounded-xl font-bold text-base shadow-xl hover:bg-white/20 transition-all hover:scale-105 min-w-[280px] hover-glow hover-shine">
                        <span class="relative z-10">EQUITY PARTICIPANT GATEWAY</span>
                    </a>
                    <a href="{{ route('property-owner-gateway') }}" class="group relative px-8 py-4 bg-white/10 backdrop-blur-md border-2 border-white/30 text-white rounded-xl font-bold text-base shadow-xl hover:bg-white/20 transition-all hover:scale-105 min-w-[280px] hover-glow hover-shine">
                        <span class="relative z-10">PROPERTY OWNER GATEWAY</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Metrics Section -->
    <section class="py-20 px-4 bg-gradient-to-b from-white via-slate-50 to-white relative overflow-hidden">
        {{-- Animated Background --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-0 left-1/4 w-96 h-96 bg-gradient-to-br from-blue-400/10 to-purple-500/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-gradient-to-br from-emerald-400/10 to-teal-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            {{-- Enhanced Title Section with Ultra-Modern Typography --}}
            <div class="text-center mb-20 scroll-reveal">
                {{-- Decorative Badge Above Title --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 mb-8 bg-gradient-to-r from-emerald-500/10 via-teal-500/10 to-blue-500/10 border border-emerald-500/20 rounded-full backdrop-blur-sm">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span class="text-sm font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent uppercase tracking-widest">
                        Premium Features
                    </span>
                </div>
                
                {{-- Main Title with Sophisticated Typography --}}
                <div class="relative inline-block">
                    {{-- Background Glow Effect --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 via-purple-600/20 to-pink-600/20 blur-3xl opacity-60 animate-pulse-slow"></div>
                    
                    <h2 class="relative">
                        {{-- First Line: Clean, Bold, Professional --}}
                        <div class="mb-4">
                            <span class="block text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black text-slate-900 leading-none" style="font-family: 'Outfit', 'Inter', -apple-system, sans-serif; letter-spacing: -0.04em; font-weight: 900;">
                                What You'll Get
                            </span>
                        </div>
                        
                        {{-- Second Line: Gradient with Glow Effect --}}
                        <div class="relative inline-block">
                            {{-- Glow Layer --}}
                            <span class="absolute inset-0 text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black blur-2xl opacity-60 bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent" style="font-family: 'Outfit', 'Inter', -apple-system, sans-serif; letter-spacing: -0.04em; font-weight: 900;">
                                Access To
                            </span>
                            
                            {{-- Main Text with Animated Gradient --}}
                            <span class="relative block text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black leading-none bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-600 bg-clip-text text-transparent animate-gradient-flow" style="font-family: 'Outfit', 'Inter', -apple-system, sans-serif; letter-spacing: -0.04em; font-weight: 900; background-size: 200% auto;">
                                Access To
                            </span>
                            
                            {{-- Animated Underline with Glow --}}
                            <div class="absolute -bottom-4 left-0 right-0 h-1.5 bg-gradient-to-r from-cyan-500 via-blue-600 to-purple-600 rounded-full shadow-lg shadow-blue-500/50 animate-shimmer-slide" style="background-size: 200% auto;"></div>
                        </div>
                    </h2>
                    
                    {{-- Floating Decorative Elements --}}
                    <div class="absolute -top-8 -right-8 w-20 h-20 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl opacity-20 blur-2xl animate-float-gentle"></div>
                    <div class="absolute -bottom-8 -left-8 w-24 h-24 bg-gradient-to-br from-purple-400 to-pink-500 rounded-2xl opacity-20 blur-2xl animate-float-gentle" style="animation-delay: 1s;"></div>
                    
                    {{-- Sparkle Accents --}}
                    <svg class="absolute -top-6 right-1/4 w-6 h-6 text-yellow-400 animate-twinkle" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0L14.59 8.41L23 11L14.59 13.59L12 22L9.41 13.59L1 11L9.41 8.41L12 0Z"/>
                    </svg>
                    <svg class="absolute top-1/3 -left-8 w-4 h-4 text-blue-400 animate-twinkle" style="animation-delay: 0.5s;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0L14.59 8.41L23 11L14.59 13.59L12 22L9.41 13.59L1 11L9.41 8.41L12 0Z"/>
                    </svg>
                    <svg class="absolute -bottom-4 right-1/3 w-5 h-5 text-purple-400 animate-twinkle" style="animation-delay: 1s;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0L14.59 8.41L23 11L14.59 13.59L12 22L9.41 13.59L1 11L9.41 8.41L12 0Z"/>
                    </svg>
                </div>
                
                {{-- Subtitle with Modern Typography --}}
                <p class="mt-12 text-xl md:text-2xl lg:text-3xl text-slate-600 font-medium max-w-3xl mx-auto leading-relaxed animate-fade-in-up" style="animation-delay: 0.3s; font-family: 'Inter', -apple-system, sans-serif; font-weight: 500;">
                    Comprehensive 
                    <span class="relative inline-block mx-1">
                        <span class="relative z-10 font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent" style="font-family: 'Sora', 'Inter', sans-serif; font-weight: 700;">portfolio analysis</span>
                        <span class="absolute bottom-1 left-0 w-full h-3 bg-blue-400/20 -z-10 transform -skew-x-12"></span>
                    </span>
                    and
                    <span class="relative inline-block mx-1">
                        <span class="relative z-10 font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent" style="font-family: 'Sora', 'Inter', sans-serif; font-weight: 700;">strategic insights</span>
                        <span class="absolute bottom-1 left-0 w-full h-3 bg-purple-400/20 -z-10 transform -skew-x-12"></span>
                    </span>
                </p>
                
                {{-- Feature Tags with Modern Design --}}
                <div class="flex flex-wrap items-center justify-center gap-3 mt-10 animate-fade-in-up" style="animation-delay: 0.5s;">
                    <div class="group px-5 py-2.5 bg-white border border-slate-200 rounded-full shadow-sm hover:shadow-md hover:border-emerald-300 transition-all duration-300 cursor-default">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 animate-pulse"></div>
                            <span class="text-sm font-semibold text-slate-700 group-hover:text-emerald-600 transition-colors">Real-time Analytics</span>
                        </div>
                    </div>
                    <div class="group px-5 py-2.5 bg-white border border-slate-200 rounded-full shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-300 cursor-default">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 animate-pulse" style="animation-delay: 0.2s;"></div>
                            <span class="text-sm font-semibold text-slate-700 group-hover:text-blue-600 transition-colors">Advanced Calculations</span>
                        </div>
                    </div>
                    <div class="group px-5 py-2.5 bg-white border border-slate-200 rounded-full shadow-sm hover:shadow-md hover:border-purple-300 transition-all duration-300 cursor-default">
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 animate-pulse" style="animation-delay: 0.4s;"></div>
                            <span class="text-sm font-semibold text-slate-700 group-hover:text-purple-600 transition-colors">Professional Reports</span>
                        </div>
                    </div>
                </div>
            </div>
            
            @include('subscription.partials.portfolio-metrics')
        </div>
    </section>
    
    {{-- Enhanced Animations --}}
    <style>
        @keyframes gradient-flow {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }
        
        @keyframes shimmer-slide {
            0% {
                background-position: -200% center;
            }
            100% {
                background-position: 200% center;
            }
        }
        
        @keyframes float-gentle {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            33% {
                transform: translate(10px, -10px) rotate(3deg);
            }
            66% {
                transform: translate(-10px, 10px) rotate(-3deg);
            }
        }
        
        @keyframes twinkle {
            0%, 100% {
                opacity: 0.3;
                transform: scale(0.8) rotate(0deg);
            }
            50% {
                opacity: 1;
                transform: scale(1.2) rotate(180deg);
            }
        }
        
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pulse-slow {
            0%, 100% {
                opacity: 0.4;
            }
            50% {
                opacity: 0.8;
            }
        }
        
        .animate-gradient-flow {
            animation: gradient-flow 4s ease infinite;
        }
        
        .animate-shimmer-slide {
            animation: shimmer-slide 3s linear infinite;
        }
        
        .animate-float-gentle {
            animation: float-gentle 8s ease-in-out infinite;
        }
        
        .animate-twinkle {
            animation: twinkle 3s ease-in-out infinite;
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
            opacity: 0;
        }
        
        .animate-pulse-slow {
            animation: pulse-slow 3s ease-in-out infinite;
        }
    </style>

    <!-- About Section -->
    <section id="about" class="py-20 relative overflow-hidden bg-gradient-to-b from-slate-900/20 via-white to-white">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&q=80" alt="Modern Architecture" class="w-full h-full object-cover opacity-60">
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-white/40 to-white/40 backdrop-blur-sm"></div>
        </div>
        <div class="bg-gradient-mesh absolute inset-0 opacity-30 z-0"></div>
        <div class="bg-pattern-grid absolute inset-0 z-0"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center space-y-6">
                <h2 class="font-display text-4xl md:text-5xl font-bold text-secondary-dark">What HELP Does</h2>
                <p class="text-lg text-gray-600">
                    Homeowners Equity & Liquidity Plan operates as a property research, facilitation, and development syndication gateway.
                </p>
                
                <div class="bg-white rounded-2xl shadow-xl p-8 border-l-4 border-accent mt-8">
                    <p class="text-gray-700 mb-6">
                        We identify property development opportunities and facilitate introductions between:
                    </p>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="gradient-primary p-6 rounded-xl text-white shadow-lg hover-float hover-shine cursor-pointer">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                </svg>
                            </div>
                            <p class="font-semibold text-lg">Property owners with equity</p>
                        </div>
                        <div class="gradient-primary p-6 rounded-xl text-white shadow-lg hover-float hover-shine cursor-pointer">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-3">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                            </div>
                            <p class="font-semibold text-lg">Property owners or site holders seeking development outcomes</p>
                        </div>
                    </div>
                    <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded-lg mt-6">
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6 text-amber-600">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <p class="text-amber-900 font-medium">
                                All participation is voluntary, independently assessed, and subject to external professional advice.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Who This Service Is NOT For Section -->
    <section class="py-20 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1560179707-f14e90ef3623?w=1920&q=80" alt="Business Strategy" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-white/60 via-gray-50/60 to-white/60 backdrop-blur-sm"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="font-display text-4xl md:text-5xl font-bold text-secondary-dark mb-4">Who This Service Is Not For</h2>
                    <p class="text-xl text-gray-600">This service is for homeowners who value discretion, strategy, and experienced guidance before irreversible decisions.</p>
                </div>
                
                <div class="bg-white rounded-2xl shadow-xl p-8 border-2 border-red-200 hover-lift">
                    <div class="space-y-5">
                        <div class="flex items-start gap-5 p-6 bg-gradient-to-r from-red-50 to-pink-50 rounded-2xl border-l-4 border-red-500 hover:shadow-lg transition-shadow duration-300">
                            <div class="flex-shrink-0 w-10 h-10 bg-red-500 rounded-full flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <p class="text-gray-800 font-semibold text-lg pt-1">Those seeking quick cash or immediate solutions</p>
                        </div>
                        <div class="flex items-start gap-5 p-6 bg-gradient-to-r from-red-50 to-pink-50 rounded-2xl border-l-4 border-red-500 hover:shadow-lg transition-shadow duration-300">
                            <div class="flex-shrink-0 w-10 h-10 bg-red-500 rounded-full flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <p class="text-gray-800 font-semibold text-lg pt-1">Those expecting free advice or broker services</p>
                        </div>
                        <div class="flex items-start gap-5 p-6 bg-gradient-to-r from-red-50 to-pink-50 rounded-2xl border-l-4 border-red-500 hover:shadow-lg transition-shadow duration-300">
                            <div class="flex-shrink-0 w-10 h-10 bg-red-500 rounded-full flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <p class="text-gray-800 font-semibold text-lg pt-1">Those who have already decided to sell</p>
                        </div>
                        <div class="flex items-start gap-5 p-6 bg-gradient-to-r from-red-50 to-pink-50 rounded-2xl border-l-4 border-red-500 hover:shadow-lg transition-shadow duration-300">
                            <div class="flex-shrink-0 w-10 h-10 bg-red-500 rounded-full flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <p class="text-gray-800 font-semibold text-lg pt-1">Those unwilling to seek independent professional advice</p>
                        </div>
                    </div>
                    
                    <div class="mt-8 p-6 bg-green-50 rounded-lg border-2 border-green-500">
                        <div class="flex items-center justify-center gap-3">
                            <div class="flex-shrink-0 w-10 h-10 bg-green-500 rounded-full flex items-center justify-center shadow-md">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-green-900 font-semibold text-center">
                                This service is for homeowners who value discretion, strategy, and experienced guidance before irreversible decisions.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Equity Pathways Section - REMOVED (Now only in Member Dashboard after payment) -->
    
    <!-- Pathways Teaser Section -->
    <section class="py-20 bg-gradient-to-b from-white via-gray-50 to-white relative overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1920&q=80" alt="Financial Planning" class="w-full h-full object-cover opacity-45">
            <div class="absolute inset-0 bg-gradient-to-b from-white/65 to-gray-50/65 backdrop-blur-sm"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="font-display text-4xl md:text-5xl font-bold text-secondary-dark mb-6">Three Strategic Pathways</h2>
                <p class="text-xl text-gray-600 mb-8">
                    Access detailed guidance on three distinct equity participation strategies &mdash; each designed for different equity positions and objectives.
                </p>
                
                <div class="bg-white rounded-2xl shadow-2xl p-12 border-2 border-primary/20 hover-lift hover-shine">
                    <div class="grid md:grid-cols-3 gap-8 mb-8">
                        <div class="relative">
                            <div class="w-20 h-20 bg-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl">??</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Pathway A</h3>
                            <p class="text-gray-500 text-sm">Direct Equity Strategy</p>
                            <div class="absolute inset-0 bg-white/80 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-12 h-12 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="w-20 h-20 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl">??</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Pathway B</h3>
                            <p class="text-gray-500 text-sm">Syndicate Participation</p>
                            <div class="absolute inset-0 bg-white/80 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-12 h-12 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="w-20 h-20 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                                <span class="text-4xl">??</span>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Pathway C</h3>
                            <p class="text-gray-500 text-sm">Strategic Association</p>
                            <div class="absolute inset-0 bg-white/80 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-12 h-12 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-primary to-primary-dark rounded-xl p-8 text-white">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold">Unlock Full Pathway Details</h3>
                        </div>
                        <p class="text-white/90 mb-6 text-lg">
                            Subscribe for $299 AUD/year to access detailed pathway guidance, suitability criteria, implementation frameworks, and direct team contact.
                        </p>
                        <a href="#subscription-form" onclick="document.getElementById('subscription-form').scrollIntoView({behavior: 'smooth', block: 'center'});" class="inline-block px-8 py-4 bg-white text-primary rounded-xl font-bold text-lg hover:bg-gray-100 transition-colors shadow-lg">
                            Subscribe Now ?
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section - Modern Glassmorphism Design -->
    <section id="services" class="py-32 relative overflow-hidden bg-gradient-to-b from-white via-gray-50 to-white">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1920&q=80" alt="Modern Office" class="w-full h-full object-cover opacity-50">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-50/60 via-white/50 to-gray-50/60 backdrop-blur-sm"></div>
        </div>
        <div class="bg-pattern-diagonal absolute inset-0 z-0 opacity-40"></div>
        <!-- Decorative Background -->
        <div class="absolute top-0 left-0 w-[600px] h-[600px] bg-gradient-to-br from-accent/10 to-primary/10 rounded-full blur-3xl z-0"></div>
        <div class="absolute bottom-0 right-0 w-[600px] h-[600px] bg-gradient-to-tl from-red-500/10 to-pink-500/10 rounded-full blur-3xl z-0"></div>
        <div class="bg-gradient-mesh absolute inset-0 opacity-40 z-0"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid lg:grid-cols-2 gap-10 max-w-7xl mx-auto">
                <!-- What We DO Card -->
                <div class="group relative">
                    <!-- Glow effect on hover -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary to-accent rounded-3xl blur-xl opacity-0 group-hover:opacity-30 transition duration-500"></div>
                    
                    <div class="relative backdrop-blur-xl bg-gradient-to-br from-white/90 to-white/70 rounded-3xl overflow-hidden shadow-2xl hover:shadow-accent/20 transition-all duration-500">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-primary via-primary-dark to-accent p-8 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20"></div>
                            <div class="relative">
                                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full border border-white/30">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="text-white font-bold text-lg tracking-wide">WHAT WE DO</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-8 space-y-5">
                            <div class="group/item flex items-start gap-5 p-5 bg-gradient-to-r from-white to-primary/5 rounded-2xl shadow-lg hover:shadow-xl border border-primary/10 hover:border-primary/30 transition-all duration-300 hover:-translate-y-1">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-primary to-primary-dark rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-800 font-semibold text-lg pt-3">Research property development opportunities</p>
                            </div>
                            
                            <div class="group/item flex items-start gap-5 p-5 bg-gradient-to-r from-white to-primary/5 rounded-2xl shadow-lg hover:shadow-xl border border-primary/10 hover:border-primary/30 transition-all duration-300 hover:-translate-y-1">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-primary to-primary-dark rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-800 font-semibold text-lg pt-3">Identify sites suitable for development or refurbishment</p>
                            </div>
                            
                            <div class="group/item flex items-start gap-5 p-5 bg-gradient-to-r from-white to-primary/5 rounded-2xl shadow-lg hover:shadow-xl border border-primary/10 hover:border-primary/30 transition-all duration-300 hover:-translate-y-1">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-primary to-primary-dark rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-800 font-semibold text-lg pt-3">Facilitate syndication interest</p>
                            </div>
                            
                            <div class="group/item flex items-start gap-5 p-5 bg-gradient-to-r from-white to-primary/5 rounded-2xl shadow-lg hover:shadow-xl border border-primary/10 hover:border-primary/30 transition-all duration-300 hover:-translate-y-1">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-primary to-primary-dark rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-800 font-semibold text-lg pt-3">Coordinate project-specific participation</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- What We DON'T DO Card -->
                <div class="group relative">
                    <!-- Glow effect on hover -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-500 to-pink-500 rounded-3xl blur-xl opacity-0 group-hover:opacity-30 transition duration-500"></div>
                    
                    <div class="relative backdrop-blur-xl bg-gradient-to-br from-white/90 to-white/70 rounded-3xl overflow-hidden shadow-2xl border border-white/20 hover:shadow-red-500/20 transition-all duration-500">
                        <!-- Header -->
                        <div class="bg-gradient-to-r from-red-500 via-red-600 to-pink-500 p-8 relative overflow-hidden">
                            <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20"></div>
                            <div class="relative">
                                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-6 py-3 rounded-full ">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span class="text-white font-bold text-lg tracking-wide">WHAT WE DON'T DO</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-8 space-y-5">
                            <div class="group/item flex items-start gap-5 p-5 bg-gradient-to-r from-white to-red-50 rounded-2xl shadow-lg hover:shadow-xl border border-red-100 hover:border-red-300 transition-all duration-300 hover:-translate-y-1">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-800 font-semibold text-lg pt-3">Provide financial advice</p>
                            </div>
                            
                            <div class="group/item flex items-start gap-5 p-5 bg-gradient-to-r from-white to-red-50 rounded-2xl shadow-lg hover:shadow-xl border border-red-100 hover:border-red-300 transition-all duration-300 hover:-translate-y-1">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-800 font-semibold text-lg pt-3">Recommend strategies or structures</p>
                            </div>
                            
                            <div class="group/item flex items-start gap-5 p-5 bg-gradient-to-r from-white to-red-50 rounded-2xl shadow-lg hover:shadow-xl border border-red-100 hover:border-red-300 transition-all duration-300 hover:-translate-y-1">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-800 font-semibold text-lg pt-3">Provide lending or credit</p>
                            </div>
                            
                            <div class="group/item flex items-start gap-5 p-5 bg-gradient-to-r from-white to-red-50 rounded-2xl shadow-lg hover:shadow-xl border border-red-100 hover:border-red-300 transition-all duration-300 hover:-translate-y-1">
                                <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-lg group-hover/item:scale-110 transition-transform duration-300">
                                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-800 font-semibold text-lg pt-3">Assess personal suitability</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Strategic Buying Syndicates Section - Modern Design -->
    <section id="syndicates" class="py-32 relative overflow-hidden bg-gradient-to-b from-white via-gray-50 to-white">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=1920&q=80" alt="Luxury Property" class="w-full h-full object-cover opacity-55">
            <div class="absolute inset-0 bg-gradient-to-b from-white/50 to-gray-50/50 backdrop-blur-sm"></div>
        </div>
        <div class="bg-pattern-dots absolute inset-0 z-0"></div>
        <!-- Decorative Elements -->
        <div class="absolute top-1/4 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl z-0"></div>
        <div class="absolute bottom-1/4 left-0 w-96 h-96 bg-accent/5 rounded-full blur-3xl z-0"></div>
        <div class="bg-gradient-mesh absolute inset-0 opacity-30 z-0"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-6xl mx-auto">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <h2 class="font-display text-5xl md:text-6xl font-bold text-secondary-dark mb-6">Strategic Buying Syndicates</h2>
                    <p class="text-3xl text-primary font-semibold italic mb-6">Equity does not always need to stand alone.</p>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed">
                        Syndicates allow collective participation where individual equity is insufficient. Research-led, selectively structured opportunities only.
                    </p>
                </div>
                
                <!-- Operator-Led Statement Card -->
                <div class="group relative mb-16">
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary to-accent rounded-3xl blur-xl opacity-20 group-hover:opacity-40 transition duration-500"></div>
                    
                    <div class="relative backdrop-blur-xl bg-gradient-to-r from-primary via-primary-dark to-accent rounded-3xl p-10 md:p-12 text-white shadow-2xl border border-white/20">
                        <div class="flex flex-col md:flex-row items-start gap-8">
                            <div class="flex-shrink-0">
                                <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/30 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-11 h-11 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-3xl font-bold mb-4">Operator-Led Approach</h3>
                                <p class="text-white/95 leading-relaxed text-xl">
                                    All buying syndicates formed through this platform are <strong class="text-white">operator-led</strong>, where opportunities are identified, researched, and pursued directly by us, with aligned participants joining the structure where appropriate.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Key Features Grid -->
                <div class="grid md:grid-cols-2 gap-8 mb-16">
                    <!-- Defined Structures -->
                    <div class="group backdrop-blur-xl bg-gradient-to-br from-teal-50/90 to-cyan-50/90 rounded-3xl p-10 shadow-xl border border-teal-200/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Defined Structures</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Governance frameworks with disciplined decision-making processes ensure clarity and accountability.
                        </p>
                    </div>

                    <!-- Collective Access -->
                    <div class="group backdrop-blur-xl bg-gradient-to-br from-blue-50/90 to-indigo-50/90 rounded-3xl p-10 shadow-xl border border-blue-200/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Collective Access</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Access opportunities without reliance on individual balance sheets through strategic collaboration.
                        </p>
                    </div>

                    <!-- Research-Led -->
                    <div class="group backdrop-blur-xl bg-gradient-to-br from-purple-50/90 to-pink-50/90 rounded-3xl p-10 shadow-xl border border-purple-200/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Research-Led</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            No opportunity considered without thorough analysis. Every project is researched and evaluated independently.
                        </p>
                    </div>

                    <!-- Selective Participation -->
                    <div class="group backdrop-blur-xl bg-gradient-to-br from-amber-50/90 to-orange-50/90 rounded-3xl p-10 shadow-xl border border-amber-200/50 hover:shadow-2xl hover:-translate-y-2 transition-all duration-300">
                        <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-amber-600 rounded-2xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-9 h-9 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Selective Participation</h3>
                        <p class="text-gray-700 text-lg leading-relaxed">
                            By invitation only and subject to suitability. Participation is selective and not automatic.
                        </p>
                    </div>
                </div>

                <!-- Alignment of Interests -->
                <div class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-2xl p-10 shadow-2xl">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-white mb-4">Alignment of Interests</h3>
                        <div class="w-24 h-1 bg-accent mx-auto mb-6"></div>
                    </div>
                    
                    <div class="space-y-6 text-white/90 text-lg">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-accent/30 backdrop-blur-sm rounded-full flex items-center justify-center border-2 border-accent">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p>
                                <strong class="text-white">We participate as principal or strategic participant.</strong> Our time, experience, and capital are committed alongside participants.
                            </p>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-accent/30 backdrop-blur-sm rounded-full flex items-center justify-center border-2 border-accent">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p>
                                <strong class="text-white">Syndicates are tools, not shortcuts.</strong> They exist to provide access, discipline, and strategic scale.
                            </p>
                        </div>
                        
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-accent/30 backdrop-blur-sm rounded-full flex items-center justify-center border-2 border-accent">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p>
                                <strong class="text-white">No pooled investment products or public offerings.</strong> Participation is selective and structure-dependent.
                            </p>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-white/20">
                        <p class="text-white/70 text-sm italic text-center">
                            Information provided is not an offer or invitation. Independent decisions encouraged.
                        </p>
                    </div>
                </div>

                {{-- Syndicate Suitability Criteria - Ultra Modern Design --}}
                <div class="mt-16 relative">
                    {{-- Background Glow --}}
                    <div class="absolute -inset-4 bg-gradient-to-r from-teal-500/20 via-emerald-500/20 to-cyan-500/20 rounded-3xl blur-2xl"></div>
                    
                    <div class="relative bg-gradient-to-br from-white via-slate-50 to-white rounded-3xl shadow-2xl p-10 border border-slate-200/50 backdrop-blur-sm">
                        {{-- Header --}}
                        <div class="text-center mb-10">
                            <div class="inline-flex items-center gap-2 px-4 py-2 mb-4 bg-gradient-to-r from-teal-500/10 to-emerald-500/10 border border-teal-500/20 rounded-full">
                                <svg class="w-4 h-4 text-teal-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-sm font-bold text-teal-700 uppercase tracking-wider">Eligibility Requirements</span>
                            </div>
                            <h3 class="text-4xl font-black text-slate-900 mb-2" style="font-family: 'Outfit', 'Inter', sans-serif; letter-spacing: -0.02em;">
                                Syndicate Suitability <span class="bg-gradient-to-r from-teal-600 to-emerald-600 bg-clip-text text-transparent">Criteria</span>
                            </h3>
                            <p class="text-slate-600 text-lg" style="font-family: 'Inter', sans-serif;">Essential requirements for participation</p>
                        </div>
                        
                        {{-- Criteria Grid - 2 Columns --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            
                            {{-- Criterion 1 --}}
                            <div class="group relative">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-teal-500 to-emerald-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                                <div class="relative bg-white rounded-2xl p-6 border border-slate-200 hover:border-teal-300 transition-all shadow-sm hover:shadow-lg">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-gradient-to-br from-teal-500 to-emerald-600 rounded-xl flex items-center justify-center text-white font-black text-lg shadow-lg shadow-teal-500/30 group-hover:scale-110 transition-transform">
                                                1
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-slate-900 mb-2 text-lg" style="font-family: 'Sora', 'Inter', sans-serif;">Understanding Risk</h4>
                                            <p class="text-slate-600 leading-relaxed" style="font-family: 'Inter', sans-serif;">Participants must understand property development risks and accept uncertainty.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Criterion 2 --}}
                            <div class="group relative">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                                <div class="relative bg-white rounded-2xl p-6 border border-slate-200 hover:border-blue-300 transition-all shadow-sm hover:shadow-lg">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center text-white font-black text-lg shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform">
                                                2
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-slate-900 mb-2 text-lg" style="font-family: 'Sora', 'Inter', sans-serif;">Financial Capacity</h4>
                                            <p class="text-slate-600 leading-relaxed" style="font-family: 'Inter', sans-serif;">Financial position assessed relative to structure. Not suitable for those seeking quick returns or speculation.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Criterion 3 --}}
                            <div class="group relative">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                                <div class="relative bg-white rounded-2xl p-6 border border-slate-200 hover:border-purple-300 transition-all shadow-sm hover:shadow-lg">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center text-white font-black text-lg shadow-lg shadow-purple-500/30 group-hover:scale-110 transition-transform">
                                                3
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-slate-900 mb-2 text-lg" style="font-family: 'Sora', 'Inter', sans-serif;">Governance Acceptance</h4>
                                            <p class="text-slate-600 leading-relaxed" style="font-family: 'Inter', sans-serif;">Must accept defined decision-making frameworks and disciplined processes.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Criterion 4 --}}
                            <div class="group relative">
                                <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-500 to-amber-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                                <div class="relative bg-white rounded-2xl p-6 border border-slate-200 hover:border-orange-300 transition-all shadow-sm hover:shadow-lg">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0">
                                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-amber-600 rounded-xl flex items-center justify-center text-white font-black text-lg shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform">
                                                4
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-slate-900 mb-2 text-lg" style="font-family: 'Sora', 'Inter', sans-serif;">Patience & Alignment</h4>
                                            <p class="text-slate-600 leading-relaxed" style="font-family: 'Inter', sans-serif;">Property development requires time. Participants must have patience and align with long-term objectives.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        {{-- Important Notice Banner --}}
                        <div class="relative overflow-hidden bg-gradient-to-r from-amber-50 via-orange-50 to-amber-50 border-2 border-amber-200 rounded-2xl p-6 shadow-lg">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-amber-200/30 rounded-full blur-2xl"></div>
                            <div class="relative flex items-start gap-4">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-amber-500/30">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-amber-900 mb-2 text-lg" style="font-family: 'Sora', 'Inter', sans-serif;">Invitation Only</h4>
                                    <p class="text-amber-800 font-medium leading-relaxed" style="font-family: 'Inter', sans-serif;">
                                        Participation is by invitation only. <span class="font-bold">Authority statement:</span> Participation is selective and not automatic.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Process Section -->
    <section id="process" class="py-20 gradient-dark relative overflow-hidden bg-gradient-to-b from-white via-slate-900 to-slate-900">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1920&q=80" alt="Business Process" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-br from-secondary-dark/85 via-secondary-dark/80 to-primary-dark/75"></div>
        </div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-accent/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            {{-- Modern Header --}}
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-gradient-to-r from-cyan-500/10 to-teal-500/10 border border-cyan-500/20 rounded-full backdrop-blur-sm">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-cyan-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-cyan-500"></span>
                    </span>
                    <span class="text-sm font-bold bg-gradient-to-r from-cyan-400 to-teal-400 bg-clip-text text-transparent uppercase tracking-widest">
                        How It Works
                    </span>
                </div>
                <h2 class="text-5xl md:text-6xl font-black text-white mb-4" style="font-family: 'Outfit', 'Inter', sans-serif; letter-spacing: -0.02em;">
                    The Gateway <span class="bg-gradient-to-r from-cyan-400 to-teal-400 bg-clip-text text-transparent">Process</span>
                </h2>
                <p class="text-xl text-gray-400 font-medium" style="font-family: 'Inter', sans-serif;">Each opportunity stands alone</p>
            </div>
            
            {{-- Modern Grid Layout - 2 columns on desktop, 1 on mobile --}}
            <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-6">
                
                {{-- Step 1 --}}
                <div class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500 to-teal-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                    <div class="relative glass-card rounded-2xl p-8 hover:bg-white/10 transition-all h-full">
                        <div class="flex items-start gap-6">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-teal-600 rounded-2xl flex items-center justify-center text-2xl font-black text-white shadow-lg shadow-cyan-500/30 group-hover:scale-110 transition-transform">
                                    1
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-3" style="font-family: 'Sora', 'Inter', sans-serif;">Property Opportunity Researched</h3>
                                <p class="text-gray-300 leading-relaxed" style="font-family: 'Inter', sans-serif;">
                                    We identify and research potential property development opportunities suitable for syndication.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Step 2 --}}
                <div class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                    <div class="relative glass-card rounded-2xl p-8 hover:bg-white/10 transition-all h-full">
                        <div class="flex items-start gap-6">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center text-2xl font-black text-white shadow-lg shadow-blue-500/30 group-hover:scale-110 transition-transform">
                                    2
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-3" style="font-family: 'Sora', 'Inter', sans-serif;">Expressions of Interest Registered</h3>
                                <p class="text-gray-300 leading-relaxed" style="font-family: 'Inter', sans-serif;">
                                    Property owners and equity participants register their interest through our gateway system.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Step 3 --}}
                <div class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                    <div class="relative glass-card rounded-2xl p-8 hover:bg-white/10 transition-all h-full">
                        <div class="flex items-start gap-6">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center text-2xl font-black text-white shadow-lg shadow-purple-500/30 group-hover:scale-110 transition-transform">
                                    3
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-3" style="font-family: 'Sora', 'Inter', sans-serif;">Independent Assessment</h3>
                                <p class="text-gray-300 leading-relaxed" style="font-family: 'Inter', sans-serif;">
                                    Participants seek independent professional advice and third-party financier assessment.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Step 4 --}}
                <div class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                    <div class="relative glass-card rounded-2xl p-8 hover:bg-white/10 transition-all h-full">
                        <div class="flex items-start gap-6">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center text-2xl font-black text-white shadow-lg shadow-orange-500/30 group-hover:scale-110 transition-transform">
                                    4
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-3" style="font-family: 'Sora', 'Inter', sans-serif;">Syndicate Formation</h3>
                                <p class="text-gray-300 leading-relaxed" style="font-family: 'Inter', sans-serif;">
                                    Approved participants are introduced and syndicate structures are coordinated.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Step 5 - Centered on its own row --}}
                <div class="group relative lg:col-span-2">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-2xl opacity-0 group-hover:opacity-100 blur transition-opacity duration-500"></div>
                    <div class="relative glass-card rounded-2xl p-8 hover:bg-white/10 transition-all max-w-2xl mx-auto">
                        <div class="flex items-start gap-6">
                            <div class="flex-shrink-0">
                                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center text-2xl font-black text-white shadow-lg shadow-emerald-500/30 group-hover:scale-110 transition-transform">
                                    5
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-white mb-3" style="font-family: 'Sora', 'Inter', sans-serif;">Project Execution</h3>
                                <p class="text-gray-300 leading-relaxed" style="font-family: 'Inter', sans-serif;">
                                    Development proceeds under independent professional management and oversight.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- Disclaimer Section -->
    <section id="disclaimers" class="py-32 bg-gradient-to-b from-slate-900/20 via-gray-50 to-white relative overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=1920&q=80" alt="Legal Documents" class="w-full h-full object-cover opacity-35">
            <div class="absolute inset-0 bg-gradient-to-b from-gray-50/70 to-white/70 backdrop-blur-sm"></div>
        </div>
        <!-- Decorative Background -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <!-- Important Notice -->
            <div class="max-w-4xl mx-auto mb-16">
                <!-- Animated Header -->
                <div class="text-center mb-10">
                    <div class="inline-flex items-center gap-3 bg-gradient-to-r from-red-500 to-red-600 px-8 py-4 rounded-full shadow-2xl mb-6 animate-pulse">
                        <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white uppercase tracking-wider">Important &mdash; Please Read</h3>
                    </div>
                    <div class="w-32 h-1 bg-gradient-to-r from-transparent via-red-500 to-transparent mx-auto"></div>
                </div>
                
                <!-- Main Content Card -->
                <div class="group relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-red-500 to-pink-500 rounded-3xl blur-xl opacity-20 group-hover:opacity-30 transition duration-500"></div>
                    
                    <div class="relative backdrop-blur-xl bg-white/90 rounded-3xl border-2 border-red-200 p-10 md:p-12 shadow-2xl">
                        <div class="space-y-6 text-gray-700 text-lg leading-relaxed">
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mt-1">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01"></path>
                                    </svg>
                                </div>
                                <p>
                                    <strong class="text-gray-900 text-xl">Homeowners Equity & Liquidity Plan does not provide financial, legal, tax, or investment advice.</strong> All decisions are at the request of the participant and by their own volition.
                                </p>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="flex-shrink-0 w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mt-1">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-xl">
                                    Independent advice from accountants and lawyers is <strong class="text-red-600">mandatory</strong> prior to participation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Role Separation Notice -->
            <div class="max-w-5xl mx-auto">
                <div class="group relative">
                    <div class="absolute -inset-1 bg-gradient-to-r from-primary to-accent rounded-3xl blur-xl opacity-20 group-hover:opacity-30 transition duration-500"></div>
                    
                    <div class="relative bg-gradient-to-r from-primary via-primary-dark to-accent rounded-3xl p-10 md:p-12 shadow-2xl ">
                        <div class="flex flex-col md:flex-row items-start gap-8">
                            <div class="flex-shrink-0">
                                <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/30 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-11 h-11 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-white flex-1">
                                <h3 class="text-3xl font-bold mb-4">Role Separation Notice</h3>
                                <p class="text-white/95 leading-relaxed text-xl">
                                    Property transactions, where applicable, are conducted by <strong class="text-white">Citisales & Leasing</strong>, a licensed real estate agency. Homeowners Equity & Liquidity Plan operates separately as a property research and syndication facilitation platform.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative overflow-hidden border-t border-gray-200 bg-secondary py-16">
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-accent/5 to-transparent"></div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8">
                <!-- Enhanced Footer Logo -->
                <div class="flex items-center group">
                    <div class="relative">
                        <!-- Glow effect -->
                        <div class="absolute -inset-3 bg-gradient-to-r from-primary via-accent to-primary rounded-2xl opacity-10 blur-2xl"></div>
                        
                        <!-- Logo with decorative frame -->
                        <div class="relative bg-white/5 backdrop-blur-sm rounded-xl p-3 border border-white/10 group-hover:border-accent/30 transition-all duration-300">
                            <img src="{{ asset('logo.png') }}" alt="HELP Logo" class="h-14 relative z-10 transition-transform duration-300 group-hover:scale-105">
                            
                            <!-- Decorative dots -->
                            <div class="absolute -top-1 -left-1 w-2 h-2 bg-accent rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            <div class="absolute -top-1 -right-1 w-2 h-2 bg-accent rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-75"></div>
                            <div class="absolute -bottom-1 -left-1 w-2 h-2 bg-accent rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-150"></div>
                            <div class="absolute -bottom-1 -right-1 w-2 h-2 bg-accent rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 delay-200"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Links -->
                <nav class="flex flex-wrap justify-center gap-8">
                    <a href="#about" class="text-sm text-white/60 hover:text-accent transition-colors">About</a>
                    <a href="#services" class="text-sm text-white/60 hover:text-accent transition-colors">Services</a>
                    <a href="#syndicates" class="text-sm text-white/60 hover:text-accent transition-colors">Syndicates</a>
                    <a href="#process" class="text-sm text-white/60 hover:text-accent transition-colors">Process</a>
                    <a href="#disclaimers" class="text-sm text-white/60 hover:text-accent transition-colors">Important Info</a>
                    <a href="{{ url('admin/login') }}" class="text-sm text-white/60 hover:text-accent transition-colors">Admin</a>
                </nav>
            </div>
            
            <div class="mt-12 pt-8 border-t border-white/10 text-center">
                <p class="text-sm text-white/40">
                    &copy; 2026 Homeowners Equity & Liquidity Plan. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
    
    <!-- Scroll Behavior Script -->
    <script>
        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('bg-secondary-dark/95', 'shadow-2xl');
                header.classList.remove('bg-secondary-dark/70');
            } else {
                header.classList.add('bg-secondary-dark/70');
                header.classList.remove('bg-secondary-dark/95', 'shadow-2xl');
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });

        // Scroll reveal animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, observerOptions);

        // Observe all scroll-reveal elements
        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });

        // Add sparkle effects randomly
        function createSparkle() {
            const sparkle = document.createElement('div');
            sparkle.className = 'sparkle';
            sparkle.style.left = Math.random() * 100 + '%';
            sparkle.style.top = Math.random() * 100 + '%';
            sparkle.style.animationDelay = Math.random() * 2 + 's';
            document.querySelector('.hero-sparkles')?.appendChild(sparkle);
            setTimeout(() => sparkle.remove(), 2000);
        }

        // Create sparkles periodically
        setInterval(createSparkle, 3000);
    </script>
</body>
</html>











