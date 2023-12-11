<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class AdminSubjectController extends Controller
{
    public function index()
    {
        return view('admin.subjects.index', [
            'subjects' => Subject::all(),
        ]);
    }
}
