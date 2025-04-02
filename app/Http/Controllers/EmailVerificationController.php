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

    public function verifyEmail(Request $request) {
        $request->validate([
            'code' => 'required|string',
        ]);
        
        // Find the verification record using the OLD email
        $verification = VerificationCode::where('email', $request->email)
            ->where('code', $request->code)
            ->where('expires_at', '>=', now()) // Ensure code is still valid
            ->first();
        
        if (!$verification) {
            return back()->with('error', 'Invalid or expired verification code.');
        }
        
        // Update the email in the admins table
        $admin = Admin::where('email', $verification->email)->first();
        if ($admin) {
            $admin->email = $verification->new_email; // Assign new email
            $admin->save();
        }
        
        // Delete verification record after successful update
        $verification->delete();
        
        return redirect()->route('dashboard')->with('success', 'Email updated successfully!');
    }        
}    