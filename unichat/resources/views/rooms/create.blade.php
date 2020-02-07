@extends('layout.app')

@section('title') Nuova stanza @endsection

@section('content')

<h1>Nuova stanza</h1>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="{{ route('view.rooms.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label>Tipo</label>
                <select name="type" id="type" class="form-control">
                    <option value="1">Chat diretta</option>
                    <option value="2">Gruppo</option>
                    <option value="3">Feed</option>
                </select>
            </div>

            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="form-group">
                <label>Descrizione</label>
                <input type="text" name="description" class="form-control">
            </div>

            <div class="form-group">
                <label>Partecipanti</label>
                <select name="users[]" id="users" class="form-control" multiple>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name . ' ' . $user->surname }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Crea</button>

        </form>
    </div>
</div>

@endsection
