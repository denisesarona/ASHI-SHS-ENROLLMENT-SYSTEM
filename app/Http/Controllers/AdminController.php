<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\VerificationCode;
use App\Models\Learner;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $learners = Learner::all();
        return view('admin.pendinglearners', compact ('learners'));
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

        return back()->with('error', 'Invalid credentials.');
    }

    public function adminDetails($id)
    {
        $admin = Admin::findOrFail($id); // Fetch admin or show 404 if not found
    
        return view('admin.admindetails', compact('admin'));
    }

    public function learnerDetails($id)
    {
        $learner = Learner::findOrFail($id); // Fetch admin or show 404 if not found
    
        return view('admin.learnerdetails', compact('learner'));
    }

    public function updatePassword(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed', // Ensure password confirmation is validated
        ]);
 
        // Find the admin
        $admin = Admin::findOrFail($id);

        // Check if the entered email already exists for another admin
        $existingAdmin = Admin::where('email', $request->email)->where('id', '!=', $id)->first();
        if ($existingAdmin) {
            return back()->with('error', 'This email is already in use by another admin.');
        }

        // Track if any changes were made
        $changesMade = false;

        // Update name if changed
        if ($request->name !== $admin->name) {
            $admin->update(['name' => $request->name]);
            $changesMade = true;
        }

        // Update password if provided
        if ($request->filled('password')) {
            $hashedPassword = Hash::make($request->password); // Hash the password
            $admin->password = $hashedPassword;
            $admin->save(); // Save the changes to the database
            $changesMade = true;
        }

                // Check if email is changed
        if ($request->email !== $admin->email) {
            $verificationCode = rand(100000, 999999); // Generate a 6-digit code

            // Store verification code in verification_codes table
            VerificationCode::updateOrCreate(
                ['email' => $request->email],
                [
                    'code' => $verificationCode,
                    'expires_at' => now()->addMinutes(20),
                ]
            );

            // Send verification email
            session(['verify_admin_id' => $id]);
            Mail::to($request->email)->send(new EmailVerificationMail($request->email, $verificationCode));
            return redirect()->route('verify.email.form', ['email' => $request->email, 'id' => $id])
                ->with('success', 'A verification code has been sent to your email.');
        }


        // If no changes were made, return without success message
        if (!$changesMade) {
            return back()->with('info', 'No changes were made.');
        }

        return back()->with('success', 'Admin details updated successfully!');
    }



    public function logoutAdmin(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login')->with('success', 'You have been logged out successfully.');
    }

    public function addNewAdmin(Request $request)
    {
        // Validate initial input (but don't check for unique email here yet)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        // Check if the email already exists in admins table
        if (Admin::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Email is already registered.');
        }

        // Generate verification code
        $verificationCode = rand(100000, 999999);

        // Store verification record
        VerificationCode::updateOrCreate(
            ['email' => $request->email],
            [
                'code' => $verificationCode,
                'expires_at' => now()->addMinutes(20),
            ]
        );

        session([
            'pending_admin' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        ]);
        
        // Send email
        Mail::to($request->email)->send(new EmailVerificationMail($request->email, $verificationCode));

        return redirect()->route('verify.add-admin-email', ['email' => $request->email])
            ->with('success', 'A verification code has been sent to your email.');
    }

    public function destroy($id)
    {
        $admin = Admin::find($id); 
        if (!$admin) {
            return redirect()->back()->with('error', 'Admin not found!');
        }
    
        $admin->delete();
    
        return redirect()->back()->with('success', 'Admin deleted successfully!');
    }    
    
    public function forgotPassword(Request $request){

        $request->validate([
            'email' => 'required|email',
        ]);

        if (Admin::where('email', $request->email)->exists()) {
            // Generate verification code
            $verificationCode = rand(100000, 999999);

            // Store verification record
            VerificationCode::updateOrCreate(
                ['email' => $request->email],
                [
                    'code' => $verificationCode,
                    'expires_at' => now()->addMinutes(20),
                ]
            );
            
            // Send email
            Mail::to($request->email)->send(new EmailVerificationMail($request->email, $verificationCode));

            session([
                'pending_verification' => [
                    'email' => $request->email,
                ]
            ]);
            // Check if the email already exists in admins table
            return redirect()->route('verifycode', ['email' => $request->email])
            ->with('success', 'A verification code has been sent to your email.');
        } else {
            return redirect()->back()->with('error', 'Email not registered in database.');
        }
    }

    public function changePassword(Request $request)
    {
        // Validate the input password
        $request->validate([
            'password' => 'required|confirmed',
        ]);
    
        // Retrieve the email from session
        $adminEmail = session('pending_password_verification');
    
        // Find the admin by email
        $admin = Admin::where('email', $adminEmail)->first();
    
        // If no admin is found, return an error
        if (!$admin) {
            return redirect()->back()->with('error', 'Email not registered in database.');
        }
    
        // Update password if provided
        if ($request->filled('password')) {
            $hashedPassword = Hash::make($request->password); // Hash the new password
            $admin->password = $hashedPassword;
            $admin->save(); // Save the changes to the database
            
            // Forget the session
            session()->forget('pending_password_verification');
    
            return redirect()->route('login')->with('success', 'Password changed successfully.');
        }
    
        // Return to the previous page if the password is not provided
        return redirect()->back()->with('error', 'Password field is required.');
    }    

    public function updateLearner(Request $request, $id)
    {
        return back()->with('success', 'Admin details updated successfully!');
    }
}
