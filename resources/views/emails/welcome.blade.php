<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to HELP</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #0d9488;
        }
        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #0d9488;
            margin-bottom: 10px;
        }
        h1 {
            color: #0d9488;
            font-size: 28px;
            margin-bottom: 20px;
        }
        .info-box {
            background-color: #f0fdfa;
            border-left: 4px solid #0d9488;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .info-box h3 {
            margin-top: 0;
            color: #0d9488;
        }
        .credential {
            background-color: #fff;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #e5e7eb;
        }
        .credential strong {
            color: #0d9488;
            display: block;
            margin-bottom: 5px;
        }
        .credential span {
            font-size: 16px;
            color: #1f2937;
            font-family: 'Courier New', monospace;
        }
        .button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #0d9488;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin: 20px 0;
            text-align: center;
        }
        .button:hover {
            background-color: #0f766e;
        }
        .steps {
            background-color: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
        .step {
            margin: 15px 0;
            padding-left: 30px;
            position: relative;
        }
        .step::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: #0d9488;
            font-weight: bold;
            font-size: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
        .warning {
            background-color: #fef3c7;
            border-left: 4px solid #f59e0b;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">HELP</div>
            <p style="color: #6b7280; margin: 0;">Homeowners Equity & Liquidity Plan</p>
        </div>

        <h1>🎉 Welcome! Your Account is Ready</h1>

        <p>Hi <strong>{{ $user->name }}</strong>,</p>

        <p>Thank you for subscribing to the HELP platform! Your payment has been processed successfully, and your account is now active.</p>

        <div class="info-box">
            <h3>📧 Your Account Information</h3>
            <div class="credential">
                <strong>Email Address (Login):</strong>
                <span>{{ $user->email }}</span>
            </div>
            <div class="credential">
                <strong>Account Status:</strong>
                <span style="color: #059669;">✓ Active & Subscribed</span>
            </div>
        </div>

        <div class="warning">
            <strong>🔐 IMPORTANT: Set Your Password Now</strong>
            <p style="margin: 10px 0 0 0;">Click the button below to create your secure password. This link will expire in 60 minutes.</p>
        </div>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $resetUrl }}" class="button" style="background-color: #dc2626; font-size: 18px; padding: 18px 40px;">
                🔑 Set Your Password Now
            </a>
        </div>

        <div class="info-box" style="background-color: #fef3c7; border-left-color: #f59e0b;">
            <h3 style="color: #92400e;">Password Reset Link:</h3>
            <p style="font-size: 12px; word-break: break-all; color: #78350f; font-family: 'Courier New', monospace;">
                {{ $resetUrl }}
            </p>
            <p style="font-size: 12px; color: #92400e; margin-top: 10px;">
                If the button doesn't work, copy and paste this link into your browser.
            </p>
        </div>

        <div class="steps">
            <h3 style="margin-top: 0; color: #1f2937;">Next Steps:</h3>
            <div class="step">Click the "Set Your Password Now" button above</div>
            <div class="step">Create a strong, secure password</div>
            <div class="step">Log in at <a href="{{ url('/login') }}">{{ url('/login') }}</a></div>
            <div class="step">Access your member dashboard</div>
            <div class="step">Review the three equity pathways</div>
        </div>

        <div style="text-align: center;">
            <p style="color: #6b7280; font-size: 14px; margin-bottom: 10px;">After setting your password:</p>
            <a href="{{ url('/login') }}" class="button">Go to Login Page</a>
        </div>

        <div class="info-box">
            <h3>💡 What You Get:</h3>
            <ul style="margin: 10px 0; padding-left: 20px;">
                <li>Access to three strategic equity pathways</li>
                <li>Detailed guidance on equity participation</li>
                <li>Property development syndicate information</li>
                <li>Direct contact with the strategy team</li>
                <li>Annual subscription ($299 AUD includes GST)</li>
            </ul>
        </div>

        <p><strong>Need Help?</strong><br>
        If you have any questions or need assistance, please contact our support team.</p>

        <div class="footer">
            <p><strong>Homeowners Equity & Liquidity Plan</strong></p>
            <p>This email was sent to {{ $user->email }}</p>
            <p style="font-size: 12px; color: #9ca3af; margin-top: 10px;">
                © {{ date('Y') }} HELP. All rights reserved.
            </p>
        </div>
    </div>
</body>
</html>
