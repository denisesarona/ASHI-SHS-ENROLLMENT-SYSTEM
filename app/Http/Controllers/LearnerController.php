<?php

namespace App\Http\Controllers;

use App\Models\Learner; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LearnerController extends Controller
{
    public function showHomePage()
    {
        return view('homepage');
    }

    public function showEnrollmentForm()
    {
        return view('enrollment');
    }

    public function showEditEnrollmentForm()
    {
        return view('editenrollment');
    }

    public function showStudentVerify()
    {
        return view('studentverify');
    }

    public function showTrackEnrollment()
    {
        return view('trackenrollment');
    }

    public function showControlNum($id)
    {
        $learner = Learner::findOrFail($id); // Fetch learner data by ID
        return view('controlnum', compact('learner'));
    }    

    public function viewStatus()
    {
        return view('viewstatus');
    }

    public function registerLearner(Request $request){
        $validator = Validator::make($request->all(), [
            'school_year' => 'required|string|max:255',
            'grade_level' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'extension_name' => 'string|max:255',
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
            'relationship_guardian' => 'string|max:255',
            'last_sy' => 'required|string|max:255',
            'last_school' => 'required|string|max:255',
            'learner_category' => 'required|string|max:255',
            'grade10_section' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'chosen_strand' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('image', 'public');
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
                'image' => $imagePath,
                'chosen_strand' => $request->chosen_strand,
                'status' => $request->status,
            ]);

            return redirect()->route('controlnum', ['id' => $learner->id])->with('success', 'Learner enrollment successful.');
        } catch (\Exception $e) {
            Log::error('Enrollment Error: ' . $e->getMessage()); // Log the actual error message
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
            'controlnum' => 'required|integer',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Find the learner with the given last name and control number
        $learner = Learner::where('id', $request->controlnum)
                          ->where('last_name', $request->last_name)
                          ->first();
    
        if ($learner) {
            // Store in session to persist across multiple requests
            session()->put([
                'last_name' => $learner->last_name,
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

        return redirect()->route('trackenrollment', $id)->with('success', 'Learner updated successfully!');
    }
}

