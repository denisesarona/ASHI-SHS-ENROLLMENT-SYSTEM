<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\VerificationCode;
use App\Models\Learner;
use App\Models\Track;
use App\Models\Strand;
use App\Models\Category;
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

    public function showSummary()
    {
        return view('admin.summary');
    }

    public function showEnrolledLearners()
    {
        $learners = Learner::all();
        return view('admin.enrolledlearners', compact ('learners'));
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
        $admin = Admin::findOrFail($id);
    
        return view('admin.admindetails', compact('admin'));
    }

    public function learnerDetails($id)
    {
        $learner = Learner::findOrFail($id); 
        $tracks = Track::with('strands')->get();
        $categories = Category::all();

        return view('admin.learnerdetails', compact('learner', 'tracks', 'categories'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'confirmed',
        ]);
 

        $admin = Admin::findOrFail($id);

        $existingAdmin = Admin::where('email', $request->email)->where('id', '!=', $id)->first();
        if ($existingAdmin) {
            return back()->with('error', 'This email is already in use by another admin.');
        }

        $changesMade = false;

        if ($request->name !== $admin->name) {
            $admin->update(['name' => $request->name]);
            $changesMade = true;
        }

        if ($request->filled('password')) {
            $hashedPassword = Hash::make($request->password);
            $admin->password = $hashedPassword;
            $admin->save();
            $changesMade = true;
        }

        if ($request->email !== $admin->email) {
            $verificationCode = rand(100000, 999999);

            VerificationCode::updateOrCreate(
                ['email' => $request->email],
                [
                    'code' => $verificationCode,
                    'expires_at' => now()->addMinutes(20),
                ]
            );

            session(['verify_admin_id' => $id]);
            Mail::to($request->email)->send(new EmailVerificationMail($request->email, $verificationCode));
            return redirect()->route('verify.email.form', ['email' => $request->email, 'id' => $id])
                ->with('success', 'A verification code has been sent to your email.');
        }

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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        if (Admin::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Email is already registered.');
        }

        $verificationCode = rand(100000, 999999);

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
            $verificationCode = rand(100000, 999999);

            VerificationCode::updateOrCreate(
                ['email' => $request->email],
                [
                    'code' => $verificationCode,
                    'expires_at' => now()->addMinutes(20),
                ]
            );
            
            Mail::to($request->email)->send(new EmailVerificationMail($request->email, $verificationCode));

            session([
                'pending_verification' => [
                    'email' => $request->email, 
                ]
            ]);
            return redirect()->route('verifycode', ['email' => $request->email])
            ->with('success', 'A verification code has been sent to your email.');
        } else {
            return redirect()->back()->with('error', 'Email not registered in database.');
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);
    
        $adminEmail = session('pending_password_verification');
    
        $admin = Admin::where('email', $adminEmail)->first();
    
        if (!$admin) {
            return redirect()->back()->with('error', 'Email not registered in database.');
        }

        if ($request->filled('password')) {
            $hashedPassword = Hash::make($request->password); 
            $admin->password = $hashedPassword;
            $admin->save(); 
            
            session()->forget('pending_password_verification');
    
            return redirect()->route('login')->with('success', 'Password changed successfully.');
        }
    
        return redirect()->back()->with('error', 'Password field is required.');
    }    

    public function updateLearner(Request $request, $id)
    {
        $learner = Learner::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($learner->image) {
                Storage::delete('public/' . $learner->image);
            }

            $path = $request->file('image')->store('learners', 'public');
            $learner->image = $path;
        }

        try {
            $learner->fill($request->except('image'));
            $learner->save();

            return back()->with('success', 'Learner details updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function removeLearner($id)
    {
        $learner = Learner::find($id); 
        if (!$learner) {
            return redirect()->back()->with('error', 'Learner not found!');
        }
    
        $learner->delete();
    
        return redirect()->back()->with('success', 'Learner deleted successfully!');
    }   

    public function updateLearnerStatus(Request $request, $id)
    {
        $learner = Learner::findOrFail($id);
    
        try {
            $learner->status = $request->status;
            $learner->save();
    
            return back()->with('success', 'Learner status updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
}
