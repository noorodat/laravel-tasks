<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>

    @foreach ($usersWithComments as $userWithComments)
        <div class="user">
            <h2>{{$userWithComments->name}}</h2>
            <ul>
                @foreach ($userWithComments -> comments as $commnet)
                    <li>
                        {{$commnet->content}}
                    </li>
                @endforeach
            </ul>
        </div>
        <hr>
    @endforeach

</body>
</html>
