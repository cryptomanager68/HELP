<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard - Strategy Access</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        heading: ['Space Grotesk', 'sans-serif']
                    },
                    colors: {
                        primary: { DEFAULT: 'hsl(174, 72%, 40%)', foreground: 'hsl(0, 0%, 100%)' },
                        secondary: { DEFAULT: 'hsl(190, 60%, 94%)', foreground: 'hsl(200, 25%, 10%)' },
                        accent: { DEFAULT: 'hsl(262, 60%, 55%)', foreground: 'hsl(0, 0%, 100%)' },
                        success: { DEFAULT: 'hsl(160, 60%, 45%)', foreground: 'hsl(0, 0%, 100%)' },
                        background: 'hsl(180, 20%, 97%)',
                        foreground: 'hsl(200, 25%, 10%)',
                        card: 'hsl(0, 0%, 100%)',
                        border: 'hsl(180, 15%, 88%)',
                        muted: { DEFAULT: 'hsl(180, 15%, 94%)', foreground: 'hsl(200, 10%, 45%)' }
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }
        @keyframes fade-up { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes shimmer { 0% { background-position: -200% center; } 100% { background-position: 200% center; } }
        @keyframes glow-pulse { 0%, 100% { filter: drop-shadow(0 0 15px hsl(48 80% 70% / 0.4)); } 50% { filter: drop-shadow(0 0 30px hsl(48 80% 70% / 0.7)); } }
        
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-fade-up { animation: fade-up 0.7s ease-out forwards; }
        .animate-fade-up-delay-1 { animation: fade-up 0.7s ease-out 0.15s forwards; opacity: 0; }
        .animate-fade-up-delay-2 { animation: fade-up 0.7s ease-out 0.3s forwards; opacity: 0; }
        .animate-fade-up-delay-3 { animation: fade-up 0.7s ease-out 0.45s forwards; opacity: 0; }
        
        .gradient-primary { background: linear-gradient(135deg, hsl(174, 72%, 40%), hsl(186, 70%, 45%), hsl(200, 80%, 50%)); }
        .gradient-primary-soft { background: linear-gradient(135deg, hsl(174, 72%, 40%, 0.1), hsl(200, 80%, 50%, 0.05)); }
        .text-gradient { background: linear-gradient(135deg, hsl(174, 72%, 40%), hsl(200, 80%, 50%)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .glass-card { background: hsl(0, 0%, 100%, 0.8); backdrop-filter: blur(20px); border: 1px solid hsl(180, 15%, 88%, 0.5); }
        .shadow-glow { box-shadow: 0 4px 30px -5px hsl(174, 72%, 40%, 0.2); }
        
        .hero-title { text-shadow: 0 0 40px hsl(174 72% 50% / 0.4), 0 0 80px hsl(174 72% 50% / 0.2); letter-spacing: -0.02em; }
        .hero-title-accent { background: linear-gradient(135deg, hsl(48 100% 90%) 0%, hsl(40 100% 75%) 50%, hsl(48 100% 90%) 100%); background-size: 200% auto; -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; animation: shimmer 3s ease-in-out infinite; filter: drop-shadow(0 0 20px hsl(48 80% 70% / 0.5)); }
    </style>
</head>
<body class="bg-background font-sans antialiased">

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-card/90 backdrop-blur-md border-b border-border shadow-sm">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="flex items-center justify-between py-4">
                <div class="flex items-center gap-8">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-12">
                    <nav class="hidden md:flex items-center gap-6">
                        <a href="#overview" class="text-sm font-semibold text-foreground hover:text-primary transition-colors">Overview</a>
                        <a href="#pathways" class="text-sm font-semibold text-foreground hover:text-primary transition-colors">Pathways</a>
                        <a href="#framework" class="text-sm font-semibold text-foreground hover:text-primary transition-colors">Framework</a>
                        <a href="#contact" class="text-sm font-semibold text-foreground hover:text-primary transition-colors">Contact</a>
                    </nav>
                </div>
                <div class="flex items-center gap-4">
                    <div class="hidden sm:flex items-center gap-2 px-4 py-2 bg-secondary rounded-full">
                        <div class="w-2 h-2 bg-success rounded-full animate-pulse"></div>
                        <span class="text-sm font-semibold text-foreground">{{ Auth::user()->name }}</span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-sm font-semibold text-muted-foreground hover:text-red-600 transition-colors px-4 py-2 rounded-lg hover:bg-red-50">
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="overview" class="relative min-h-[90vh] flex items-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('welcome.jfif') }}')"></div>
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 gradient-primary opacity-30"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-background/10 to-transparent"></div>

        <div class="container relative z-10 py-20 mx-auto px-4 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <div class="inline-flex items-center gap-2 rounded-full bg-white/15 backdrop-blur-sm px-4 py-2 mb-8 animate-fade-up border border-white/20">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-medium text-white tracking-wide uppercase">Active Membership</span>
                </div>

                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 font-heading animate-fade-up leading-tight hero-title">
                    <span class="text-white">Welcome to Your</span>
                    <span class="block mt-2 hero-title-accent">Strategy Dashboard</span>
                </h1>

                <p class="text-lg md:text-xl text-white/85 mb-10 animate-fade-up-delay-1 max-w-2xl mx-auto leading-relaxed">
                    You now have <strong>full access</strong> to equity participation frameworks and direct communication channels with our strategy team.
                </p>

                <div class="flex flex-wrap gap-4 justify-center animate-fade-up-delay-2">
                    <button class="inline-flex items-center gap-2 rounded-full gradient-primary px-6 py-3 text-sm font-semibold text-white shadow-glow border border-white/20 hover:scale-105 transition-transform">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                        Instant Access
                    </button>
                    <button class="inline-flex items-center gap-2 rounded-full bg-white/15 backdrop-blur-sm px-6 py-3 text-sm font-semibold text-white border border-white/20 hover:bg-white/25 transition-colors">
                        Access Platform
                    </button>
                    <button class="inline-flex items-center gap-2 rounded-full bg-white/15 backdrop-blur-sm px-6 py-3 text-sm font-semibold text-white border border-white/20 hover:bg-white/25 transition-colors">
                        Direct Support
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Bottom Wave -->
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path d="M0 40C360 80 720 0 1080 40C1260 60 1380 50 1440 40V100H0V40Z" fill="hsl(180, 20%, 97%)" />
            </svg>
        </div>
    </section>

    <!-- Pathway Cards Section -->
    <section id="pathways" class="py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-14">
                <span class="inline-flex items-center gap-2 text-primary text-sm font-semibold tracking-widest uppercase mb-4">
                    ◇ Choose Your Path
                </span>
                <h2 class="text-4xl md:text-5xl font-bold font-heading text-foreground mb-4">
                    Your Equity Pathways
                </h2>
                <p class="text-muted-foreground text-lg max-w-xl mx-auto">
                    Select the strategy that aligns with your equity position and investment goals.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <!-- Pathway A -->
                <div class="glass-card rounded-2xl p-7 hover:shadow-glow transition-all duration-300 hover:-translate-y-1 animate-fade-up-delay-1">
                    <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mb-5 shadow-glow">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>

                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="text-xl font-bold font-heading text-foreground">Pathway A</h3>
                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-success text-white">Direct</span>
                    </div>

                    <p class="text-sm text-primary font-medium mb-3">Direct Equity Strategy</p>
                    <p class="text-sm text-muted-foreground mb-5 leading-relaxed">
                        For investors who prefer direct equity stakes in curated strategies, participation frameworks, and direct investment channels.
                    </p>

                    <div class="border-t border-border pt-4">
                        <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">Suitable if you have:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2 text-sm text-foreground">
                                <svg class="w-4 h-4 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Significant equity participation
                            </li>
                            <li class="flex items-start gap-2 text-sm text-foreground">
                                <svg class="w-4 h-4 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Curated investment strategies
                            </li>
                            <li class="flex items-start gap-2 text-sm text-foreground">
                                <svg class="w-4 h-4 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Independent framework access
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Pathway B -->
                <div class="glass-card rounded-2xl p-7 hover:shadow-glow transition-all duration-300 hover:-translate-y-1 animate-fade-up-delay-2">
                    <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mb-5 shadow-glow">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>

                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="text-xl font-bold font-heading text-foreground">Pathway B</h3>
                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-primary text-white">Syndicate</span>
                    </div>

                    <p class="text-sm text-primary font-medium mb-3">Syndicate Participation</p>
                    <p class="text-sm text-muted-foreground mb-5 leading-relaxed">
                        For those who prefer collective strategy with lower equity commitment while participating in larger opportunities.
                    </p>

                    <div class="border-t border-border pt-4">
                        <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">Suitable if you have:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2 text-sm text-foreground">
                                <svg class="w-4 h-4 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Collective strategy access
                            </li>
                            <li class="flex items-start gap-2 text-sm text-foreground">
                                <svg class="w-4 h-4 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Lower equity requirement
                            </li>
                            <li class="flex items-start gap-2 text-sm text-foreground">
                                <svg class="w-4 h-4 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Willingness to share participation
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Pathway C -->
                <div class="glass-card rounded-2xl p-7 hover:shadow-glow transition-all duration-300 hover:-translate-y-1 animate-fade-up-delay-3">
                    <div class="w-14 h-14 rounded-xl gradient-primary flex items-center justify-center mb-5 shadow-glow">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>

                    <div class="flex items-center gap-3 mb-2">
                        <h3 class="text-xl font-bold font-heading text-foreground">Pathway C</h3>
                        <span class="text-xs font-semibold px-2.5 py-0.5 rounded-full bg-accent text-white">Enterprise</span>
                    </div>

                    <p class="text-sm text-primary font-medium mb-3">Enterprise Foundation</p>
                    <p class="text-sm text-muted-foreground mb-5 leading-relaxed">
                        Tailored for larger benefit from scale, leverage, and control. For access surface projects and participants.
                    </p>

                    <div class="border-t border-border pt-4">
                        <p class="text-xs font-semibold text-muted-foreground uppercase tracking-wider mb-3">Benefits include:</p>
                        <ul class="space-y-2">
                            <li class="flex items-start gap-2 text-sm text-foreground">
                                <svg class="w-4 h-4 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Full data transparency
                            </li>
                            <li class="flex items-start gap-2 text-sm text-foreground">
                                <svg class="w-4 h-4 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Enterprise-scale projects
                            </li>
                            <li class="flex items-start gap-2 text-sm text-foreground">
                                <svg class="w-4 h-4 text-primary mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Priority support access
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Framework Overview Section -->
    <section id="framework" class="py-20 gradient-primary-soft">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="text-center mb-14">
                <span class="inline-flex items-center gap-2 text-primary text-sm font-semibold tracking-widest uppercase mb-4">
                    ◇ Framework
                </span>
                <h2 class="text-4xl md:text-5xl font-bold font-heading text-foreground">
                    Strategy Framework Overview
                </h2>
            </div>

            <div class="max-w-4xl mx-auto space-y-5">
                <!-- Framework Item 1 -->
                <div class="glass-card rounded-xl p-6 border-l-4 border-l-primary hover:shadow-glow transition-all duration-300 animate-fade-up-delay-1">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg gradient-primary flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold font-heading text-foreground mb-1">
                                Independent Assessment Required
                            </h3>
                            <p class="text-sm text-muted-foreground leading-relaxed">
                                All participation requires independent professional advice before commitments and changes. This is every financial decision, to prevent undermining equity commitments.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Framework Item 2 -->
                <div class="glass-card rounded-xl p-6 border-l-4 border-l-accent hover:shadow-glow transition-all duration-300 animate-fade-up-delay-2">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg gradient-primary flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold font-heading text-foreground mb-1">
                                Voluntary Participation
                            </h3>
                            <p class="text-sm text-muted-foreground leading-relaxed">
                                Every decision is made at your request among your own internal team. This includes nominations, first recommendations, or advice.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Framework Item 3 -->
                <div class="glass-card rounded-xl p-6 border-l-4 border-l-success hover:shadow-glow transition-all duration-300 animate-fade-up-delay-3">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-lg gradient-primary flex items-center justify-center shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold font-heading text-foreground mb-1">
                                Project-Specific Opportunities
                            </h3>
                            <p class="text-sm text-muted-foreground leading-relaxed">
                                Each opportunity stands alone. Participation in one project does not obligate or guarantee participation in others. Every project is independently reviewed and approved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20">
        <div class="container mx-auto px-4 lg:px-8">
            <div class="max-w-2xl mx-auto">
                <span class="inline-flex items-center gap-2 text-primary text-sm font-semibold tracking-widest uppercase mb-4">
                    ◇ Direct Access
                </span>
                <h2 class="text-4xl md:text-5xl font-bold font-heading text-foreground mb-4">
                    Contact Strategy Team
                </h2>
                <p class="text-muted-foreground mb-10 leading-relaxed">
                    As a paid member, you now have <strong class="text-foreground">direct access</strong> to communicate with the strategy team. Use the form below to initiate contact.
                </p>

                @if(session('success'))
                    <div class="mb-6 p-4 bg-success/10 border border-success/20 rounded-xl">
                        <p class="text-success text-sm font-semibold">{{ session('success') }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                        @foreach($errors->all() as $error)
                            <p class="text-red-600 text-sm font-semibold">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('member.contact.submit') }}" method="POST" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-2">Subject</label>
                        <input
                            type="text"
                            name="subject"
                            placeholder="What would you like to discuss?"
                            required
                            class="w-full rounded-xl border border-border bg-card px-4 py-3 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary transition-shadow"
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-2">Message</label>
                        <textarea
                            name="message"
                            rows="5"
                            placeholder="Describe your inquiry in detail..."
                            required
                            class="w-full rounded-xl border border-border bg-card px-4 py-3 text-sm text-foreground placeholder:text-muted-foreground focus:outline-none focus:ring-2 focus:ring-primary transition-shadow resize-none"
                        ></textarea>
                    </div>
                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl gradient-primary px-8 py-3 text-sm font-semibold text-white shadow-glow hover:scale-105 transition-transform"
                    >
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 text-center text-sm text-muted-foreground border-t border-border">
        <div class="container mx-auto px-4">
            © 2026 Strategy Dashboard. All rights reserved.
        </div>
    </footer>

</body>
</html>
