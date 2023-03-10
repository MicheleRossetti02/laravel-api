<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required:songs,title|max:100',
            'cover_image' => 'nullable|image',
            'category_id' => 'nullable|exists:categories,id',
            'project_link' => 'nullable',
            'technologies' => 'nullable',
            'souce_code' => 'nullable'
        ];
    }
}
