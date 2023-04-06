<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user');
        return [
            'name'      =>  'required|min:3',
            'email'     => 'required|email|unique:users,email,'.$userId,
            'username'   => 'required|string|unique:users,username,'.$userId,
            'phone'      => 'required|string|unique:users,phone,'.$userId,
            'role'     =>   'required',
            'password'  =>  'required|sometimes|string|min:6|confirmed',
        ];
    }
}
