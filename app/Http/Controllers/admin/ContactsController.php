<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
   public function index(){
       $contacts = Contact::paginate(15);
       return view('admin.contact', ['contacts'=>$contacts]);
   }
}
