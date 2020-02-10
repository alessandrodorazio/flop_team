@extends('layout.app')

@section('title') Stanze @endsection

@section('content')

<div class="float-right">
    <a href="http://127.0.0.1:8000/rooms/create" class="btn btn-primary">Nuova stanza</a>
</div>

    <h1>Stanze recenti</h1>

    @foreach($rooms as $room)
        <p>
            <a href="http://127.0.0.1:8000/rooms/{{ $room['id'] }}">{{ $room['name'] }}</a>
        </p>
    @endforeach


@endsection
