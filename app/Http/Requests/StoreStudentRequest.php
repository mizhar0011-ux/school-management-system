<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'admission_number' => [
                'required',
                'string',
                'max:50',
                'unique:students,admission_number',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'guardian_name' => [
                'required',
                'string',
                'max:255',
            ],

            'guardian_phone' => [
                'required',
                'string',
                'max:30',
            ],

            'class_name' => [
                'required',
                'string',
                'max:100',
            ],

            'section' => [
                'required',
                'string',
                'max:50',
            ],

            'gender' => [
                'required',
                'in:Male,Female',
            ],
        ];
    }
}
