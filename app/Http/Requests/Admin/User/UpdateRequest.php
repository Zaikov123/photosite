<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$this->id,
            'password' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
            'role' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'=> 'Name field can`t be nullable',
            'name.string'=> 'Name need to be string',
            'password.required'=> 'Password field can`t be nullable',
            'password.string'=> 'Password need to be string',
            'email.required'=> 'Email field can`t be nullable',
            'email.string'=> 'Email need to be string',
            'email.email'=> 'Email need to be email :)',
            'email.unique'=> 'Exists user with same email',

        ];
    }
}
