<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'      =>  'required|min:3',
            'email'     => 'required|email|max:255',
            'username'   => 'required|string|max:255',
            'phone'      => 'required|string|max:20',
            'role'     =>   'required',
            'password'  =>  'required|sometimes|string|min:6|confirmed',
        ];
    }
}
