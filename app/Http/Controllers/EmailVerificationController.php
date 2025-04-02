<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\VerificationCode;

class EmailVerificationController extends Controller
{
    
    public function sendVerificationEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // Generate verification code
        $verificationCode = rand(100000, 999999);

        // Store verification code in database
        VerificationCode::updateOrCreate(
            ['email' => $request->email],
            [
                'code' => $verificationCode,
                'expires_at' => Carbon::now()->addMinutes(10) // Expire in 10 mins
            ]
        );

        // Send verification email
        Mail::to($request->email)->send(new EmailVerificationMail($request->email, $verificationCode));

        return back()->with('success', 'Verification code sent to your email.');
    }

    public function verifyAdminCode(Request $request)
    {
        return view('auth.adminemailverification', ['email' => $request->email]);
    }

    public function verifyEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string'
        ]);

        // Find the verification record
        $verification = VerificationCode::where('email', $request->email)
                    ->where('code', $request->code)
                    ->where('expires_at', '>=', now())
                    ->first();

        if (!$verification) {
            return back()->with('error', 'Invalid or expired verification code.');
        }

        // Mark email as verified
        VerificationCode::where('email', $verification->email)->update(['email_verified_at' => now()]);

        // Delete verification record
        $verification->delete();

        return redirect()->route('dashboard')->with('success', 'Email verified successfully.');
    }
}