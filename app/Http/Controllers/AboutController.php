<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class AboutController extends Controller
{
       public function index()
    {

            $students = Student::all();
    return view('about', compact('students'));
    }
}
