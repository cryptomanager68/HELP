<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Submit Your LVR - HELP</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif']
                    }
                }
            }
        }
        
        // Auto-refresh CSRF token every 5 minutes to prevent 419 errors
        setInterval(function() {
            fetch('/subscription/lvr-form')
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newToken = doc.querySelector('input[name="_token"]');
                    if (newToken) {
                        document.querySelector('input[name="_token"]').value = newToken.value;
                    }
                })
                .catch(err => console.log('Token refresh failed:', err));
        }, 300000); // 5 minutes
    </script>
</head>
<body class="antialiased bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="max-w-3xl w-full">
            
            {{-- Error Message --}}
            @if($errors->any() || session('error'))
            <div class="bg-red-500/20 border-2 border-red-400 rounded-2xl p-6 mb-6">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-red-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <h3 class="text-lg font-bold text-red-300 mb-2">Error</h3>
                        @if(session('error'))
                            <p class="text-red-200">{{ session('error') }}</p>
                        @endif
                        @foreach($errors->all() as $error)
                            <p class="text-red-200">{{ $error }}</p>
                        @endforeach
                        <p class="text-red-200 mt-2 text-sm">If you see a "Page Expired" error, please refresh this page and try again.</p>
                    </div>
                </div>
            </div>
            @endif
            
            {{-- Success Message --}}
            @if(session('success'))
            <div class="bg-green-500/20 border-2 border-green-400 rounded-2xl p-6 mb-6 text-center">
                <div class="text-green-400 text-5xl mb-3">✓</div>
                <h2 class="text-2xl font-bold text-white mb-2">{{ session('success') }}</h2>
                <p class="text-green-200">Check your email for the password reset link!</p>
            </div>
            @endif
            
            {{-- Header --}}
            <div class="text-center mb-8">
                <div class="inline-block p-4 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-2xl mb-6">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-white mb-3">Complete Your LVR Submission</h1>
                <p class="text-xl text-slate-300 mb-2">Required to activate your subscription</p>
                <p class="text-sm text-slate-400">This helps us understand your portfolio and provide tailored guidance</p>
            </div>

            {{-- Main Form Card --}}
            <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-8 shadow-2xl">
                
                {{-- Info Banner --}}
                <div class="bg-blue-500/20 border-2 border-blue-400/50 rounded-2xl p-6 mb-8">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-white">
                            <p class="font-bold mb-2">Why do we need this?</p>
                            <p class="text-sm text-slate-200 leading-relaxed">Your Loan-to-Value Ratio (LVR) helps us understand your current leverage position and recommend the most suitable equity pathway for your situation.</p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('subscription.lvr.submit') }}" method="POST" id="lvrForm">
                    @csrf
                    
                    <div class="space-y-6">
                        {{-- Number of Properties --}}
                        <div>
                            <label for="number_of_properties" class="block text-sm font-bold text-white mb-3">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    Number of Properties
                                </span>
                            </label>
                            <input 
                                type="number" 
                                name="number_of_properties" 
                                id="number_of_properties" 
                                required 
                                min="1"
                                class="w-full px-6 py-4 rounded-xl bg-white/10 border-2 border-white/20 text-white text-lg placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all"
                                placeholder="e.g., 3">
                            <p class="text-xs text-slate-400 mt-2">Total number of properties in your portfolio</p>
                        </div>

                        {{-- Total Mortgage --}}
                        <div>
                            <label for="total_mortgage" class="block text-sm font-bold text-white mb-3">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    Total Mortgage (AUD)
                                </span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-6 top-1/2 -translate-y-1/2 text-white text-lg font-bold">$</span>
                                <input 
                                    type="number" 
                                    name="total_mortgage" 
                                    id="total_mortgage" 
                                    required 
                                    min="0"
                                    step="0.01"
                                    class="w-full pl-12 pr-6 py-4 rounded-xl bg-white/10 border-2 border-white/20 text-white text-lg placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all"
                                    placeholder="2,250,000">
                            </div>
                            <p class="text-xs text-slate-400 mt-2">Combined loan amounts across all properties</p>
                        </div>

                        {{-- Total Valuation --}}
                        <div>
                            <label for="total_valuation" class="block text-sm font-bold text-white mb-3">
                                <span class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                    Total Valuation (AUD)
                                </span>
                            </label>
                            <div class="relative">
                                <span class="absolute left-6 top-1/2 -translate-y-1/2 text-white text-lg font-bold">$</span>
                                <input 
                                    type="number" 
                                    name="total_valuation" 
                                    id="total_valuation" 
                                    required 
                                    min="0"
                                    step="0.01"
                                    class="w-full pl-12 pr-6 py-4 rounded-xl bg-white/10 border-2 border-white/20 text-white text-lg placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                    placeholder="8,100,000">
                            </div>
                            <p class="text-xs text-slate-400 mt-2">Combined expected market value of all properties</p>
                        </div>

                        {{-- Calculated LVR Display --}}
                        <div id="lvrResult" class="hidden bg-gradient-to-r from-emerald-500/20 to-teal-500/20 border-2 border-emerald-400/50 rounded-2xl p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm text-slate-300 mb-1">Your Calculated LVR</p>
                                    <p class="text-4xl font-bold text-white" id="lvrValue">0%</p>
                                </div>
                                <div class="w-16 h-16 rounded-full bg-emerald-500 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-slate-300 mt-3" id="lvrInterpretation"></p>
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-8">
                        <button 
                            type="submit" 
                            class="w-full px-8 py-5 bg-gradient-to-r from-emerald-500 to-teal-600 text-white rounded-xl font-bold text-lg shadow-2xl hover:shadow-emerald-500/50 transition-all hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed"
                            id="submitBtn">
                            Complete Submission & Activate Account
                        </button>
                        <p class="text-xs text-slate-400 text-center mt-4">
                            Your information is confidential and secure
                        </p>
                    </div>
                </form>
            </div>

            {{-- Skip Option (Optional - can be removed if mandatory) --}}
            <div class="text-center mt-6">
                <p class="text-sm text-slate-400">
                    This information is required to access the platform
                </p>
            </div>
        </div>
    </div>

    <script>
        // Auto-calculate LVR as user types
        const mortgageInput = document.getElementById('total_mortgage');
        const valuationInput = document.getElementById('total_valuation');
        const lvrResult = document.getElementById('lvrResult');
        const lvrValue = document.getElementById('lvrValue');
        const lvrInterpretation = document.getElementById('lvrInterpretation');

        function calculateLVR() {
            const mortgage = parseFloat(mortgageInput.value) || 0;
            const valuation = parseFloat(valuationInput.value) || 0;

            if (mortgage > 0 && valuation > 0) {
                const lvr = (mortgage / valuation) * 100;
                lvrValue.textContent = lvr.toFixed(2) + '%';
                lvrResult.classList.remove('hidden');

                // Interpretation
                if (lvr < 30) {
                    lvrInterpretation.textContent = 'Excellent! Low leverage provides strong equity position and flexibility.';
                } else if (lvr < 50) {
                    lvrInterpretation.textContent = 'Good! Moderate leverage with healthy equity buffer.';
                } else if (lvr < 70) {
                    lvrInterpretation.textContent = 'Moderate leverage. Consider strategies to improve equity position.';
                } else {
                    lvrInterpretation.textContent = 'High leverage. Focus on equity building strategies recommended.';
                }
            } else {
                lvrResult.classList.add('hidden');
            }
        }

        mortgageInput.addEventListener('input', calculateLVR);
        valuationInput.addEventListener('input', calculateLVR);
    </script>
</body>
</html>
