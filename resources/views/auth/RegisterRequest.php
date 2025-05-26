<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_type' => ['required', 'string'],
            'student_id' => ['required', 'string', 'unique:users,student_id'],
            'first_name' => ['required', 'string', 'max:255'],
            'middle_name' => ['nullable', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users,username'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'course' => ['required', 'string'],
            'school' => ['required', 'string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
