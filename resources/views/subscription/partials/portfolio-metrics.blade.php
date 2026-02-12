{{-- Portfolio Metrics Component - Example Only for Public Page --}}
<div class="w-full max-w-6xl mx-auto space-y-8 relative">
    
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none -z-10">
        <div class="absolute top-20 -left-20 w-72 h-72 bg-gradient-to-br from-emerald-400/30 to-teal-500/30 rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute bottom-40 -right-20 w-96 h-96 bg-gradient-to-br from-blue-400/30 to-indigo-500/30 rounded-full blur-3xl animate-float-slower"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-gradient-to-br from-purple-400/20 to-pink-500/20 rounded-full blur-3xl animate-pulse-slow"></div>
    </div>
    
    {{-- Example Label Banner --}}
    <div class="relative">
        <div class="bg-gradient-to-r from-amber-500 to-orange-500 text-white text-center py-3 px-6 rounded-2xl shadow-lg">
            <p class="font-bold text-lg">📊 Example LVR Summary – For Illustration Purposes Only</p>
            <p class="text-sm text-white/90 mt-1">After subscription, you'll submit your actual portfolio data</p>
        </div>
    </div>
    
    {{-- Portfolio Overview Card with Glassmorphism --}}
    <div class="relative group">
        {{-- Outer Glow Effect --}}
        <div class="absolute -inset-1 bg-gradient-to-r from-emerald-500 via-blue-500 to-purple-500 rounded-3xl blur-xl opacity-0 group-hover:opacity-40 transition-opacity duration-700"></div>
        
        <div class="relative bg-white/90 backdrop-blur-2xl rounded-3xl border border-white/50 shadow-2xl overflow-hidden">
            {{-- Background with Image --}}
            <div class="absolute inset-0 opacity-5">
                <img src="https://images.unsplash.com/photo-1560179707-f14e90ef3623?w=1920&q=80" alt="Background" class="w-full h-full object-cover">
            </div>
            <div class="absolute inset-0 bg-gradient-to-br from-slate-50/80 via-white/80 to-blue-50/80"></div>
            
            {{-- Animated Mesh Pattern --}}
            <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(13,148,136,0.1) 1px, transparent 1px), linear-gradient(90deg, rgba(13,148,136,0.1) 1px, transparent 1px); background-size: 50px 50px;"></div>
            
            {{-- Shimmer Effect on Hover --}}
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/60 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-1000 ease-in-out"></div>
            
            <div class="relative p-10">
                {{-- Header --}}
                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 shadow-lg shadow-emerald-500/50 animate-pulse-glow"></div>
                            <div class="w-4 h-4 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 shadow-lg shadow-orange-500/50 animate-pulse-glow" style="animation-delay: 0.2s;"></div>
                            <div class="w-4 h-4 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 shadow-lg shadow-blue-500/50 animate-pulse-glow" style="animation-delay: 0.4s;"></div>
                        </div>
                        <h3 class="text-3xl md:text-4xl font-black tracking-tight">
                            <span class="bg-gradient-to-r from-slate-900 via-slate-700 to-slate-900 bg-clip-text text-transparent animate-gradient-text">
                                Portfolio
                            </span>
                            <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-blue-600 bg-clip-text text-transparent animate-gradient-text ml-2">
                                Overview
                            </span>
                        </h3>
                    </div>
                    <div class="relative group/badge">
                        <div class="absolute -inset-1 bg-gradient-to-r from-amber-500 to-orange-500 rounded-full blur opacity-50 group-hover/badge:opacity-75 transition-opacity"></div>
                        <div class="relative px-5 py-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white text-sm font-bold rounded-full shadow-lg shadow-amber-500/30 animate-pulse-subtle flex items-center gap-2">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                            </span>
                            Example Data
                        </div>
                    </div>
                </div>
                
                <p class="text-slate-600 mb-10 text-lg">Key metrics that instantly reveal your portfolio position</p>
                
                {{-- Metrics Grid with Enhanced Cards --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Number of Properties --}}
                    <div class="group/card relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-2xl opacity-0 group-hover/card:opacity-100 blur transition-opacity duration-500"></div>
                        <div class="relative bg-white rounded-2xl p-6 border-2 border-emerald-100 hover:border-emerald-300 transition-all duration-300 shadow-lg hover:shadow-2xl hover:-translate-y-1">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center group-hover/card:scale-110 transition-transform duration-300 shadow-lg shadow-emerald-500/30">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-lg">Number of Properties</h4>
                                        <p class="text-sm text-emerald-600 font-semibold">Portfolio Size</p>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <p class="text-slate-600 text-sm leading-relaxed">Total properties in your portfolio</p>
                                <div class="flex items-baseline gap-3">
                                    <span class="text-5xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">3</span>
                                    <span class="text-slate-500 text-sm font-medium">properties</span>
                                </div>
                                <div class="h-2 bg-emerald-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full animate-progress" style="width: 60%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Total Mortgage --}}
                    <div class="group/card relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-400 to-red-500 rounded-2xl opacity-0 group-hover/card:opacity-100 blur transition-opacity duration-500"></div>
                        <div class="relative bg-white rounded-2xl p-6 border-2 border-orange-100 hover:border-orange-300 transition-all duration-300 shadow-lg hover:shadow-2xl hover:-translate-y-1">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center group-hover/card:scale-110 transition-transform duration-300 shadow-lg shadow-orange-500/30">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-lg">Total Mortgage</h4>
                                        <p class="text-sm text-orange-600 font-semibold">Liability</p>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <p class="text-slate-600 text-sm leading-relaxed">Combined loans across all properties</p>
                                <div class="flex items-baseline gap-3">
                                    <span class="text-5xl font-bold bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">$2.25M</span>
                                    <span class="text-slate-500 text-sm font-medium">total debt</span>
                                </div>
                                <div class="h-2 bg-orange-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-orange-500 to-red-500 rounded-full animate-progress" style="width: 28%; animation-delay: 0.2s;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Expected Valuation --}}
                    <div class="group/card relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-2xl opacity-0 group-hover/card:opacity-100 blur transition-opacity duration-500"></div>
                        <div class="relative bg-white rounded-2xl p-6 border-2 border-blue-100 hover:border-blue-300 transition-all duration-300 shadow-lg hover:shadow-2xl hover:-translate-y-1">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center group-hover/card:scale-110 transition-transform duration-300 shadow-lg shadow-blue-500/30">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-lg">Expected Valuation</h4>
                                        <p class="text-sm text-blue-600 font-semibold">Asset Value</p>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <p class="text-slate-600 text-sm leading-relaxed">Combined expected market value</p>
                                <div class="flex items-baseline gap-3">
                                    <span class="text-5xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">$8.1M</span>
                                    <span class="text-slate-500 text-sm font-medium">total value</span>
                                </div>
                                <div class="h-2 bg-blue-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full animate-progress" style="width: 100%; animation-delay: 0.4s;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- LVR Result --}}
                    <div class="group/card relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-slate-400 to-slate-600 rounded-2xl opacity-0 group-hover/card:opacity-100 blur transition-opacity duration-500"></div>
                        <div class="relative bg-white rounded-2xl p-6 border-2 border-slate-200 hover:border-slate-400 transition-all duration-300 shadow-lg hover:shadow-2xl hover:-translate-y-1">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-slate-500 to-slate-700 flex items-center justify-center group-hover/card:scale-110 transition-transform duration-300 shadow-lg shadow-slate-500/30">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-lg">LVR Result</h4>
                                        <p class="text-sm text-slate-600 font-semibold">Leverage Position</p>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <p class="text-slate-600 text-sm leading-relaxed">True average leverage position</p>
                                <div class="flex items-baseline gap-3">
                                    <span class="text-5xl font-bold bg-gradient-to-r from-slate-700 to-slate-900 bg-clip-text text-transparent">27.8%</span>
                                    <span class="flex items-center gap-1 text-emerald-600 text-sm font-bold">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        Healthy
                                    </span>
                                </div>
                                <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full animate-progress" style="width: 27.8%; animation-delay: 0.6s;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>

{{-- Enhanced Animations and Styles --}}
<style>
    @keyframes float-slow {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(30px, -30px) rotate(5deg); }
        66% { transform: translate(-20px, 20px) rotate(-5deg); }
    }
    
    @keyframes float-slower {
        0%, 100% { transform: translate(0, 0) rotate(0deg); }
        33% { transform: translate(-40px, 30px) rotate(-5deg); }
        66% { transform: translate(30px, -20px) rotate(5deg); }
    }
    
    @keyframes pulse-slow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.1); }
    }
    
    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 20px currentColor; }
        50% { box-shadow: 0 0 40px currentColor, 0 0 60px currentColor; }
    }
    
    @keyframes pulse-subtle {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.9; transform: scale(1.02); }
    }
    
    @keyframes bounce-subtle {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    
    @keyframes progress {
        from { width: 0; }
    }
    
    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .animate-float-slow {
        animation: float-slow 20s ease-in-out infinite;
    }
    
    .animate-float-slower {
        animation: float-slower 25s ease-in-out infinite;
    }
    
    .animate-pulse-slow {
        animation: pulse-slow 4s ease-in-out infinite;
    }
    
    .animate-pulse-glow {
        animation: pulse-glow 2s ease-in-out infinite;
    }
    
    .animate-pulse-subtle {
        animation: pulse-subtle 3s ease-in-out infinite;
    }
    
    .animate-bounce-subtle {
        animation: bounce-subtle 3s ease-in-out infinite;
    }
    
    .animate-progress {
        animation: progress 1.5s ease-out forwards;
    }
    
    .animate-gradient-shift {
        background-size: 200% 200%;
        animation: gradient-shift 8s ease infinite;
    }
    
    @keyframes gradient-text {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .animate-gradient-text {
        background-size: 200% auto;
        animation: gradient-text 3s ease infinite;
    }
</style>
