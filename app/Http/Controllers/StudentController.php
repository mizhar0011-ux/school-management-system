<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user')
            ->latest()
            ->paginate(10);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();
        $temporaryPassword = Str::random(12);

        DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => strtolower(str_replace(' ', '.', $data['name']))
                    .'.'.$data['admission_number']
                    .'@student.local',
                'password' => Hash::make(
                    str_replace(' ', '', $data['name']).'123@'
                ),
                'role' => 'student',
                'status' => 'approved',
            ]);

            Student::create([
                'user_id' => $user->id,
                'admission_number' => $data['admission_number'],
                'name' => $data['name'],
                'guardian_name' => $data['guardian_name'],
                'guardian_phone' => $data['guardian_phone'],
                'class_name' => $data['class_name'],
                'section' => $data['section'],
                'gender' => $data['gender'],
            ]);
        });

        return redirect()
            ->route('students.index')
            ->with('success', 'Student and login account created successfully.');
    }

    public function show(Student $student)
    {
        $student->load('user');

        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $student->load('user');

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'admission_number' => [
                'required',
                'string',
                'max:50',
                'unique:students,admission_number,'.$student->id,
            ],
            'gender' => ['nullable', 'in:Male,Female'],
            'date_of_birth' => ['nullable', 'date'],
            'phone' => ['nullable', 'string', 'max:30'],
            'guardian_name' => ['nullable', 'string', 'max:255'],
            'guardian_phone' => ['nullable', 'string', 'max:30'],
            'class_name' => ['nullable', 'string', 'max:100'],
            'section' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:1000'],
        ]);

        $student->update($validated);

        if ($student->user) {
            $student->user->update([
                'name' => $validated['name'],
            ]);
        }

        return redirect()
            ->route('students.show', $student)
            ->with('success', 'Student profile updated successfully.');
    }

    public function destroy(Student $student)
    {
        DB::transaction(function () use ($student) {
            $user = $student->user;

            $student->delete();

            if ($user) {
                $user->delete();
            }
        });

        return redirect()
            ->route('students.index')
            ->with('success', 'Student and login account deleted successfully.');
    }
}
