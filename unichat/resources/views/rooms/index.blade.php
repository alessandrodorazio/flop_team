@extends('layout.app')

@section('title') Stanze @endsection

@section('content')

<div class="float-right">
    <a href="http://127.0.0.1:8000/rooms/create" class="btn btn-primary">Nuova stanza</a>
</div>

    <h1>Stanze {{ isset($rooms[0])?(\App\Room::isArchived($rooms[0]['id'])?'archiviate':'recenti'):'' }}</h1>

    @foreach($rooms as $room)
        <p>
            <a href="http://127.0.0.1:8000/rooms/{{ $room['id'] }}">{{ \App\Room::realName($room['id']) }} </a> <span class="small">{{ count($room['messages'])?'Ultimo messaggio inviato il '.\App\Room::getLastMessage($room['id']):''  }}</span>
        </p>
    @endforeach


@endsection
