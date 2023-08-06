<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
/*************お問合せページ*********************************************************************** */
    public  function create(){
        return view('contacts.create');
    }
/**************問い合わせレコード作成**************************************************************** */
    public function store(ContactRequest $request){

        $context = Contact::create([
           'title' => $request->title,
           'email' => $request->email,
           'context' => $request->context,
           'user_id' => $request->user_id
        ]);
    
        if( $context ){
            /**
             * メール送信
             */
            return redirect( route('contacts.create'))->with('flash', '問い合わせを送信しました。');
        }
    }
}

