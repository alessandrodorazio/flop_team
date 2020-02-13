@extends('layout.app')

@section('title') Stanze @endsection

@section('content')

<div class="float-right">
    <a href="http://127.0.0.1:8000/rooms/create" class="btn btn-primary">Nuova stanza</a>
</div>

    <h1>Stanze {{ isset($rooms[0])?(\App\Room::isArchived($rooms[0]['id'])?'archiviate':'recenti'):'' }}</h1>

    <h2>Ricerca stanza</h2>
    <form action="http://127.0.0.1:8000/rooms/search" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8"><input type="text" name="name" class="form-control"></div>
            <div class="col-md-4"><input type="submit" value="Invia" class="btn btn-primary"></div>
        </div>
    </form>

    @foreach($rooms as $room)
        <p>
            <a href="http://127.0.0.1:8000/rooms/{{ $room['id'] }}">{{ \App\Room::realName($room['id']) }} </a> <span class="small">{{ count($room['messages'])?'Ultimo messaggio inviato il '.\App\Room::getLastMessage($room['id']):''  }}</span>
        </p>
    @endforeach


@endsection
