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
use App\Models\Summary;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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
                    

        $enrollment_school_year = DB::table('enrollments')->value('school_year');
        $summaries = Summary::where('school_year', '=', $enrollment_school_year)->count();
    
        return view('admin.dashboard', compact(
            'learners_count',
            'pending_learners',
            'recent_learners',
            'males',
            'male_percentage',
            'females',
            'female_percentage',
            'new_enrollments',
            'summaries',
            'enrollment_school_year',
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

    public function showAddLearner(){

        $enrollments = Enrollment::all();
        $categories = Category::all();
        $tracks = Track::all();

        return view('admin.addlearner', compact('enrollments', 'categories', 'tracks'));
    }

    public function showSection()
    {
        $sections = Section::all();
        $strands = Strand::all();
        $enrollments = Enrollment::all();
    
        $currentSY = Enrollment::latest('school_year')->value('school_year');
    
        $learnerCounts = Learner::where('school_year', $currentSY)
            ->select('section_id', DB::raw('count(*) as total'))
            ->groupBy('section_id')
            ->pluck('total', 'section_id');
    
        return view('admin.sections', compact('sections', 'strands', 'enrollments', 'currentSY', 'learnerCounts'));
    }
    
    
    public function showPendingLearners()
    {
        $learners = Learner::all();
        return view('admin.pendinglearners', compact ('learners'));
    }

    public function showSummary()
    {
        $summaries = Summary::all();
        $schoolYears = Summary::select('school_year')->distinct()->pluck('school_year');
        $sections = Summary::select('section')->distinct()->pluck('section');
    
        $selectedYear = null;
        $selectedSection = null;
    
        return view('admin.summary', compact(
            'summaries',
            'schoolYears',
            'sections',
            'selectedYear',
            'selectedSection'
        ));
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

    public function summaryDetails($id)
    {
        $summaries = Summary::findOrFail($id);
        $tracks = Track::with('strands')->get();
        $categories = Category::all();

        return view('admin.summarydetails', compact('summaries', 'tracks', 'categories'));
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
            'role' => 'required|in:super_admin,teacher_admin',
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
                'role' => $request->role,
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

        try {
            if ($request->hasFile('front_card')) {
                if ($learner->front_card) {
                    Storage::delete('public/' . $learner->front_card);
                }
                $learner->front_card = $request->file('front_card')->store('image', 'public');
            }

            if ($request->hasFile('back_card')) {
                if ($learner->back_card) {
                    Storage::delete('public/' . $learner->back_card);
                }
                $learner->back_card = $request->file('back_card')->store('image', 'public');
            }

            $learner->fill($request->except(['front_card', 'back_card']));
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

        $maxStudentsPerSection = 60;
        $unassignedLearners = [];

        $alsSection = $sections->where('name', 'ALS')->first();
        if (!$alsSection) {
            return redirect()->back()->with('error', 'ALS section not found. Please create a section named "ALS" first.');
        }

        foreach ($learners as $learner) {
            $assigned = false;

            $category = Category::find($learner->learner_category);

            if ($category && $category->name === 'ALS Graduate') {
                if ($alsSection->learners_count < $maxStudentsPerSection) {
                    $learner->section_id = $alsSection->id;
                    $learner->save();

                    $alsSection->increment('learners_count');
                    $assigned = true;
                } else {
                    $unassignedLearners[] = $learner;
                }
            } else {
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
        }

        if (count($unassignedLearners) > 0) {
            return redirect()->back()->with('error', count($unassignedLearners) . ' learner(s) could not be assigned due to no matching strands or full sections.');
        }

        return redirect()->back()->with('success', 'All learners have been auto-assigned to sections successfully!');
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
    
    public function saveSchoolYearData()
    {
        try {
            $learners = Learner::with(['category', 'strand'])->where('status', 'enrolled')->get();
        
            if ($learners->isEmpty()) {
                return redirect()->back()->with('error', 'No enrolled learners found for this school year.');
            }

            $dataToInsert = $learners->map(function ($learner) {
                return [
                    'school_year' => $learner->school_year, 
                    'grade_level' => $learner->grade_level, 
                    'last_name' => $learner->last_name,
                    'first_name' => $learner->first_name, 
                    'middle_name' => $learner->middle_name,
                    'extension_name' => $learner->extension_name,
                    'lrn' => $learner->lrn,
                    'birthdate' => $learner->birthdate,
                    'age' => $learner->age,
                    'gender' => $learner->gender,
                    'beneficiary' => $learner->beneficiary,
                    'street' => $learner->street,
                    'baranggay' => $learner->baranggay,
                    'municipality' => $learner->municipality,
                    'province' => $learner->province,
                    'guardian_name' => $learner->guardian_name,
                    'guardian_contact' => $learner->guardian_contact,
                    'relationship_guardian' => $learner->relationship_guardian,
                    'last_sy' => $learner->last_sy,
                    'last_school' => $learner->last_school,
                    'learner_category' => optional($learner->category)->name ?? 'N/A',
                    'chosen_strand' => optional($learner->strand)->name ?? 'N/A',
                    'grade10_section' => $learner->grade10_section,
                    'image' => $learner->image,
                    'section' => optional($learner->section)->name,
                ];
            })->toArray();

            Summary::insert($dataToInsert);
        
            Learner::where('status', 'enrolled')->delete();
            Section::query()->update(['learners_count' => 0]);
            
        
            return redirect()->route('viewenrollmentform')
                ->with('success', 'All enrolled learners data in this School Year has been saved.');
            
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function filterSection(Request $request)
    {
        $schoolYear = $request->input('school_year');
        $sectionName = $request->input('section');
    
        $filteredLearners = Learner::query();
    
        if ($schoolYear) {
            $filteredLearners->where('school_year', $schoolYear);
        }
    
        if ($sectionName) {
            $section = Section::where('name', $sectionName)->first();
            if ($section) {
                $filteredLearners->where('section_id', $section->id);
            } else {
                $filteredLearners->whereRaw('0 = 1');
            }
        }
    
        $learners = $filteredLearners->get();
    
        return view('admin.enrolledlearners', [
            'learners' => $learners,
            'sections' => Section::all(),
            'enrollments' => Enrollment::all(),
            'selectedSection' => $sectionName,
            'selectedYear' => $schoolYear,
        ]);
    }

    public function summaryFilterSection(Request $request)
    {
        $schoolYears = Summary::select('school_year')->distinct()->pluck('school_year');
        $sections = Summary::select('section')->distinct()->pluck('section');
        $schoolYear = $request->input('school_year');
        $sectionName = $request->input('section');

        $filteredSummaries = Summary::query();

        if ($schoolYear) {
            $filteredSummaries->where('school_year', $schoolYear);
        }

        if ($sectionName) {
            $filteredSummaries->where('section', $sectionName);
        }

        $summaries = $filteredSummaries->get();

        return view('admin.summary', [
            'summaries' => $summaries,
            'sections' => $sections,
            'schoolYears' => $schoolYears,
            'selectedYear' => $schoolYear,
            'selectedSection' => $sectionName,
        ]);   
    }

    public function addNewLearner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'school_year' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'extension_name' => 'nullable|string|max:255',
            'lrn' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'age' => 'required|integer',
            'gender' => 'nullable|string|max:255',
            'beneficiary' => 'nullable|string|max:255',
            'street' => 'required|string|max:255',
            'baranggay' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'guardian_name' => 'required|string|max:255',
            'guardian_contact' => 'required|string|max:255',
            'relationship_guardian' => 'nullable|string|max:255',
            'last_sy' => 'required|string|max:255',
            'last_school' => 'required|string|max:255',
            'learner_category' => 'required|string|max:255',
            'grade10_section' => 'required|string|max:255',
            'front_card' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
            'back_card' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
            'chosen_strand' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $frontCardPath = null;
        $backCardPath = null;
        if($request->hasFile('front_card')){
            $frontCardPath = $request->file('front_card')->store('image', 'public');
        }

        if($request->hasFile('back_card')){
            $backCardPath = $request->file('back_card')->store('image', 'public');
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $learner = Learner::create([
                'school_year' => $request->school_year,
                'grade_level' => $request->grade_level,
                'last_name' => $request->last_name,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'extension_name' => $request->extension_name,
                'lrn' => $request->lrn,
                'birthdate' => $request->birthdate,
                'age' => $request->age,
                'gender' => $request->gender,
                'beneficiary' => $request->beneficiary,
                'street' => $request->street,
                'baranggay' => $request->baranggay,
                'municipality' => $request->municipality,
                'province' => $request->province,
                'guardian_name' => $request->guardian_name,
                'guardian_contact' => $request->guardian_contact,
                'relationship_guardian' => $request->relationship_guardian,
                'last_sy' => $request->last_sy,
                'last_school' => $request->last_school,
                'learner_category' => $request->learner_category,
                'grade10_section' => $request->grade10_section,
                'front_card' => $frontCardPath,
                'back_card' => $backCardPath,
                'chosen_strand' => $request->chosen_strand,
                'status' => $request->status,
            ]);

            return redirect()->route('pendinglearners')->with('success', 'Learner enrollment successful.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while saving the learner.')->withInput();
        }
    }

    public function searchLearner(Request $request)
    {
        $searchTerm = $request->input('search_name');

        $learners = Learner::query()
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where('first_name', 'like', "%{$searchTerm}%")
                    ->orWhere('last_name', 'like', "%{$searchTerm}%");
            })
            ->with('section')
            ->get();

        $enrollments = Enrollment::all();
        $sections = Section::all();

        return view('admin.enrolledlearners', compact('learners', 'enrollments', 'sections'));
    }

    public function searchLearnerSummary(Request $request)
    {
        $searchTerm = $request->input('search_name');

        $summaries = Summary::query()
            ->when($searchTerm, function ($query, $searchTerm) {
                $query->where('first_name', 'like', "%{$searchTerm}%")
                    ->orWhere('last_name', 'like', "%{$searchTerm}%");
            })
            ->get();
        
        $schoolYears = Summary::select('school_year')->distinct()->pluck('school_year');
        $sections = Summary::select('section')->distinct()->pluck('section');
    
        $selectedYear = null;
        $selectedSection = null;
    
        return view('admin.summary', compact(
            'summaries',
            'schoolYears',
            'sections',
            'selectedYear',
            'selectedSection'
        ));
    }
}    
    
