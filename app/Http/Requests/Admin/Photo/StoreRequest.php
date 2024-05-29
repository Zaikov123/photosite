<?php

namespace App\Http\Requests\Admin\Photo;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'photo_name' => 'required|string',
            'caption' => 'required|string',
            'main_image' => 'required|file',
            'preview_image' => 'required|file',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function messages(): array
    {
        return [
            'photo_name.required' => 'The photo name field can`t be nullable.',
            'photo_name.string' => 'The photo name field needs to be a string.',

            'caption.required' => 'The photo caption field can`t be nullable.',
            'caption.string' => 'The photo caption field needs to be a string.',

            'content.required' => 'The content field can`t be nullable.',
            'content.string' => 'The content field needs to be a string.',

            'main_image.required' => 'The main image field can`t be nullable.',
            'main_image.file' => 'The main image field needs to be a valid file.',

            'preview_image.required' => 'The preview image field can`t be nullable.',
            'preview_image.file' => 'The preview image field needs to be a valid file.',

            'category_id.required' => 'The category field can`t be nullable.',
            'category_id.exists' => 'The selected category is invalid.',

            'tag_ids.array' => 'The tag ids must be an array.',
        ];
    }
}
