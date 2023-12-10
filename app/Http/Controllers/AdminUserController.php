<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'students' => Student::get(),
        ]);
    }

    public function show(Student $student)
    {
        return view('admin.users.show', [
            'students' => $student
        ]);
    }
}
