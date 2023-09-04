<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        body {
            background: black;
            color: white;
        }
        a:visited {
            color: white;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Welcome</h1>
    <nav style="display: flex; justify-content:center">
        <ul style="list-style: none; padding: 0; font-size: 20px">
            @if(session('is_logged_in') === true)
            <li><a href="{{ route('logout') }}">Logout</a></li>
            @else
                <li><a style="color: white;" href="{{ route('signup-login') }}">Sign in</a></li>
            @endif
        </ul>
    </nav>
</body>
</html>
