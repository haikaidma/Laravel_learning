<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <a href="http://127.0.0.1:8000/reset-password?token={{ $token }}&email={{ $email }}">click</a>
    <p>Thank you</p>
</body>
</html>