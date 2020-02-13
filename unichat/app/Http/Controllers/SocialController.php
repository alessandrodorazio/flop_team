<?php


namespace App\Http\Controllers;

use App\Http\Responser;
use App\Social;
use Illuminate\Http\Request;

class SocialController
{
    public function store(Request $request){
        $user = auth()->user();

        $social = new Social;

        $social->name = $request->name;
        $social->value = $request->value;
        $social->user_id = auth()->id();

        $social->save();

        return (new Responser())->success()->item('social', $social)->response();
    }
}
