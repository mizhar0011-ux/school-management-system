<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('user')
            ->latest()
            ->paginate(10);

        return view('teachers.dashboard', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        $data = $request->validated();

        DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],

                'email' => strtolower(str_replace(' ', '.', $data['name']))
                    .'.'.$data['employee_number']
                    .'@teacher.local',

                'password' => Hash::make(
                    str_replace(' ', '', $data['name']).'123@'
                ),

                'role' => 'teacher',
                'status' => 'approved',
            ]);

            Teacher::create([
                'user_id' => $user->id,
                'employee_number' => $data['employee_number'],
                'name' => $data['name'],
                'gender' => $data['gender'] ?? null,
                'date_of_birth' => $data['date_of_birth'] ?? null,
                'phone' => $data['phone'] ?? null,
                'qualification' => $data['qualification'] ?? null,
                'subject' => $data['subject'] ?? null,
                'joining_date' => $data['joining_date'] ?? null,
                'address' => $data['address'] ?? null,
            ]);
        });

        return redirect()
            ->route('teachers.index')
            ->with(
                'success',
                'Teacher and login account created successfully.'
            );
    }

    public function show(Teacher $teacher)
    {
        $teacher->load('user');

        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $teacher->load('user');

        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'employee_number' => [
                'required',
                'string',
                'max:50',
                'unique:teachers,employee_number,'.$teacher->id,
            ],

            'gender' => ['nullable', 'in:Male,Female'],

            'date_of_birth' => [
                'nullable',
                'date',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'qualification' => [
                'nullable',
                'string',
                'max:255',
            ],

            'subject' => [
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

        $teacher->update($validated);

        if ($teacher->user) {
            $teacher->user->update([
                'name' => $validated['name'],
            ]);
        }

        return redirect()
            ->route('teachers.show', $teacher)
            ->with(
                'success',
                'Teacher profile updated successfully.'
            );
    }

    public function destroy(Teacher $teacher)
    {
        DB::transaction(function () use ($teacher) {
            $user = $teacher->user;

            $teacher->delete();

            if ($user) {
                $user->delete();
            }
        });

        return redirect()
            ->route('teachers.index')
            ->with(
                'success',
                'Teacher and login account deleted successfully.'
            );
    }
}
