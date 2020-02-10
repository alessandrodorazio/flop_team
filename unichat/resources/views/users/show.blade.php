@extends('layout.app')

@section('title') Visualizza profilo @endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-3">Profilo di {{ $user['name'] . ' ' . $user['surname'] }}</h1>

            <p>Tipo: {{ ($user['type']==1)?'Studente':(($user['type']==2)?'Docente':'Personale amministrativo') }}</p>

            @if($user['phone_number'])
                <p>Numero di telefono: {{ $user['phone_number'] }}</p>
            @endif
            <p>Indirizzo email: {{ $user['email'] }}</p>

            <p>Università: {{ \App\University::find(\App\Department::find(\App\Faculty::find($user['faculty_id'])->id)->id)->name }}</p>

            @if($user['type'] == 1)
                <p>Facoltà: {{\App\Faculty::find($user['faculty_id'])->name}}</p>

                <p>Anno di corso: {{$user['course_year']}}</p>
            @endif
        </div>
        <div class="col-md-4">
            <h2>Social</h2>
            <table class="table-bordered">
                @foreach($user['social'] as $social)
                    <tr>
                        <th>{{$social['name']}}</th>
                        <td>{{$social['value']}}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>

@endsection
