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
        $university = new University;
        $university->name = $request->name;
        $university->save();

        return (new Responser())->success()->item('university', $university)->response();
    }

    public function update() {

    }

    public function delete($university_id)
    {
        $university = University::find($university_id);
        $university->delete;
    }
}
