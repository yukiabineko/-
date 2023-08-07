<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
/*************お問合せページ*********************************************************************** */
    public  function create(){
        return view('contacts.create');
    }
/**************問い合わせレコード作成**************************************************************** */
    public function store(ContactRequest $request){

        
        $contact = Contact::create([
           'name' => $request->name,
           'title' => $request->title,
           'email' => $request->email,
           'context' => $request->context,
           'user_id' => $request->user_id
        ]);
    
        if( $contact ){
            /**
             * メール送信
             */
            Mail::send(new ContactMail(
              $contact->name,
              $contact->email,
              $contact->title,
              $contact->context
            ));
            return redirect( route('contacts.create'))->with('flash', '問い合わせを送信しました。');
        }
    }
}

