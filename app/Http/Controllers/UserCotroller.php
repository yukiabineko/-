<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserCotroller extends Controller
{
   /*******************会員情報編集*************************************************** */
   public function edit(User $user){
     return view('users.edit',[
        'user' => $user
     ]);
  }
}

