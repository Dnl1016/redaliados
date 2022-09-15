<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\UserCreated;


class SendEmailController extends Controller
{

	public function index()
	{

		Mail::to('receiver-email-id')->send(new UserCreated());

		if (Mail::failures()) {
			return response()->Fail('Sorry! Please try again latter');
		} else {
			return response()->success('Great! Successfully send in your mail');
		}
	}
}