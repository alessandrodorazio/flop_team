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
        if(auth()->user()->getType() == 1)
            return "I tuoi diritti non ti permettono di creare una facoltà";
        else{
            $faculty = new Faculty;
            if (auth()->user()->getType() == 10) {
                $faculty->name = $request->name;
                $faculty->department_id = $department_id;
            } else {
                $faculty->name = $request->name;
                $faculty->department_id = auth()->user()->getDepartmentId();
                }
            $faculty->save();
        }

        return (new Responser())->success()->item('faculty', $faculty)->response();
    }

    public function update()
    {

    }

    public function destroy($faculty_id)
    {
        $faculty = Faculty::find($faculty_id);
        if(! $faculty) {
            return "Facoltà non trovata";
        }
        else {
            $faculty->delete();
            return "Facoltà eliminata";
        }
    }
}
