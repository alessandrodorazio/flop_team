@extends('layout.app')

@section('title') Lista utenti @endsection

@section('content')

    <h1>Lista utenti</h1>

    <ul>
        <div class="row">
        @foreach($users as $user)
            <div class="col-md-4">
                <li><a href="http://127.0.0.1:8000/users/{{ $user['id'] }}">{{ $user['name'] . ' ' . $user['surname'] }}</a></li>
            </div>
        @endforeach
        </div>
    </ul>

@endsection
