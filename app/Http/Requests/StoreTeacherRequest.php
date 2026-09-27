<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],

            'employee_number' => [
                'required',
                'string',
                'max:50',
                'unique:teachers,employee_number',
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
        ];
    }
}
