<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,'.$this->user->id,
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле является обязательным для ввода',
            'name.string' => 'Это поле должно быть строкой',
            'email.required' => 'Это поле является обязательным для ввода',
            'email.string' => 'Это поле должно быть строкой',
            'email.email' => 'Это поле не похоже на почтовый ящик',
            'email.unique' => 'Пользователь с данным email уже существует',
            'role.required' => 'Это поле является обязательным для ввода',
            'role.integer' => 'Это поле должно соответсвовать числовому значению в базе',
        ];
    }
}
