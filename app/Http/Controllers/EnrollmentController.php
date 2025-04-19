<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function viewEnrollmentForm()
    {
        $enrollments = Enrollment::all();
        return view('admin.enrollmentform', compact('enrollments'));
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
