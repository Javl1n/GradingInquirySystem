<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class StudentRequestController extends Controller
{
    public function index()
    {
        return view('student.requests.index');
    }

    public function show(\App\Models\Request $request)
    {
        return view('student.requests.show', [
            'grades' => Grade::where('student_id', $request->student->id)->where('school_year', $request->school_year)->where('semester', $request->semester)->get(),
            'student' => $request->student,
            'schoolYear' => $request->school_year . '-' . ++$request->school_year,
            'semester' => $request->semester,
        ]);
    }
}
