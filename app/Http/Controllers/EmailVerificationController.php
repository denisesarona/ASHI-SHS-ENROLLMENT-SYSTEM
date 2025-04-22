<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\VerificationCode;
use App\Models\Admin;

class EmailVerificationController extends Controller
{

    public function verifyAdminCode(Request $request)
    {
        return view('admin.verification', ['email' => $request->email]);
    }

    public function showverifyAddAdmin(Request $request)
    {
        return view('admin.verificationadd-admin', ['email' => $request->email]);
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string',
        ]);
    
        $adminId = session('verify_admin_id');
        if (!$adminId) {
            return back()->with('error', 'Session expired. Please try updating your details again.');
        }
    
        $verification = VerificationCode::where('email', $request->email)
            ->where('code', $request->code)
            ->where('expires_at', '>=', now())
            ->first();
    
        if (!$verification) {
            return back()->with('error', 'Invalid verification code.');
        }

        $admin = Admin::find($adminId);
        if (!$admin) {
            return back()->with('error', 'Admin not found.');
        }
    
        $admin->email = $request->email;
        $admin->save();
    
        $verification->delete();
    
        session()->forget('verify_admin_id');
    
        return redirect()->route('admindetails', $adminId)->with('success', 'Email verified and updated successfully!');
    }
    
    
    public function verifyAddAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string'
        ]);

        $verification = VerificationCode::where('email', $request->email)
            ->where('code', trim($request->code))
            ->where('expires_at', '>=', now())
            ->first();

        if (!$verification) {
            return back()->with('error', 'Invalid or expired code.');
        }

        $pending = session('pending_admin');

        if (!$pending || $pending['email'] !== $request->email) {
            return back()->with('error', 'Pending admin data not found. Please register again.');
        }

        if (Admin::where('email', $request->email)->exists()) {
            return back()->with('error', 'This email is already taken.');
        }

        Admin::create([
            'name' => $pending['name'],
            'email' => $pending['email'],
            'password' => $pending['password'],
            'role' => '1',
        ]);

        $verification->delete();
        session()->forget('pending_admin');

        return redirect()->route('adminlist')->with('success', 'New admin created successfully!');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $verificationEmail = session('pending_verification');
    
        $verification = VerificationCode::where($verificationEmail)
            ->where('code', $request->code)
            ->where('expires_at', '>=', now())
            ->first();
    
        if (!$verification) {
            return back()->with('error', 'Invalid verification code.');
        }

        $verification->delete();
        session()->forget('pending_admin');

        session([
            'pending_password_verification' => [
                $verificationEmail,
            ]
        ]);

        return redirect()->route('changepassword', ['email' => $request->email])
        ->with('success', 'Valid verification code.');
    }
}    