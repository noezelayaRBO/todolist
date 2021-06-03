<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactFormController extends Controller
{
    public function view(){
        
        return view('contact');
    }
    public function store(){
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        Mail::to('test@test.com')->send(new ContactFormMail($data));
        return redirect('/homeuser');
    }
}
