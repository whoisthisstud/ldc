<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request) 
    {
    	$validator = Validator::make($request->all(), [
	       'name' => 'required|max:255|regex:[A-Za-z1-9 ]',
	       'email' => 'required|email:rfc',
	       'message' => 'required|max:1500',
	   ]);

    	$cleaned_name = strip_tags($request->input('name'));
    	$cleaned_msg = strip_tags($request->input('message'));

    }
}
