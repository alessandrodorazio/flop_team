<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Responser;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index($university_id) {
        $departments = Department::where('university_id', $university_id)->get();
        return (new Responser())->success()->item('departments', $departments)->response();
    }

    public function show($university_id, $department_id) {
        $department = Department::find($department_id);
        return (new Responser())->success()->item('department', $department)->response();
    }

    public function store(Request $request, $university_id) {
        if(auth()->user()->getType() == 1)
            return "I tuoi diritti non ti permettono di creare una facoltà";
        else {
            $department = new Department;
            if (auth()->user()->getType() == 10) {
                $department->name = $request->name;
                $department->university_id = $university_id;
            } else{
                $department->name = $request->name;
                $department->university_id = auth()->user()->getUniversityId();
            }
            $department->save();
        }

        return (new Responser())->success()->item('department', $department)->response();
    }

    public function update() {

    }

    public function destroy($department_id)
    {
        $department = Department::find($department_id);
        if(! $department) {
            return "Dipartimento non trovato";
        }
        else {
            $department->delete();
            return "Dipartimento eliminato";
        }
    }
}
