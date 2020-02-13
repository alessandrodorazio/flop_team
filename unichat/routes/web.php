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
    $res = json_decode(Route::dispatch($req)->getContent());
    if($res->access_token)
        session(['token' => $res->access_token]);
    else
        return "error";
    return redirect(config('app.url') . '/rooms');
})->name('view.register.post');

Route::get('/auth/login', function() {
    return View::make('auth.login');
})->name('view.login.get');

Route::post('/auth/login', function(Request $request) {
    $req = Request::create('/api/auth/login', 'POST', $request->toArray());
    $res = json_decode(Route::dispatch($req)->getContent());
    if(! isset($res->access_token)) return "login errato";
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

Route::post('/users/search', function(Request $request) {
    $req = Request::create('/api/users/search', 'POST', $request->toArray());
    $req->headers->set('Authorization', 'Bearer '.session('token'));
    $res = app()->handle($req);
    $responseBody = json_decode($res->getContent(), true);
    $users = $responseBody['users'];
    return View::make('users.index', compact(['users']));
});

Route::post('/users/social/add', function(Request $request) {
    $req = Request::create('/api/users/social/add', 'POST', $request->toArray());
    $req->headers->set('Authorization', 'Bearer '.session('token'));
    $res = app()->handle($req);
    $responseBody = json_decode($res->getContent(), true);
    return redirect(config('app.url') . '/users/'.auth()->id());
});

Route::get('/users/{user_id}', function($user_id) {
    $request = Request::create('api/users/'.$user_id, 'GET');
    $request->headers->set('Authorization', 'Bearer '.session('token'));
    $response = app()->handle($request);
    $responseBody = json_decode($response->getContent(), true);
    $user = \App\User::find($responseBody['user']['id']);
    return View::make('users.show', compact(['user']));
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

Route::post('/rooms', function(Request $request) {
    $req = Request::create('/api/rooms', 'POST', $request->toArray());
    $req->headers->set('Authorization', 'Bearer '.session('token'));
    $res = app()->handle($req);
    $responseBody = json_decode($res->getContent(), true);
    return redirect(config('app.url') . '/rooms');
})->name('view.rooms.store');

Route::post('/rooms/search', function(Request $request) {
    $req = Request::create('/api/rooms/search', 'POST', $request->toArray());
    $req->headers->set('Authorization', 'Bearer '.session('token'));
    $res = app()->handle($req);
    $responseBody = json_decode($res->getContent(), true);
    $rooms = $responseBody['rooms'];
    return View::make('rooms.index', compact(['rooms']));
})->name('view.rooms.search');

Route::get('/rooms/{room_id}/archive', function($room_id) {
    $request = Request::create('api/rooms/'.$room_id.'/archive', 'GET');
    $request->headers->set('Authorization', 'Bearer '.session('token'));
    $res = app()->handle($request);
    $responseBody = json_decode($res->getContent(), true);

    return redirect(config('app.url') . '/rooms/'.$room_id);
});

Route::get('/rooms/{room_id}/dearchive', function($room_id) {
    $request = Request::create('api/rooms/'.$room_id.'/dearchive', 'GET');
    $request->headers->set('Authorization', 'Bearer '.session('token'));
    $res = app()->handle($request);
    $responseBody = json_decode($res->getContent(), true);

    return redirect(config('app.url') . '/rooms/'.$room_id);
});

Route::get('/rooms/archived', function() {
    $request = Request::create('api/rooms/archived', 'GET');
    $request->headers->set('Authorization', 'Bearer '.session('token'));
    $response = app()->handle($request);
    $responseBody = json_decode($response->getContent(), true);
    $rooms = $responseBody['rooms'];
    return View::make('rooms.index', compact(['rooms']));
});

Route::get('/rooms/{room_id}', function($room_id) {
    $req = Request::create('/api/rooms/'.$room_id, 'GET');
    $req->headers->set('Authorization', 'Bearer '.session('token'));
    $response = app()->handle($req);
    $responseBody = json_decode($response->getContent(), true);

    $room = \App\Room::find($responseBody['room']['id']);
    $messages = $responseBody['messages'];

    $req = Request::create('/api/rooms/'.$room_id.'/importantMessages', 'GET');
    $req->headers->set('Authorization', 'Bearer '.session('token'));
    $response = app()->handle($req);
    $responseBody = json_decode($response->getContent(), true);

    $importantMessages = $responseBody['messages'];

    return View::make('rooms.show', compact(['room', 'messages', 'importantMessages']));
})->name('view.rooms.show');

Route::post('/rooms/{room_id}/messages/send', function(Request $request, $room_id) {
    $req = Request::create('/api/rooms/'.$room_id.'/messages', 'POST', $request->toArray());
    $req->headers->set('Authorization', 'Bearer '.session('token'));
    $res = app()->handle($req);
    return redirect(config('app.url') . '/rooms/' . $request->room_id);
});

Route::get('/rooms/{room_id}/messages/{message_id}/important', function($room_id, $message_id) {
    $req = Request::create('/api/rooms/'.$room_id.'/messages/'.$message_id.'/important', 'GET');
    $req->headers->set('Authorization', 'Bearer '.session('token'));
    $res = app()->handle($req);
    return redirect(config('app.url') . '/rooms/' . $room_id);
});

Route::post('/rooms/{room_id}/delete', function(Request $request, $room_id) {
    $req = Request::create('/api/rooms/'.$room_id.'/destroy', 'POST', $request->toArray());
    $req->headers->set('Authorization', 'Bearer '.session('token'));
    $response = app()->handle($req);
    $responseBody = json_decode($response->getContent(), true);
    return redirect(config('app.url') . '/rooms');
});


