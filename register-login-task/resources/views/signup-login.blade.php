<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/signup-login.css') }}">
</head>
<body>
    <div class="container">

        <div class="wrapper">
          <div class="title-text">
            <div class="title login">Login</div>
            <div class="title signup">Signup</div>
          </div>


        <div class="form-container">
          <div class="slide-controls">
            <input type="radio" name="slider" id="login" checked>
            <input type="radio" name="slider" id="signup">
            <label for="login" class="slide text-login">Login</label>
            <label for="signup" class="slide text-signup">Signup</label>
            <div class="slide-tab"></div>
          </div>


          <div class="form-inner">
            <form class="login" method="POST" action="{{ route('signup-login') }}">
                @csrf
                <input type="hidden" name="form_type" value="login">
              <div class="field">
                <input id="s-email" type="text" name="in-email">
                <label>Email</label>
                <span style="color: red">@error('in-email'){{$message}}@enderror</span>
              </div>
              <div class="field box-pass">
                <input id="lpass" class="password" type="password"   name="in-pass">
                <label>Password</label>
                <i class="icon-password  bi-eye-slash-fill"></i>
                <span style="color: red">@error('in-pass'){{$message}}@enderror</span>
              </div>
              <div class="field">
                <input class="btn-login" type="submit" value="Login">
              </div>
            </form>


            <form action="{{ route('signup-login') }}" class="signup" method="POST">
                @csrf
                <input type="hidden" name="form_type" value="signup">
                <div class="field">
                    <input id="uname" type="text" maxlength="35"  name="up-uname">
                    <label id="uname" >Name</label>
                </div>
                <div class="field">
                    <input id="email" type="email" maxlength="35"  name="up-email">
                    <label id="lemail" >Email</label>
                    <span style="color: red">@error('up-email'){{$message}}@enderror</span>
                </div>
                <div class="field box-pass">
                    <input id="pass" class="password" type="password" name="up-pass">
                    <label>Password</label>
                    <span style="color: red">@error('up-pass'){{$message}}@enderror</span>
                    <i class="icon-password  bi-eye-slash-fill"></i>
                </div>
                <div class="field box-pass">
                    <input id="cpass" class="password" type="password" name="up-conf-pass">
                    <label>Confirm password</label>
                    <i class="icon-password  bi-eye-slash-fill"></i>
                </div>
                <div class="field">
                    <div class="field">
                        <input class="btn btn-signup" type="submit" value="Sign up">
                      </div>
                </div>
            </form>

          </div>
        </div>
      </div>

    </div>

    <div id="modalContainer">
      <div class="modal-content">
        <i class="bi bi-exclamation-circle-fill"></i>
        <p class="paragraf">
          The information entered is incorrect
        </p>
        </div>
    </div>

    <img class="mooj" src="https://iili.io/HXsukuV.png">

    <script src="{{ asset('js/signup-login.js') }}"></script></script>
</body>
</html>
