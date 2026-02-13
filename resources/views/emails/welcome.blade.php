<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Your Password - HELP</title>
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
        }
        .logo {
            font-size: 32px;
            font-weight: bold;
            color: #0d9488;
            margin-bottom: 10px;
        }
        h1 {
            color: #1f2937;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .button {
            display: inline-block;
            padding: 18px 40px;
            background-color: #dc2626;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 18px;
            margin: 20px 0;
            text-align: center;
        }
        .button:hover {
            background-color: #b91c1c;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">HELP</div>
        </div>

        <h1>Set Your Password</h1>

        <p style="text-align: center; font-size: 16px; color: #4b5563;">
            Welcome, <strong>{{ $user->name }}</strong>!<br>
            Click the button below to set your password and access your dashboard.
        </p>

        <div style="text-align: center; margin: 40px 0;">
            <a href="{{ $resetUrl }}" class="button">
                Set Your Password
            </a>
        </div>

        <p style="text-align: center; font-size: 14px; color: #6b7280;">
            This link will expire in 60 minutes.
        </p>

        <div class="footer">
            <p>© {{ date('Y') }} HELP Platform. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
