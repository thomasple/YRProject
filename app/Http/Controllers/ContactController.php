<?php 

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller {

    public function getForm()
	{
		return view('contact');
	}

	public function postForm(ContactRequest $request)
	{
		return view('confirm');
	}

}