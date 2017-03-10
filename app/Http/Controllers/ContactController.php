<?php

namespace App\Http\Controllers;

use App\Contact;
use Mail;
use Illuminate\Http\Request;
use App\Mail\ContactFormInfo;

class ContactController extends Controller
{
    public function index() {
    	return view('contact.index');
    }

    public function email(Request $request) {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'required',
    		'phone_number' => 'required',
    		'message' => 'required'
    	], [
    		'name.required' => 'Please enter a name.',
    		'email.required' => 'Please enter an email.',
    		'phone_number.required' => 'Please enter a name.',
    		'message.required' => 'Please enter a name.' 
    	]);

    	Mail::to(config('mail.username'))->send(new ContactFormInfo([
                                        'name' => $request['name'],
                                        'email' => $request['email'], 
                                        'phone_number' => $request['phone_number'], 
                                        'message' => $request['message']
                                    ]));

    	return view('contact.index');
    }
}
