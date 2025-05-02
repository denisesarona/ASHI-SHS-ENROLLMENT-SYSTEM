<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\VerificationCode;
use App\Models\Learner;
use App\Models\Track;
use App\Models\Strand;
use App\Models\Category;
use App\Models\Enrollment;
use App\Models\Section;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


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
        $learners_count = Learner::where('status', 'enrolled')->count();
        $pending_learners = Learner::where('status', 'pending')->count();
        $recent_learners = Learner::latest()->take(5)->get();

        $males = Learner::where('status', 'enrolled')
                        ->where('gender',   'Male')
                        ->count();
    
        $male_percentage = $learners_count > 0
            ? round(($males / $learners_count) * 100, 2)
            : 0;

        $females = Learner::where('status', 'enrolled')
                        ->where('gender',   'Female')
                        ->count();
    
        $female_percentage = $learners_count > 0
            ? round(($females / $learners_count) * 100, 2)
            : 0;

        $new_enrollments = Learner::where('status', 'enrolled')
                              ->where('created_at', '>=', now()->subDays(1))
                              ->count();
    
        return view('admin.dashboard', compact(
            'learners_count',
            'pending_learners',
            'recent_learners',
            'males',
            'male_percentage',
            'females',
            'female_percentage',
            'new_enrollments',
        ));
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
    
    public function showSection()
    {
        $sections = Section::all();
        $strands = Strand::all();
        $enrollments = Enrollment::all();
        return view('admin.sections', compact ('sections', 'strands', 'enrollments'));
    }
    public function showPendingLearners()
    {
        $learners = Learner::all();
        return view('admin.pendinglearners', compact ('learners'));
    }

    public function showSummary()
    {
        $enrollments = Enrollment::all();
        return view('admin.summary', compact('enrollments'));
    }

    public function showEnrolledLearners()
    {
        $learners = Learner::all();
        $sections = Section::all();
        $strands = Strand::all();
        $enrollments = Enrollment::all();
        return view('admin.enrolledlearners', compact ('learners','sections', 'strands', 'enrollments'));
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
    
    public function autoAssignSections()
    {
        $learners = Learner::where('status', 'enrolled')
            ->whereNull('section_id')
            ->get();

        $sections = Section::with('strands')->get();

        if ($sections->isEmpty()) {
            return redirect()->back()->with('error', 'No sections available.');
        }

        $maxStudentsPerSection = 50;
        $unassignedLearners = [];

        foreach ($learners as $learner) {
            $assigned = false;
            $strandId = $learner->chosen_strand;
            $matchingSections = $sections->filter(function ($section) use ($strandId) {
                return $section->strands->contains('id', $strandId);
            });

            if ($matchingSections->isEmpty()) {
                $unassignedLearners[] = $learner;
                continue;
            }

            foreach ($matchingSections as $section) {
                if ($section->learners_count < $maxStudentsPerSection) {
                    $learner->section_id = $section->id;
                    $learner->save();

                    $section->increment('learners_count');
                    $assigned = true;
                    break;
                }
            }

            if (!$assigned) {
                $unassignedLearners[] = $learner;
            }
        }

        if (count($unassignedLearners) > 0) {
            return redirect()->back()->with('error', count($unassignedLearners) . ' learner(s) could not be assigned due to no matching strands or section capacity full.');
        }

        return redirect()->back()->with('success', 'All learners auto-assigned to sections successfully!');
    }

    
    public function createSection(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'strands' => 'required|array',
        ]);
    
        $section = Section::create([
            'name' => $request->name,
        ]);
    
        $section->strands()->attach($request->strands);
    
        return redirect()->back()->with('success', 'Section created and strands assigned successfully!');
    }    

    public function assignSection(Request $request, $id)
    {
        $learner = Learner::findOrFail($id);
    
        $request->validate([
            'section_id' => 'required|exists:sections,id',
        ]);
    
        $oldSectionId = $learner->section_id;
    
        $learner->section_id = $request->section_id;
        $learner->save();
    
        if ($oldSectionId) {
            Section::where('id', $oldSectionId)->update([
                'learners_count' => Learner::where('section_id', $oldSectionId)->count()
            ]);
        }
    
        Section::where('id', $request->section_id)->update([
            'learners_count' => Learner::where('section_id', $request->section_id)->count()
        ]);
    
        return redirect()->back()->with('success', 'Section assigned successfully.');
    }
    
    
    public function removeSection($id)
    {
        $section = Section::findOrFail($id);
    
        if (!$section) {
            return redirect()->back()->with('error', 'Section not found!');
        }

        $section->delete();
    
        return redirect()->back()->with('success', 'Section deleted successfully.');
    }

    public function updateStrands(Request $request, $id)
    {
        $section = Section::findOrFail($id);
        $section->strands()->sync($request->strands ?? []);

        return redirect()->back()->with('success', 'Strands updated successfully!');
    }

    public function removeLearnerSection($id)
    {
        $learner = Learner::findOrFail($id);
        $oldSectionId = $learner->section_id;
    
        $learner->section_id = null;
        $learner->save();
    
        if ($oldSectionId) {
            Section::where('id', $oldSectionId)->update([
                'learners_count' => Learner::where('section_id', $oldSectionId)->count()
            ]);
        }
    
        return redirect()->back()->with('success', 'Section removed successfully.');
    }    

    public function autoEnrollLearners()
    {
        $learners = Learner::where('status', 'pending')->get();

        foreach ($learners as $learner) {
            $learner->status = 'enrolled';
            $learner->save();
        }

        return redirect()->route('enrolledlearners')->with('success', 'All pending learners have been enrolled.');
    }
}
    
