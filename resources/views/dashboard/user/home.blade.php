<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User login</title>
</head>
<body>
    <p>user dashboard</p>
    <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
    <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
</body>
</html>