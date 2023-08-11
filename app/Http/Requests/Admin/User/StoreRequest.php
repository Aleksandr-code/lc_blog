<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        // Генерация пароля через почту
        // 'password' => 'required|string',
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        //'password.required' => 'Это поле является обязательным для ввода',
        //'password.string' => 'Это поле должно быть строкой',
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
