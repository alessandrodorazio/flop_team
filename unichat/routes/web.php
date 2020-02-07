<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use \Illuminate\Http\Request;

Route::get('/', function() {
    return View::make('home');
})->name('view.home');

Route::get('/auth/register', function() {
    $universities = \App\University::all();
    return View::make('auth.register', compact(['universities']));
})->name('view.register.get');

Route::post('/auth/register', function(Request $request) {
    $req = Request::create('/api/auth/register', 'POST', $request->toArray());
    $res = Route::dispatch($req);
    session(['token' => $res->access_token]);
    return redirect(config('app.url') . '/rooms');
})->name('view.register.post');

Route::get('/auth/login', function() {
    return View::make('auth.login');
})->name('view.login.get');

Route::post('/auth/login', function(Request $request) {
    $req = Request::create('/api/auth/login', 'POST', $request->toArray());
    $res = json_decode(Route::dispatch($req)->getContent());
    session(['token' => $res->access_token]);
    return redirect(config('app.url') . '/rooms');
})->name('view.login.post');

Route::get('/auth/logout', function() {
    session()->remove('token');
    return redirect(config('app.url') . '/');
})->name('view.logout.get');


Route::get('/users', function() {
    $request = Request::create('api/users', 'GET');
    $request->headers->set('Authorization', 'Bearer '.session('token'));
    $response = app()->handle($request);
    $responseBody = json_decode($response->getContent(), true);
    $users = $responseBody['users'];
    return View::make('users.index', compact(['users']));
})->name('view.users.index');

Route::get('/users/{user_id}', function() {
    return View::make('users.show');
});

Route::get('/rooms', function() {
    $request = Request::create('api/rooms', 'GET');
    $request->headers->set('Authorization', 'Bearer '.session('token'));
    $response = app()->handle($request);
    $responseBody = json_decode($response->getContent(), true);
    $rooms = $responseBody['rooms'];
    return View::make('rooms.index', compact(['rooms']));
})->name('view.rooms.index');

Route::get('/rooms/create', function() {
    $request = Request::create('api/users', 'GET');
    $request->headers->set('Authorization', 'Bearer '.session('token'));
    $response = app()->handle($request);
    $responseBody = json_decode($response->getContent(), true);
    $users = $responseBody['users'];
    return View::make('rooms.create', compact(['users']));
})->name('view.rooms.create');

Route::post('/rooms', function() {

})->name('view.rooms.store');

Route::get('/rooms/{room_id}', function() {

})->name('view.rooms.show');

Route::post('/messages/search', function() {

})->name('view.messages.search');
