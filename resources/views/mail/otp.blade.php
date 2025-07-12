<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Verify Email</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f9f9f9; margin: 0; padding: 0;">

        <div style="text-align: center; margin-bottom: 20px;">
                <img src="{{ asset('/AppLogo/Logo.png') }}" alt="BYTE ZONE" style="max-width: 50px; vertical-align: middle;">
                <span style="font-size: 30px; font-weight: 800; color: #FF4D30; padding-left: 8px;">BYTE ZONE</span>
        </div>

        <div style="max-width: 600px; margin: 0 auto; padding: 40px; background: #f9f9f9; border: 1px solid #e5e5e5; border-radius: 6px;">
            <h2 style="color: #0D1B2A;">Email Verification</h2>

            <p>Hello {{ $user->name ?? 'User' }},</p>

            <p>Your One-Time Password (OTP) is:</p>

            <h1 style="color: #FF4D30; font-size: 36px; letter-spacing: 4px;">{{ $otp }}</h1>

            <p style="margin-top: 20px;">
                Enter this code in the app to verify your email address.
            </p>

            <p style="margin-top: 40px; font-size: 13px; color: #888;">
                If you didn’t request this, you can safely ignore this message.
            </p>

            <p style="margin-top: 20px;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>

</body>
</html>
