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

    public function find($message_id) {
        $message = Message::find($message_id);
        if(! $message){
            return (new Responser())->failed();
        }
        else {
            return (new Responser())->success()->item('message', $message)->response();
        }

    }

    public function importantmessages($room_id) {
        $messages = Message::where([
            ['room_id', '=', $room_id],
            ['important', '=', 'true'],
        ])->get();

        return $messages;
    }

}
