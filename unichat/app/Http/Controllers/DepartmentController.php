<?php

namespace App\Http\Controllers;

use App\User;
use App\Department;
use App\Http\Responser;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index() {
        return (new Responser())->success()->item('departments', Department::all())->response();
    }

    public function show() {

    }

    public function store(Request $request, $university_id) {
        $user = User::find(auth()->id());
        if($user->type == 1) {
            return (new Responser())->failed();
        }
        else {
            $department = new Department;
            if ($user->type == 10) {
                $department->name = $request->name;
                $department->university_id = $university_id;
            } else{
                $department->name = $request->name;
                $department->university_id = auth()->user()->getUniversityId();
            }
            $department->save();
            return (new Responser())->success()->item('department', $department)->response();
        }

    }

    public function update() {

    }

    public function destroy($department_id)
    {
        $department = Department::find($department_id);
        if(! $department) {
            return (new Responser())->failed();
        }
        else {
            $department->delete();
            return (new Responser())->success();
        }
    }
}
