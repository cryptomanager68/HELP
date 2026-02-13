<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email - HELP</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
        .animate-fadeInUp { animation: fadeInUp 0.6s ease-out forwards; }
        .animate-pulse-slow { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-white to-teal-50 min-h-screen flex items-center justify-center p-4">
    
    <div class="max-w-2xl w-full">
        <!-- Success Card -->
        <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-12 animate-fadeInUp">
            
            <!-- Success Icon -->
            <div class="flex justify-center mb-8">
                <div class="w-24 h-24 bg-gradient-to-br from-teal-500 to-cyan-600 rounded-full flex items-center justify-center shadow-lg">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-black text-center text-slate-900 mb-4">
                🎉 Payment Successful!
            </h1>

            <!-- Subtitle -->
            <p class="text-xl text-center text-slate-600 font-medium mb-8">
                Your account has been created and you're now subscribed.
            </p>

            <!-- Success Messages -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded-lg">
                    <div class="flex items-center gap-3">
                        <svg class="w-6 h-6 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="text-green-800 font-semibold">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            <!-- Email Verification Section -->
            <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-2xl p-8 mb-8 border-2 border-blue-200">
                <div class="flex items-start gap-4 mb-6">
                    <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-2xl font-black text-slate-900 mb-2">📧 Verify Your Email</h2>
                        <p class="text-slate-700 font-medium">
                            Click the button below to receive a verification email. Once you verify your email, you'll have full access to your dashboard.
                        </p>
                    </div>
                </div>

                <!-- Verify Email Button -->
                <form action="{{ route('subscription.send.verification') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full px-8 py-5 bg-gradient-to-r from-teal-500 to-cyan-600 text-white rounded-xl font-black text-lg shadow-xl hover:shadow-2xl transition-all duration-300 hover:scale-105 flex items-center justify-center gap-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Send Verification Email
                    </button>
                </form>

                <p class="text-sm text-slate-600 text-center mt-4">
                    Login email: <span class="font-bold text-slate-900">{{ Auth::user()->email }}</span>
                </p>
            </div>

            <!-- What's Next Section -->
            <div class="bg-slate-50 rounded-2xl p-6 mb-6">
                <h3 class="text-lg font-black text-slate-900 mb-4">What's Next?</h3>
                <ol class="space-y-3">
                    <li class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-7 h-7 bg-teal-500 text-white rounded-full flex items-center justify-center font-bold text-sm">1</span>
                        <span class="text-slate-700 font-medium pt-0.5">Click the "Send Verification Email" button above</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-7 h-7 bg-blue-500 text-white rounded-full flex items-center justify-center font-bold text-sm">2</span>
                        <span class="text-slate-700 font-medium pt-0.5">Check your email inbox for the verification link</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-7 h-7 bg-purple-500 text-white rounded-full flex items-center justify-center font-bold text-sm">3</span>
                        <span class="text-slate-700 font-medium pt-0.5">Click the verification link in the email</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <span class="flex-shrink-0 w-7 h-7 bg-green-500 text-white rounded-full flex items-center justify-center font-bold text-sm">4</span>
                        <span class="text-slate-700 font-medium pt-0.5">You'll be automatically logged in and redirected to your dashboard</span>
                    </li>
                </ol>
            </div>

            <!-- Help Text -->
            <div class="text-center">
                <p class="text-sm text-slate-500">
                    Didn't receive the email? Check your spam folder or click the button above to resend.
                </p>
            </div>

        </div>
    </div>

</body>
</html>
