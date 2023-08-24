<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ReplayMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
  }
/********************返信メール送信**********************************************************************************/
  public function replay(Request $request){
    /**
     * 返信メール
     */
    $contact = Contact::where('id', $request->contact_id )->first();
    //返信完了処理
    $contact->update([
      'replay' => 1
    ]);

    Mail::send(new ReplayMail(
      $request->email,
      $request->subject,
      $request->replay
    ));
    return redirect( route('admin.home'))->with('flash', '返信を送信しました。');
  }
}
