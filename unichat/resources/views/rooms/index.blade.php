@extends('layout.app')

@section('title') Stanze @endsection

@section('content')

    <h1>Stanze recenti</h1>

    <a href="http://127.0.0.1:8000/rooms/create">Nuova stanza</a>

    @foreach($rooms as $room)
        <p>
            <a href="{{ route('view.rooms.show', $room->id) }}">{{ $room->name }}</a>
        </p>
    @endforeach


@endsection
