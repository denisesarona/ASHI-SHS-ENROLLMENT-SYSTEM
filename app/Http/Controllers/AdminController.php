<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\VerificationCode;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
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

    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function showAdminList()
    {
        $admins = Admin::all();
        return view('admin.adminlist' , compact('admins'));
    }

    public function showAddAdmin()
    {
        return view('admin.addadmin');
    }

    public function showPendingLearners()
    {
        return view('admin.pendinglearners');
    }

    public function showEnrolledLearners()
    {
        return view('admin.enrolledlearners');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('dashboard')->with('success', 'Login successfully');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function adminDetails($id)
    {
        $admin = Admin::findOrFail($id); // Fetch admin or show 404 if not found
    
        session()->flash('success', 'Admin details found successfully!');
    
        return view('admin.admindetails', compact('admin'));
    }

    public function updatePassword(Request $request, $id) {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);
    
        // Find the admin
        $admin = Admin::findOrFail($id);
    
        // Check if the email is being changed
        if ($request->email !== $admin->email) {
            $verificationCode = rand(100000, 999999); // Generate a 6-digit code
    
            // Store verification code and new email in verification_codes table
            VerificationCode::updateOrCreate(
                ['email' => $admin->email], // Store under the current email
                [
                    'code' => $verificationCode,
                    'new_email' => $request->email, // Store the new email temporarily
                    'expires_at' => now()->addMinutes(10),
                ]
            );
    
            // Send verification email
            Mail::to($request->email)->send(new EmailVerificationMail($request->email, $verificationCode));

            return redirect()->route('verify.email.form', ['email' => $admin->email])
                ->with('success', 'A verification code has been sent to your new email. Please verify before the change takes effect.');
        }
    
        // Update name
        $admin->update(['name' => $request->name]);
    
        // Update password if provided
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
            $admin->save();
        }
    
        return back()->with('success', 'Admin details updated successfully!');
    }    

    public function logoutAdmin(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }
}
