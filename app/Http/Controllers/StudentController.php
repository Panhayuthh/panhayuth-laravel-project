<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        
        $studentDatas = [[
            'id' => 1,
            'name' => 'John Doe',
            'faculty' => 'Science',
            'program' => 'Physics'
        ], [
            'id' => 2,
            'name' => 'Jane Doe',
            'faculty' => 'Arts',
            'program' => 'English'
        ], [
            'id' => 3,
            'name' => 'John Smith',
            'faculty' => 'Commerce',
            'program' => 'Accounting'
        ]];
        return view('students.index')
        ->with('name', 'John Doe')
        ->with('students', $studentDatas); 
    }
}
