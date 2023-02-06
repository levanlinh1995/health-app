<?php

namespace App\Http\Requests\MealTarget;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMealTargetRequest extends FormRequest
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
                'unique:meal_targets,date'
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
