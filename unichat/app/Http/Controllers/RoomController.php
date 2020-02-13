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
        $user = User::find(auth()->id());
        $rooms = $user->rooms()->where('room_members.archived', 0)->get();
        return (new Responser())->success()->item('rooms', $rooms)->response();
    }

    public function show($room_id) {
        $room = Room::find($room_id);
        $messages = Message::where('room_id', $room_id)->get();

        $user = auth()->user();
        Message::where([
            ['room_id', '=', $room_id],
            ['user_id', '<>', $user],
            ['seen', '=', 0],
        ])->update(['seen' => 1]);

        $messages = Message::where('room_id', $room_id)->get();

        return (new Responser())->success()->item('room', $room)->item('messages', $messages)->response();
    }

    public function store(Request $request) {
        $room = new Room;
        $room->name = $request->name;
        $room->description = $request->description;
        $room->type = $request->type;
        $room->university_id = auth()->user()->getUniversityId();
        $room->save();
        $room->users()->attach(auth()->id());
        $room->users()->attach($request->users);

        return (new Responser())->success()->item('room', $room)->response();
    }

    public function update(Request $name, $description, $room_id) {
        $room = Room::find($room_id);
        $room->name = $name;
        $room->description = $description;
        return (new Responser())->success()->item('room', $room)->response();

        return $room;
    }

    public function destroy($room_id)
    {
        $room = Room::find($room_id);
        if(! $room) {
            return (new Responser())->failed();
        }
        $room->delete();
        return (new Responser())->success();
    }

    public function find() {

    }

    public function muteUser() {

    }

    public function updateAdmins() {

    }

    public function archives($room_id) {
        \DB::table('room_members')->where([['user_id', auth()->id()],['room_id', $room_id]])->update(['archived' => 1]);
        $room = Room::find($room_id);
        return (new Responser())->success()->item('room', $room)->response();

    }

    public function archived() {
        $user = User::find(auth()->id());
        $rooms = $user->rooms()->where('room_members.archived', 1)->get();
        return (new Responser())->item('rooms', $rooms)->response();
    }

}
