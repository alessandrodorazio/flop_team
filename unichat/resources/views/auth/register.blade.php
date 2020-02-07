@extends('layout.app')

@section('title') Registrati @endsection

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Registrati</h1>

            <form action="{{ route('view.register.post') }}" method="post">
                @csrf

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Cognome</label>
                    <input type="text" name="surname" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tipo</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="1" selected>Studente</option>
                        <option value="2">Docente</option>
                        <option value="3">Personale amministrativo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Università</label>
                    <select name="university_id" id="university" class="form-control" onchange="changeUniversity()" required>
                        <option value="" selected disabled>Seleziona un'università...</option>
                        @foreach($universities as $university)
                            <option value="{{ $university->id }}">{{ $university->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Facoltà</label>
                    <select name="faculty_id" id="faculty" class="form-control" required>
                        <option value="#">Seleziona prima un'università...</option>
                    </select>
                </div>

                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Registrati</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function changeUniversity() {
            fetch('{{ route('universities.index') }}/' + $("#university").val() + '/departments').then(function(response) {
                return response.json()
            }).then(function(myBlob) {
                console.log();
                $('#faculty').html('');
                myBlob.departments.forEach(element => {
                    $('#faculty').append('<option value="' + element.id + '">' + element.name + '</option>');
                });
            });
        }
    </script>
@endsection
