<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LearnerController extends Controller
{
    public function showHomePage()
    {
        return view('homepage');
    }

    public function showEnrollmentForm()
    {
        return view('enrollment');
    }

    public function showStudentVerify()
    {
        return view('studentverify');
    }

    public function showTrackEnrollment()
    {
        return view('trackenrollment');
    }

    public function showControlNum()
    {
        return view('controlnum');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showForgotPassword()
    {
        return view('auth.forgotpassword');
    }

    public function showVerification()
    {
        return view('auth.verifycode');
    }

    public function showChangePassword()
    {
        return view('auth.changepassword');
    }
}