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
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif
            
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
                <h2 class="font-bold text-blue-900 mb-3 text-lg">📧 Check Your Email Now!</h2>
                <div class="space-y-3 text-left">
                    <div class="bg-white p-4 rounded-lg border-2 border-red-500">
                        <p class="font-bold text-red-900 mb-1 flex items-center gap-2">
                            <span class="text-2xl">🔑</span>
                            1. Set Your Password Email
                        </p>
                        <p class="text-blue-800 text-sm">
                            <strong class="text-red-600">IMPORTANT:</strong> Click the big red "Set Your Password Now" button in the email to create your password.
                        </p>
                        <p class="text-xs text-gray-600 mt-2">
                            Login email: 
                            @auth
                                <strong class="text-blue-900">{{ auth()->user()->email }}</strong>
                            @else
                                <strong>(Please check your inbox)</strong>
                            @endauth
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="bg-gray-50 rounded-xl p-6 mb-8">
                <h2 class="font-bold text-gray-900 mb-4">What's Next?</h2>
                <div class="space-y-3 text-left">
                    <div class="flex items-start gap-3">
                        <span class="text-red-600 font-bold text-xl">1.</span>
                        <p class="text-gray-700"><strong>Check your email inbox</strong> for the welcome email</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-red-600 font-bold text-xl">2.</span>
                        <p class="text-gray-700"><strong>Click the red "Set Your Password Now" button</strong> in the email</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-green-600 font-bold">3.</span>
                        <p class="text-gray-700">Create your secure password</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-green-600 font-bold">4.</span>
                        <p class="text-gray-700">Login and access your member dashboard</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="text-green-600 font-bold">5.</span>
                        <p class="text-gray-700">Review the three equity pathways</p>
                    </div>
                </div>
            </div>
            
            @guest
                <div class="mt-6">
                    <p class="text-sm text-gray-600 mb-3">Didn't receive the password email?</p>
                    <form action="{{ route('subscription.resend-password') }}" method="POST" class="inline">
                        @csrf
                        <input type="hidden" name="email" value="{{ session('user_email') }}">
                        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Resend Password Email
                        </button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}" class="inline-block px-8 py-4 bg-green-600 text-white rounded-xl font-bold text-lg hover:bg-green-700 transition-colors shadow-lg">
                    Login to Continue
                </a>
            @endguest
            
            <p class="text-sm text-gray-500 mt-8">
                Didn't receive the email? Check your spam folder or contact support.
            </p>
        </div>
    </div>
</body>
</html>
