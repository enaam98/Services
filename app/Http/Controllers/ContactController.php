<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    public function contact(){
        return view('front.contact');
    }
    public function store(Request $request){
        $contact = new Contact();
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->phone=$request->input('phone');
        $contact->message=$request->input('message');
        $contact->save();
        Session()->flash('message','your message send successfully');
        return view('front.contact');

    }
}
