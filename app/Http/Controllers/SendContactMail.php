<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Mail\ContactMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendContactMail extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
		$request->validate([
			'name' => 'required|string|max:64',
			'message' => 'required|string',
			'mail' => 'required|email:rfc,dns'
		]);

		$contact = new Contact();
		$contact->name = $request->input('name');
		$contact->message = $request->input('message');
		$contact->mail = $request->input('mail');
		Mail::to('joulin.nicolas@gmail.com')
			->send(new ContactMe($contact));

		return response()->json([
			'status' => 'success'
		]);
    }
}
