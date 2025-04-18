<?php

// app/Http/Controllers/EnrollmentController.php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function create()
    {
        return view('admin.enrollment.create'); // your blade file
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_year' => 'required|string',
            'grade_level' => 'required|string',
            'strands' => 'nullable|string',
        ]);

        // Convert strands into an array if comma-separated
        if ($validated['strands']) {
            $validated['strands'] = array_map('trim', explode(',', $validated['strands']));
        }

        Enrollment::create($validated);

        return redirect()->back()->with('success', 'Enrollment settings saved!');
    }

    public function index()
    {
        $enrollments = Enrollment::all();
        return view('admin.enrollment.index', compact('enrollments'));
    }
}
