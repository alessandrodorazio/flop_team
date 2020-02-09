<?php

namespace App\Http\Controllers;

use App\Http\Responser;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function show($message_id){

    }

    public function store(Request $request, $room_id) {
        $text = $request->text;
        $user = auth()->user();

        $message = new Message;
        $message->text = $text;
        $message->user_id = $user->id;
        $message->room_id = $room_id;
        $message->save();

        return (new Responser())->success()->item('message', $message)->response();
    }

    public function update(Request $request, $room_id, $message_id) {

    }

    public function delete() {

    }

    public function find($word) {
        $user = auth()->user();
        $messages = Message::where([
            ['user_id', '=', $user],
            ['text', '=', $word],
        ])->get();

        return $messages;
    }

    public function seen($room_id) {
        $user = auth()->user();
        $messages = Message::where([
            ['room_id', '=', $room_id],
            ['user_id', '<>', $user],
            ['seen', '=', 'false'],
        ])->get();
        foreach ($messages as $message){
            $messages->seen = true;
        }

        return 'Succes';
    }

    public function importantmessages($room_id) {
        $messages = Message::where([
            ['room_id', '=', $room_id],
            ['important', '=', 'true'],
        ])->get();

        return $messages;
    }

}
