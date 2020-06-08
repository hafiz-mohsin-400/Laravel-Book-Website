<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create()
   {
       return view('contact');
   }
   public function store(Request $request)
   {
   	$this->validate(request(), [
    		'message' => 'required',
    		'fullname' => 'required',
    		'email' => 'required|email',
    		'phone' => 'required',
    	]);
      $comment = 'Hi, This test feedback.';
      $toEmail = "phpflow@gmail.com";
      Mail::to($toEmail)->send(new ContactFormMail($comment));
   
    return view('contact');

   }

}
