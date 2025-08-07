{{-- resources/views/emails/contact.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; }
        h2 { color: #002244; }
        .details p { margin: 5px 0; }
        .footer { margin-top: 20px; font-size: 0.9em; color: #777; }
    </style>
</head>
<body>
    <div class="container">
        <h2>New Contact Form Submission from HopeBridge Foundation Website</h2>
        <p>You have received a new message from the contact form:</p>

        <div class="details">
            <p><strong>Name:</strong> {{ $formData['contact_name'] }}</p>
            <p><strong>Email:</strong> {{ $formData['contact_email'] }}</p>
            <p><strong>Subject:</strong> {{ $formData['contact_subject'] }}</p>
            <p><strong>Message:</strong></p>
            <p style="padding-left: 15px; border-left: 3px solid #F46A1F; margin-left: 10px;">
                {{ $formData['contact_message'] }}
            </p>
        </div>

        <p>Thank you.</p>
        <div class="footer">
            <p>This is an automated notification from HopeBridge Foundation website.</p>
        </div>
    </div>
</body>
</html>