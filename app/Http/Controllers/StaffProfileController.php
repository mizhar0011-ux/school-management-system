<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        $staff = $user->staff;

        if (! $staff) {
            abort(404, 'Staff profile not found.');
        }

        return view('staff.profile', compact('staff'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $staff = $user->staff;

        if (! $staff) {
            abort(404, 'Staff profile not found.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['nullable', 'in:Male,Female'],
            'date_of_birth' => ['nullable', 'date'],
            'phone' => ['nullable', 'string', 'max:30'],
            'department' => ['nullable', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'joining_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string', 'max:1000'],
        ]);

        $staff->update($validated);

        // Keep the login user's name synchronized
        $user->update([
            'name' => $validated['name'],
        ]);

        return back()->with(
            'success',
            'Your staff profile has been updated successfully.'
        );
    }
}
