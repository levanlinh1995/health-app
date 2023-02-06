<?php

namespace App\Http\Requests\RecommendationCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRecommendationCategoryRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('recommendation_categories', 'name')->ignore(request()->route('admin_recommendation_category'))
            ],
            'status' => [
                Rule::in([0, 1]),
            ],
        ];
    }
}
