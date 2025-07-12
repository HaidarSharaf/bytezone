<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $subject }}</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f9f9f9; margin: 0; padding: 0;">
<table width="100%" cellpadding="0" cellspacing="0" style="background: #f9f9f9; padding: 20px 0;">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #eee; padding: 32px;">
                <tr>
                    <td align="center" style="padding-bottom: 20px;">
                        <img src="{{ asset('/AppLogo/Logo.png') }}" alt="BYTE ZONE" style="max-width: 50px; vertical-align: middle;">
                        <span style="font-size: 30px; font-weight: 800; color: #FF4D30; padding-left: 8px;">BYTE ZONE</span>
                    </td>
                </tr>
                <tr>
                    <td style="color: #0D1B2A; font-size: 18px; font-weight: bold; padding-bottom: 16px;">
                        {{ $subject }}
                    </td>
                </tr>
                @if($imagePath)
                    <tr>
                        <td style="padding-bottom: 16px;">
                            <img src="{{ asset('storage/' . $imagePath) }}" style="width: 100%; height: auto;">
                        </td>
                    </tr>
                @endif
                <tr>
                    <td align="center" style="padding-bottom: 16px;">
                        <a href="{{ config('app.url') }}" style="background-color: #FF4D30; color: #fff; font-weight: bold; padding: 12px 24px; border-radius: 8px; text-decoration: none; display: inline-block;">
                            Shop Now
                        </a>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-size: 12px; color: #888;">
                        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
