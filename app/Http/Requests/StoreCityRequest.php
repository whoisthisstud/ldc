<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('manage-cities');
        // return true;
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
            'zip_code' => 'integer|unique:cities,zip_code,'.optional($this->city)->id,
            'file' => 'nullable',
            'file.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ];
    }
}
