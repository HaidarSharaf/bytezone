<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Placed Successfully!</title>
</head>
<body style="font-family: Arial, sans-serif; background: #f9f9f9; margin: 0; padding: 0;">

        <div style="text-align: center; margin-bottom: 20px;">
                <img src="{{ asset('/AppLogo/Logo.png') }}" alt="BYTE ZONE" style="max-width: 50px; vertical-align: middle;">
                <span style="font-size: 30px; font-weight: 800; color: #FF4D30; padding-left: 8px;">BYTE ZONE</span>
        </div>

        <div style="max-width: 600px; margin: 0 auto; padding: 40px; background: #f9f9f9; border: 1px solid #e5e5e5; border-radius: 6px;">
            <h2 style="color: #0D1B2A;">Order placed</h2>

            <p>Dear {{ $user->name ?? 'User' }},</p>

            <p>
                Your order has been placed successfully. The total price of the order is ${{$order->total_price}}. Your payment method is: {{$order->payment_method}}
            </p>


            <p style="margin-top: 20px;">
                You can track your order using this link:
                <a href="{{ route('order', $order) }}">Order</a>
            </p>

            <p style="margin-top: 20px;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>

</body>
</html>
