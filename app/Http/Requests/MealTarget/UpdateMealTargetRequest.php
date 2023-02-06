<?php

namespace App\Http\Requests\MealTarget;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMealTargetRequest extends FormRequest
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
            'date' => [
                'required',
                'date_format:Y-m-d',
                Rule::unique('meal_targets', 'date')->ignore(request()->route('meal_target'))
            ],
            'target' => [
                'required',
                'integer',
                'min:1',
                'max:99999'
            ],
        ];
    }
}
