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
        $validated = $request->validate([
            'id' => 'required|exists:enrollments,id',
            'school_year' => 'required|string',
            'grade_level' => 'required|string',
            'strands' => 'nullable|string',
        ]);
    
        if ($validated['strands']) {
            $validated['strands'] = implode(', ', array_map('trim', explode(',', $validated['strands'])));
        }
    
        $enrollment = Enrollment::findOrFail($validated['id']);
        $enrollment->update($validated);
    
        return redirect()->back()->with('success', 'Enrollment configuration updated!');
    }    
}
