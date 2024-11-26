<x-mail::message>
    <div>
        <h1>Dear {{ $data['name'] }},</h1>
        <p>Welcome from Confirmation Appointment Email!</p>
        <p>Your email is: {{ $data['email'] }}</p>
        <p>Your phone number is: {{ $data['phone'] }}</p>
        <p>Your appointment date is: {{ $data['appointment_date'] }}</p>
        <p>Thank you for choosing our services. If you have any questions, feel free to contact us.</p>
        <p>Best regards,<br>[Your Company Name]</p>
    </div>

    Thanks,Vcare-Clinic
    {{ config('app.name') }}
</x-mail::message>
