<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::with('user')
            ->latest()
            ->paginate(10);

        return view('staff.dashboard', compact('staff'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(StoreStaffRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],

                'email' => strtolower(str_replace(' ', '.', $data['name']))
                    .'.'.$data['employee_number']
                    .'@staff.local',

                'password' => Hash::make(
                    str_replace(' ', '', $data['name']).'123@'
                ),

                'role' => 'staff',
                'status' => 'approved',
            ]);

            Staff::create([
                'user_id' => $user->id,
                'employee_number' => $data['employee_number'],
                'name' => $data['name'],
                'gender' => $data['gender'] ?? null,
                'date_of_birth' => $data['date_of_birth'] ?? null,
                'phone' => $data['phone'] ?? null,
                'department' => $data['department'] ?? null,
                'designation' => $data['designation'] ?? null,
                'joining_date' => $data['joining_date'] ?? null,
                'address' => $data['address'] ?? null,
            ]);
        });

        return redirect()
            ->route('staff.index')
            ->with(
                'success',
                'Staff member and login account created successfully.'
            );
    }

    public function show(Staff $staff)
    {
        $staff->load('user');

        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        $staff->load('user');

        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'employee_number' => [
                'required',
                'string',
                'max:50',
                'unique:staff,employee_number,'.$staff->id,
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

            'department' => [
                'nullable',
                'string',
                'max:255',
            ],

            'designation' => [
                'nullable',
                'string',
                'max:255',
            ],

            'joining_date' => [
                'nullable',
                'date',
            ],

            'address' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);

        $staff->update($validated);

        if ($staff->user) {
            $staff->user->update([
                'name' => $validated['name'],
            ]);
        }

        return redirect()
            ->route('staff.show', $staff)
            ->with(
                'success',
                'Staff profile updated successfully.'
            );
    }

    public function destroy(Staff $staff)
    {
        DB::transaction(function () use ($staff) {
            $user = $staff->user;

            $staff->delete();

            if ($user) {
                $user->delete();
            }
        });

        return redirect()
            ->route('staff.index')
            ->with(
                'success',
                'Staff member and login account deleted successfully.'
            );
    }
}
