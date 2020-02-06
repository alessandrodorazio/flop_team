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

Route::get('/', function() {
    if(! session('token')) {
        return View::make('home');
    }

    return redirect()->route('view.rooms.index');
})->name('view.home');

Route::get('/auth/register', function() {
    return View::make('auth.register');
})->name('view.register.get');

Route::post('/auth/register', function() {

})->name('view.register.post');

Route::get('/auth/login', function() {
    return View::make('auth.login');
})->name('view.login.get');

Route::post('/auth/login', function() {

})->name('view.login.post');

Route::get('/rooms', function() {
    return View::make('rooms.index');

})->name('view.rooms.index');

Route::get('/users', function() {
    return View::make('users.index');
})->name('view.users.index');

Route::get('/users/{user_id}', function() {
    return View::make('users.show');
});

Route::post('/rooms', function() {

})->name('view.rooms.store');

Route::get('/rooms/{room_id}', function() {

})->name('view.rooms.show');

Route::post('/messages/search', function() {

})->name('view.messages.search');
