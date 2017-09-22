<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
</head>
<body style="font-family: Raleway;">
@if (Route::has('login'))
    <nav class="navbar navbar-fixed-top container" role="navigation" aria-label="main navigation">
        @auth
                <div class="navbar-brand">
                    <a href="{{ url('/home') }}">Home</a>
                </div>
        @else
                    <div class="nav-right">
                        <a class="nav-item" href="{{ route('login') }}">Login</a>
                        <a class="nav-item" href="{{ route('register') }}">Register</a>
                    </div>
        @endauth
    </nav>
@endif
<section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Laravel
            </h1>
            <h2 class="subtitle">
                <strong>Bulma</strong> within...
            </h2>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <nav class="navbar">
            <a class="nav-item" href="https://laravel.com/docs">Documentation</a>
            <a class="nav-item" href="https://laracasts.com">Laracasts</a>
            <a class="nav-item" href="https://laravel-news.com">News</a>
            <a class="nav-item" href="https://forge.laravel.com">Forge</a>
            <a class="nav-item" href="https://github.com/laravel/laravel">GitHub</a>
        </nav>
    </div>
</section>
</body>
</html>
