@extends('layout.app')

@section('title') Visualizza chat @endsection

@section('content')
    <h1>{{ $room['name'] }}</h1>

    <div>
        @foreach($messages as $message)
            {{ $message['user_id'] }} {{ \Carbon\Carbon::parse($message['created_at'])->format('d/m/Y H:i') }} : {{ $message['text'] }}
        @endforeach

        INVIO MESSAGGIO
    </div>
@endsection
