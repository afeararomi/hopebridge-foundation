{{-- resources/views/emails/scholarship_confirmation.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        h2 { color: #002244; }
        .highlight { color: #F46A1F; font-weight: bold; }
        .footer { margin-top: 20px; font-size: 0.9em; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <p>Dear {{ $applicantName }},</p>
        <p>Thank you for applying to the **HopeBridge Midwestern Scholars Program!**</p>
        <p>Your application has been successfully received. Your unique Application ID is: <strong class="highlight">{{ $applicationId }}</strong></p>
        <p>Please keep this ID safe as you will need it to check the status of your application on our website: <a href="{{ url('/scholarship/status') }}">{{ url('/scholarship/status') }}</a></p>
        <p>We will review your application and get back to you with updates.</p>
        <p>Best regards,</p>
        <p>The HopeBridge Foundation Team</p>
        <div class="footer">
            <p>This is an automated email, please do not reply.</p>
            <p>&copy; {{ date('Y') }} HopeBridge Foundation. All rights reserved.</p>
        </div>
    </div>
</body>
</html>