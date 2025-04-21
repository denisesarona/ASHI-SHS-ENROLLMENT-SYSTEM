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
        $enrollment = Enrollment::findOrFail($request->id);
        $enrollment->school_year = $request->school_year;
        $enrollment->grade_level = $request->grade_level;

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

        return redirect()->back()->with('success', 'Enrollment form updated successfully.');
    }
}
