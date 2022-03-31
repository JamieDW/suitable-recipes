<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDogRequest extends FormRequest
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
            'name'  => 'required|min:1|max:255',
            'age'   => 'integer|min:1|max:360',
            'breed' => [
                'required',
                'min:1',
                'max:255',
                Rule::in(config('constants.breeds'))
            ],
            'allergies' => [
                'array',
                Rule::in(config('constants.allergies'))
            ]
        ];
    }
}
