<?php

namespace App\Http\Requests\ExerciseRecord;

use Illuminate\Foundation\Http\FormRequest;

class StoreExerciseRecordRequest extends FormRequest
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
            ],
            'time' => [
                'required',
                'date_format:H:i',
            ],
            'kcal' => [
                'required',
                'numeric',
                'min:1',
                'max:10000'
            ],
            'duration' => [
                'required',
                'integer',
                'min:1',
                'max:99999'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'description' => [
                'nullable',
                'string'
            ],
        ];
    }
}
