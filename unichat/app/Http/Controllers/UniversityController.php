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

    public function store() {

    }

    public function update() {

    }

    public function delete() {

    }
}
