<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Http\Responser;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    //
    public function index()
    {

    }

    public function show() {

    }

    public function store(Request $request) {
        if(auth()->user()->type == 1)
            return (new Responser())->failed();
        else{
            $faculty = new Faculty;
            if (auth()->user()->type == 10) {
                $faculty->name = $request->name;
                $faculty->department_id = $request->department_id;
            } else {
                $faculty->name = $request->name;
                $faculty->department_id = auth()->user()->getDepartmentId();
                }
            $faculty->save();
            return (new Responser())->success()->item('faculty', $faculty)->response();
        }

    }

    public function update()
    {

    }

    public function destroy($faculty_id)
    {
        $faculty = Faculty::find($faculty_id);
        if(! $faculty) {
            return (new Responser())->failed();
        }
        else {
            $faculty->delete();
            return (new Responser())->success();
        }
    }
}
