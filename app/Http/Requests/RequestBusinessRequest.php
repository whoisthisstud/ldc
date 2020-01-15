<?php

namespace App\Http\Requests;

use App\Rules\Throttle;
use Illuminate\Foundation\Http\FormRequest;

class RequestBusinessRequest extends FormRequest
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
            'city_id' => [
                'required' //,
                // new Throttle('business-request', $maxAttempts = 3, $decayInMinutes = 60)
            ],
            'business' => [
                'required', 'string', 'max:255'
            ]
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'city_id.required' => 'The city is required.',
            'business.required' => 'A business name is required',
            'business.string' => 'The business name must be a string',
            'business.max' => 'The business name can not be longer than 255 characters.'
        ];
    }
}
