<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
/************************************************************ */
  public function index(){
    $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
    return view('admin.contacts.index',[
      'contacts' => $contacts
    ]);
  }
}
