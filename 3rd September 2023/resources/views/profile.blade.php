<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profiles</title>
</head>
<body>

    @foreach ($userProfiles as $userProfile)
        <div class="user">
            <h2>{{$userProfile->name}}</h2>
            <h3>{{$userProfile->profiles->profile_name}}</h3>
            <hr>
        </div>
    @endforeach

</body>
</html>
