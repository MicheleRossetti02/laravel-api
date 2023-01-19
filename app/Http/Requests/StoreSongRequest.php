<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSongRequest extends FormRequest
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
            'cover' => 'nullable|image|max:300',
            'category_id' => 'nullable|exists:categories,id', // 👈 The category id must exist!!
            'artist' => 'nullable',
            'album' => 'nullable'
        ];
    }
}
