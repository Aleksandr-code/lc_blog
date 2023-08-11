<?php

namespace App\Http\Requests\Admin\Post;

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
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|image',
            'main_image' => 'required|image',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
            'category_id' => 'integer|nullable|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле является обязательным для ввода',
            'title.string' => 'Это поле должно быть строкой',
            'content.required' => 'Это поле является обязательным для ввода',
            'content.string' => 'Это поле должно быть строкой',
            'preview_image.required' => 'Это поле является обязательным для ввода',
            'preview_image.image' => 'Это поле должно быть изображением',
            'main_image.required' => 'Это поле является обязательным для ввода',
            'main_image.image' => 'Это поле должно быть изображением',
            'tag_ids.array' => 'Необходимо отправить массив данных',
            'category_id.integer' => 'id категории должно быть числом',
            'category_id.exists' => 'id категории должен быть в базе данных',
        ];
    }
}
