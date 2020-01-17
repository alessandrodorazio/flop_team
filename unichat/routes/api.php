<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/auth/register', 'AuthController@register')->name('register');
Route::get('/auth/login', 'AuthController@login')->name('login');
Route::post('/auth/login', 'AuthController@login')->name('login');
Route::post('/auth/logout', 'AuthController@logout')->name('logout');
Route::get('/auth/info', 'AuthController@me')->name('info');


Route::resource('/users', 'UserController')->only(['index', 'show', 'store', 'update', 'delete']);
Route::post('/users/filter', 'UserController@filterUsers');

Route::resource('/universities', 'UniversityController')->only(['index', 'show', 'store', 'update', 'delete']);

Route::resource('/departments', 'DepartmentController')->only(['index', 'show', 'store', 'update', 'delete']);

Route::resource('/faculties', 'FacultyController')->only(['index', 'show', 'store', 'update', 'delete']);

Route::resource('/rooms', 'RoomController')->only(['index', 'show', 'store', 'update', 'delete']);
Route::post('/rooms/{room_id}/user/{user_id}/mute', 'RoomController@muteUser')->name('rooms.mute_user');
Route::post('/rooms/{room_id}/admins/update', 'RoomController@updateAdmins')->name('rooms.update_admins');
Route::post('/rooms/find', 'RoomController@find')->name('rooms.find');

Route::resource('/rooms/{room_id}/messages', 'MessageController')->only(['show', 'store', 'update', 'delete']);


Route::post('/admin/ban', 'AdminController@ban_user')->name('admin.ban_user');

Route::resource('/reports', 'ReportController')->only(['index', 'show', 'store', 'update', 'delete']);
Route::get('/reports/user/{user_id}/all', 'ReportController@filterByUser')->name('reports.filter_by_user');

