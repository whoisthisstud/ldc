<?php

namespace App\Http\Requests;

use Gate;
use App\Http\Requests\DiscountStoreRequest;
use Illuminate\Foundation\Http\FormRequest;

class DiscountStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::authorize('manage-discounts');
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'title' => strip_tags($this->title),
            'description' => strip_tags($this->description),
            'call_to_action' => strip_tags($this->call_to_action),
            'cta_link' => preg_replace("(^https?://)", "", $this->cta_link ),
            'code' => strip_tags($this->code),
            'begins_at' => date('Y-m-d h:i:s', strtotime($this->begins_at . ' 00:00:01')),
            'expires_at' => date('Y-m-d h:i:s', strtotime($this->expires_at . ' 00:00:01'))
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'business_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'title' => 'required|max:35',
            'description' => 'nullable|sometimes|max:255',
            'call_to_action' => 'nullable|sometimes|max:25',
            'cta_link' => 'nullable|sometimes',
            'code' => 'nullable|sometimes|min:6|max:12',
            'terms' => 'nullable|sometimes|max:255',
            'begins_at' => 'nullable|sometimes',
            'expires_at' => 'nullable|sometimes'
        ];
    }

    public function messages()
    {
        return [
            'business_id.numeric' => 'A business is required.',
            'city_id.numeric' => 'A city is required.'
        ];
    }
}
