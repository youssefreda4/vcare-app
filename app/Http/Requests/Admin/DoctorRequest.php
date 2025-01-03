<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:30', 'min:5'],
            'email' => ['required', 'string', 'email', 'unique:admins'],
            'major_id' => ['required'],
            'image' => ['required', 'image'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ];
    }
}
