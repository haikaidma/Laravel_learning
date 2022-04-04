<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <a href="{{route('user.verify',$token)}}">Verify Email</a>
    <p>Thank you</p>
</body>
</html>