<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
/******************会員一覧*********************************** */
    public function index(){
      $users = User::orderBy('id', 'asc')->paginate(10);
      return view('admin.users.index',[
        'users' => $users
      ]);
    }
}
