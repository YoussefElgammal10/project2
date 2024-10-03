<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return ! auth()->check(); // يسمح بالتسجيل فقط إذا لم يكن المدير مسجلاً دخول
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fname' => 'required|min:3|alpha', 
            'lname' => 'required|min:3|alpha', 
            'email' => 'required|email|unique:managers,email', 
            'password' => 'required|min:6|alpha_num|confirmed'
        ];
    }
}
