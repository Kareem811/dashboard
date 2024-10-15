<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'national_id' => 'required|integer|min:14|max:14',
            'name' => 'required|min:5',
            'password' => 'required',
            'role' => "required",
            'status' => 'required',
            'gender' => 'required',
            'phone' => 'required|min:10|max:20',
            'address' => 'required',
            'date_of_birth' => 'required|date'
        ];
    }
}
