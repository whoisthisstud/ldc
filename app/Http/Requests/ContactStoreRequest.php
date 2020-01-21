<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $this->merge([
            'name' => strip_tags($this->name),
            'message' => strip_tags($this->message)
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
            'name' => 'required|max:255',  //|regex:[a-zA-Z0-9,.!?]
            'email' => 'required|email:rfc,dns,filter',
            'message' => 'required|max:1500'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Your name is required',
            'name.max' => 'Please limit this to 255 characters',
            'name.regex' => 'This field contains illegal characters',
            'email.required' => 'Your email is required',
            'email.email' => 'A valid email is required',
            'message.required' => 'A message is required',
            'message.max' => 'Please limit your message to 1500 characters',
            'message.regex' => 'This field contains illegal characters'
        ];
    }
}
