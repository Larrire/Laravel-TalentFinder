<html>
<head>
    <title>Talent Finder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/pages/404.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
    <div id="div-background">
        <div id="div-error-message">
            <h1>Error 404</h1>
            <h2>Page not found</h2>
            <a href="{{url('home')}}" id="home-page-link" class="button">Go back to home page</a>
        </div>
    </div>
</body>
</html>