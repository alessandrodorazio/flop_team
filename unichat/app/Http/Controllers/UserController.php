<?php

namespace App\Http\Controllers;

use App\Http\Responser;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::where('university_id', auth()->user()->getUniversityId())->get();
        return (new Responser())->success()->item('users', $users)->response();
    }

    public function show($user_id) {
        $user = User::find($user_id);
        if(! $user) {
            return (new Responser())->failed()->item('message', 'Utente non trovato')->response();
        }
        if($user->getUniversityId() === auth()->user()->getUniversityId()) {
            return (new Responser())->success()->item('user', $user)->response();
        } else {
            return "Utente non trovato";
        }
    }

    public function update(Request $request, $user_id) {
        $user = User::find($user_id);
        $user->update($request->all());
    }

    public function destroy($user_id) {
        $user = User::find($user_id);
        $user->delete();
    }

    public function filterUsers(Request $request) {

    }
}
