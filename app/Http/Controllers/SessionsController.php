<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function store(LoginRequest $request)
    {   
        $admins = User::pluck('email')->all();
        if(in_array($request->email, $admins))
        {
            $request->authenticate();

            $request->session()->regenerate();

            return redirect('/');
        } else {
            if(Auth::guard('student')->attempt(['school_id' => $request->email, 'password' => $request->password]))
            {
                // ddd(auth()->guard('student')->user());

                auth()->guard('student')->login(Student::where('school_id', $request->email)->first());

                return redirect()->route('student.requests.index');
            }
            return back()->withErrors(['email' => 'Entered Credentials Invalid']);
        }
    }
}
