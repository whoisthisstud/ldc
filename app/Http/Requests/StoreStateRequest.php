<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'abbreviation' => 'required|unique:states|min:2|max:2'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'A name is required',
    //         'name.unique' => 'A state with this name has already been added',
    //         'name.max' => 'A name cannot contain more than 255 characters',
    //         'abbreviation.required'  => 'A state\'s abbreviation is required',
    //         'abbreviation.unique'  => 'A state with this abbreviation has already been added',
    //         'abbreviation.min'  => 'An abbreviation must be two characters',
    //         'abbreviation.max'  => 'An abbreviation must be two characters',
    //     ];
    // }
}
