<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Confirmation</title>
</head>
<body>
    <div>
        <h1>Dear {{ $data['name'] }},</h1>
        <p>Welcome from Confirmation Appointment Email!</p>
        <p>Your email is: {{ $data['email'] }}</p>
        <p>Your phone number is: {{ $data['phone'] }}</p>
        <p>Your appointment date is: {{ $data['appointment_date'] }}</p>
        <p>Thank you for choosing our services. If you have any questions, feel free to contact us.</p>
        <p>Best regards,<br>[Your Company Name]</p>
    </div>
</body>
</html>
