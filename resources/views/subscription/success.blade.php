<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Access Granted</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-2xl w-full bg-white rounded-2xl shadow-xl p-12 text-center">
            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-8">
                <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            
            <h1 class="text-4xl font-bold text-gray-900 mb-4">🎉 Payment Successful!</h1>
            <p class="text-xl text-gray-600 mb-4">
                Your account has been created and you're now subscribed.
            </p>
            <p class="text-lg text-gray-700 mb-8">
                <strong>Check your email inbox</strong> - we've sent you important information!
            </p>
            
            <div class="bg-blue-50 border-2 border-blue-200 rounded-xl p-6 mb-6">
                <h2 class="font-bold text-blue-900 mb-3 text-lg">📧 You'll Receive 2 Emails:</h2>
                <div class="space-y-3 text-left">
                    <div class="bg-white p-4 rounded-lg">
                        <p class="font-bold text-blue-900 mb-1">1. Welcome Email</p>
                        <p class="text-blue-800 text-sm">Contains your account information and login email: 
                            @auth
                                <strong>{{ auth()->user()->email }}</strong>
                            @else
                                <strong>(Please log in)</strong>
                            @endauth
                        </p>
                    </div>
                    <div class="bg-white p-4 rounded-lg">
                        <p class="font-bold text-blue-900 mb-1">2. Password Reset Email</p>
                        <p class="text-blue-800 text-sm">Click the link to set your own secure password</p>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-6 mb-8">
                <h2 class="font-bold text-gray-900 mb-4">What's Next?</h2>
                <div class="space-y-3 text-left">
                    <div class="flex items-start gap-3">
                        <span class="text-green-600 font-bold">1.</span>
                        <p class="text-gray-700">Set your password using the email link</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-green-600 font-bold">2.</span>
                        <p class="text-gray-700">Access your member dashboard</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-green-600 font-bold">3.</span>
                        <p class="text-gray-700">Review the three equity pathways</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-green-600 font-bold">4.</span>
                        <p class="text-gray-700">Contact the strategy team when ready</p>
                    </div>
                </div>
            </div>
            
            @auth
                <a href="{{ route('dashboard') }}" class="inline-block px-8 py-4 bg-green-600 text-white rounded-xl font-bold text-lg hover:bg-green-700 transition-colors shadow-lg">
                    Enter Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="inline-block px-8 py-4 bg-green-600 text-white rounded-xl font-bold text-lg hover:bg-green-700 transition-colors shadow-lg">
                    Login to Continue
                </a>
            @endauth
            
            <p class="text-sm text-gray-500 mt-8">
                Didn't receive the email? Check your spam folder or contact support.
            </p>
        </div>
    </div>
</body>
</html>
