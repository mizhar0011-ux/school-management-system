<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    /**
     * Show the logged-in student's profile.
     */
    public function edit()
    {
        $user = auth()->user();

        $student = $user->student;

        if (! $student) {
            abort(404, 'Student profile not found.');
        }

        return view('students.profile', compact('student'));
    }

    /**
     * Update the logged-in student's profile.
     */
    public function update(Request $request)
    {
        $user = auth()->user();

        $student = $user->student;

        if (! $student) {
            abort(404, 'Student profile not found.');
        }

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'gender' => [
                'nullable',
                'in:Male,Female',
            ],

            'date_of_birth' => [
                'nullable',
                'date',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'guardian_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'guardian_phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'class_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'section' => [
                'nullable',
                'string',
                'max:50',
            ],

            'address' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $student->update($validated);

        $user->update([
            'name' => $validated['name'],
        ]);

        return back()->with(
            'success',
            'Your student profile has been updated successfully.'
        );
    }
}
