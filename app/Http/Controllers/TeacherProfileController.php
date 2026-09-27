<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $teacher = $user->teacher;

        if (! $teacher) {
            abort(404, 'Teacher profile not found.');
        }

        return view('teachers.profile', compact('teacher'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $teacher = $user->teacher;

        if (! $teacher) {
            abort(404, 'Teacher profile not found.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['nullable', 'in:Male,Female'],
            'date_of_birth' => ['nullable', 'date'],
            'phone' => ['nullable', 'string', 'max:30'],
            'qualification' => ['nullable', 'string', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'joining_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string', 'max:1000'],
        ]);

        $teacher->update($validated);

        $user->update([
            'name' => $validated['name'],
        ]);

        return back()->with(
            'success',
            'Your teacher profile has been updated successfully.'
        );
    }
}
