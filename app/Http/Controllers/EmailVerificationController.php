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
    
        // Get admin ID from session
        $adminId = session('verify_admin_id');
        if (!$adminId) {
            return back()->with('error', 'Session expired. Please try updating your details again.');
        }
    
        // Verify the code
        $verification = VerificationCode::where('email', $request->email)
            ->where('code', $request->code)
            ->where('expires_at', '>=', now())
            ->first();
    
        if (!$verification) {
            return back()->with('error', 'Invalid verification code.');
        }
    
        // Update admin's email
        $admin = Admin::find($adminId);
        if (!$admin) {
            return back()->with('error', 'Admin not found.');
        }
    
        $admin->email = $request->email;
        $admin->save();
    
        $verification->delete();
    
        // Clear session key after successful update
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