<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name'=>['required'],
            'email'=>['required','email','unique:students,email'],
            'phone'=>['nullable','regex:/^(010|011|012|015)[0-9]{8}$/'],
            'department_id'=>['integer']
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'please enter your name',
            'email.required'=>'please enter your email',
            'email.email'=>'not valid email',
            'email.unique'=>'email exists'
        ];
    }
}
