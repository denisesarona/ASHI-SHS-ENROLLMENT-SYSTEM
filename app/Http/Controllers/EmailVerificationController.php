<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\VerificationCode;

class EmailVerificationController extends Controller
{

    public function verifyAdminCode(Request $request)
    {
        return view('admin.verification', ['email' => $request->email]);
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
            'code' => 'required|string',
        ]);

        $verification = VerificationCode::where('email', $request->email)
            ->where('code', $request->code)
            ->where('expires_at', '>=', now())
            ->first();

        if (!$verification) {
            return back()->with('error', 'Invalid or expired code.');
        }

        $adminData = json_decode($verification->data, true);

        // Double check: avoid duplicate email
        if (Admin::where('email', $verification->new_email)->exists()) {
            return back()->with('error', 'This email is already taken.');
        }

        // Create the admin
        Admin::create([
            'name' => $adminData['name'],
            'email' => $verification->new_email,
            'password' => $adminData['password'],
            'role' => '1',
        ]);

        // Clean up
        $verification->delete();

        return redirect()->route('adminlist')->with('success', 'New admin created successfully!');
    }
}    