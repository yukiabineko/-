<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
/****************管理者用ホームページ************************************************ */
    public function index(){
       if(\Auth::user()->admin == 0){
         return redirect( route('home'));
       }
       return view('admin.home');
    }
}
