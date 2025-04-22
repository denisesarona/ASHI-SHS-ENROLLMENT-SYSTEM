<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Track;
use App\Models\Strand;
use App\Models\Category;
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
        $categories = Category::all();
    
        return view('admin.enrollmentform', compact('enrollments', 'tracks', 'categories'));
    }
     
    public function updateSY(Request $request)
    {
        $enrollment = Enrollment::findOrFail($request->id);
        $enrollment->school_year = $request->school_year;
        $enrollment->grade_level = $request->grade_level;

        $enrollment->save();

        return redirect()->back()->with('success', 'School Year and Grade Level updated successfully.');
    }

    public function updateCategory(Request $request)
    {
        if ($request->filled(['name', 'description'])) {
            Category::create([
                'name' => $request->name,
                'description' => $request->description
            ]);

            return redirect()->back()->with('success', 'Category added successfully.');
        } else {
            return redirect()->back()->with('error', 'Please fill in all required fields.');
        }
    }


    public function updateTrackStrand(Request $request)
    {
        $enrollment = Enrollment::findOrFail($request->id);
        // Handle track creation or selection
        if ($request->filled('new_track_name')) {
            $track = Track::create(['name' => $request->new_track_name]);
        } elseif ($request->filled('track_id')) {
            $track = Track::find($request->track_id);
        }

        // Handle new strand creation and associate with the track
        if ($request->filled('new_strand_name') && isset($track)) {
            $strand = new Strand([
                'name' => $request->new_strand_name,
            ]);
            $strand->track()->associate($track); // if using belongsTo
            $strand->save();

            $enrollment->strands()->attach($strand->id); // assuming many-to-many
        }

        $enrollment->save();

        return redirect()->back()->with('success', 'Tracks and Strands updated successfully.');
    }

    public function removeTrack($id)
    {
        $track = Track::findOrFail($id);
    
        // Delete related strands first
        $track->strands()->delete();
    
        // Delete track
        $track->delete();
    
        return redirect()->back()->with('success', 'Track and its strands deleted successfully.');
    }
    

    public function removeStrand($id)
    {
        $strand = Strand::findOrFail($id);
        if (!$strand) {
            return redirect()->back()->with('error', 'Strand not found!');
        }
    
        $strand->delete();
    
        return redirect()->back()->with('success', 'Strand deleted successfully!');
    }    
}



