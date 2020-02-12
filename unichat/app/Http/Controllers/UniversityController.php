<?php

namespace App\Http\Controllers;

use App\Http\Responser;
use App\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{

    public function index() {
        $universities = University::all();
        return (new Responser())->success()->item('universities', $universities)->response();
    }

    public function show() {

    }

    public function store(Request $request) {
        if(auth()->user()->type == 10) {
            $university = new University;
            $university->name = $request->name;
            $university->save();
            return (new Responser())->success()->item('university', $university)->response();
        }
        else
            return (new Responser())->failed();
    }

    public function update() {

    }

    public function destroy($university_id)
    {
        $university = University::find($university_id);
        if(! $university){
            return (new Responser())->failed();
        }
        else{
            $university->delete();
            return (new Responser())->success();
        }
    }
}
