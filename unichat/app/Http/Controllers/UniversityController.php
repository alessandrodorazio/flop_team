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
        if(auth()->user()->getType() == 10) {
            $university = new University;
            $university->name = $request->name;
            $university->save();
        }
        else
            return "I tuoi diritti non ti permettono di creare un'università";

        return (new Responser())->success()->item('university', $university)->response();
    }

    public function update() {

    }

    public function delete($university_id)
    {
        $university = University::find($university_id);
        if(! $university){
            return "Università non trovata";
        }
        else{
            $university->delete();
            return "Università eliminata";
        }
    }
}
