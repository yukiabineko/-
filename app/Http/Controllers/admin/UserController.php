<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
/******************会員一覧(管理者のみ)*********************************** */
    public function index(){

      $this->authorize('index', \Auth::user());

      $users = User::orderBy('id', 'asc')
      ->where('admin', '!=', 1)
      ->paginate(10);
      return view('admin.users.index',[
        'users' => $users
      ]);
    }
  }