<html>
<head>
    <title>Talent Finder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/pages/login.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div id="div-background">
        
        <div id="div-content">
            <div id="div-image">
                <img class="noselect" id="login-image" src="{{asset('img/login-img2.svg')}}" alt="">
                <div id="div-page-title">
                    <h1 class="noselect">Talent Finder</h1>
                    <h2 class="noselect">Find qualified people around the world</h2>
                </div>
                <div id="div-form">
                    <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="form-group" id="div-form-title">
                            <h2>Login</h2>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="input" type="email" id="email" name="email" autocomplete="false">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="input" type="password" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <button class="button">Sign in</button>
                            <a href="{{route('register')}}">I don't have an account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>