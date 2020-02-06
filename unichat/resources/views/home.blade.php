@extends('layout.app')

@section('title') Home @endsection

@section('content')
    <div class="jumbotron">
        <h1>UniChat</h1>
        <p class="lead">
            UniChat è il software di messaggistica utilizzato da moltissime università italiane.
        </p>
        <p>
            <a href="{{ route('view.register.get') }}" class="btn btn-primary">Registrati</a>
            <a href="{{ route('view.login.get') }}" class="btn btn-primary">Login</a>
        </p>
    </div>
@endsection
