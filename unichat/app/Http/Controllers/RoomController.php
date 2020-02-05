<?php

namespace App\Http\Controllers;

use App\Http\Responser;
use App\Message;
use App\Room;
use App\User;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index() {
        $user = auth()->user();
        $rooms = $user->rooms()->get();
        return (new Responser())->success()->item('rooms', $rooms)->response();
    }

    public function show($room_id) {
        $room = Room::find($room_id);
        return (new Responser())->success()->item('room', $room)->response();
    }

    public function store(Request $request) {
        $members = $request->only('members'); //TODO
        $room = new Room;
        $room->name = $request->name;
        $room->description = $request->description;
        $room->type = $request->type;
        $room->university_id = auth()->user()->getUniversityId();
        $room->save();
        $room->users()->attach([439, 2109]);

        return (new Responser())->success()->item('room', $room)->response();
    }

    public function update(Request $request, $room_id) {
        $room = Room::find($room_id);
        $room->update($request->all());
    }

    public function delete($room_id)
    {
        $room = Room::find($room_id);
        $room->delete;
    }

    public function find() {

    }

    public function muteUser() {

    }

    public function updateAdmins() {

    }

}
