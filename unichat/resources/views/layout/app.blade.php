<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>@yield('title') - UniChat</title>

    <style>
        body {
            background: #fafafa;
        }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">UniChat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if(! session('token'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.register.get') }}">Registrati</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.login.get') }}">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.rooms.index') }}">Stanze</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.users.index') }}">Utenti</a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    @yield('content')
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
