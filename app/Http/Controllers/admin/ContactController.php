<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
/**********************管理者ページ用お問合せ一覧************************************* */
  public function index(){
    $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
    return view('admin.contacts.index',[
      'contacts' => $contacts
    ]);
  }
/*********************管理者お問合せページ返信モーダル用************************************************************* */
  public function show(int $id){
    $currernt_user = \Auth::user();
    if( $currernt_user->admin == 1){
      $contact = Contact::where('id', $id)->first();
      echo \json_encode($contact, \JSON_UNESCAPED_UNICODE);
    }
    else{
      dd('not');
    }
    

    
  }
}
