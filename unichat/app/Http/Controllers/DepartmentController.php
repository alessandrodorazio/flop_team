<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //
    public function index() {

    }

    public function show() {

    }

    public function store(Request $request) {
        $department = new Department;
        $department->name = $request->name;
        $department->university_id = auth()->user()->getUniversityId();
        $department->save();

        return (new Responser())->success()->item('department', $department)->response();
    }

    public function update() {

    }

    public function delete($department_id)
    {
        $department = Department::find($department_id);
        $department->delete;
    }
}
