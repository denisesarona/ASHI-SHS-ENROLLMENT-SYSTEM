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
        return view('auth.adminemailverification', ['email' => $request->email]);
    }

    // Handle verification
    public function verifyEmail(Request $request) {
        $request->validate(['code' => 'required|string']);

        // Find the verification record
        $verification = VerificationCode::where('email', $request->email)
                    ->where('code', $request->code)
                    ->where('expires_at', '>=', now())
                    ->first();

        if (!$verification) {
            return back()->with('error', 'Invalid or expired verification code.');
        }

        // Activate the new email
        VerificationCode::where('email', $verification->email)->update(['email_verified_at' => now()]);

        // Delete verification record
        $verification->delete();

        return redirect()->route('dashboard')->with('success', 'Email verified successfully.');
    }
}