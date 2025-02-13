<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 1.5em;
            color: #333;
        }

        .header p {
            font-size: 0.875em;
            color: #666;
        }

        .content {
            margin-bottom: 20px;
        }

        .content p {
            font-size: 1em;
            color: #333;
            margin: 10px 0;
        }

        .content p strong {
            font-weight: bold;
        }

        .footer {
            text-align: center;
            font-size: 0.875em;
            color: #999;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Email Header -->
        <div class="header">
            <h1>Invoice for Your Course Purchase</h1>
            <p>Thank you for purchasing the course!</p>
        </div>

        <!-- Body Content -->
        <div class="content">
            <p>Hello <strong>{{ $user->name }}</strong>,</p>
            <p>Thank you for purchasing the course <strong>"{{ $course->name }}"</strong>. We are excited to have you as
                a student!</p>
            <p>Please find your invoice attached to this email. If you have any questions or concerns, feel free to
                contact us at any time.</p>
            <p>Best regards,</p>
            <p><strong>The {{ config('app.name') }} Team</strong></p>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for your trust and support. We look forward to your success!</p>
        </div>
    </div>
</body>

</html>
