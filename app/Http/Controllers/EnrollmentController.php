<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Track;
use App\Models\Strand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function viewEnrollmentForm()
    {
        // Check if there are enrollments, and create one if there aren't any
        if (Enrollment::count() == 0) {
            Enrollment::create([
                'school_year' => '2025-2026',
                'grade_level' => 'Grade 11',
                'track_id' => 1, // Make sure this track exists
            ]);
        }
    
        $enrollments = Enrollment::all();
        $tracks = Track::all();
    
        return view('admin.enrollmentform', compact('enrollments', 'tracks'));
    }
     
    public function updateForm(Request $request)
    {
        // Validate input
        $request->validate([
            'school_year' => 'required|string',
            'grade_level' => 'required|string',
            'track_id' => 'nullable|exists:tracks,id',
            'new_track_name' => 'nullable|string',
            'strand_ids' => 'array',
        ]);
    
        // Check if a new track is entered
        if ($request->has('new_track_name') && $request->new_track_name != '') {
            // Create the new track if it doesn't already exist
            $track = Track::create(['name' => $request->new_track_name]);
    
            // Set the track_id to the newly created track
            $track_id = $track->id;
        } else {
            // Use the selected track if no new track is entered
            $track_id = $request->track_id;
        }
    
        // Update the enrollment
        $enrollment = Enrollment::findOrFail($request->id);
        $enrollment->update([
            'school_year' => $request->school_year,
            'grade_level' => $request->grade_level,
            'track_id' => $track_id,
        ]);
    
        // Update strands
        $enrollment->strands()->sync($request->strand_ids);
    
        return redirect()->route('viewenrollmentform')->with('success', 'Enrollment form updated successfully');
    }     
}
