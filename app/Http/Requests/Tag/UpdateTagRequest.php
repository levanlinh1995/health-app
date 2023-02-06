<?php

namespace App\Http\Requests\Tag;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTagRequest extends FormRequest
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
            'user_id' => [
                'required',
                'numeric',
                'exists:users,id'
            ],
            'meal_id' => [
                'required',
                'numeric',
                'exists:meals,id'
            ],
            'title' => [
                'nullable',
                'string',
                'max:255'
            ],
            'date' => [
                'required',
                'date_format:Y-m-d',
                Rule::unique('meal_histories', 'date')->ignore(request()->route('meal_history'))
            ],
            'description' => [
                'nullable',
                'string'
            ],
            'featured_img_path' => [
                'required',
                'string',
                'url'
            ],
        ];
    }
}
