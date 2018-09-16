<!DOCTYPE HTML>
<html lang="zxx">
<head>
    <title>Features Bangla</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Particles Login Form Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
    <!-- Stylesheets -->
    <link href="/css/login_style.css" rel='stylesheet' type='text/css' />
    <!-- online fonts-->
    <link href="https://fonts.googleapis.com/css?family=Amiri:400,400i,700,700i" rel="stylesheet">
    <style>
        .help-block{
            background-color: #d61b1b;
            padding: 0 10px 0 10px;
        }
    </style>
</head>

<body>
<!--  particles  -->
<div id="particles-js"></div>
<!-- //particles -->
<div class="w3ls-pos">
    <h2>Features Bangla</h2>
    <div class="w3ls-login box">
        <!-- form starts here -->
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="agile-field-txt{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="col-md-6">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="info@example.com" autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="agile-field-txt{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" placeholder="******" required="" id="password" />
                @if ($errors->has('password'))
                    <span class="help-block">
                     <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div class="agile_label">
                    <input class="check" for="check3" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </div>
            </div>

            <div class="w3ls-bot">
                <input type="submit" value="LOGIN">
                {{--<a class="forget" href="{{ route('password.request') }}">--}}
                <a class="forget" href="#">
                    Forgot Your Password?
                </a>
            </div>
        </form>
    </div>
    <!-- //form ends here -->
    <!--copyright-->
    <div class="copy-wthree">
        <p>© 2018 Features Bangla. All Rights Reserved</p>
    </div>
    <!--//copyright-->
</div>
<!-- scripts required  for particle effect -->
<script src='/js/particles.min.js'></script>
<script src="/js/index.js"></script>
<!-- //scripts required for particle effect -->
</body>

</html>