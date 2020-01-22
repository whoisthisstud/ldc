<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Validator;
use App\User;
use App\Contact;
use App\Mail\ContactNotifyMailer;
use Illuminate\Http\Request;
use App\Http\Requests\ContactStoreRequest;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('user')
            ->orderBy('is_resolved', 'ASC')
            ->orderBy('has_contacted', 'ASC')
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('admin.contact.index', compact('contacts'));
    }


    public function store(ContactStoreRequest $request)
    {
        $validated = $request->validated();

        $user = null;

        if (Auth::user()) {
            $user = Auth::user()->id;
        }

        $contact = Contact::create($validated + [
            'user_id' => $user,
            'ip_address' => $request->ip()
        ]);

        Mail::to('grow@yourldc.com')->send(new ContactNotifyMailer($contact));
 
        // if (Mail::failures()) {
        //     return response()->Fail('Sorry! Please try again latter');
        // }else{
        //     return response()->success('Great! Successfully send in your mail');
        // }

        notify()->success('Thank you for contacting LDC. Your message has been received.', 'Message Received');

        return redirect()->route('public.contact');
    }
}
