@extends('layout.app')

@section('title') Visualizza chat @endsection

@section('content')
    <div>
        <div class="row">
            <div class="col-md-4">
                <h1>{{ \App\Room::realName($room->id) }}</h1>
                <p>
                    <strong>Partecipanti</strong>
                    <br>
                @foreach($room->users()->get() as $u)
                    {{ \App\User::getFullName($u->id) }}
                        <br>
                @endforeach
                </p>
                @if($room->description)
                <p>
                    <strong>Descrizione</strong>
                    {{ $room->description }}
                </p>
                @endif

                @if(\App\Room::isArchived($room->id))
                    <a href="http://127.0.0.1:8000/rooms/{{$room->id}}/dearchive" class="btn btn-primary">Rimuovi archiviazione</a>
                @else
                    <a href="http://127.0.0.1:8000/rooms/{{$room->id}}/archive" class="btn btn-primary">Archivia</a>
                @endif

                <form action="http://127.0.0.1:8000/rooms/{{$room->id}}/delete" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>

                <h2>Messaggi importanti</h2>

                <div style="margin:4px, 4px; padding:4px; width: 500px; height: 300px; overflow-x: hidden; overflow-x: auto; text-align:justify; ">
                    @foreach($importantMessages as $message)
                        <p>
                            {{ \App\User::getFullName($message['user_id']) }} <span class="small">[{{ \Carbon\Carbon::parse($message['created_at'])->format('d/m/Y H:i') }}]</span> : {{ $message['text'] }}
                        </p>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8">
                <div style="margin:4px, 4px; padding:4px; width: 500px; height: 400px; overflow-x: hidden; overflow-x: auto; text-align:justify; ">
                    @foreach($messages as $message)
                        <p>
                            {{ \App\User::getFullName($message['user_id']) }} <span class="small">[{{ \Carbon\Carbon::parse($message['created_at'])->format('d/m/Y H:i') }}]</span>
                            @if(! $message['important'])(<a href="http://127.0.0.1:8000/rooms/{{$room['id']}}/messages/{{$message['id']}}">Importante</a>)@endif : {{ $message['text'] }}
                        </p>
                    @endforeach
                </div>

                <form action="http://127.0.0.1:8000/rooms/{{$room->id}}/messages/send" method="post" class="mt-3">
                    @csrf
                    <input type="hidden" name="user_id" value="{{auth()->id()}}">
                    <input type="hidden" name="room_id" value="{{$room->id}}">
                    <div class="input-group mb-3">
                        <input type="text" name="text" class="form-control" placeholder="Invia un messaggio">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Invia</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
