<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserCotroller extends Controller
{
   /*******************会員情報編集*************************************************** */
   public function edit(User $user){
      $this->authorize('show', $user);
     return view('users.edit',[
        'user' => $user
     ]);
  }
 /*******************会員編集処理**************************************************************** */
   public function update(Request $request, User $user){
      $this->authorize('show', $user);
      $this->validate($request,[
            'surname' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'katakana'],
            'surame_kana' => ['required', 'string', 'max:255', 'katakana'],
            'phone_number' => ['required', 'tel'],
            'postal_code' =>[ 'required', 'zipcode', 'max:7'],
            'prefectures' =>[ 'required' ],
            'city' => [ 'required' ],
            'block' => [ 'required'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ]
      ]);
      $file = $request->file('file');
      $user->update([
         'path' => isset($file)? $file->getClientOriginalName() : $user->path,
         'surname' => $request->surname,
         'name' => $request->name,
         'name_kana' => $request->name_kana,
         'surame_kana' => $request->surame_kana,
         'email' => $request->email,
         'phone_number' => $request->phone_number,
         'postal_code' => $request->postal_code,
         'prefectures' => $request->prefectures,
         'city' => $request->city,
         'block' => $request->block

      ]);
     
      if( isset( $file) ){
         $file_name = $file->getClientOriginalName();
         Storage::deleteDirectory('public/users'.$user->id);
         $file->storeAs('users'.$user->id, $user->path, 'public');
      }
      return redirect( route('home'))->with('flash', 'お客様情報を編集しました。');
   }
/******************お客様詳細ページ********************************************************** */
  public function show(User $user){
    $this->authorize('show', $user);
    return view('users.show',[
      'user' => $user
    ]);
  }
}

