@extends('layout.app')

@section('title') Lista utenti @endsection

@section('content')

    <h1>Lista utenti</h1>

    <h2>Ricerca utente</h2>
    <form action="http://127.0.0.1:8000/users/search" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                   Nome
                   <input type="text" name="name" class="form-control" placeholder="Nome">
               </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    Cognome
                    <input type="text" name="surname" class="form-control" placeholder="Cognome">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    Anno di corso
                    <input type="text" name="course_year" class="form-control" placeholder="Anno di corso">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    Facoltà
                    <select name="faculty_id" id="faculty_id" class="form-control">
                        @foreach(\App\Faculty::where('id', auth()->user()->faculty_id)->get() as $faculty )
                            <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="float-right"><input type="submit" value="Invia" class="btn btn-primary"></div>
    </form>

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
