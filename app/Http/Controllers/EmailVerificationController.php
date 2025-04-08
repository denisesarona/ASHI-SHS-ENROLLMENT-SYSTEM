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
    
        // Look up the verification record
        $verification = VerificationCode::where('email', $request->email)
            ->where('code', $request->code)
            ->where('expires_at', '>=', now())
            ->first();
    
        if (!$verification) {
            return back()->with('error', 'Invalid or expired verification code.');
        }
    
        // Find the admin with the original email
        $admin = Admin::where('email', $verification->email)->first();
    
        if (!$admin) {
            return back()->with('error', 'Admin not found.');
        }
    
        // Prevent overwriting an existing admin's email
        if (Admin::where('email', $verification->new_email)->exists()) {
            return back()->with('error', 'The new email is already in use by another account.');
        }
    
        // Perform the email update
        $admin->email = $verification->new_email;
        $admin->save();
    
        // Clean up verification record
        $verification->delete();
    
        return redirect()->route('dashboard')->with('success', 'Email updated successfully!');
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

        // Fetch pending admin data from session
        $pending = session('pending_admin');

        if (!$pending || $pending['email'] !== $request->email) {
            return back()->with('error', 'Pending admin data not found. Please register again.');
        }

        // Double check: avoid duplicate email
        if (Admin::where('email', $request->email)->exists()) {
            return back()->with('error', 'This email is already taken.');
        }

        // Create the admin
        Admin::create([
            'name' => $pending['name'],
            'email' => $pending['email'],
            'password' => $pending['password'],
            'role' => '1',
        ]);

        // Clean up
        $verification->delete();
        session()->forget('pending_admin');

        return redirect()->route('adminlist')->with('success', 'New admin created successfully!');
    }
}    