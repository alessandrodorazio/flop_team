<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    //
    public function index()
    {

    }

    public function show() {

    }

    public function store(Request $request, $department_id) {
        $faculty = new Faculty;
        $faculty->name = $request->name;
        $faculty->department_id = $department_id;
        $faculty->save();

        return (new Responser())->success()->item('faculty', $faculty)->response();
    }

    public function update()
    {

    }

    public function delete($faculty_id)
    {
        $faculty = Faculty::find($faculty_id);
        $faculty->delete;
    }
}
