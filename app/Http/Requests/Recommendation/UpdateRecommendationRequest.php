<?php

namespace App\Http\Requests\Recommendation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRecommendationRequest extends FormRequest
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
            'recommendation_category_id' => [
                'required',
                'numeric',
                'exists:recommendation_categories,id'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'content' => [
                'required'
            ],
            'featured_img_path' => [
                'required',
                'string',
                'url'
            ],
            'status' => [
                Rule::in([0, 1]),
            ],
        ];
    }
}
