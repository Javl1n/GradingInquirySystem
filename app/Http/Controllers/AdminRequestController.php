<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminRequestController extends Controller
{
    public function index()
    {
        return view('admin.requests.index', [
            'requests' => \App\Models\Request::get(),
        ]);
    }

    public function show(\App\Models\Request $request)
    {

        // ddd($request->student->grades()->where('school_year', $request->school_year)->where('semester', $request->semester)->get());

        return view('admin.requests.show', [
            'request' => $request,
            'grades' => $request->student->grades()->where('school_year', $request->school_year)->where('semester', $request->semester)->latest(),
        ]);
    }
}
