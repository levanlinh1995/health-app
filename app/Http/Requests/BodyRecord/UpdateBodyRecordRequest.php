<?php

namespace App\Http\Requests\BodyRecord;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBodyRecordRequest extends FormRequest
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
            'description' => [
                'nullable',
                'string'
            ],
            'weight' => [
                'required',
                'numeric',
                'min:1',
                'max:10000'
            ],
            'body_fat_percentage' => [
                'required',
                'numeric',
                'min:1',
                'max:10000'
            ],
            'date' => [
                'required',
                'date_format:Y-m-d',
                Rule::unique('body_records', 'date')->ignore(request()->route('body_record'))
            ]
        ];
    }
}
