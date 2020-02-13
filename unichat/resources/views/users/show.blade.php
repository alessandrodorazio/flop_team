@extends('layout.app')

@section('title') Visualizza profilo @endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1 class="mb-3">Profilo di {{ $user->name . ' ' . $user->surname }}</h1>

            <p>Tipo: {{ ($user->type==1)?'Studente':(($user->type==2)?'Docente':'Personale amministrativo') }}</p>

            @if($user['phone_number'])
                <p>Numero di telefono: {{ $user->phone_number }}</p>
            @endif
            <p>Indirizzo email: {{ $user->email }}</p>

            <p>Università: {{ \App\University::find($user->getUniversityId())->name }}</p>

            @if($user['type'] == 1)
                <p>Facoltà: {{\App\Faculty::find($user->faculty_id)->name}}</p>

                <p>Anno di corso: {{$user->course_year}}</p>
            @endif
        </div>
        <div class="col-md-4">
            <h2>Social</h2>
            <table class="table-bordered">
                @if($user->id === auth()->id())
                    <form action="http://127.0.0.1:8000/users/social/add" method="post">
                        @csrf
                        <div class="form-group">
                            Nome
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            Link
                            <input type="text" name="value" class="form-control">
                        </div>
                        <input type="submit" value="Invia" class="btn btn-primary">
                    </form>
                @endif
                @foreach($user->social as $social)
                    <tr>
                        <th>{{$social['name']}}</th>
                        <td>{{$social['value']}}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>

@endsection
