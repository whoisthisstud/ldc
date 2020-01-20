<?php

namespace App\Http\Controllers;

use Validator;
use App\Contact;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);

        $validated = $request->validate([
            'name' => 'required|max:255',  //^\[a-zA-Z0-9,.!?]*$'
            'email' => 'required|email:rfc',
            'message' => 'required|max:1500'
            // 'name' => 'required|max:255|regex:[a-zA-Z0-9,.!?]',  //^\[a-zA-Z0-9,.!?]*$'
            // 'email' => 'required|email:rfc',
            // 'message' => 'required|max:1500',
           ]);

        // , [
        //     'name.required' => 'Your name is required',
        //     'name.max' => 'Please limit this to 255 characters',
        //     'name.regex' => 'This field contains illegal characters',
        //     'email.required' => 'Your email is required',
        //     'email.email' => 'A valid email is required',
        //     'message.required' => 'A message is required',
        //     'message.max' => 'Please limit your message to 1500 characters'
        // ]

        // dd($request);

        $cleaned_name = strip_tags($request->input('name'));
        $cleaned_msg = strip_tags($request->input('message'));
    }
}
