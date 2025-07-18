<?php

namespace App\Http\Controllers;

use App\Models\Learner; 
use App\Models\Strand;
use App\Models\Track;
use App\Models\Enrollment; 
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LearnerController extends Controller
{
    public function index()
    {
        $strands = Strand::all();
        return view('index', ['strands' => $strands]);

    }

    public function showEnrollmentForm()
    {
        $enrollments = Enrollment::all();
        $categories = Category::all();
        $tracks = Track::with('strands')->get();
        return view('learner.enrollment', compact('enrollments', 'tracks', 'categories'));
    }
    
    public function showEditEnrollmentForm($id)
    {
        $learner = Learner::findOrFail($id);
        $tracks = Track::with('strands')->get();
        $categories = Category::all();
        return view('learner.editenrollment', compact ('learner', 'tracks', 'categories'));
    }

    public function showStudentVerify()
    {
        return view('learner.studentverify');
    }

    public function showTrackEnrollment()
    {
        return view('learner.trackenrollment');
    }

    public function showControlNum($id)
    {
        $learner = Learner::findOrFail($id);
        return view('learner.controlnum', compact('learner'));
    }    

    public function viewStatus()
    {
        return view('learner.viewstatus');
    }

    public function registerLearner(Request $request){
        
        $validator = Validator::make($request->all(), [
            'school_year' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'string|max:255',
            'extension_name' => 'nullable|string',
            'lrn' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'age' => 'required|integer',
            'gender' => 'string|max:255',
            'beneficiary' => 'string|max:255',
            'street' => 'required|string|max:255',
            'baranggay' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'guardian_name' => 'required|string|max:255',
            'guardian_contact' => 'required|string|max:255',
            'relationship_guardian' => 'nullable|string',
            'last_sy' => 'required|string|max:255',
            'last_school' => 'required|string|max:255',
            'learner_category' => 'required|string|max:255',
            'grade10_section' => 'required|string|max:255',
            'front_card' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
            'back_card' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
            'chosen_strand' => 'required|string',
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
            $learner = Learner::where('lrn', $request->lrn)
                          ->where('last_name', $request->last_name)
                          ->first();
    
            if (!$learner) {   
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
                return redirect()->route('controlnum', ['id' => $learner->id])->with('success', 'Learner enrollment successful.');
            } else {
                return redirect()->route('enrollment')->with('error', 'Learner already submitted an enrollment form.');
            }
            
        } catch (\Exception $e) {   
            return redirect()->back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }
    
    public function studentVerification(Request $request){
        $validator = Validator::make($request->all(), [
            'last_name' => 'required|string|max:255',
            'lrn' => 'required|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Find the learner with the given last name and control number
        $learner = Learner::where('lrn', $request->lrn)
                          ->where('last_name', $request->last_name)
                          ->first();
    
        if (!$learner) {   
            return redirect()->route('enrollment')->with('success', 'Proceed with the enrollment!');
        } else {
            return redirect()->route('studentverify')->with('error', 'Learner already submitted an enrollment form.');
        }
    }    

    public function trackEnrollmentStatus(Request $request){
        $validator = Validator::make($request->all(), [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'lrn' => 'required|string|max:255',
            'controlnum' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Find the learner with the given last name and control number
        $learner = Learner::where('id', $request->controlnum)
                          ->where('last_name', $request->last_name)
                          ->where('first_name', $request->first_name)
                          ->where('lrn', $request->lrn)
                          ->first();
    
        if ($learner) {
            // Store in session to persist across multiple requests
            session()->put([
                'last_name' => $learner->last_name,
                'first_name' => $learner->first_name,
                'controlnum' => $learner->id,
                'status' => $learner->status,
                'id' => $learner->id,
            ]);
    
            return redirect()->route('viewstatus')->with('success', 'Learner found successfully!');
        } else {
            return redirect()->route('trackenrollment')->with('error', 'Learner not found.');
        }
    }

    public function editEnrollment($id){
        $learner = Learner::findOrFail($id); // Automatically throws 404 if not found
    
        session()->flash('success', 'Learner details found successfully!');
    
        return view('editenrollment', compact('learner'));
    }
    
    public function update(Request $request, $id){
        $learner = Learner::findOrFail($id);

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($learner->image) {
                Storage::delete('public/' . $learner->image);
            }

            // Store new image
            $path = $request->file('image')->store('learners', 'public');
            $learner->image = $path;
        }

        $learner->update($request->except('image'));

        return redirect()->route('trackenrollment', $id)->with('success', 'Learner details updated successfully!');
    }
}

