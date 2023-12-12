<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function index()
    {
        return view('admin.courses.index', [
            'courses' => Course::get(),
        ]);
    }
}
