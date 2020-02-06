@extends('layout.app')

@section('title') Login @endsection

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h1>Login</h1>
            <form action="{{ route('view.login.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="float-right">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
