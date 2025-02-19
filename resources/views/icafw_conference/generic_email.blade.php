<!DOCTYPE html>
<html>

<head>
    <title>{{ $content['subject'] }}</title>
</head>

<body>
    <p>Dear {{ $content['recipient_name'] }},</p>

    {!! $content['body'] !!} <!-- Render the body as HTML -->

    <p>Best regards,<br>The Conference Team</p>
</body>

</html>
