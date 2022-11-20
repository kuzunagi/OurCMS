<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email:rfc,dns',
            'password' => ['required', 'confirmed', Password::min(8)->uncompromised()]
        ];
    }

    public function store()
    {
        User::create([
            'name' => $this->only('name'),
            'username' => $this->only('username'),
            'email' => $this->only('email'),
            'password' => hash::make($this->only('password')),
        ]);
    }
}
